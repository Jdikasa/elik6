@extends('pm.layouts.master')

@section('css')
    <style>
        input[type="number"] {
            -moz-appearance: inherit !important;
        }

        body {
            opacity: 1 !important;
        }

        .border-dashed {
            border-style: dashed !important;
        }

        .svg-icon {
            line-height: 1;
            color: var(--bs-muted);
        }

        .svg-icon.svg-icon-success {
            color: var(--bs-success);
        }

        .svg-icon.svg-icon-danger {
            color: var(--bs-danger);
        }

        .svg-icon.svg-icon-3 svg {
            height: 1.35rem !important;
            width: 1.35rem !important;
        }

        img,
        svg {
            vertical-align: middle;
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

@section('titre', 'ELIK6 - Liste des clients')

@section('body')

    <!--breadcrumb-->
    <div class="page-header card card-lg">
        <div class="text-star">
            <h1>Banck</h1>
            <div class="page-breadcrumb d-none d-sm-flex align-items-center">
                <div class="mt-3">
                    <nav aria-label="breadcrumb">
                        <ol class="p-0 mb-0 breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('pm.home') }}"><i class="bi bi-house-fill"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Banck</li>
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

        <div class="row justify-content-lg-center">
            <div class="col-lg-12">

                <div class="card">
                    <div class="row card-body">

                        <div class="col-12 col-lg-5">
                            <div class="p-6 shadow-none card card-dashed border-info bg-soft-info">
                                <div class="py-2 d-flex flex-column">
                                    <div class="mb-4 d-flex align-items-center fs-4 fw-bold">
                                        {{ $compte->bank->nom }}
                                        @if ($compte->is_primary)
                                            <span class="badge bg-soft-success text-success fs-7 ms-2">Principale</span>
                                        @endif
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            {{-- <img class="avatar avatar-sm" src="assets/svg/brands/visa.svg" alt="Image Description"> --}}
                                            <img src="{{ image($compte->bank->image) }}" alt="Image Description"
                                                class="px-2 bg-light avatar avatar-lg text-black-50"
                                                style="font-size: 11px; min-width:100px">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="fs-4 fw-bold">
                                                {!! number_format($compte->num_compte, 0, ' ', ' ') !!}
                                            </div>
                                            <div class="text-gray-400 fs-6 fw-semibold">
                                                {{ $compte->intitule }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-7">

                            <div class="flex-wrap mb-3 d-flex flex-stack">

                                <div class="d-flex flex-column flex-grow-1">

                                    <div class="gap-2 d-flex">
                                        @php
                                            $total_net = $compte->factures->where('team_id', Auth::user()->currentTeam->id)->sum('total_net');
                                            $montant_recu = $compte->transactions->where('team_id', Auth::user()->currentTeam->id)->sum('montant');
                                            $montant_attent = $total_net - $montant_recu;
                                            $balance = $montant_recu;
                                        @endphp

                                        <div class="px-4 py-3 mb-3 rounded card-dashed border-success broder-2 flex-fill">
                                            <div class="mb-2 d-flex align-items-center">
                                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <svg class="" width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="13" y="6" width="13"
                                                            height="2" rx="1" transform="rotate(90 13 6)"
                                                            fill="currentColor"></rect>
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <div>
                                                    <span class="mb-0 js-counter h1"
                                                        data-hs-counter-options='{
                                                        "isCommaSeparated": false
                                                    }'>
                                                        {{ $balance }}
                                                    </span>
                                                    $
                                                </div>
                                            </div>
                                            <div class="text-gray-400 fw-semibold fs-6">Balance actuele</div>
                                        </div>

                                        <div class="px-4 py-3 mb-3 rounded card-dashed border-danger broder-2 flex-fill">
                                            <div class="mb-2 d-flex align-items-center">
                                                <span class="svg-icon svg-icon-3 svg-icon-danger me-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="11" y="18" width="13"
                                                            height="2" rx="1" transform="rotate(-90 11 18)"
                                                            fill="currentColor"></rect>
                                                        <path
                                                            d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <div class="fs-2 fw-bold counted" data-kt-countup="true"
                                                    data-kt-countup-value="{{ $montant_attent }}" data-kt-initialized="1">
                                                    <span class="mb-0 js-counter"
                                                        data-hs-counter-options='{
                                                        "isCommaSeparated": false
                                                    }'>
                                                        {{ $montant_attent }}
                                                    </span>
                                                    $
                                                </div>
                                            </div>
                                            <div class="text-gray-400 fw-semibold fs-6">Paiement en attante</div>
                                        </div>

                                        {{-- <div class="px-4 py-3 mb-3 rounded card-dashed border-info broder-2">
                                            <div class="mb-2 d-flex align-items-center">
                                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="13" y="6" width="13"
                                                            height="2" rx="1" transform="rotate(90 13 6)"
                                                            fill="currentColor"></rect>
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <div class="fs-2 fw-bold counted" data-kt-countup="true"
                                                    data-kt-countup-value="60" data-kt-countup-prefix="%"
                                                    data-kt-initialized="1">
                                                    <span class="mb-0 js-counter"
                                                        data-hs-counter-options='{
                                                        "isCommaSeparated": false
                                                    }'>
                                                        {{ $montant_recu }}
                                                    </span>
                                                    $
                                                </div>
                                            </div>
                                            <div class="text-gray-400 fw-semibold fs-6">Paiement effectué</div>
                                        </div> --}}
                                    </div>
                                </div>

                            </div>
                            <div class="mt-auto mb-2 d-flex justify-content-between w-100">
                                <span class="text-gray-400 fw-semibold fs-5">Etat des paiements</span>
                            </div>

                            <div class="progress bg-soft-secondary" style="height: 15px;">
                                <div class="progress-bar bg-danger" role="progressbar"
                                    style="width: {{ round(($montant_attent * 100) / $total_net) }}%" aria-valuenow="10"
                                    aria-valuemin="0" aria-valuemax="100">
                                    {{ round(($montant_attent * 100) / $total_net) }}%</div>
                                <div class="progress-bar bg-success" role="progressbar"
                                    style="width: {{ round(($montant_recu * 100) / $total_net) }}%" aria-valuenow="90"
                                    aria-valuemin="0" aria-valuemax="100">
                                    {{ round(($montant_recu * 100) / $total_net) }}%</div>
                            </div>

                            <div class="mt-1 d-flex align-items-center">
                                <div class="col-6"><span class="p-1 rounded-circle bg-danger d-inline-block"></span>
                                    Paiement en attante</div>
                                <div class="col-6"><span class="p-1 rounded-circle bg-success d-inline-block"></span>
                                    Paiement effectué</div>
                            </div>

                        </div>
                        <!-- End Col -->
                    </div>
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->

        <!-- Card -->
        <div class="mt-4 card">
            <!-- Header -->
            <div class="card-header">
                <h4 class="card-header-title">Historique de transactions</h4>
            </div>
            <!-- End Header -->

            {{-- @php
                $transactions = $compte->factures->map(function ($facture) {
                    return $facture->transactions;
                })->flatten();

            @endphp --}}

            <!-- Table -->
            <div class="table-responsive position-relative">
                <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                    <thead class="thead-light">
                        <tr>
                            <th>Client</th>
                            <th>Montant Payé</th>
                            <th>Montant Restant</th>
                            <th>Date</th>
                            <th>Enregistré par</th>
                            {{-- <th></th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($compte->transactions->where('team_id', Auth::user()->currentTeam->id) as $transaction)
                            <tr>
                                <td>
                                    <a href="#">{{ $transaction->facture->client?->societe?->nom }}</a>
                                </td>
                                <td>
                                    <span class="badge bg-soft-success text-success fs-6">
                                        {{ $transaction->montant }} $
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-soft-danger text-danger fs-6">
                                        {{ $transaction->facture->total_net - $transaction->montant }} $
                                    </span>
                                </td>
                                <td>{{ $transaction->created_at->format('d/m/Y') }}</td>
                                <td>
                                    {{ $transaction->autor?->agent?->prenom . ' ' . $transaction->autor?->agent?->nom }}
                                    {{-- <a class="btn btn-white btn-sm" href="#">
                                        <i class="bi-file-earmark-arrow-down-fill me-1"></i> PDF
                                    </a> --}}
                                </td>
                                {{-- <td>
                                    <a class="btn btn-white btn-sm" href="javascript:;" data-bs-toggle="modal"
                                        data-bs-target="#accountInvoiceReceiptModal">
                                        <i class="bi-eye-fill me-1"></i> Quick view
                                    </a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Table -->
        </div>
        <!-- End Card -->

        <!-- Receipt Invoice Modal -->
        <div class="modal fade" id="accountInvoiceReceiptModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <h4 class="modal-title" id="">Ajouter une compte</h4> --}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Body -->
                    <div class="modal-body">
                        <div class="d-block d-md-flex justify-content-md-between">
                            <div class="col-md-5">
                                <!-- Logo -->
                                <img id="logoImg"
                                    class="mb-2 mx-md-0 avatar avatar-xl avatar-4x3 avatar-centered avatar-md-start"
                                    src="{{ asset('assets/svg/logos/logo.png') }}" alt="Image Description"
                                    data-hs-theme-appearance="default">
                                <img id="logoImg" class="mb-2 avatar avatar-xl avatar-4x3 avatar-centere"
                                    src="{{ asset('assets/svg/logos/logo-light.svg') }}" alt="Image Description"
                                    data-hs-theme-appearance="dark">

                                <div class="mt-4 text-center text-md-start" style="font-size: 12px">
                                    <h6>44 Boulevard Sendwe, Matonge/Kalamu</h6>
                                    <p class="pb-0 mb-1">
                                        RCCM : CD KIN/RCCM/14-B-3472,<br>IDNAT : 01-610-N86071M
                                    </p>
                                    <p class="pb-0 mb-1">
                                        TEL : +243858508022
                                    </p>
                                    <p class="pb-0 mb-1">
                                        E-Mail : info@conformitech.net
                                    </p>
                                    <a href="http://www.conformitech.net">www.conformitech.net</a>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-md-5 align-self-md-start text-md-end">
                                <h2 class="text-end me-4 text-success">FACTURE</h2>
                                <!-- Form -->
                                <div class="mt-3" style="font-size: 12px">
                                    <dl class="mb-0 d-flex justify-content-between align-items-center">
                                        <dt class="col-md text-sm-end mb-sm-0">Facture N° :</dt>
                                        <dd class="p-0 mb-0 border ms-1 col-md-auto border-bottom-0">
                                            <span class="p-1 text-center d-block"
                                                style="width: 110px">{{-- $stat['num_facture'] --}}</span>
                                        </dd>
                                    </dl>

                                    <dl class="mb-0 d-flex justify-content-between align-items-center">
                                        <dt class="col-md text-sm-end mb-sm-0">Date de la facture :</dt>
                                        <dd class="p-0 mb-0 border ms-1 col-md-auto border-bottom-0">
                                            <span class="p-1 text-center d-block"
                                                style="width: 110px">{{-- $stat['date_facute'] --}}</span>
                                        </dd>
                                    </dl>

                                    <dl class="mb-0 d-flex justify-content-between align-items-center">
                                        <dt class="col-md text-sm-end mb-sm-0">ID du Client :</dt>
                                        <dd class="p-0 mb-0 border ms-1 col-md-auto border-bottom-0">
                                            <span class="p-1 text-center d-block" style="width: 110px">
                                                {{-- @if (isset($selectedStat[0]))
                                                    {{ $selectedStat[0]['client_id'] == '' ? '####' : $selectedStat[0]['client_id'] }}
                                                @else
                                                    ####
                                                @endif --}}#
                                            </span>
                                        </dd>
                                    </dl>

                                    <dl class="d-flex justify-content-between align-items-center">
                                        <dt class="col-md text-sm-end mb-sm-0">Date du payement :</dt>
                                        <dd class="p-0 mb-0 border ms-1 col-md-auto">
                                            <span class="p-1 text-center d-block" style="width: 110px">
                                                {{-- @if (isset($selectedStat[0]))
                                                    {{ $selectedStat[0]['date_limit_paie'] == '' ? '####' : $selectedStat[0]['date_limit_paie'] }}
                                                @else
                                                    ####
                                                @endif --}}#
                                            </span>
                                        </dd>
                                    </dl>
                                </div>
                                <!-- End Form -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <hr class="my-5">

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="" class="form-label">Facturé à :</label><br>
                                    <small>
                                        {{-- {!! isset($selectedStat[0]) ? $selectedStat[0]['client_adresse'] : '' !!} --}}
                                    </small>
                                </div>
                                <!-- End Form -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <div class="table-responsive js-add-fiel">
                            <!-- Title -->
                            <div class="mb-0">
                                <div class="mx-0 row flex-nowrap" style="width: 100%">
                                    <div class="p-2 border ps-3 col-9 col-sm-5 bg-soft-primary">
                                        <h6 class="mb-0 card-title text-cap">Description</h6>
                                    </div>
                                    <!-- End Col -->

                                    <div class="p-2 border col-4 col-sm-2 bg-soft-primary border-start-0">
                                        <h6 class="mb-0 card-title text-cap">Prix</h6>
                                    </div>
                                    <!-- End Col -->

                                    <div class="p-2 border col-7 col-sm-3 bg-soft-primary border-start-0">
                                        <h6 class="mb-0 card-title text-cap">Quantité</h6>
                                    </div>
                                    <!-- End Col -->

                                    <div class="p-2 border col-4 col-sm-2 bg-soft-primary border-start-0">
                                        <h6 class="mb-0 card-title text-cap">Montant</h6>
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            <!-- End Title -->

                            {{-- @forelse ($selectedStat as $key => $item)
                                <!-- Content -->
                                <div class="mx-0 row flex-nowrap" style="width: 97%">
                                    <div class="py-2 border border-top-0 col-9 col-md-5">
                                        <small>{!! $item['project'] !!}</small>
                                    </div>
                                    <!-- End Col -->

                                    <div class="py-2 col-4 col-sm col-md-2 border-end border-bottom">
                                        <!-- Input Group -->
                                        <small>
                                            {{ $item['price'] }}$
                                        </small>
                                        <!-- End Input Group -->
                                    </div>
                                    <!-- End Col -->

                                    <div class="py-2 col-7 col-sm-auto col-md-3 border-end border-bottom">
                                        <small>{{ $item['qt'] }}</small>
                                    </div>
                                    <!-- End Col -->

                                    <div class="py-2 col-4 col-md-2 border-end border-bottom">
                                        <small>{{ $item['price'] * $item['qt'] }} $</small>
                                    </div>
                                    <!-- End Col -->
                                    <a class="w-auto px-1 pt-2 d-inline-block position-static" href="javascript:;"
                                        data-toggle="tooltip" data-placement="top" title="Supprimer"
                                        wire:click='removeItem({{ $key }})'>
                                        <i class="bi-x-lg text-danger"></i>
                                    </a>
                                </div>
                                <!-- End Content -->
                            @empty --}}
                            <div class="mx-0 row flex-nowrap" style="width: 100%">
                                <div class="py-2 text-center col-12 border-start border-end border-bottom">
                                    <small>Aucun element ajouté</small>
                                </div>
                                <!-- End Col -->
                            </div>
                            {{-- @endforelse --}}

                        </div>

                        <hr class="my-5">

                        <div class="mb-3 row justify-content-md-end">
                            <!-- Form -->
                            <div class="col-md-7 align-self-end">
                                <table class="table table-bordered">
                                    <thead class="bg-soft-primary">
                                        <th>
                                            <label for="invoiceNotesLabel" class="p-0 mb-0 form-label">Autres
                                                commentaires</label>
                                        </th>
                                    </thead>
                                    <tbody>
                                        <td class="">
                                            <small style="font-size: 11px">
                                                1. Le paiement total est attendu dans 15 jours<br>
                                                2. Veillez inclure le numérro de la facture dans le check<br>

                                            </small>
                                        </td>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Form -->
                            {{-- @php
                                $total = 0;
                                $taxe = 0;
                                $total_taxe = 0;
                                $total_net = 0;
                                $post_pay = 0;
                                foreach ($selectedStat as $item) {
                                    $total += $item['price'] * $item['qt'];
                                    $taxe += ($total * 16) / 100;
                                    $total_taxe += $total + $taxe;
                                    $post_pay += $item['post_pay'];
                                    $total_net = $total_taxe - $post_pay;
                                }
                            @endphp --}}
                            <div class="mb-5 col-md-5 ps-0">
                                <dl class="row text-md-end" style="font-size: 12px">
                                    <dt class="col-md-6">Sous-total:</dt>
                                    <dd class="col-md-6">{{-- number_format($total,2,',','.') --}}$</dd>
                                    <dt class="mb-1 col-md-6 mb-md-0">Taxe:</dt>
                                    <dd class="col-md-6">
                                        {{-- number_format($taxe,2,',','.') --}}$
                                    </dd>
                                    <dt class="col-md-6">Montant taxe:</dt>
                                    <dd class="col-md-6">{{-- number_format($total_taxe,2,',','.') --}}$</dd>
                                    <dt class="mb-1 col-md-6 mb-md-0">Montant payé:</dt>
                                    <dd class="col-md-6">
                                        {{-- number_format($post_pay,2,',','.') --}}$
                                    </dd>
                                    {{-- <dt class="border-3 border-success col-12 border-bottom ms-5 w-85"></dt> --}}
                                    <dt class="p-0 col-12">
                                        <div
                                            class="p-2 border-3 border-success border-top bg-soft-success d-flex ms-auto w-85 justify-content-between">
                                            <h4 class="mt-1 mb-0 text-black-50 ">Total :</h4>
                                            <h4 class="mt-1 mb-0 text-black-50 ">
                                                {{-- number_format($total_net,2,',','.') --}}$
                                            </h4>
                                        </div>
                                    </dt>
                                </dl>
                                <!-- End Row -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <p class="mt-5 mb-2 text-center fs-6">
                            Si vous avez des questions à propos de cette facture, veillez contacter <br>Elik6,
                            +243858508022,
                            info@conformitech.net
                        </p>
                        <h5 class="text-center">Heureux de faire affaire avec vous</h5>

                    </div>
                    <!-- End Body -->
                    <div class="modal-footer d-flex justify-content-end">
                        <a class="btn btn-white btn-sm text-danger" href="#">
                            <i class="bi-file-earmark-arrow-down-fill me-1"></i>
                            PDF
                        </a>
                        <a class="btn btn-success btn-sm" href="#">
                            <i class="bi-printer-fill me-1"></i>
                            Imprimer
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script-vendor')
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            // supression
            var deleteToggle = $('.delete-toggle');
            var deleteForm = $('#delete-form');
            deleteToggle.on('click', function() {
                deleteForm.attr('action', '{{ route('pm.fin.comptes.destroy', '__id') }}'.replace('__id',
                    $(
                        this).data('id')));
            });

            // edition
            var editToggle = $('.edit-toggle');
            var editForm = $('#edit-form');
            editToggle.on('click', function() {

                var card = $(this).data('card');
                var date_expir = card.date_expir != null ? card.date_expir.split('-')[1] + '/' + card
                    .date_expir.split('-')[0] : '';

                editForm.find("input[name=type_id][value=" + card.type_id + "]").attr('checked', true);
                editForm.find("input[name=nom]").val(card.nom);
                editForm.find("input[name=num]").val(card.num);
                editForm.find("input[name=date_expir]").val(date_expir);
                editForm.find("input[name=code_cvv]").val(card.code_cvv);
                editForm.find("input[name=is_primary]").attr('checked', card.is_primary ? true : false);
                editForm.attr('action', '{{ route('pm.fin.comptes.update', '__id') }}'.replace('__id', card
                    .id));

            });
        });
    </script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // // INITIALIZATION OF STICKY HEADER
            // // =======================================================
            // new HSTableStickyHeader('.js-sticky-header', {
            //     offsetTop: "60px"
            // }).init();

            // INITIALIZATION OF INPUT MASK
            // =======================================================
            HSCore.components.HSMask.init('.js-input-mask')


            // INITIALIZATION OF TOGGLE SWITCH
            // =======================================================
            new HSToggleSwitch('.js-toggle-switch')

            document.querySelectorAll('[name="billingPricingRadio"]').forEach(item => {
                if (item.checked) {
                    item.closest('.form-check-select-stretched').classList.add('checked')
                }

                item.addEventListener('change', function(e) {
                    $checked = document.querySelector('.form-check-select-stretched.checked')
                    if ($checked) {
                        $checked.classList.remove('checked')
                    }

                    item.closest('.form-check-select-stretched').classList.add('checked')
                })
            })

            // INITIALIZATION OF COUNTER
            // =======================================================
            new HSCounter('.js-counter')

        });
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

    <!-- End Style Switcher JS -->
@endsection
