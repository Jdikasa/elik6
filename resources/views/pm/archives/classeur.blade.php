@extends('pm.layouts.master')

@section('css')
@endsection

@section('titre', 'ELIK6 - Archives')

@section('body')

    <div class="content container-fluid pb-5">
        <div class="page-header card card-lg">
            <div class="text-star">
                <h1>Archivage</h1>
                <p class="text-white mt-1 mb-0">
                    Année {{ $annee }}
                </p>
            </div>
            <div class="block-circle">
                <div class="circle-white"></div>
                <div class="circle-white"></div>
                <div class="circle-white"></div>
            </div>
        </div>

        <div class="mt-3 row g-lg-3">
            @livewire('archivage.classeur-index', ['annee' => $annee])
        </div>
    </div>

    {{-- @foreach ($classeurs as $classeur)
        <div class="offcanvas offcanvas-end" tabindex="-1" id="detail-classeur-{{ $classeur->id }}" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header" style="flex-direction: column;">
                <div class="d-flex justify-content-between w-100">
                    <div class="text-star">
                        <h5 id="offcanvasRightLabel" class="mb-1">Détails du classeur </h5>
                        <p class="mb-1 d-flex" style="font-size: 12px">
                            <span style="display: inline-block" class="me-1">
                                Créé le:
                            </span>
                            {{ $classeur->created_at->isoFormat('LLLL') }}
                        </p>
                        <p class="mb-1 d-flex" style="font-size: 12px">
                            <span style="display: inline-block" class="me-1">Par: </span>
                            {{ $classeur->author->nom }} {{ $classeur->author->nom }}
                        </p>
                        <p class="mb-1 d-flex" style="font-size: 12px">
                            {{-- <span style="display: inline-block" class="me-1">Departement: </span>  -}}
                            {{ $classeur->author->fonction()->departement->libelle }}
                        </p>
                    </div>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
            </div>
            <div class="offcanvas-body">
                <div class="block-progress">
                    <div class="card card-notification card-campaing">
                        <div class="text-star d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 date">
                                Référence :
                            </h6>
                            <h6 class="mb-0 date">
                                {{ $classeur->reference }}
                            </h6>
                        </div>
                        <div class="text-star d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 date">
                                Dénomination :
                            </h6>
                            <h6 class="mb-0 date">
                                {{ $classeur->titre }}
                            </h6>
                        </div>
                    </div>

                    <div class="card card-notification card-campaing">
                        <div class="text-star">
                            <h6 class="mb-3 date">
                                Description
                            </h6>
                            <p style="font-size: 12px;" class="mb-0">
                                {{ $classeur->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-footer">
                <div class="d-flex justify-content-end">
                    <button class="btn" data-bs-toggle="modale" data-bs-target="#modal-delete-classeur-{{ $classeur->id }}">Supprimer</button>
                    <button class="btn">Modifier</button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-delete-classeur-{{ $classeur->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center content-text">
                            <i data-feather="trash"></i>
                            <h5>Etes-vous sûr de vouloir supprimer ce classeur ?</h5>
                            <p>Cette action est irrémédiable</p>
                        </div>
                        <form action="{{ route('pm.classeurs.destroy', $classeur) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="mb-3 block-btn d-flex justify-content-center">
                                <a href="#" class="btn btn-cancel me-4" data-bs-dismiss="modal" aria-label="Close">Annuler</a>
                                <button class="btn btn-delete">Supprimer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}

    {{-- @include('components.admin.modals.archive') --}}

@endsection
