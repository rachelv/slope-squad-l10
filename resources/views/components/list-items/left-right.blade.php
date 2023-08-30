@props([
    'last',
])

<div class="text-lg flex justify-between py-2 px-3 odd:bg-black-50 even:bg-white border-t border-dotted border-black-300 {{ $last ? 'border-b' : '' }}">
    {{ $left }}
    {{ $right }}
</div>