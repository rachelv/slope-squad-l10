<div class="space-y-2">
    <p class="text-black-500">{{ count_snowdays(count($snowdays)) }}  at {{ $mountain->getName() }} in {{ $season->getName() }}</p>
    <div>
        @forelse ($snowdays as $snowday)
            <div class="py-3 px-4 odd:bg-black-50 even:bg-white border-t border-dotted border-black-300 {{ $loop->last ? 'border-b' : '' }}">
                <a class="block" href="{{ route_user_snowday($snowday->getUser(), $snowday) }}">
                    <h4>{{ $snowday->getUser()->getName() }}: {{ format_date($snowday->getDate()) }}</h4>
                </a>
                <p>{{ fmt_notes($snowday) }}</p>
            </div>
        @empty
            <x-empty-message />
        @endforelse
    </div>
</div>
