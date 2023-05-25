@extends('pm.layouts.layout-doc')

@section('content')
    <div class="block-scanner">
        <div class="sidebar-doc">
            <div class="header-sidebar">
                <a href="{{ URL::previous() }}">
                    <i class="bi bi-arrow-left"></i>
                </a>
                <h4>Details du fichier</h4>
                {{-- <div class="block-badge off">
                    <i class="bi bi-unlock-fill"></i>
                    Non confidentiel
                </div> --}}
            </div>

            <div>
                <div class="body-siderbar">
                    <div class="d-flex justify-content-between">
                        {{-- <div class="block-assign" data-bs-toggle="modal" data-bs-target="#modal-new-task-ass">
                            <i class="bi bi-person-plus"></i> Assigner ce document
                        </div> --}}
                        {{-- <div class="block-assign" data-bs-toggle="modal" data-bs-target="#modal-new-task-ass">
                            <i class="fi fi-rr-share me-1"></i> Partager
                        </div> --}}
                    </div>
                    <div class="form-group row g-3">
                        <div class="col-12">
                            <h5 class="mb-2 title-info">Informations générales</h5>
                        </div>


                        <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Nom</label>
                                <div class="col-7">
                                    <p class="items">: {{ Str::ucfirst($find_document->libelle ?? '') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Référence</label>
                                <div class="col-7">
                                    <p class="items">: {{ Str::ucfirst($find_document->reference ?? '') }}</p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Catégorie</label>
                                <div class="col-7">
                                    <p class="items">
                                        {{ Str::ucfirst($find_document->categorie->title) }}
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Type de document</label>
                                <div class="col-7">
                                    <p class="items">
                                        : {{ Str::ucfirst($find_document->typeDocument->titre) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Service initiateur</label>
                                <div class="col-7">
                                    <p class="items">
                                        {{ $find_document->author->fonction()->departement->libelle }}
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Objet</label>
                                <div class="col-7">
                                    <p class="items">
                                        : {{ $find_document->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Date de création</label>
                                <div class="col-7">
                                    <p class="items">
                                        : {{ $find_document->created_at->isoFormat('LL') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row align-items-center">
                                <label for="inputPassword" class="col-5 col-form-label">Ajouté par</label>
                                <div class="col-7">
                                    <p class="items">
                                        : {{ Str::ucfirst($find_document->author->prenom ?? '') }}
                                        {{ Str::ucfirst($find_document->author->nom ?? '') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="footer-sidebar">
                    {{-- <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-delete-document">Supprimer</a> --}}
                    <a href="#" class="btn btn-valid" data-bs-toggle="modal"
                        data-bs-target="#modal-new-archive">Desarchiver</a>
                </div>
            </div>

        </div>
        <div class="content-scanner">
            <div class="container-fluid">
                {{--  --}}
                <iframe src="{{ files($find_document->document)->link }}" frameborder="0" class="w-100"></iframe>
            </div>
        </div>

    </div>

    <div class="modal fade" id="modal-new-archive" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
                        <span>Archiver</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row g-4">
                        <form action="{{ route('pm.documents.desarchiver') }}" method="post">
                            @csrf
                            <input type="hidden" name="document_id" id="" value="{{ $find_document->id }}">
                            <div class="">
                                <h4>Etes-vous sûr de vouloir desarchiver ce document ?</h4>
                            </div>
                            <div class="col-lg-12 text-end">
                                <button class="btn btn-add" type="submit">Archiver</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
