<div>
    <div wire:loading.remove>
        <div class="space-y-2">
            <p class="text-black-500">Number of days by {{ format_date($today, DATE_DATE_FULL) }} in past seasons</p>

            <div>
                @forelse($seasonStats as $seasonStat)
                    <x-list-items.left-right :last="$loop->last">
                        <x-slot name="left">
                            <a href="{{ route_user_season($seasonStat->getUser(), $seasonStat->getSeason()) }}">{{ $seasonStat->getSeason()->getName() }}</a>
                        </x-slot>
                        <x-slot name="right">
                            <a href="{{ route_user_season($seasonStat->getUser(), $seasonStat->getSeason()) }}">{{ $seasonStat->getTotalSnowdays() }}</a>
                        </x-slot>
                    </x-list-items.left-right>
                @empty
                    <x-empty-message />
                @endforelse
            </div>
        </div>
    </div>

    <div wire:loading.delay>
        <x-loading-spinner />
    </div>
</div>