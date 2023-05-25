<!-- Bootstrap bundle JS -->
{{-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script> --}}
<!--plugins-->
{{-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/pace.min.js') }}"></script> --}}


<!--app-->
{{-- <script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/index2.js') }}"></script> --}}
{{-- <script>
    new PerfectScrollbar(".best-product")
</script> --}}

<!-- JS Implementing Plugins -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="{{ asset('assets/js/html2canvas.min.js') }}"></script>
<script src="{{ asset('assets/js/jspdf.umd.min.js') }}"></script>
@yield('scrip-vendor')
<!-- JS Front -->

<script src="{{ asset('assets/js/theme.min.js') }}"></script>
<script src="{{ asset('assets/js/hs.theme-appearance-charts.js') }}"></script>

<!-- JS Plugins Init. -->
<script>
    (function() {
        localStorage.removeItem('hs_theme')

        window.onload = function() {

            // INITIALIZATION OF NAVBAR VERTICAL ASIDE
            // =======================================================
            new HSSideNav('.js-navbar-vertical-aside').init()


            // INITIALIZATION OF FORM SEARCH
            // =======================================================
            // new HSFormSearch('.js-form-search')
            const HSFormSearchInstance = new HSFormSearch('.js-form-search')

            if (HSFormSearchInstance.collection.length) {
                HSFormSearchInstance.getItem(1).on('close', function(el) {
                    el.classList.remove('top-0')
                })

                document.querySelector('.js-form-search-mobile-toggle').addEventListener('click', e => {
                    let dataOptions = JSON.parse(e.currentTarget.getAttribute(
                            'data-hs-form-search-options')),
                        $menu = document.querySelector(dataOptions.dropMenuElement)

                    $menu.classList.add('top-0')
                    $menu.style.left = 0
                })
            }


            // INITIALIZATION OF BOOTSTRAP DROPDOWN
            // =======================================================
            HSBsDropdown.init()


            // INITIALIZATION OF SELECT
            // =======================================================
            HSCore.components.HSTomSelect.init('.js-select')


            // INITIALIZATION OF NAV SCROLLER
            // =======================================================
            new HsNavScroller('.js-nav-scroller')

            // INITIALIZATION OF MODAL ON PAGE LOAD
            // =======================================================
            // new bootstrap.Modal(document.getElementById('exportCustomersGuideModal')).show()

            @yield('init')

            var loader = document.getElementById('layer-main-wrap');
            loader.classList.add('done')

        }
    })()
</script>

@yield('javascript')

<script>
    (function() {
        // STYLE SWITCHER
        // =======================================================
        const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
        const $variants = document.querySelectorAll(
            `[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

        // Function to set active style in the dorpdown menu and set icon for dropdown trigger
        const setActiveStyle = function() {
            $variants.forEach($item => {
                if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
                    $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
                    return $item.classList.add('active')
                }

                $item.classList.remove('active')
            })
        }

        // Add a click event to all items of the dropdown to set the style
        $variants.forEach(function($item) {
            $item.addEventListener('click', function() {
                HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
            })
        })

        // Call the setActiveStyle on load page
        setActiveStyle()

        // Add event listener on change style to call the setActiveStyle function
        window.addEventListener('on-hs-appearance-change', function() {
            setActiveStyle()
        })
    })()
</script>
