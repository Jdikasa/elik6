<div class="message-flash {{ $type }} wire">
    <div class="content-text d-flex">
        <div class="icon text-white">
            <i @class([
                "fi",
                "fi-rr-check" => $type == "success",
                "fi-rr-shield-exclamation" => $type == "warning",
                "fi-rr-cross" => $type == "error",
            ])></i>
        </div>
        <div class="text-star">
            <h6>{{ __($type) }}</h6>
            <p>
                {!! __($message) !!}
            </p>
        </div>
    </div>
</div>
