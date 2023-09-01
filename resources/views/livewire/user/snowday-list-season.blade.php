<div class="space-y-2">
    <p class="text-black-500">{{ count_snowdays($snowdays->count()) }} at {{ count_mountains($totalMountains) }}</p>
    <div>
        @forelse($snowdays as $snowday)
            <x-list-items.top-bottom :last="$loop->last">
                <x-slot name="top">
                    <a class="ssq-default text-xl"
                        href="{{ route_user_snowday($snowday->getUser(), $snowday) }}">Day {{ $snowday->getDayNum() }}: {{ snowday_title($snowday, MTN_FULL_ABBREV) }}</a>
                </x-slot>
                <x-slot name="bottom">
                    <a class="block" href="{{ route_user_snowday($snowday->getUser(), $snowday) }}">
                        {{ format_date($snowday->getDate(), DATE_FULL) }}
                    </a>
                </x-slot>
            </x-list-items.top-bottom>
        @empty
            <x-empty-message />
        @endforelse
    </div>
</div>