<div class="space-y-4">

    @if (!$hideSeasonSelector)
        <x-forms.select wire:model.live="seasonId">
            @foreach ($user->getSeasons() as $s)
                <option value="{{ $s->getId() }}">{{ $s->getName() }}</option>
            @endforeach
        </x-forms.select>
    @endif

    <div class="space-y-2">
        <p class="text-black-500">Most days in {{ $season->getName() }} from people {{ $user->getName() }} is following</p>

        <div>
            @forelse ($followingUsers as $idx => $followingUser)
                <x-list-items.left-right :last="$loop->last">
                    <x-slot name="left">
                        <div class="space-x-1">
                            <span class="text-black-500">{{ $idx + 1 }}.</span>
                            <a href="{{ route_user_season($followingUser->getFollowingUser(), $season) }}">{{ $followingUser->getFollowingUser()->getName() }}</a>
                        </div>
                    </x-slot>
                    <x-slot name="right">
                        <a href="{{ route_user_season($followingUser->getFollowingUser(), $season) }}">{{ $followingUser->getFollowingUserStats()->getTotalSnowdays() }}</a>
                    </x-slot>
                </x-list-items.left-right>
            @empty
                <x-empty-message />
            @endforelse
        </div>
    </div>
</div>