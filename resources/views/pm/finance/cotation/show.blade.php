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
    <div class="page-header card card-lg">
        <div class="text-star">
            <h1>Cotation</h1>
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
                            <li class="breadcrumb-item active" aria-current="page">Cotation</li>
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
    <div class="content container-fluid ppb-5">

        <div class="row">

            <div class="mb-5 col-lg-9 mb-lg-0">

                <!-- Card -->
                <div class="card card-lg">
                    <!-- Body -->
                    <div class="card-body" id="to_print">

                        <div class="d-block d-md-flex justify-content-md-between">
                            <div class="col-md-5">
                                <!-- Logo -->
                                @if (Auth::user()->currentTeam->teamInfo->logo)
                                    <img id="logoImg"
                                        class="mb-2 mx-md-0 avatar avatar-xl avatar-4x3 avatar-centered avatar-md-start"
                                        src="{{ Auth::user()->currentTeam->teamInfo->logo }}"
                                        alt="{{ Auth::user()->currentTeam->name }}" data-hs-theme-appearance="default">
                                @endif
                                {{-- <img id="logoImg" class="mb-2 avatar avatar-xl avatar-4x3 avatar-centere"
                                    src="{{ asset('assets/svg/logos/logo-light.svg') }}" alt="Image Description"
                                    data-hs-theme-appearance="dark"> --}}

                                <div class="mt-0 text-center text-md-start" style="font-size: 12px">
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
                                <h2 class="text-end me-4 text-success">COTATION</h2>
                                <!-- Form -->
                                <div class="mt-3" style="font-size: 12px">
                                    <dl class="mb-0 d-flex justify-content-between align-items-center">
                                        <dt class="col-md text-sm-end mb-sm-0">Cotation N° :</dt>
                                        <dd class="p-0 mb-0 border ms-1 col-md-auto border-bottom-0">
                                            <span class="p-1 text-center d-block"
                                                style="width: 110px">{{ $cotation->id }}</span>
                                        </dd>
                                    </dl>

                                    <dl class="mb-0 d-flex justify-content-between align-items-center">
                                        <dt class="col-md text-sm-end mb-sm-0">Date de la cotation :</dt>
                                        <dd class="p-0 mb-0 border ms-1 col-md-auto border-bottom-0">
                                            <span class="p-1 text-center d-block"
                                                style="width: 110px">{{ $cotation->created_at->format('d/m/Y') }}</span>
                                        </dd>
                                    </dl>

                                    <dl class="mb-0 d-flex justify-content-between align-items-center">
                                        <dt class="col-md text-sm-end mb-sm-0">ID du Client :</dt>
                                        <dd class="p-0 mb-0 border ms-1 col-md-auto border-bottom-">
                                            <span class="p-1 text-center d-block" style="width: 110px">
                                                @if ($cotation->client)
                                                    {{ $cotation->client->id }}
                                                @else
                                                    ####
                                                @endif
                                            </span>
                                        </dd>
                                    </dl>

                                    {{-- <dl class="d-flex justify-content-between align-items-center">
                                        <dt class="col-md text-sm-end mb-sm-0">Date du payement :</dt>
                                        <dd class="p-0 mb-0 border ms-1 col-md-auto">
                                            <span class="p-1 text-center d-block" style="width: 110px">
                                                @if ($cotation->date_limit_paie)
                                                    {{ $cotation->date_limit_paie->format('d/m/Y') }}
                                                @else
                                                    ####
                                                @endif
                                            </span>
                                        </dd>
                                    </dl> --}}
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
                                        {!! $cotation->client->adresse->adresse_1 . ',<br>' . $cotation->client->adresse->adresse_2 !!}
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

                            @forelse ($cotation->products as $key => $product)
                                <!-- Content -->
                                <div class="mx-0 row flex-nowrap" style="width: 100%">
                                    <div class="py-2 border border-top-0 col-9 col-md-5">
                                        <small>
                                            {!! 'Equipement : ' . $product->nom . '<br>Pays : ' . $cotation->certificat->country->name_fr !!}
                                        </small>
                                    </div>
                                    <!-- End Col -->

                                    <div class="py-2 col-4 col-sm col-md-2 border-end border-bottom">
                                        <!-- Input Group -->
                                        <small>
                                            {{ $product->pivot->prix }}$
                                        </small>
                                        <!-- End Input Group -->
                                    </div>
                                    <!-- End Col -->

                                    <div class="py-2 col-7 col-sm-auto col-md-3 border-end border-bottom">
                                        <small>{{ $product->pivot->qt }}</small>
                                    </div>
                                    <!-- End Col -->

                                    <div class="py-2 col-4 col-md-2 border-end border-bottom">
                                        <small>{{ $product->pivot->prix * $product->pivot->qt }} $</small>
                                    </div>

                                </div>
                                <!-- End Content -->
                            @empty
                                <div class="mx-0 row flex-nowrap" style="width: 97%">
                                    <div class="py-2 text-center col-12 border-start border-end border-bottom">
                                        <small>Aucun element ajouté</small>
                                    </div>
                                    <!-- End Col -->
                                </div>
                            @endforelse

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
                                                2. Veillez inclure le numérro de la cotation dans le check<br>

                                            </small>
                                        </td>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Form -->
                            @php
                                $total = 0;
                                $taxe = 0;
                                $total_taxe = 0;
                                $total_net = 0;
                                // $post_pay = 0;
                                foreach ($cotation->products as $product) {
                                    $total += $product->pivot->prix * $product->pivot->qt;
                                    $taxe += 0;
                                    $total_taxe += $total + $taxe;
                                    $total_net = $total_taxe; //- $cotation->transactions->sum('montant');
                                }
                            @endphp
                            <div class="mb-5 col-md-5 ps-0">
                                <dl class="row text-md-end" style="font-size: 12px">
                                    <dt class="col-md-6">Sous-total:</dt>
                                    <dd class="col-md-6">{{ number_format($total, 2, ',', '.') }}$</dd>
                                    <dt class="mb-1 col-md-6 mb-md-0">Taxe:</dt>
                                    <dd class="col-md-6">
                                        {{ number_format($taxe, 2, ',', '.') }}$
                                    </dd>
                                    <dt class="col-md-6">Montant taxe:</dt>
                                    <dd class="col-md-6">{{ number_format($total_taxe, 2, ',', '.') }}$</dd>
                                    {{-- <dt class="mb-1 col-md-6 mb-md-0">Montant payé:</dt>
                                    <dd class="col-md-6">
                                        {{ number_format($post_pay, 2, ',', '.') }}$
                                    </dd> --}}
                                    {{-- <dt class="border-3 border-success col-12 border-bottom ms-5 w-85"></dt> --}}
                                    <dt class="p-0 col-12">
                                        <div
                                            class="p-2 border-3 border-success border-top bg-soft-success d-flex ms-auto w-85 justify-content-between">
                                            <h4 class="mt-1 mb-0 text-black-50 ">Total :</h4>
                                            <h4 class="mt-1 mb-0 text-black-50 ">
                                                {{ number_format($total_net, 2, ',', '.') }}$
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
                            Si vous avez des questions à propos de cette cotation, veillez contacter <br>Elik6,
                            +243858508022,
                            info@conformitech.net
                        </p>
                        <h5 class="text-center">Heureux de faire affaire avec vous</h5>
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->

                <!-- Sticky Block End Point -->
                <div id="stickyBlockEndPoint"></div>
            </div>

            <div class="col-lg-3">
                <div id="stickyBlockStartPoint">
                    <div class="js-sticky-block"
                        data-hs-sticky-block-options='{
                            "parentSelector": "#stickyBlockStartPoint",
                            "breakpoint": "lg",
                            "startPoint": "#stickyBlockStartPoint",
                            "endPoint": "#stickyBlockEndPoint",
                            "stickyOffsetTop": 20
                        }'
                        wire:ignore.self>

                        <div class="gap-2 mb-2 d-grid gap-sm-3 mb-sm-3">
                            <a class="btn btn-primary" href="javascript:;" id="btn-send-mail">
                                <i class="bi-cursor-fill me-1"></i> Envoyer
                            </a>

                        </div>

                        <div class="row gx-1">
                            <div class="mb-2 col-sm mb-sm-0">
                                <div class="d-grid">
                                    <a class="btn btn-white" href="javascript:;" id="btn-download">
                                        <i class="bi-download me-1"></i> Télécharger
                                    </a>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-sm">
                                <div class="d-grid">
                                    <a class="btn btn-white" href="javascript:;" onclick="printDiv()">
                                        <i class="bi-printer me-1"></i> Imprimer
                                    </a>
                                </div>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="email-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('pm.fin.cotation.send') }}" method="POST" id="paiement-form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Paiement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <input type="hidden" name="cotation_id">
                        <div class="col-12">
                            <h6 class="badge bg-warning d-block fs-5 text-start">
                                <i class="bi bi-paperclip"></i>
                                {{ Str::random(20) }}.pdf
                            </h6>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email du client</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="montant" class="form-label">Objet</label>
                            <input type="text" name="subject" id="montant" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-light" data-bs-dismiss="modal">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script-vendor')
@endsection

@section('javascript')
    <!-- JS Plugins Init. -->
    <script>
        function printDiv() {
            var divToPrint = document.getElementById('to_print');
            var popupWin = window.open('', '_blank', 'width=900,height=800');
            var head = document.querySelector('head').innerHTML;
            var my_document = '<html><head>' + head + '</head><body>' + divToPrint.innerHTML + '</body></html>';
            popupWin.document.open();
            popupWin.document.write(my_document);
            popupWin.document.close();
            popupWin.print();
            popupWin.close();
        }

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


            window.jsPDF = window.jspdf.jsPDF;

            const btn = document.querySelector("#btn-download");

            btn.addEventListener('click', function() {
                Convert_HTML_To_PDF();
            });

            function Convert_HTML_To_PDF() {
                var doc = new jsPDF('p', 'pt', 'a3', true);
                doc.setPage(1);

                // Source HTMLElement or a string containing HTML.
                var elementHTML = document.querySelector("#to_print");

                doc.html(elementHTML, {
                    callback: function(doc) {
                        // Save the PDF
                        doc.save('cotation.pdf');
                    },
                    margin: [50, 50, 50, 50],
                    fontSize: 12,
                    autoPaging: 'text',
                    x: 50,
                    y: 50,
                    width: 19, // Target width in the PDF document
                    windowWidth: 75 // Window width in CSS pixels
                });
            }

            const btnMail = document.querySelector("#btn-send-mail");

            btnMail.addEventListener('click', function() {
                Convert_HTML_To_PDF_and_Save();
            });

            function Convert_HTML_To_PDF_and_Save() {
                var elementHTML = document.querySelector("#to_print");
                $('#layer-main-wrap').removeClass('done');

                var doc = new jsPDF('p', 'pt', 'a3', true);
                // doc.setDisplayMode(75);
                doc.html(elementHTML, {
                    callback: function(doc) {
                        // Calculate the number of pages
                        var pageCount = doc.getNumberOfPages();

                        // Remove extra pages
                        if (pageCount > 2) {
                            for (var i = pageCount; i > 2; i--) {
                                doc.deletePage(i);
                            }
                        }

                        var blob = doc.output('blob');

                        var formData = new FormData();
                        formData.append('pdf', blob);

                        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content');
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                        });

                        $.ajax('{{ route('pm.cotations.makeFile') }}', {
                            method: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(data) {

                                $('#layer-main-wrap').addClass('done');
                                const myModal = new bootstrap.Modal('#email-modal', {
                                    keyboard: false
                                })
                                myModal.show();

                            },
                            error: function(data) {
                                console.log(data)
                            }
                        });
                    },
                    margin: [50, 50, 50, 50],
                    fontSize: 12,
                    autoPaging: 'text',
                    x: 50,
                    y: 50,
                    width: 19, // Target width in the PDF document
                    windowWidth: 75 // Window width in CSS pixels
                });


            }

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
