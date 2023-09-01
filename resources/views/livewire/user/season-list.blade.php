<div class="space-y-2">
    <p class="text-black-500">{{ count_seasons($seasonStats->count()) }}</p>
    <div>
        @forelse($seasonStats as $seasonStat)
            <x-list-items.top-bottom :last="$loop->last">
                <x-slot name="top">
                    <a class="ssq-default text-xl"
                        href="{{ route_user_season($seasonStat->getUser(), $seasonStat->getSeason()) }}">{{ $seasonStat->getSeason()->getName() }}</a>
                </x-slot>
                <x-slot name="bottom">
                    <p>
                        {{ count_snowdays($seasonStat->getTotalSnowdays()) }} at {{ count_mountains($seasonStat->getTotalMountains()) }}
                    </p>
                </x-slot>
            </x-list-items.top-bottom>
        @empty
            <x-empty-message />
        @endforelse
    </div>
</div>