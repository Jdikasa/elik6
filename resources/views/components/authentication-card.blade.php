<div class="container py-4 py-sm-5">
    <div>
        {{ $logo }}
    </div>

    <div class="mx-auto" style="max-width: 25rem;">
        <div class="mb-3 card card-lg">
            <div class="card-body">
                {{ $slot }}
            </div>
        </div>
        <div class="text-center position-relative zi-1">
            <small class="mb-4 text-cap text-body">
                {{ __('Trusted by the world\'s best teams') }}
            </small>

            <div class="mx-auto w-85">
                <div class="row justify-content-between">
                    @foreach (\App\Models\Team::all() as $team)
                        <div class="col">
                            <img class="img-fluid" src="{{ image($team->teamInfo?->logo) }}" alt="{{ $team->name }}">
                        </div>
                        <!-- End Col -->
                    @endforeach
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>
</div>
