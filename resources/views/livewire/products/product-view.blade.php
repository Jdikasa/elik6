<div class="card">
    <div class="card-header d-flex">
        <div>

        </div>
        <div class="ms-auto">
            Affichage
            <div class="btn-group btn-group-sm">
                <button type="button" class="btn btn-secondary @if ($viewType == 0) active @endif"
                    wire:click="switchView(0)" id="listViewToggle">
                    <span class="bi bi-list"></span>
                </button>
                <button type="button" class="btn btn-secondary @if ($viewType == 1) active @endif"
                    wire:click="switchView(1)" id="gridViewToggle">
                    <span class="bi bi-grid"></span>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">

        {{-- @if ($viewType == 0) --}}
        <livewire:products.product-list-view :viewType="$viewType" />
        {{-- <livewire:tables.product-list-table
                {{-- model="App\Models\Product"
                sort="nom|asc"
                include="id, nom" searchable="nom"
                exportable -}}
                 />
                 {{-- with="planet, planet.region"  hide="latitude, longitude" dates="dob, created_at" times="bedtime|g:i A"
                 hideable="select" --}}
        {{-- , planet.name|Planet, planet.region.name|Region, dob, bedtime, role, latitude, longitude, created_at|Created --}}
        {{-- @else --}}
        <livewire:products.product-grid-view :viewType="$viewType" />
        {{-- @endif --}}

    </div>
</div>


