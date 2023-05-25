@props(['submit'])

<div {{ $attributes->merge(['class' => '']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="card-body">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="mb-5">
                <div class="grid grid-cols-6 gap-3">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end text-right">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
