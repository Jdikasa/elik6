<div class="col-lg-12">
    <div class="mb-3 mb-md-4 d-flex justify-content-between align-items-start align-items-md-center block-action-table">
        <div>
            <h5>Visualisez vos archives</h5>
        </div>
        <div class="d-flex align-items-center">
            <input type="text" class="form-control me-2" placeholder="Recherche" style="border:none;" wire:model='search'>
            <div class="dropdown">
                <button class="btn btn-filter me-2 d-flex" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fi fi-rr-filter me-2"></i> {{ $filter }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="javascrip:void(0)" wire:click="changeFilter('Tous')">Tous</a>
                    </li>
                    <li><a class="dropdown-item" href="javascrip:void(0)"
                            wire:click="changeFilter('Classeurs')">Classeurs</a></li>
                    <li><a class="dropdown-item" href="javascrip:void(0)"
                            wire:click="changeFilter('Dossiers')">Dossiers</a></li>
                    <li><a class="dropdown-item" href="javascrip:void(0)"
                            wire:click="changeFilter('Documents')">Documents</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card card-tabl">
        <div class="card-body">
            <div class="row g-3">
                @php
                    $groupeFiles = $groupeFiles->groupBy(function ($query) {
                        return $query->created_at->format('Y');
                    });
                @endphp
                @forelse ($groupeFiles as $annee => $groupeFile)
                    <div class="col-lg-2">
                        <div class="col-folder">
                            <a href="{{ route('pm.archive-classeurs.index', $annee) }}">
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/icons/cupboard-arsp.svg') }}" alt="">
                                    <div class="mt-2 text-center">
                                        <h6>{{ $annee }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center col-12">
                        <img src="{{ asset('assets/img/sad.gif') }}" alt="" width="35px" class="">
                        <p class="mb-0">Aucun classeur trouvé</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
