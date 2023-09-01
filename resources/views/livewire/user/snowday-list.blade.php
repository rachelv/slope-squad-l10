<div class="space-y-4">
    @if (!$hideSeasonSelector)
        <x-forms.select wire:model.live="seasonId">
            @foreach ($user->getSeasons() as $s)
                <option value="{{ $s->getId() }}">{{ $s->getName() }}</option>
            @endforeach
        </x-forms.select>
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
