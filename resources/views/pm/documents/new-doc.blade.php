@extends('pm.layouts.layout-doc')

@section('content')
    <div class="block-scanner">
        <div class="sidebar-doc">
            <div class="header-sidebar">
                <h4 class="ms-0">Enregister un document</h4>
            </div>
            @livewire('document.add-doc-form', ['types' => $types, 'natures'=> $natures, 'departements' => $departements, 'agents' => $agents, 'dossier_id' => $dossier_id])
        </div>
        <div class="content-scanner">
            <div class="container-fluid">
                <iframe src="" frameborder="0" class="w-100 d-none"></iframe>
                <div class="block-no-file">
                    <i class="bi bi-file-x"></i>
                    <h4>Aucun aperçu !</h4>
                    <p>Veuillez uploader un fichier</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#check-date').on('click', function() {
                // var parent = $('#inputPassword').parent().parent();
                $('.date-limite').toggleClass('d-none');

                // console.log($(this).val());
                // $('#inputPassword').attr('required');
            });

            $('input[name=confidentiel]').on('click', function() {
                // var parent = $('#inputPassword').parent().parent();
                // $('.date-limite').toggleClass('d-none');
                console.log($(this));
            });
        });
    </script>
@endsection
