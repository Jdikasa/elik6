<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('pm.common.meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @include('pm.common.stylesheets')
    @yield('css')
</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl footer-offset">
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

    @livewire('navigation-menu')

    <div class="global-div">
        <div class="wrapper">
            <div class="content rh">
                @yield('content')
                {{-- @include('components.modals.personals') --}}
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNotif" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Notifications</h5>
            <hr>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="card card-notification">
                <div class="avatar-user-float">
                    <img src="{{ asset('assets/img/team/1.jpg') }}" alt="photo profil">
                </div>
                <div class="text-star text-content">
                    <h6 class="date d-flex justify-content-between align-items-center"><span>Jeanne labelle </span>
                        <span>12:45 PM</span>
                    </h6>
                    <p>A ajouté deux fichiers dans <span>#name dossier</span></p>
                    <div class="mt-2 block-file d-flex">
                        <div class="icon-sm">
                            <i class="fi fi-rr-folder"></i>
                        </div>
                        <div class="block-detail-file">
                            <h6>Name file</h6>
                            <p>12 Mo</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-notification see">
                <div class="avatar-user-float">
                    <img src="{{ asset('assets/img/team/1.jpg') }}" alt="photo profil">
                </div>
                <div class="text-star text-content">
                    <h6 class="date d-flex justify-content-between align-items-center"><span>John Doe</span> <span>12:45
                            PM</span></h6>
                    <p>Vient de laisser un commentaire sur le projet <span>#Name project</span> </p>
                </div>
            </div>
            <div class="card card-notification">
                <div class="avatar-user-float">
                    <img src="{{ asset('assets/img/team/1.jpg') }}" alt="photo profil">
                </div>
                <div class="text-star text-content">
                    <h6 class="date d-flex justify-content-between align-items-center"><span>20 Jan 2021</span>
                        <span>12:45 PM</span>
                    </h6>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint provident ea repellendus saepe
                        omnis, nihil sequi nulla, vitae hic odio, rem fuga eos aspernatur ipsa incidunt ad maiores
                        delectus quo.</p>
                </div>
            </div>
        </div>
        <div class="offcanvas-footer">
            <div class="text-end">
                <a href="#" class="see-more">more</a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Inbox</h5>
                <p class="mb-0">(5)</p>
            </div>
            <div class="card card-notification see">
                <div class="avatar-user-float">
                    <img src="{{ asset('assets/img/team/1.jpg') }}" alt="photo profil">
                </div>
                <div class="text-star text-content">
                    <h6 class="date d-flex justify-content-between align-items-center"><span>John Doe</span> <span>12:45
                            PM</span></h6>
                    <p>A envoyé un mail <span>#Description mail</span> </p>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="num">2</div>
                </div>
            </div>
            <div class="card card-notification">
                <div class="avatar-user-float">
                    <img src="{{ asset('assets/img/team/1.jpg') }}" alt="photo profil">
                </div>
                <div class="text-star text-content">
                    <h6 class="date d-flex justify-content-between align-items-center"><span>John Doe</span> <span>12:45
                            PM</span></h6>
                    <p>A envoyé un mail <span>#Description mail</span> </p>
                </div>
            </div>
            <div class="card card-notification see">
                <div class="avatar-user-float">
                    <img src="{{ asset('assets/img/team/1.jpg') }}" alt="photo profil">
                </div>
                <div class="text-star text-content">
                    <h6 class="date d-flex justify-content-between align-items-center"><span>John Doe</span> <span>12:45
                            PM</span></h6>
                    <p>A envoyé un mail <span>#Description mail</span> </p>
                </div>
            </div>
        </div>
        <div class="offcanvas-footer">
            <div class="text-center">
                <a href="#" class="btn">Plus des courriers</a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center content-text">
                        <i data-feather="power"></i>
                        <h5>Are you sure ?</h5>
                        <p>This action can't be undone.</p>
                    </div>
                    <div class="mb-3 block-btn d-flex justify-content-center">
                        <button class="btn btn-cancel me-4" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
                        <form method="POST" action="{{ route('logout') }}">
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
        @php
            $statut = json_decode(session()->get('session'))->statut;
        @endphp
        <div class="message-flash {{ $statut }}">
            <div class="content-text d-flex">
                <div class="icon">
                    @if (json_decode(session()->get('session'))->statut == 'success')
                        <i class="bi bi-check"></i>
                    @elseif(json_decode(session()->get('session'))->statut == 'warnig')
                        <i class="bi bi-bell"></i>
                    @elseif(json_decode(session()->get('session'))->statut == 'error')
                        <i class="bi bi-circle"></i>
                    @endif
                </div>
                <div class="text-star">
                    <h6>{{ json_decode(session()->get('session'))->name }}</h6>
                    <p>{{ json_decode(session()->get('session'))->message }}</p>
                </div>
            </div>
        </div>
    @endif

    @include('pm.common.script')
    @livewireScripts
    @yield('scripts')
    <script>
        //  feather.replace()
        $(document).ready(function(){
            $('.block-salaire .text-clique.text-clique-1').click(function() {
            $(this).addClass('active');
            $('.block-salaire .text-clique.text-clique-2').addClass('active');
        })
        $('.block-salaire .text-clique.text-clique-2').click(function() {
            $(this).removeClass('active');
            $('.block-salaire .text-clique.text-clique-1').removeClass('active');
        })
        $('.theme-mode-control label').click(function() {
            $('.theme-mode-control').toggleClass('active')

        })
        $('.close-menu').click(function() {
            $('.sidebar').toggleClass('sidebar-sm')
            $('.wrapper').toggleClass('wrapper-lg')
        })
        var linkItems = document.querySelectorAll(".nav-folder li");
        var indicator = document.querySelector(".indicator-nav");
        linkItems.forEach((linkItem, index) => {
            linkItem.addEventListener("click", () => {
                var width = $(linkItem).width();
                var leftOffset = linkItem.offsetLeft;
                console.log(leftOffset);
                indicator.style.left = `${leftOffset + ((width / 2 ) - 9)}px`;
            })


            // console.log(width);
        })

        var linkItems2 = document.querySelectorAll(".nav-folder li");
        console.log(linkItems2);
        var indicator2 = document.querySelector(".indicator-nav");
        linkItems2.forEach((linkItem2, index2) => {
            var btn = $(linkItem2).find('button.active');
            var width2 = $(btn.parent()).width();
            var leftOffset2 = btn.parent()[0].offsetLeft;
            indicator2.style.left = `${leftOffset2 + ((width2 / 2 ) - 9)}px`;
        })
        $('.message-flash').addClass('show')
        setTimeout(() => {
            $('.message-flash').removeClass('show')
        }, 5000);

        })
        // isLeapYear = (year) => {
        //     return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 !== 0 && year % 400 !== 0)
        // }

        // getFebDays = (year) => {
        //     return isLeapYear(year) ? 28 : 29
        // }
        // let calendar = document.querySelector('.calendar')

        // const month_names = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre',
        //     'Octobre', 'Novembre', 'Decembre'
        // ]

        // let month_picker = document.querySelector('#month-picker')

        // month_picker.onclick = () => {
        //     month_list.classList.add('show')
        // }
        // // Generate Calendar


        // generatecalendar = (month, year) => {
        //     let calendar_days = document.querySelector('.calendar-days')
        //     calendar_days.innerHTML = ''
        //     let calendar_header_year = document.querySelector('#year')

        //     let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

        //     let currDate = new Date()

        //     month_picker.innerHTML = month_names[month]
        //     calendar_header_year.innerHTML = year

        //     let first_day = new Date(month, year, 1)

        //     for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
        //         let day = document.createElement('div')
        //         if (i >= first_day.getDay()) {
        //             day.classList.add('calendar-day-hover')
        //             day.innerHTML = i - first_day.getDay() + 1
        //             // day.innerHTML += '<span></span>'

        //             if (i - first_day.getDay() + 1 === currDate.getDay() && year === currDate.getFullYear() && month ===
        //                 currDate.getMonth()) {
        //                 day.classList.add('curr-date')
        //             }
        //         }

        //         calendar_days.appendChild(day)
        //     }
        // }

        // let month_list = calendar.querySelector('.month-list')

        // month_names.forEach((e, index) => {
        //     let month = document.createElement('div')
        //     month.innerHTML = `<div>${e}</div>`
        //     month.onclick = () => {
        //         month_list.classList.remove('show')
        //         curr_month.value = index
        //         generatecalendar(curr_month.value, curr_year.value)
        //     }
        //     month_list.appendChild(month)
        // })
        // document.querySelector('#prev-year').onclick = () => {
        //     --curr_year.value
        //     generatecalendar(curr_month.value, curr_year.value)
        // }
        // document.querySelector('#next-year').onclick = () => {
        //     ++curr_year.value
        //     generatecalendar(curr_month.value, curr_year.value)
        // }
        // let currDate = new Date()

        // let curr_month = {
        //     value: currDate.getMonth()
        // }
        // let curr_year = {
        //     value: currDate.getFullYear()
        // }
        // generatecalendar(curr_month.value, curr_year.value)
    </script>

</body>

</html>
