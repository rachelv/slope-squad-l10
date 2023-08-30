@props([
    'mountain',
    'active'
])

@php
    $activeClasses = 'font-bold';
@endphp

<x-containers.box-primary class="space-y-2">
    <div class="flex justify-between items-center">
        <div class="space-y-1">
            <h1><a href="{{ route('mountains.mountain', $mountain) }}">{{ $mountain->getName() }}</a></h1>
        </div>
    </div>
</x-containers.box-primary>
