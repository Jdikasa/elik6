<div class="" id="listView">

    <div class="table-responsive">
        <table class="table align-middle mb-0 dataTable table-striped table-bordered" id="example2">
            <thead class="table-light">
                <tr>
                    <th>#ID</th>
                    <th>Product</th>
                    <th>Type</th>
                    <th>Marque</th>
                    {{-- <th>Modèle</th> --}}
                    <th>Bande de fréquence</th>
                    {{-- <th>Puissance</th> --}}
                    <th>Normes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>#{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                @if ($product->image)
                                    <div class="product-box border">
                                        <img src="{{ asset('storage') . '/app/public/' . $product->image }}" alt="">
                                    </div>
                                @endif

                                <div class="product-info">
                                    <h6 class="product-name mb-1">{{ $product->nom }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>{{ $product->type?->nom }}</td>
                        <td>{{ $product->marque?->marque }}</td>
                        {{-- <td>{{ $product->modele?->modele }}</td> --}}
                        <td>
                            - {!! $product->frequences->pluck('frequence')->join('<br> - ') !!}
                        </td>
                        {{-- <td>{!! $product->puissances->pluck('puissance')->join(', ') !!}</td> --}}
                        <td>- {!! $product->normes->pluck('norme')->join('<br> - ') !!}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3 fs-6">
                                <a href="{{ route('pm.products.show', $product) }}" class="text-primary"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                    data-bs-original-title="View detail" aria-label="Views"><i
                                        class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('pm.products.edit', $product) }}" class="text-warning"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                    data-bs-original-title="Edit info" aria-label="Edit"><i
                                        class="bi bi-pencil-fill"></i>
                                </a>
                                <a href="javascript:void(0)" class="text-danger delete-toggle" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-id="{{ $product->id }}">
                                    <i class="bi bi-trash-fill" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="" data-bs-original-title="Delete" aria-label="Delete"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
