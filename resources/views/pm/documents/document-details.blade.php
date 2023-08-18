@extends('pm.layouts.master')

@section('css')
@endsection

@section('titre', 'ELIK6 - Documents')

@section('body')
    <div class="mt-3 page-header card card-lg">
        <div class="text-star">
            <h1 class="mb-1">{{ Str::ucfirst($dossier->titre) }}</h1>
            <p class="mb-1 text-white">Ref: {{ Str::ucfirst($dossier->reference) }}</p>
            <p class="mb-0 text-white">Créé le : {{ $dossier->created_at->format('d/m/Y') }}</p>
        </div>
        <div class="block-circle">
            <div class="circle-white"></div>
            <div class="circle-white"></div>
            <div class="circle-white"></div>
        </div>
    </div>
    <div class="pb-5 content container-fluid">
        <a href="{{ route('pm.classeurs.show', $dossier->classeur) }}" class="back">
            <i class="bi bi-chevron-left"></i> Retour
        </a>
        <div class="row g-lg-3">
            @livewire('document.document', ['dossier' => $dossier])
        </div>
    </div>

    @foreach ($documents as $document)
        <div class="modal fade" id="modal-delete-document-{{ $document->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center content-text">
                            <i data-feather="trash"></i>
                            <h5>Etes-vous sûr de vouloir supprimer ce document ?</h5>
                            <p>Cette action est irrémédiable</p>
                        </div>
                        <form action="{{ route('pm.documents.destroy', $document) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="mb-3 block-btn d-flex justify-content-center">
                                <a href="#" class="btn btn-cancel me-4" data-bs-dismiss="modal"
                                    aria-label="Close">Annuler</a>
                                <button class="btn btn-delete">Supprimer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-new-task-ass" aria-labelledby="exampleModalLabel" aria-modal="true"
            role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
                            <span>Nouvelle tâche</span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pm.taches.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="document_id" value="{{ $document->id }}">
                            <div class="form-group row g-3">
                                <div class="col-lg-12">
                                    <label for="">Titre de la tâche <sup class="text-danger fs-5">*</sup></label>
                                    <input type="text" name="libelle" class="form-control" placeholder="Dénomination"
                                        required>
                                </div>
                                <div class="col-lg-12">
                                    <label for="">Description <sup class="text-danger fs-5">*</sup></label>
                                    <textarea name="description" id="description" cols="30" rows="3" class="form-control"
                                        placeholder="Description" required></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Date debut <sup class="text-danger fs-5">*</sup></label>
                                    <input type="date" name="debut" class="form-control" placeholder="Date debut"
                                        required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Date fin</label>
                                    <input type="date" name="fin" class="form-control" placeholder="Date fin">
                                </div>
                                <div class="col-lg-12">
                                    <label for="agents">Agents concernés <sup class="text-danger fs-5">*</sup></label>
                                    <div class="tom-select-custom">
                                        <select class="js-select form-select form-select-sm" name="agents[]" id="agents"
                                            autocomplete="off"
                                            data-hs-tom-select-options='{
                                                "placeholder": "Selectionnez des agents"
                                            }'
                                            multiple required>
                                            @foreach ($agents as $agent)
                                                <option value="{{ $agent->id }}"
                                                    data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="{{ imageOrDefault($agent->image) }}" alt="{{ $agent->nom }}" /><span class="text-truncate">{{ $agent->prenom . ' ' . $agent->nom }}</span></span>'>
                                                    {{ $agent->prenom . ' ' . $agent->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <label for="">Priorité <sup class="text-danger fs-5">*</sup></label>
                                    <div class="tom-select-custom">
                                        <select class="js-select form-select" name="priorite_id" autocomplete="off"
                                            data-hs-tom-select-options='{
                                                    "placeholder": "Selectionnez une priorité"
                                                }'
                                            wire:model='stat.etat_id' required>
                                            <option value="">Selectionnez une priorité</option>
                                            @foreach ($priorites as $priorite)
                                                <option value="{{ $priorite->id }}"
                                                    data-option-template='<span class="d-flex align-items-center"><span @class([
                                                        'legend-indicator',
                                                        'bg-success' => $priorite->id == 1,
                                                        'bg-warning' => $priorite->id == 2,
                                                        'bg-danger' => $priorite->id == 3,
                                                    ])></span><span class="text-truncate">{{ $priorite->titre }}</span></span>'>
                                                    {{ $priorite->titre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <label for="" class="p-0 mb-0">Tâche parent</label><span> (optionnel)</span>
                                    <br>
                                    <small class="mb-2">(cette tâche sera une sous-tâche de celle que vous selectionnez
                                        ici)</small>
                                    <div class="tom-select-custom">
                                        <select class="js-select form-select" name="priorite_id" autocomplete="off"
                                            data-hs-tom-select-options='{
                                                "placeholder": "Selectionnez une priorité"
                                            }'
                                            wire:model='stat.etat_id'>
                                            @foreach ($taches as $tache)
                                                <option value="{{ $tache->id }}">{{ $tache->titre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="from-group row">
                                <div class="my-3 col-lg-12 text-end">
                                    <button class="btn btn-add">Enregistrer</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
