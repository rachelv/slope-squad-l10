<div class="space-y-4">
    @if (!$hideSeasonSelector)
        <x-forms.season-dropdown :seasons="$seasons" />
    @endif

    <div class="space-y-2">
        <p class="text-black-500">{{ count_snowdays(count($snowdays)) }}  at {{ $mountain->getName() }} in {{ $season->getName() }}</p>
        <div>
            @forelse ($snowdays as $snowday)
                <a class="block py-3 px-4 odd:bg-black-50 even:bg-white border-t border-dotted border-black-300 {{ $loop->last ? 'border-b' : '' }}"
                    href="{{ route_user_snowday($snowday->getUser(), $snowday) }}">
                    <h4 class="ssq-default">{{ $snowday->getUser()->getName() }} on {{ format_date($snowday->getDate()) }}</h4>
                    <p>{{ fmt_notes($snowday) }}</p>
                </a>
            @empty
                <x-empty-message />
            @endforelse
        </div>
    </div>
</div>
