<div class="d-none" id="gridView">
    <div class="row g-3 align-items-center">
        <div class="col-lg-3 col-md-6 me-auto">
            <div class="ms-auto position-relative">
                <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i>
                </div>
                <input class="form-control ps-5" type="text" placeholder="search produts">
            </div>
        </div>
        {{-- <div class="col-lg-2 col-6 col-md-3">
            <select class="form-select">
                <option>All category</option>
                <option>Fashion</option>
                <option>Electronics</option>
                <option>Furniture</option>
                <option>Sports</option>
            </select>
        </div>
        <div class="col-lg-2 col-6 col-md-3">
            <select class="form-select">
                <option>Latest added</option>
                <option>Cheap first</option>
                <option>Most viewed</option>
            </select>
        </div> --}}
    </div>
    <hr>
    <div class="product-grid">
        <div class="row row-cols-1 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-3">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card border shadow-none mb-0">
                        <div class="card-body text-center">
                            <img src="{{ asset('storage').'/'.$product->image }}" class="img-fluid mb-3" alt="" />
                            <h5 class="product-title">{{ $product->nom }}</h5>
                            <p class="product-price fs-5 mb-1">
                                <span>
                                    {{ $product->type?->nom }}
                                </span>
                            </p>
                            <small>{{ $product->frequences->pluck('frequence')->join(', ') }}</small>
                            <div class="actions d-flex align-items-center justify-content-center gap-2 mt-3">
                                <a href="{{ route('pm.products.show', $product) }}" class="btn btn-sm btn-outline-warning"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                    data-bs-original-title="View detail" aria-label="Views">
                                    <i class="bi bi-eye-fill"></i>&nbsp;
                                </a>
                                <a href="{{ route('pm.products.edit', $product) }}" class="btn btn-sm btn-outline-primary"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title=""
                                    data-bs-original-title="Edit info" aria-label="Edit">
                                    <i class="bi bi-pencil-fill"></i>&nbsp;
                                </a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger delete-toggle"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-id="{{ $product->id }}">
                                    <i class="bi bi-trash-fill" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="" data-bs-original-title="Delete" aria-label="Delete"></i>&nbsp;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!--end row-->
    </div>
    {{ $products->links() }}
    {{-- <nav class="float-end mt-4" aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav> --}}
</div>
