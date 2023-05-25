<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('pm.common.meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @include('pm.common.stylesheets')
    @yield('css')
</head>

<body style="opacity: 1">
    <script src="{{ asset('assets/js/hs.theme-appearance.js') }}"></script>
    <script src="{{ asset('assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js') }}">
    </script>

    <div id="layer-main-wrap" class="justify-content-center align-item-center">
        <div id="circularG">
            <div id="circularG_1" class="circularG"></div>
            <div id="circularG_2" class="circularG"></div>
            <div id="circularG_3" class="circularG"></div>
            <div id="circularG_4" class="circularG"></div>
            <div id="circularG_5" class="circularG"></div>
            <div id="circularG_6" class="circularG"></div>
            <div id="circularG_7" class="circularG"></div>
            <div id="circularG_8" class="circularG"></div>
        </div>
    </div>
    <main class="page-content main" id="top" style="overflow-x: hidden;">
        @yield('content')
    </main>

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

    @include('pm.common.script')

    @livewireScripts

    <script>
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

    <script>
        $(".lable-file-in").click(function(){
            $(".lable-file-in").removeClass('active')
            $(this).addClass('active')
        })
        const v = document.getElementById('file-upload');
        const nvFichier = document.getElementById('file-upload');
        const filename = document.querySelector('.list-file .name-file')
        const iframe = document.querySelector('.content-scanner iframe');

        nvFichier.addEventListener('change', function() {
            const fichier = this.files[0];
            if (fichier) {
                let namefile = fichier.name;
                if (namefile.length >= 12) {

                    let splitName = namefile.split('.');

                    namefile = splitName[0].substring(0, 12) + "... ." + splitName[1];

                }
                const analyseur = new FileReader();
                $(iframe).addClass('show')
                $(iframe).addClass('fade')
                analyseur.readAsDataURL(fichier);
                analyseur.addEventListener('load', function() {
                    $(iframe).removeClass('d-none')
                    $('.block-no-file').addClass('d-none')
                    $('.block-col').removeClass('d-none')
                    iframe.setAttribute('src', this.result);
                    filename.innerHTML = namefile;
                })
            }
            setTimeout(() => {
                $(iframe).removeClass('fade')
            }, 3000);
        })

        // if(fichier) {

        //     let namefile = fichier.name;
        //     if (namefile.length >= 12) {

        //         let splitName = namefile.split('.');

        //         namefile = splitName[0].substring(0,12) + "... ." + splitName[1];

        //     }

        //     const analyseur = new FileReader();



        //     analyseur.readAsDataURL(fichier);

        //     analyseur.addEventListener('load', function(){
        //         console.log(progressArea)
        //         progressArea.style.display = "flex";
        //         filename.innerHTML = namefile;

        //     })

        // }
    </script>

</body>

</html>
