<div class="space-y-4">
    @if (!$hideSeasonSelector)
        <x-forms.select wire:model.live="seasonId">
            <option value="0">All time</option>
            @foreach ($seasons as $s)
                <option value="{{ $s->getId() }}">{{ $s->getName() }}</option>
            @endforeach
        </x-forms.select>
    @endif

    <div class="space-y-2">
        <p class="text-black-500">Most days at {{ $mountain->getNickname() }} {{ $season->exists ? 'in ' . $season->getShortName() : 'all time' }}</p>
        <div>
            @forelse ($leaderboardStats as $idx => $leaderboardStat)
                <x-list-items.left-right :last="$loop->last">
                    <x-slot name="left">
                        <div class="space-x-1">
                            <span class="text-black-500">{{ $idx + 1 }}.</span>
                            <a href="{{ route_user_mountain($leaderboardStat->getUser(), $mountain) }}">{{ $leaderboardStat->getUser()->getName() }}</a>
                        </div>
                    </x-slot>
                    <x-slot name="right">
                        <a href="{{ route_user_mountain($leaderboardStat->getUser(), $mountain) }}">{{ $leaderboardStat->getTotalSnowdays() }}</a>
                    </x-slot>
                </x-list-items.left-right>
            @empty
                <x-empty-message />
            @endforelse
        </div>
    </div>
</div>