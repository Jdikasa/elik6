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
    <div class="pb-5 content container-fluid">

        @livewire('taches.index-tache')

        @foreach ($taches as $key => $tache)
            @livewire('taches.tache-detail', ['tache' => $tache], key($tache->id))
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
