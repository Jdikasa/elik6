<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Elik6 | Administration Digital System</title>
    <!-- Styles -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js"></script>
    @include('pm.layouts.partials.head.styles')
    @yield('styles')
    @livewireStyles()
</head>

<body>

    <div class="global-div">
        <x-sidebar />

        <div class="wrapper">
            @include('pm.layouts.partials.header.navbar')
            <div class="content">
                @yield('content')
            </div>
        </div>
        <div class="backdropFilter"></div>
    </div>

    <div class="modal fade" id="modal-load" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="d-flex align-items-center">
                        <div class="load-spiner">
                        </div>
                        <div class="text-star">
                            <h6 style="color:var(--colorTitre)!important;">Veuillez patienter</h6>
                            <p style="font-size: 14px" class="mb-0">Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNotif" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Notifications</h5>
        <hr>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @foreach ($courriers as $notify)
                <a href="#">
                    <div class="card card-notification">
                        <div class="avatar-user-float">
                            <img src="{{ asset('assets/img/team/1.jpg') }}" alt="photo profil">
                        </div>
                        <div class="text-star text-content">
                            <h6 class="date d-flex justify-content-between align-items-center"><span>{{$notify->userSend->name}}</span> <span>{{$notify->created_at->format('H:i') ?? ''}}</span></h6>
                            <p>{{$notify->type->content ?? ''}}  <span>#{{$notify->courrier->title ?? ''}}</span></p>
                            <div class="block-file d-flex mt-2">
                                <div class="icon-sm">
                                    <i class="fi fi-rr-folder"></i>
                                </div>
                                <div class="block-detail-file">
                                    <h6>{{$notify->courrier->title ?? ''}}</h6>
                                    <p>{{$notify->courrier->objet ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
            @foreach ($taches as $tache)
                <a href="#">
                    <div class="card card-notification see">
                        <div class="avatar-user-float">
                            <img src="{{ asset('assets/img/team/1.jpg') }}" alt="photo profil">
                        </div>
                        <div class="text-star text-content">
                            <h6 class="date d-flex justify-content-between align-items-center"><span>{{$tache->userSend->name}}</span> <span>{{$tache->created_at->format('H:i') ?? ''}}</span></h6>
                            <p> {{$tache->type->content ?? ''}}  <span>#{{$tache->tach->titre ?? ''}}</span> </p>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
        <div class="offcanvas-footer">
            <div class="text-end">
                <a href="#" class="see-more">Voir Plus</a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="d-flex justify-content-between mb-3 align-items-center">
                <h5 class="mb-0">Chats</h5>
                {{-- <p class="mb-0">{{ '( '. $messages->where('read_at',null)->count() .' )' ?? '( 0 )' }}</p> -}}
            </div>
            {{-- @foreach ($messages as $message) -}}
                <a href="#">
                    <div class="card card-notification see">
                        <div class="avatar-user-float">
                            <img src="{{ asset('assets/img/team/1.jpg') }}" alt="photo profil">
                        </div>
                        <div class="text-star text-content">
                            <h6 class="date d-flex justify-content-between align-items-center"><span>{{$message->Send->name ?? ''}}</span> <span>{{$message->created_at->format('H:i') ?? ''}}</span></h6>
                            <p> {{$message->content ?? ''}}   </p>
                        </div>
                        {{-- <div class="d-flex justify-content-end">
                            <div class="num">{{App\Models\Chat :: where('read_at',null)->where('user_send',$message->Send->id)->count() ?? ''}}</div>
                        </div> -}}
                    </div>
                </a>
            @endforeach

        </div>
        <div class="offcanvas-footer">
            <div class="text-center">
                <a href="#" class="btn">Plus des courriers</a>
            </div>
        </div>
    </div> --}}

    <div class="modal fade" id="modal-logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center content-text">
                        <i data-feather="power"></i>
                        <h5>Déconnexion</h5>
                        <p>Voulez-vous vraiment vous déconnecter ?</p>
                    </div>
                    <div class="mb-3 block-btn d-flex justify-content-between w-100">
                        <button class="btn btn-cancel" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
                        <form method="POST" action="{{ route('logout') }}" class="p-0">
                            @csrf
                            <a class="btn btn-delete" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                Déconnexion
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->get('session') && json_decode(session()->get('session'))->name != '')
        @if (json_decode(session()->get('session'))->statut == 'success')
            <div class="message-flash success">
                <div class="content-text d-flex">
                    <div class="icon">
                        <i class="bi bi-check"></i>
                    </div>
                    <div class="text-star">
                        <h6>{{ json_decode(session()->get('session'))->name }}</h6>
                        <p>{{ json_decode(session()->get('session'))->message }}</p>
                    </div>
                </div>
            </div>
        @elseif(json_decode(session()->get('session'))->statut == 'warnig')
            <div class="message-flash warning">
                <div class="content-text d-flex">
                    <div class="icon">
                        <i data-feather="alert-circle"></i>
                    </div>
                    <div class="text-star">
                        <h6>{{ json_decode(session()->get('session'))->name }}</h6>
                        <p>{{ json_decode(session()->get('session'))->message }}</p>
                    </div>
                </div>
            </div>
        @elseif(json_decode(session()->get('session'))->statut == 'error')
            <div class="message-flash error">
                <div class="content-text d-flex">
                    <div class="icon">
                        <i data-feather="x-circle"></i>
                    </div>
                    <div class="text-star">
                        <h6>{{ json_decode(session()->get('session'))->name }}</h6>
                        <p>{{ json_decode(session()->get('session'))->message }}</p>
                    </div>
                </div>
            </div>
        @endif

    @endif

    @include('pm.layouts.partials.head.scripts')

    <script>
        $(document).scroll(function(){
            if ($(this).scrollTop() > 40) {
                $('.navbar').addClass('box-shadow')
            }
            else{
                $('.navbar').removeClass('box-shadow')
            }
        })
        $('.theme-mode-control label').click(function() {
            $('.theme-mode-control').toggleClass('active')
        })

        $('.close-menu').click(function() {
            $('.sidebar').toggleClass('sidebar-sm')
            $('.wrapper').toggleClass('wrapper-lg')
        })

        @if (Session::has('session'))
            $('.message-flash').addClass('show')
            setTimeout(() => {
                $('.message-flash').removeClass('show')
            }, 5000);
        @endif
    </script>
    @yield('scripts')

    <script>

        $('.btn-close-notif').click(function() {
            $(this).parent().addClass('fadeOut')
            setInterval(() => {
                $(this).parent().addClass('delete')
            }, 500);

        })
        const card_notif = document.querySelectorAll('.card-notification')
        card_notif.forEach(all_card_notif => {
             all_card_notif_hidden = all_card_notif;
             console.log($(all_card_notif_hidden));
        });
        if($(all_card_notif_hidden).hasClass('delete')){
            $('.block-empty-notif').addClass('show')
        }
        else{
            $('.block-empty-notif').removeClass('show')
        }
            const nvFichier = document.getElementById('change-photo-profil');
            const filename = document.querySelector('.list-img .name-img')

            nvFichier.addEventListener('change', function() {
                const fichier = this.files[0];
                if (fichier) {
                    let namefile = fichier.name;
                    if (namefile.length >= 12) {

                        let splitName = namefile.split('.');

                        namefile = splitName[0].substring(0,12) + "... ." + splitName[1];

                    }
                    const analyseur = new FileReader();
                    analyseur.readAsDataURL(fichier);
                    analyseur.addEventListener('load', function() {
                        $('.col-img').removeClass('d-none')
                        filename.innerHTML = namefile;
                    })
                }
                setTimeout(() => {
                    $(iframe).removeClass('fade')
                }, 3000);
            })
        var lis = document.querySelectorAll(".nav-tache li");



        // }
        // lis.forEach((linkItem, index) => {

        //     linkItem.addEventListener("mouseenter", () => {
        //         var width = $(linkItem).width();
        //         $(linkItem).parent().css("transform", "translateX(" + (index * width) + ")")
        //         // indicator.style.top = `${index * 53 + 88}px`;
        //         // $(indicator).text(text.innerHTML)
        //         // $(indicator).addClass('show')
        //     })
        // })

        // $(".nav-tache li")[0].on("click", function () {
        //     var width = $(this).width();
        //     $($(this).parent()).css("transform", "translateX(" + (width) + ")")
        //     // indicator.style.top = `${index * 53 + 88}px`;
        //     // $(indicator).text(text.innerHTML)
        //     // $(indicator).addClass('show')
        // })

        if (window.matchMedia("(max-width: 576px)").matches) {
            var linkItems = document.querySelectorAll(".nav-tache li");
            linkItems.forEach((linkItem, index) => {
                var width = $(linkItem).width();

                linkItem.addEventListener("click", () => {
                    $(linkItem).parent().css("transform", "translateX(" + (index * width) + ")")
                    // indicator.style.top = `${index * 53 + 88}px`;
                    // $(indicator).text(text.innerHTML)
                    // $(indicator).addClass('show')
                })
            })

        }

        function sidebarSm() {
            var linkItems = document.querySelectorAll(".sidebar-sm ul li");
            var indicator = document.querySelector(".tooltip-lg");
            linkItems.forEach((linkItem, index) => {
                linkItem.addEventListener("mouseenter", () => {
                    var text = linkItem.querySelector(".title");
                    indicator.style.top = `${index * 53 + 88}px`;
                    $(indicator).text(text.innerHTML)
                    $(indicator).addClass('show')
                })

                linkItem.addEventListener("mouseleave", () => {
                    indicator.style.top = 78 + 'px';
                    $(indicator).removeClass('show')
                })
            })
        }
            // var linkItems = document.querySelectorAll(".nav-folder ul li");
            // var indicator = document.querySelector(".indicator-nav");
            // linkItems.forEach((linkItem, index) => {
            //     linkItem.addEventListener("click", () => {
            //         var text = linkItem.querySelector(".title");
            //         indicator.style.left = `${index * linkItem.width() + 10}px`;
            //         $(indicator).text(text.innerHTML)
            //         $(indicator).addClass('show')
            //     })

            //     // linkItem.addEventListener("mouseleave", () => {
            //     //     indicator.style.top = 78 + 'px';
            //     //     $(indicator).removeClass('show')
            //     // })
            // })
        $('.close-menu-sm').click(function() {
            $('body').toggleClass('overflowHidden')
            $('.sidebar').toggleClass('sidebar-sm')
            $('.sidebar-mobile').toggleClass('sidebar-respo')
            $('.backdropFilter').toggleClass('show')
            $('.wrapper').toggleClass('wrapper-lg')
        })

        $('.close-menu').click(function() {

            $('.sidebar').toggleClass('sidebar-sm')
            $('.wrapper').toggleClass('wrapper-lg')
            $('.backdropFilter').toggleClass('show')
            $('.sidebar-mobile').toggleClass('sidebar-respo')
            $('.sidebar ul.lists li .collapse').removeClass('show')

            if ($('.sidebar').hasClass('sidebar-sm')) {
                $('.sidebar .collapse').removeClass('.show')
                $('.sidebar ul.lists li a.link').click(function() {
                    $('.sidebar').removeClass('sidebar-sm')
                    $('.wrapper').removeClass('wrapper-lg')
                })
                sidebarSm();
            } else {
                $('.sidebar ul.lists li a.link').attr('data-bs-toggle', "collapse")
            }
            $('body').removeClass('overflow-hidden')
        })

        $('.backdropFilter').click(function() {
            $('body').removeClass('overflowHidden')
            $(this).removeClass('show')
            $('.sidebar-mobile').removeClass('sidebar-respo')
            $('.sidebar').removeClass('sidebar-sm')
            $('.wrapper').toggleClass('wrapper-lg')

        })
        $('.message-flash').addClass('show')
        setTimeout(() => {
            $('.message-flash').removeClass('show')
        }, 5000);

        $(document).ready(function() {


            $('.logout-button').on('click', function(event) {
                event.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    url: '/logout-session',
                    type: "post",
                    success: function(data) {
                        console.log(data);
                        $('#form-logout').submit();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('.panelsession').on('click', function() {
                $.ajax({
                    url: '/session/panel',
                    type: "get",
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });


            // const linkItems = $(".sidebar ul li");

            // $(linkItems).forEach((linkItem, index) => {
            //     $(linkItems).on("mouseenter", function() {

            //         const indicator = $(".tooltip-lg");
            //         var text = $(this).find(".title").text();
            //         indicator.text(text);
            //         indicator.css("top", (index * 53 + 88) + "px")
            //         indicator.style.top = `${index * 53 + 88}px`;
            //     })
            // })

            var linkItems = document.querySelectorAll(".nav-folder li");
            var indicator = document.querySelector(".indicator-nav");
            linkItems.forEach((linkItem, index) => {
                linkItem.addEventListener("click", () => {
                    var width = $(linkItem).width();
                    var leftOffset = linkItem.offsetLeft;
                    console.log(leftOffset);
                    indicator.style.left = `${leftOffset + ((width / 2 ) - 9)}px`;
                })


            })

            var linkItems2 = document.querySelectorAll(".nav-folder li");
            var indicator2 = document.querySelector(".indicator-nav");
            linkItems2.forEach((linkItem2, index2) => {
                var btn = $(linkItem2).find('button.active');
                var width2 = $(btn.parent()).width();
                var leftOffset2 = btn.parent()[0].offsetLeft;
                indicator2.style.left = `${leftOffset2 + ((width2 / 2 ) - 9)}px`;
            })

        });
    </script>
</body>

</html>
