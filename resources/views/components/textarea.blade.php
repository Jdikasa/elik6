@props(['disabled' => false, 'value' => '', 'rowspan' => 3])

<textarea rowspan={{ $rowspan }} {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control']) !!}>
    {!! $value !!}
</textarea>
