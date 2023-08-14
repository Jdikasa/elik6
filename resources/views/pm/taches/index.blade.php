@extends('pm.layouts.master')

{{-- @section('styles')
    <style>
        .icon.avatar {
            width: 34px;
            height: 34px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--whiteColor);
            border-radius: 100%;
            font-size: 14px;
            margin-right: 10px;
            overflow: hidden;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            cursor: default;
            padding-left: 0px;
            padding-right: 0px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            display: block
        }

        .content .card-table .block-taks.task::before {
            display: none;
        }

        .content .card-table .block-taks .dropdown-menu {
            left: auto !important;
            right: 0 !important;
            transform: none !important;
        }
    </style>
@endsection --}}

@section('body')
    <!--breadcrumb-->
    <div class="page-header card card-lg">
        <div class="text-star">
            <h1>Gestion de tâches</h1>
            <p class="mb-0">
                {{ Auth::user()->name . ', ' }} vous avez
                {{ $taches->count() }} créées
            </p>
            <div class="page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="mt-3">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('pm.home') }}"><i class="bi bi-house-fill"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Gestion de tâches</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block-circle">
            <div class="circle-white"></div>
            <div class="circle-white"></div>
            <div class="circle-white"></div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="content container-fluid pb-5">
        @livewire('taches.index-tache')
        @foreach ($taches as $key => $tache)
            <div class="offcanvas offcanvas-end offcanvas-task" tabindex="-1" id="detail-task-{{ $tache->id }}"
                aria-labelledby="offcanvasRightLabel" style="width: 600px">
                <div class="offcanvas-header align-items-center"
                    style="flex-direction: column;border: none; padding-left:35px;padding-right: 35px;">
                    <div class="d-flex justify-content-between w-100 align-items-center">
                        @if (Auth::user()->id == 1)
                            <a href="{{-- route('pm.taches.finish',$tache->id) --}}" class="btn">Marquer comme terminé</a>
                        @endif
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"
                            style="transform: scale(.8)"></button>
                    </div>
                </div>
                <div class="offcanvas-body">
                    <div class="pt-0 block-detail-task">
                        <div class="d-flex w-100 align-items-baseline">
                            <h4 class="mb-0 pe-3 title-task" style="word-break: break-all">{{ $tache->titre }}</h4>
                            <div class="d-flex align-items-center ms-auto" style="flex: 0 0 auto">
                                <div
                                    class="badge-task @if ($tache->priorite_id == 1) normal @elseif($tache->priorite_id == 2) urgent @else absolu @endif">
                                    {{ $tache->priorite?->titre }}
                                </div>
                                @if ($tache->user_id == Auth::id())
                                    <div class="dropdown">
                                        <button class="px-0 btn btn-end ms-2" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi bi-menu-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('pm.taches.edit', $tache->id) }}">Modifier</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#modal-add-objectifs-{{ $tache->id }}">Ajouter un
                                                    objectif</a></li>
                                            <li>
                                                <a class="dropdown-item delete" href="#"
                                                    data-id="{{ $tache->id }}">Supprimer</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="mt-2 row g-3">
                            <div class="col-lg-5">
                                <div class="items">
                                    <p class="mb-2 me-0"><i class="bi bi-person me-1"></i> Créée par</p>
                                    <div class="d-flex w-100 align-items-center">
                                        <div class="avatar-us-create">
                                            <img src="{{ imageOrDefault($tache->user->agent->image) }}"
                                                alt="photo de profil {{ $tache->user->agent->prenom . ' ' . $tache->user->agent->nom }}">
                                        </div>
                                        <h6 class="mb-0 ms-2">
                                            {{ $tache->user->agent->prenom . ' ' . $tache->user->agent->nom }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="items">
                                    <p class="mb-2 me-0"><i class="bi bi-person-group me-1"></i> Participants</p>
                                    <div class="block-all-membres">
                                        @foreach ($tache->objectifs as $objectif)
                                            <div class="avatar-membre" data-bs-toggle="modal"
                                                data-bs-target="#modal-edit-participants-{{ $tache->id }}">
                                                <img src="{{ imageOrDefault($objectif->agent?->image) }}" alt="image profil">
                                            </div>
                                        @endforeach
                                        @if ($tache->pourcentage < 100 && $tache->statut_id != '3')
                                            <div class="avatar-membre" data-bs-toggle="modal"
                                                data-bs-target="#modal-add-participants-{{ $tache->id }}">
                                                <i class="bi bi-plus"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="items">
                                    <p class="mb-3 me-0"><i class="bi bi-calendar me-1"></i> Période </p>
                                    <h6>Du {{ $tache->date_debut?->format('d-m-Y') }} au
                                        {{ $tache->date_fin?->format('d-m-Y') }}</h6>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="items">
                                    <h6>
                                        Description
                                    </h6>
                                    <p style="color: var(--colorTitre)">{!! $tache->description !!}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @livewire('taches.tache-pane', ['tache' => $tache], key($tache->id))
                    </div>
                </div>
            </div>
    
    
            @livewire('taches.add-tache-participant-modal', ['tache' => $tache], key($tache->id))
    
            @foreach ($tache->objectifs as $objectif)
                @livewire('taches.edit-tache-participant-modal', ['objectif' => $objectif], key($objectif->id))
            @endforeach
        @endforeach
    </div>


    <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center content-text">
                        <i data-feather="power"></i>
                        <h5>Suppression</h5>
                        <p>Voulez-vous vraiment vous Supprimer cette tâche ?</p>
                    </div>
                    <div class="mb-3 block-btn d-flex justify-content-between w-100">
                        <button class="btn btn-cancel" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
                        <form method="POST" action="#" class="p-0" id="delete_form">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete">
                                Supprimer
                            </button>
                            {{-- <button class="btn btn-add">
                            Annuler
                        </button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // $('#form-message').submit(function(event) {
        // event.preventDefault();

        // var elements = $('.form-block');

        // console.log($(elements).find('input').serialize());

        // $('#modal-load').modal('show');

        // for (let i = 0; i < elements.length; i++) {
        //     const element = elements[i];
        //     data = $(element).find('select, input').serialize();
        //     // console.log(elements.length + 1);
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     })
        //     $.ajax({
        //         url: $(this).attr('action'),
        //         type: "post",
        //         data: data,
        //         success: function(data) {
        //             console.log(data);
        //             $('#modal-load').modal('hide');
        //             $('#modal_add_vente').modal('hide');
        //             $('#modal_add_vente').on('hidden.bs.modal', function() {
        //                 location.reload();
        //             })
        //         },
        //         error: function(error) {
        //             $('#modal-load').modal('hide');
        //             console.log(error);
        //         }
        //     });
        // }
        // });

        $('.delete').on('click', function(e) {
            $('#delete_form')[0].action = '{{ route('pm.taches.destroy', '__id') }}'.replace('__id', $(this)
                .data('id'));
            $('#modal-delete').modal('show');
        });

        $(document).ready(function() {

            $('.check-cible').on('click', function(event) {
                cible = $(this).data('cible');

                if ($(this).prop("checked")) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    $.ajax({
                        url: '/gestion-taches/tache/cible/check',
                        type: "post",
                        data: cible,
                        success: function(data) {
                            console.log(data);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                } else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    $.ajax({
                        url: '/gestion-taches/tache/cible/uncheck',
                        type: "post",
                        data: cible,
                        success: function(data) {
                            console.log(data);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });

            $('#form-messagddde').submit(function(event) {
                event.preventDefault();

                var elements = $('.input-form-comment');
                var data = $(elements).find('input').serialize();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    url: $(this).attr('action'),
                    type: "post",
                    data: data,
                    success: function(data) {
                        $('#comment-text').val('');

                        // $('#tache-commentaires').empty();

                        // const comments = document.getElementById('tache-commentaires');
                        // comments.innerHTML = "";

                        // for(let i = 0; i < data.length; i++) {
                        //     comments.innerHTML += `
                    //     <div class="block-comment {{-- $commentaire->user_id==Auth::user()->id?'block-comment-me':'' --}} commentaires">
                    //         <div class="block-info-comment d-flex">
                    //             <div class="avatar-comment commentaires">
                    //                 <img src="{{-- asset('assets/images/profils/'.$commentaire->user->avatar) --}}" alt="Photo profil">
                    //             </div>
                    //             <div class="name-comment commentaires">
                    //                 <h6>{{-- $commentaire->user->prenom.''.$commentaire->user->nom --}}
                    //                 </h6>
                    //                 <p>{{-- $commentaire->created_at->diffForHumans() --}}</p>
                    //             </div>
                    //         </div>
                    //         <div class="comment commentaires">
                    //             <p>{{-- $commentaire->message --}}</p>
                    //         </div>
                    //     </div>
                    //     `;

                        //     // console.log(data[i]['message']);

                        //     // comments.innerHTML += `<div>${data[i]['message']}</div>`;
                        // }
                        console.log(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#comment-form').submit(function(event) {
                event.preventDefault();
                // const token = document.querySelector('meta[name="csrf-token"]').content;
                const url = this.getAttribute('action');

                var elements = $('#comment-form');
                var value = $(elements).find('input').serialize();

                /* const value = document.getElementById('value').value;
                // fetch(url, {
                //     headers : {
                //         'Content-Type': 'application/json',
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     },
                //     method : "post",
                //     body : JSON.stringtify({
                //         value: value
                //     })
                // }).then(response => {
                //     response.json().then(data => {
                //         console.log(data)
                //     })
                // }).catch(error => {
                //     console.log(error)
                // });*/

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    url: $(this).attr('action'),
                    type: "get",
                    data: value,
                    success: function(data) {
                        const comments = document.getElementById('posts');
                        comments.innerHTML = '';

                        for (let i = 0; i < data.length; i++) {
                            console.log(data[i]['message']);

                            comments.innerHTML = `<div>${data[i]['message']}</div>`;
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

                // console.log(value);

            });

        });
    </script>
@endsection
