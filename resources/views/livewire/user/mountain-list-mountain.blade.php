<div class="space-y-4">
    <x-forms.season-dropdown :seasons="$user->getSeasons()" :include-all-time="true" />

    <div class="space-y-2">
        <p class="text-black-500">
            {{ count_snowdays($totalDays) }} at {{ count_mountains($totalMountains) }}
            @if ($season->exists)
                in {{ $season->getShortName() }}
            @endif
        </p>
        <div>
            @forelse($mountainStats as $mountainStat)
                <x-list-items.top-bottom :last="$loop->last">
                    <x-slot name="top">
                        <a class="ssq-default text-xl"
                            href="{{ route_user_mountain($mountainStat->getUser(), $mountainStat->getMountain()) }}">{{ mountain_name($mountainStat->getMountain(), MTN_FULL_ABBREV) }}</a>
                    </x-slot>
                    <x-slot name="bottom">
                        <a href="{{ route_user_mountain($mountainStat->getUser(), $mountainStat->getMountain()) }}">
                            {{ count_snowdays($mountainStat->getTotalSnowdays()) }}
                            @if ($mountainStat->getTotalSeasons() > 1)
                                over {{ count_seasons($mountainStat->getTotalSeasons()) }}
                            @endif
                        </a>
                    </x-slot>
                </x-list-items.top-bottom>
            @empty
                <x-empty-message />
            @endforelse
        </div>
    </div>
</div>
