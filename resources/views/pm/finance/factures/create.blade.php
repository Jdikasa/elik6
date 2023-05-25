@extends('pm.layouts.master')

@section('css')
    <style>
        input[type="number"] {
            -moz-appearance: inherit !important;
        }

        body {
            opacity: 1 !important;
        }

        @media print {
            :root {
                --bs-blue: #377dff;
                --bs-indigo: #6610f2;
                --bs-purple: #6f42c1;
                --bs-pink: #d63384;
                --bs-red: #ed4c78;
                --bs-orange: #fd7e14;
                --bs-yellow: #f5ca99;
                --bs-green: #198754;
                --bs-teal: #00c9a7;
                --bs-cyan: #09a5be;
                --bs-black: #000;
                --bs-white: #fff;
                --bs-gray: #8c98a4;
                --bs-gray-dark: #71869d;
                --bs-gray-100: #f9fafc;
                --bs-gray-200: #f8fafd;
                --bs-gray-300: #e7eaf3;
                --bs-gray-400: #bdc5d1;
                --bs-gray-500: #97a4af;
                --bs-gray-600: #8c98a4;
                --bs-gray-700: #677788;
                --bs-gray-800: #71869d;
                --bs-gray-900: #1e2022;
                --bs-primary: #377dff;
                --bs-secondary: #71869d;
                --bs-success: #00c9a7;
                --bs-info: #09a5be;
                --bs-warning: #f5ca99;
                --bs-danger: #ed4c78;
                --bs-light: #f9fafc;
                --bs-dark: #132144;
                --bs-primary-rgb: 55, 125, 255;
                --bs-secondary-rgb: 113, 134, 157;
                --bs-success-rgb: 0, 201, 167;
                --bs-info-rgb: 9, 165, 190;
                --bs-warning-rgb: 245, 202, 153;
                --bs-danger-rgb: 237, 76, 120;
                --bs-light-rgb: 249, 250, 252;
                --bs-dark-rgb: 19, 33, 68;
                --bs-white-rgb: 255, 255, 255;
                --bs-black-rgb: 0, 0, 0;
                --bs-body-color-rgb: 103, 119, 136;
                --bs-body-bg-rgb: 255, 255, 255;
                --bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
                --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
                --bs-body-font-family: Inter, sans-serif;
                --bs-body-font-size: 0.875rem;
                --bs-body-font-weight: 400;
                --bs-body-line-height: 1.5;
                --bs-body-color: #677788;
                --bs-body-bg: #fff;
                --bs-border-width: 0.0625rem;
                --bs-border-style: solid;
                --bs-border-color: rgba(231, 234, 243, 0.7);
                --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
                --bs-border-radius: 0.5rem;
                --bs-border-radius-sm: 0.3125rem;
                --bs-border-radius-lg: 0.75rem;
                --bs-border-radius-xl: 1rem;
                --bs-border-radius-2xl: 2rem;
                --bs-border-radius-pill: 50rem;
                --bs-link-color: #377dff;
                --bs-link-hover-color: #1366ff;
                --bs-code-color: #d63384;
                --bs-highlight-bg: #fdf4eb;

                --bg-fond: #f8eeff;
                --whiteColor: #fff;
                --primaryColor: #0527a0;
                --colorTitre: #080c2a;
                --colorParagraph: #6d6c81;
                --darkenpurple: #1734d6;
                --darkenPurpleVariant: #2b1383;
                --lightBlue: #1515c1;

                --fc-daygrid-event-dot-width: 8px;
                --fc-list-event-dot-width: 10px;
                --fc-list-event-hover-bg-color: #f5f5f5;

            }

            *,
            ::after,
            ::before {
                box-sizing: border-box;
            }

            body {
                opacity: 1 !important;
                width: 100%;
                min-height: 100vh;
                background: #fff;
                overflow-x: hidden;
                margin: 0;
                font-family: var(--bs-body-font-family);
                font-size: var(--bs-body-font-size);
                font-weight: var(--bs-body-font-weight);
                line-height: var(--bs-body-line-height);
                color: var(--bs-body-color);
                text-align: var(--bs-body-text-align);
                background-color: var(--bs-body-bg);
                -webkit-text-size-adjust: 100%;
                -webkit-tap-highlight-color: transparent;

            }

            .h1,
            .h2,
            .h3,
            .h4,
            .h5,
            .h6,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                margin-top: 0;
                margin-bottom: .5rem;
                font-weight: 600;
                line-height: 1.2;
                color: #1e2022;
            }

            a {
                text-decoration: none;
                color: var(--primaryColor);
            }

            .h6,
            h6 {
                font-size: .765625rem;
            }

            p {
                margin-top: 0;
                margin-bottom: 1rem;
            }

            .pb-0 {
                padding-bottom: 0 !important;
            }

            .mb-1 {
                margin-bottom: .25rem !important;
            }

            .card {
                --bs-card-spacer-y: 1.3125rem;
                --bs-card-spacer-x: 1.3125rem;
                --bs-card-title-spacer-y: 0.25rem;
                --bs-card-border-width: 0.0625rem;
                --bs-card-border-color: rgba(231, 234, 243, 0.7);
                --bs-card-border-radius: 0.75rem;
                --bs-card-box-shadow: 0rem 0.375rem 0.75rem rgba(140, 152, 164, 0.075);
                --bs-card-inner-border-radius: 0.6875rem;
                --bs-card-cap-padding-y: 1.3125rem;
                --bs-card-cap-padding-x: 1.3125rem;
                --bs-card-cap-bg: transparent;
                --bs-card-bg: #fff;
                --bs-card-img-overlay-padding: 1.3125rem 1.3125rem;
                --bs-card-group-margin: 0.75rem;
                position: relative;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                flex-direction: column;
                min-width: 0;
                height: var(--bs-card-height);
                word-wrap: break-word;
                background-color: var(--bs-card-bg);
                background-clip: border-box;
                border: var(--bs-card-border-width) solid var(--bs-card-border-color);
                border-radius: var(--bs-card-border-radius);
            }

            .card-lg>.card-body,
            .card-lg>.card-img-overlay,
            .card-lg>.collapse .card-body {
                padding: 2.5rem 2.5rem;
            }

            .card-body {
                -ms-flex: 1 1 auto;
                flex: 1 1 auto;
                padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
                color: var(--bs-card-color);
            }

            .row {
                --bs-gutter-x: 1.5rem;
                --bs-gutter-y: 0;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-top: calc(-1 * var(--bs-gutter-y));
                margin-right: calc(-.5 * var(--bs-gutter-x));
                margin-left: calc(-.5 * var(--bs-gutter-x));
            }

            .row {
                --bs-gutter-x: 1.5rem;
                --bs-gutter-y: 0;
            }

            .row>* {
                -ms-flex-negative: 0;
                flex-shrink: 0;
                width: 100%;
                max-width: 100%;
                padding-right: calc(var(--bs-gutter-x) * .5);
                padding-left: calc(var(--bs-gutter-x) * .5);
                margin-top: var(--bs-gutter-y);
            }

            .col-md-5 {
                -ms-flex: 0 0 auto !important;
                flex: 0 0 auto !important;
                width: 41.66666667% !important;
            }

            .col-md-2 {
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 16.66666667%;
            }

            .col-md {
                -ms-flex: 1 0 0% !important;
                flex: 1 0 0% !important;
            }

            .col-md-auto {
                -ms-flex: 0 0 auto !important;
                flex: 0 0 auto !important;
                width: auto !important;
            }

            .col-md-6 {
                -ms-flex: 0 0 auto !important;
                flex: 0 0 auto !important;
                width: 50% !important;
            }

            .col-sm-5 {
                -ms-flex: 0 0 auto !important;
                flex: 0 0 auto !important;
                width: 41.66666667% !important;
            }

            .col-sm-2 {
                -ms-flex: 0 0 auto !important;
                flex: 0 0 auto !important;
                width: 16.66666667% !important;
            }

            .col-sm-3 {
                -ms-flex: 0 0 auto !important;
                flex: 0 0 auto !important;
                width: 25% !important;
            }

            .col-md-3 {
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: 25%;
            }


            .d-md-flex {
                display: -ms-flexbox !important;
                display: flex !important;
            }

            .justify-content-md-between {
                -ms-flex-pack: justify !important;
                justify-content: space-between !important;
            }

            .mx-md-0 {
                margin-right: 0 !important;
                margin-left: 0 !important;
            }

            .text-md-start {
                text-align: left !important;
            }

            .text-md-end {
                text-align: right !important;
            }

            .align-self-md-start {
                -ms-flex-item-align: start !important;
                align-self: flex-start !important;
            }

            .justify-content-md-end {
                -ms-flex-pack: end !important;
                justify-content: flex-end !important;
            }

            .mb-md-0 {
                margin-bottom: 0 !important;
            }

            /* } */

            /* @media (min-width: 576px) { */
            .text-sm-end {
                text-align: right !important;
            }

            .mb-sm-0 {
                margin-bottom: 0 !important;
            }



            span.d-block {
                display: block !important;
            }

            .avatar-xl.avatar-4x3 {
                width: 6.5625rem;
                height: auto;
                border-radius: 0;
            }

            .mt-4 {
                margin-top: 1.5rem !important;
            }

            .mt-3 {
                margin-top: 1rem !important;
            }

            .text-success {
                --bs-text-opacity: 1;
                color: rgba(var(--bs-success-rgb), var(--bs-text-opacity)) !important;
            }

            .col-12.text-center,
            span.text-center {
                text-align: center !important;
            }

            .mb-0 {
                margin-bottom: 0 !important;
            }

            .align-items-center {
                -ms-flex-align: center !important;
                align-items: center !important;
            }

            .justify-content-between {
                -ms-flex-pack: justify !important;
                justify-content: space-between !important;
            }

            .d-flex {
                display: -ms-flexbox !important;
                display: flex !important;
            }

            dl {
                margin-bottom: 0;
            }

            dl,
            ol,
            ul {
                margin-top: 0;
                margin-bottom: 1rem;
            }

            dt {
                color: #677788;
                font-weight: 400;
            }

            .p-0 {
                padding: 0 !important;
            }

            .ms-1 {
                margin-left: .25rem !important;
            }
            .me-4 {
                margin-right: 1.5rem !important;
            }

            .border {
                border: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
            }

            .border-bottom-0 {
                border-bottom: 0 !important;
            }

            .border-end {
                border-right: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
            }

            .border-bottom {
                border-bottom: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
            }

            .border-top-0 {
                border-top: 0 !important;
            }

            .border-top {
                border-top: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
            }

            .border-start {
                border-left: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
            }

            .border-start-0 {
                border-left: 0 !important;
            }

            dd {
                color: #1e2022;
                font-weight: 600;
                margin-bottom: .75rem;
                margin-bottom: .5rem;
                margin-left: 0;
            }

            .p-1 {
                padding: .25rem !important;
            }

            .card>hr {
                margin-right: 0;
                margin-left: 0;
            }

            .my-5 {
                margin-top: 2rem !important;
                margin-bottom: 2rem !important;
            }

            hr {
                margin: 1.75rem 0;
                color: rgba(231, 234, 243, .7);
                border: 0;
                border-top-color: currentcolor;
                border-top-style: none;
                border-top-width: 0px;
                border-top: .0625rem solid;
                opacity: 1;
            }

            .mb-3 {
                margin-bottom: 1rem !important;
            }

            .mb-4 {
                margin-bottom: 1.5rem !important;
            }

            .form-label {
                margin-bottom: .5rem;
                font-size: .875rem;
                color: #1e2022;
            }

            label {
                display: inline-block;
            }

            .small,
            small {
                font-size: .875em;
            }

            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .mx-0 {
                margin-right: 0 !important;
                margin-left: 0 !important;
            }

            .flex-nowrap {
                -ms-flex-wrap: nowrap !important;
                flex-wrap: nowrap !important;
            }

            .bg-soft-primary {
                background-color: rgba(55, 125, 255, .1) !important;
            }

            .ps-3 {
                padding-left: 1rem !important;
            }

            .p-2 {
                padding: .5rem !important;
                padding-left: 0.5rem;
            }

            .text-cap {
                display: block;
                color: #1e2022;
                font-size: .7109375rem;
                font-weight: 600;
                letter-spacing: .03125rem;
                text-transform: uppercase;
                margin-bottom: 1rem;
            }

            .card-title {
                margin-bottom: 0;
            }



            .align-self-end {
                -ms-flex-item-align: end !important;
                align-self: flex-end !important;
            }

            .card .table {
                margin-bottom: 0;
            }

            .table {
                --bs-table-color: var(--bs-body-color);
                --bs-table-bg: transparent;
                --bs-table-border-color: rgba(231, 234, 243, 0.7);
                --bs-table-accent-bg: transparent;
                --bs-table-striped-color: var(--bs-body-color);
                --bs-table-striped-bg: #f9fafc;
                --bs-table-active-color: var(--bs-body-color);
                --bs-table-active-bg: rgba(0, 0, 0, 0.1);
                --bs-table-hover-color: var(--bs-body-color);
                --bs-table-hover-bg: rgba(231, 234, 243, 0.4);
                width: 100%;
                margin-bottom: 1rem;
                color: var(--bs-table-color);
                vertical-align: top;
                border-color: var(--bs-table-border-color);
            }

            table {
                caption-side: bottom;
                border-collapse: collapse;
            }

            .table>thead {
                vertical-align: bottom;
            }

            .bg-soft-primary {
                background-color: rgba(55, 125, 255, .1) !important;
            }

            tbody,
            td,
            tfoot,
            th,
            thead,
            tr {
                border-color: inherit;
                border-style: solid;
                border-width: 0;
            }

            .table tr {
                color: #677788;
            }

            .table-bordered> :not(caption)>* {
                border-width: .0625rem 0;
            }

            .table> :not(caption)> :last-child>* {
                border-bottom-width: 0;
            }

            .table tr td {
                font-size: 13px !important;
                font-weight: 100 !important;
                color: var(--colorParagraph);
            }

            .table-bordered> :not(caption)>*>* {
                border-width: 0 .0625rem;
                border-bottom-width: 0px;
            }

            .mb-5 {
                margin-bottom: 2rem !important;
            }

            .ms-5 {
                margin-left: 2rem !important;
            }

            .bg-soft-success {
                background-color: rgba(0, 201, 167, .1) !important;
            }

            .p-2 {
                padding: .5rem !important;
            }

            .ms-5 {
                margin-left: 2rem !important;
            }

            .w-85 {
                width: 85% !important;
            }

            .border-3 {
                --bs-border-width: 3px;
            }

            .border-success {
                --bs-border-opacity: 1;
                border-color: rgba(var(--bs-success-rgb), var(--bs-border-opacity)) !important;
            }

            .text-black-50 {
                --bs-text-opacity: 1;
                color: rgba(0, 0, 0, .5) !important;
            }

            .mb-0 {
                margin-bottom: 0 !important;
            }

            .mt-1 {
                margin-top: .25rem !important;
            }

            .h2,
            h2 {
                font-size: calc(1.25625rem + .075vw);
            }

            p.text-center,
            h5.text-center,
            h2.text-center {
                text-align: center !important;
            }

            .fs-6 {
                font-size: .8125rem !important;
            }

            .mb-2 {
                margin-bottom: .5rem !important;
            }

            .mt-5 {
                margin-top: 2rem !important;
            }

            p {
                margin-top: 0;
                margin-bottom: 1rem;
            }

            .py-2 {
                padding-top: .5rem !important;
                padding-bottom: .5rem !important;
            }



            .small,
            small {
                font-size: .875em;
            }

            .pt-2 {
                padding-top: .5rem !important;
            }

            .px-1 {
                padding-right: .25rem !important;
                padding-left: .25rem !important;
            }

            .w-auto {
                width: auto !important;
            }

            .ms-auto {
                margin-left: auto !important;
            }

            .position-static {
                position: static !important;
            }

            .d-inline-block {
                display: inline-block !important;
            }

        }
    </style>
@endsection

@section('titre', 'ELIK6 - Nouveau client')

@section('body')
    <div class="content container-fluid">
        <div class="page-header card card-lg">
            <div class="text-star">
                <h1>Facturation</h1>
                <div class="mt-2 page-breadcrumb d-none d-sm-flex align-items-center">
                    <div class="">
                        <nav aria-label="breadcrumb">
                            <ol class="p-0 mb-0 breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('pm.home') }}">
                                        <i class="bi bi-house-fill"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Finance</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Facture</li>
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

        @livewire('finances.facture.facture-form')

    </div>
@endsection

@section('script-vendor')
@endsection

@section('javascript')
    <!-- JS Plugins Init. -->
    <script>
        (function() {
            //   window.onload = function () {


            // INITIALIZATION OF NAVBAR VERTICAL ASIDE
            // =======================================================
            new HSSideNav('.js-navbar-vertical-aside').init()


            // INITIALIZATION OF FORM SEARCH
            // =======================================================
            // new HSFormSearch('.js-form-search')


            // INITIALIZATION OF BOOTSTRAP DROPDOWN
            // =======================================================
            // HSBsDropdown.init()


            // INITIALIZATION OF ADD FIELD
            // =======================================================
            new HSAddField('.js-add-field', {
                addedField: field => {
                    new HSQuantityCounter(field.querySelector('.js-quantity-counter'))
                }
            })


            // INITIALIZATION OF SELECT
            // =======================================================
            // HSCore.components.HSTomSelect.init('.js-select')


            // INITIALIZATION OF FILE ATTACH
            // =======================================================
            new HSFileAttach('.js-file-attach')


            // INITIALIZATION OF  QUANTITY COUNTER
            // =======================================================
            new HSQuantityCounter('.js-quantity-counter')


            // INITIALIZATION OF STICKY BLOCKS
            // =======================================================
            new HSStickyBlock('.js-sticky-block', {
                targetSelector: document.getElementById('header').classList.contains('navbar-fixed') ?
                    '#header' : null
            })


            // INITIALIZATION OF FLATPICKR
            // =======================================================
            HSCore.components.HSFlatpickr.init('.js-flatpickr')
            //   }
        })()
    </script>

    <!-- Style Switcher JS -->

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

    @stack('livewire_script')
@endsection
