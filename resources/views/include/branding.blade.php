{{-- Reusable Nexora Labs branding. Include with optional: brandingClass, strongClass, tag ('span'|'div'|'p') --}}
@php
    $tag = $tag ?? 'span';
    $brandingClass = $brandingClass ?? 'text-gray-400 text-sm';
    $strongClass = $strongClass ?? '';
@endphp
<{{ $tag }} class="{{ $brandingClass }}">
    Developed by <strong class="{{ $strongClass }}">Nexora Labs</strong>
</{{ $tag }}>
