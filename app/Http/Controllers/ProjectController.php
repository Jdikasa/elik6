<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Certificat;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Note;
use App\Models\NoteStatut;
use App\Models\Partenaire;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::forCurrentTeam()->get();
        return view('pm.projects.index')->with([
            'projects' => $projects,
        ]);
    }

    public function getCertificat(Request $request)
    {
        $certificat = Certificat::forCurrentTeam()->where('country_id', $request->id)->first();
        
        $parteners = Partenaire::forCurrentTeam()
        ->select('id', 'societe_id')
        ->with('societe')
        ->whereHas('modalites', function ($query) use ($certificat) {
            $query->where('country_id', $certificat->country_id);
        })->get()->toArray();

        return response()->json([
            'pays' => $certificat->country->name,
            'prix' => $request->type == 1 ? $certificat->total_cost : $certificat->renewal_price,
            'parteners' => $parteners,
        ]);
    }

    public function getModalitePart(Request $request)
    {
        $partenaire = Partenaire::find($request->id);
        $modalite = $partenaire->modalites->where('country_id', '=', $request->country_id)->first();

        return response()->json([
            'prix' => $request->type == 1 ? $modalite->prix : $modalite->renewal_price,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Customer::forCurrentTeam()->get();
        $certificats = Certificat::forCurrentTeam()->get();
        return view('pm.projects.create')->with([
            'clients' => $clients,
            'certificats' => $certificats,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        try {
            $certificat = Certificat::find($request->certificat_id);
            $partenaire = Partenaire::find($request->partenaire_id);

            $projet = new Project();
            $projet->client_id = $request->client_id;
            $projet->certificat_id = $request->certificat_id;
            $projet->product_id = $request->product_id;
            $projet->partenaire_id = $request->partenaire_id;
            $projet->duree = $request->duree;
            $projet->prix = doubleval($certificat->total_cost + ($partenaire->prix ?? 0));
            $projet->date_reception = Carbon::createFromFormat('d/m/Y', $request->date_reception);
            $projet->date_soumission = Carbon::createFromFormat('d/m/Y', $request->date_soumission);
            $projet->update_date = Carbon::createFromFormat('d/m/Y', $request->update_date);
            $projet->date_cloture = Carbon::createFromFormat('d/m/Y', $request->date_cloture);
            $projet->description = $request->description;
            $projet->team_id = Auth::user()->current_team_id;
            $projet->save();

            $projet->notes()->save(new Note([
                'etape_id' => $request->note_etape_id,
                'statut_id' => $request->note_statut_id,
                'titre' => NoteStatut::find($request->note_statut_id)->titre,
                'note_text' => $request->maj_text,
            ]));

            $content = json_encode([
                'name' => 'Projet',
                'statut' => 'success',
                'message' => 'L\'ajout du projet a réussi avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Projet',
                'statut' => 'error',
                'message' => 'L\'enregistrement du projet a échoué !',
            ]);
            session()->flash(
                'session',
                $content
            );
            return redirect()->back();
        }

        session()->flash(
            'session',
            $content
        );

        return redirect()->route('pm.projects.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('pm.projects.show')->with([
            'project' => $project,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $clients = Customer::forCurrentTeam()->get();
        $certificats = Certificat::forCurrentTeam()->get();
        return view('pm.projects.edit')->with([
            'project' => $project,
            'clients' => $clients,
            'certificats' => $certificats,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $certificat = Certificat::find($request->certificat_id);
        $partenaire = Partenaire::find($request->partenaire_id);

        $project->update([
            'client_id' => $request->client_id,
            'certificat_id' => $request->certificat_id,
            'product_id' => $request->product_id,
            'partenaire_id' => $request->partenaire_id,
            'duree' => $request->duree,
            'prix' => doubleval($certificat->total_cost + ($partenaire->prix ?? 0)),
            'date_reception' => Carbon::createFromFormat('d/m/Y', $request->date_reception),
            'date_soumission' => Carbon::createFromFormat('d/m/Y', $request->date_soumission),
            'update_date' => Carbon::createFromFormat('d/m/Y', $request->update_date),
            'date_cloture' => Carbon::createFromFormat('d/m/Y', $request->date_cloture),
            'description' => $request->description,
        ]);

        $content = json_encode([
            'name' => 'Ressources humaines',
            'statut' => 'success',
            'message' => 'La modification du projet a réussi avec succès !',
        ]);

        session()->flash(
            'session',
            $content
        );

        return redirect()->route('pm.projects.index');
    }

    public function updateStep(Request $request, $id)
    {

        $project = Project::find($id);
        $project->update_date = Carbon::now()->next('Friday');
        $project->save();

        $project->notes()->save(new Note([
            'etape_id' => $request->note_etape_id,
            'statut_id' => $request->note_statut_id,
            'titre' => NoteStatut::find($request->note_statut_id)->titre,
            'note_text' => $request->maj_text,
        ]));

        $content = json_encode([
            'name' => 'Ressources humaines',
            'statut' => 'success',
            'message' => 'La mis à jour du projet a réussi avec succès !',
        ]);

        session()->flash(
            'session',
            $content
        );

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        $content = json_encode([
            'name' => 'Ressources humaines',
            'statut' => 'success',
            'message' => 'La suppression du projet a réussi avec succès !',
        ]);

        session()->flash(
            'session',
            $content
        );

        return redirect()->back();
    }
}
