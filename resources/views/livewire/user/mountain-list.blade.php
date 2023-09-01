<div>
    <div class="space-y-2">
        <p class="text-black-500">
            {{ count_snowdays($totalDays) }} at {{ count_mountains($totalMountains) }}
            @if ($season->exists)
                in {{ $season->getShortName() }}
            @endif
        </p>
        <div>
            @forelse($mountainStats as $mountainStat)
                <x-list-items.left-right :last="$loop->last">
                    <x-slot name="left">
                        <a href="{{ route_user_mountain($mountainStat->getUser(), $mountainStat->getMountain()) }}">{{ mountain_name($mountainStat->getMountain(), MTN_NAME_ONLY) }}</a>
                    </x-slot>
                    <x-slot name="right">
                        <a href="{{ route_user_mountain($mountainStat->getUser(), $mountainStat->getMountain()) }}">{{ count_snowdays($mountainStat->getTotalSnowdays()) }}</a>
                    </x-slot>
                </x-list-items.top-bottom>
            @empty
                <x-empty-message />
            @endforelse
        </div>
    </div>
</div>
