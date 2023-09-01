@props([
    'last',
])

<div class="flex flex-col py-2 px-3 odd:bg-black-50 even:bg-white border-t border-dotted border-black-300 {{ $last ? 'border-b' : '' }}">
    <h4>{{ $top }}</h4>
    {{ $bottom }}
</div>