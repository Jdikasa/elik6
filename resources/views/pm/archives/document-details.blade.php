@extends('pm.layouts.master')

@section('css')
@endsection

@section('titre', 'ELIK6 - Archives')

@section('body')

    <div class="content container-fluid pb-5">
        <div class="page-header card card-lg">
            <div class="text-star">
                <h1 class="mb-0">{{ Str::ucfirst($dossier->titre) }}</h1>
                <p class="mb-0">Ref: {{ Str::ucfirst($dossier->reference) }}</p>
                <p>Créé le: {{ $dossier->created_at->format('d/m/Y') }}</p>
            </div>
            <div class="block-circle">
                <div class="circle-white"></div>
                <div class="circle-white"></div>
                <div class="circle-white"></div>
            </div>
        </div>

        <div class="row g-lg-3">
            @livewire('archivage.document', ['dossier' => $dossier])
        </div>
    </div>

    {{-- @include('components.admin.modals.archive-document', ['dossier' => $dossier]) --}}
@endsection
