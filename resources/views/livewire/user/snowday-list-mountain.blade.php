<div class="space-y-4">
    <x-forms.season-dropdown :seasons="$user->getSeasons()" :include-all-time="true" />

    <div class="space-y-2">
        <p class="text-black-500">
            {{ count_snowdays($snowdays->count()) }}
            @if ($season->exists)
                in {{ $season->getShortName() }}
            @else
                over {{ count_seasons($totalSeasons) }}
            @endif
        </p>
        <div>
            @forelse($snowdays as $snowday)
                @php
                    $day = $snowdays->count() - $loop->index;
                @endphp
                <x-list-items.top-bottom :last="$loop->last">
                    <x-slot name="top">
                        <a class="ssq-default text-xl"
                            href="{{ route_user_snowday($snowday->getUser(), $snowday) }}">Day {{ $day }}: {{ format_date($snowday->getDate(), DATE_FULL_ABBREV) }}</a>
                    </x-slot>
                    <x-slot name="bottom">
                        <p>Day {{ $snowday->getDayNum() }} of <a class="ssq-default" href="{{ route_user_season($snowday->getUser(), $snowday->getSeason()) }}">{{ $snowday->getSeason()->getName() }}</a></p>
                    </x-slot>
                </x-list-items.top-bottom>
            @empty
                <x-empty-message />
            @endforelse
        </div>
    </div>
</div>
