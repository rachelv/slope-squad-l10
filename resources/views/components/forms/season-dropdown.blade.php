@props([
    'seasons',
    'includeAllTime' => false,
])

<x-forms.select wire:model.live="seasonId">
    @if ($includeAllTime)
        <option value="0">All time</option>
    @endif
    @foreach ($seasons as $s)
        <option value="{{ $s->getId() }}">{{ $s->getName() }}</option>
    @endforeach
</x-forms.select>