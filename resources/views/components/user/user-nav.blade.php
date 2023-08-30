@props([
    'user',
    'active'
])

@php
    $activeClasses = 'font-bold';
@endphp

<x-containers.box-primary class="flex flex-col md:flex-row gap-y-6 justify-between items-center">
    <h1 class="flex justify-center md:justify-start">
        <a href="{{ route('users.user', $user) }}">{{ $user->getName() }}</a>
    </h1>
    <div class="flex justify-center md:justify-end">
        <div class="grid grid-cols-4 gap-y-4 items-center">
            <a class="col-span-2 sm:col-span-1 text-center px-4 {{ $active == 'seasons' ? $activeClasses : '' }} border-r border-black-300 border-dotted"
                href="{{ route('users.seasons', $user) }}">
                <div class="text-black-900 text-sm">Seasons</div>
                <div class="text-3xl">{{ $user->getTotalSeasons() }}</div>
            </a>
            <a class="col-span-2 sm:col-span-1 text-center px-4 {{ $active == 'mountains' ? $activeClasses : '' }} border-none sm:border-r sm:border-black-300 sm:border-dotted"
                href="{{ route('users.mountains', $user) }}">
                <div class="text-black-900 text-sm">Mountains</div>
                <div class="text-3xl">{{ $user->getTotalMountains() }}</div>
            </a>
            <a class="col-span-2 sm:col-span-1 text-center px-4 {{ $active == 'snowdays' ? $activeClasses : '' }} border-r border-black-300 border-dotted"
                href="{{ route('users.snowdays', $user) }}">
                <div class="text-black-900 text-sm">Days</div>
                <div class="text-3xl">{{ $user->getTotalSnowdays() }}</div>
            </a>
            <a class="col-span-2 sm:col-span-1 text-center px-4 {{ $active == 'following' ? $activeClasses : '' }}"
                href="{{ route('users.following', $user) }}">
                <div class="text-black-900 text-sm">Following</div>
                <div class="text-3xl">{{ $user->getTotalFriends() }}</div>
            </a>
        </div>
    </div>
</x-containers.box-primary>
