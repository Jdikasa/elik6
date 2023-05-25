<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use App\Http\Controllers\File;
use App\Models\Agent;
use App\Models\ArchivePermission;
use App\Models\Classeur;
use App\Models\Departement;
use App\Models\Document;
use App\Models\DocumentNature;
use App\Models\DocumentType;
use App\Models\Dossier;
use App\Models\Priorite;
use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classeurs = Classeur::forCurrentTeam()->get();
        $dossiers = Dossier::forCurrentTeam()->get();
        $filesCount = Document::forCurrentTeam()->count();
        return view('pm.documents.index')->with(
            [
                'classeurs' => $classeurs,
                'dossiers' => $dossiers,
                'filesCount' => $filesCount
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $types = DocumentType::forCurrentTeam()->get();
        $natures = DocumentNature::forCurrentTeam()->get();
        $departements = Departement::forCurrentTeam()->get();
        $agents = Agent::forCurrentTeam()->get();
        return view('pm.documents.new-doc')->with([
            'types' => $types,
            'natures' => $natures,
            'departements' => $departements,
            'agents' => $agents,
            'dossier_id' => $request->dossier,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $document = new Document();
            $document->dossier_id = $request->dossier_id;
            $document->category_id = $request->categorie;
            $document->reference = $request->ref;
            $document->libelle = $request->title;
            $document->type = $request->type;
            $document->description = $request->objet;
            $document->document = (new File())->handle($request,'document','documents');
            $document->user_id = Auth::user()->id;
            $document->statut_id = 1;
            $document->created_by = Auth::user()->agent->id;
            $document->nature_id = $request->nature;
            $document->team_id = Auth::user()->current_team_id;
            $document->save();

            ArchivePermission::create([
                'agent_id' => Auth::user()->agent->id,
                'permissionable_id' => $document->id,
                'permissionable_type' => 'App\Models\DocumentArchivage',
                'key' => 'view_document',
            ]);

            $content = json_encode([
                'name' => 'Document',
                'statut' => 'success',
                'message' => 'Document enregistré avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Document',
                'statut' => 'error',
                'message' => 'Impossible de créer le document, une erreur s\'est produite',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return redirect()->route('pm.dossiers.show', $request->dossier_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $classeurs = Classeur::forCurrentTeam()->get();
        $dossiers = Dossier::forCurrentTeam()->get();
        $agents = Agent::forCurrentTeam()->get();
        $priorites = Priorite::all();
        $taches = Tache::forCurrentTeam()->encours()->get();
        return view('pm.documents.show-doc')->with([
            'find_document' => $document,
            'classeurs' => $classeurs,
            'dossiers' => $dossiers,
            'agents' => $agents,
            'priorites' => $priorites,
            'priorites' => $priorites,
            'taches' => $taches,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $types = DocumentType::forCurrentTeam()->get();
        $natures = DocumentNature::forCurrentTeam()->get();
        $departements = Departement::forCurrentTeam()->get();
        $agents = Agent::forCurrentTeam()->get();
        return view('pm.documents.edit-doc')->with([
            'types' => $types,
            'natures' => $natures,
            'departements' => $departements,
            'agents' => $agents,
            'document' => $document,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        try {

            // $document = new Document();
            // $document->dossier_id = $request->dossier_id;
            $document->category_id = $request->categorie;
            $document->reference = $request->ref;
            $document->libelle = $request->title;
            $document->type = $request->type;
            $document->description = $request->objet;
            $document->document = $request->hasFile('document') ? (new File())->handle($request,'document','documents') : $document->document;
            $document->nature_id = $request->nature;
            // $document->user_id = Auth::user()->id;
            // $document->statut_id = 1;
            // $document->created_by = Auth::user()->agent->id;
            $document->save();

            $content = json_encode([
                'name' => 'Document',
                'statut' => 'success',
                'message' => 'Document modifié avec succès !',
            ]);

        } catch (\Throwable $th) {
            $content = json_encode([
                'name' => 'Document',
                'statut' => 'error',
                'message' => 'Impossible de modifier le document, une erreur s\'est produite',
            ]);
        }

        session()->flash(
            'session',
            $content
        );

        return redirect()->route('pm.dossiers.show', $document->dossier->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        // dd($document);
        $document->delete();

        $content = json_encode([
            'name' => 'Document',
            'statut' => 'success',
            'message' => 'Document supprimé avec succès !',
        ]);

        session()->flash(
            'session',
            $content
        );
        return redirect()->route('pm.dossiers.show', $document->dossier);
    }

    public function archive(Request $request)
    {
        $document = Document::find($request->document_id);
        $document->statut_id = 6;
        $document->save();

        $content = json_encode([
            'name' => 'Document',
            'statut' => 'success',
            'message' => 'Document archivé avec succès !',
        ]);

        session()->flash(
            'session',
            $content
        );

        return redirect()->route('pm.dossiers.show', $document->dossier);
    }

    public function desarchiver(Request $request)
    {
        $document = Document::find($request->document_id);
        $document->statut_id = 2;
        $document->save();

        $content = json_encode([
            'name' => 'Document',
            'statut' => 'success',
            'message' => 'Document desarchivé avec succès !',
        ]);

        session()->flash(
            'session',
            $content
        );

        return redirect()->route('pm.dossiers.show', $document->dossier);
    }
}
