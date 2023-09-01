<div class="space-y-4">
    @if (!$hideSeasonSelector)
        <x-forms.season-dropdown :seasons="$user->getSeasons()" />
    @endif

    <div class="space-y-2">
        @if (!$hideSeasonSelector)
            <p class="text-black-500">
                {{ count_snowdays(count($snowdays)) }} in {{ $season->getName() }}
            </p>
        @endif

        <div>
            @forelse ($snowdays as $snowday)
                <a class="flex space-x-2 py-3 odd:bg-black-50 even:bg-white border-t border-dotted border-black-300 {{ $loop->last ? 'border-b' : '' }}"
                    href="{{ route_user_snowday($snowday->getUser(), $snowday) }}">
                    <div class="flex flex-col w-20 justify-center items-center">
                        <p class="text-xs">Day</p>
                        <p class="text-3xl">{{ $snowday->getDayNum() }}</p>
                    </div>
                    <div class="flex flex-col px-4 border-l border-dotted border-black-300">
                        <h4 class="ssq-default">{{ snowday_title($snowday, MTN_FULL_ABBREV) }}: {{ format_date($snowday->getDate()) }}</h4>
                        <p>{{ fmt_notes($snowday) }}</p>
                    </div>
                </a>
            @empty
                <x-empty-message />
            @endforelse
        </div>
    </div>
</div>
