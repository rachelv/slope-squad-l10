<x-app-layout>
    <x-slot name="title">{{ mountain_page_title($mountain) }}</x-slot>

    <x-pages.page :logged-in-user="$loggedInUser">

        <div class="mt-4 mb-8 space-y-4">
            <x-mountain.mountain-nav :mountain="$mountain"/>

            <x-containers.box-primary class="space-y-6">

                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 md:col-span-4">
                        <div class="space-y-6">

                            <div class="space-y-2">
                                <h3>Most Days in {{ $currentSeason->getShortName() }}</h3>
                                <livewire:mountain.leaderboard
                                    :mountain-id="$mountain->getId()"
                                    :season-id="$currentSeason->getId()"
                                    limit="4" />
                                <x-nav.more-link href="{{ route('mountains.leaderboard', $mountain) }}">Full leaderboard</x-nav.more-link>
                            </div>

                            <div class="space-y-2">
                                <h3>Most Days All Time</h3>
                                <livewire:mountain.leaderboard
                                    :mountain-id="$mountain->getId()"
                                    limit="4" />
                                <x-nav.more-link href="{{ route('mountains.leaderboard', $mountain) }}">Full leaderboard</x-nav.more-link>
                            </div>

                        </div>
                    </div>

                    <div class="col-span-12 md:col-span-8">

                        {{--
                        <div class="space-y-2">
                            <h3>Recent Days</h3>
                            <livewire:mountain.snowday-list
                                :mountain-id="$mountain->getId()"
                                :season-id="$currentSeason->getId()"
                                limit="6" />
                            <x-more-link href="{{ route('mountains.snowdays', $mountain) }}">All {{ $currentSeason->getName() }} days</x-more-link>
                        </div>
                        --}}

                    </div>
                </div>

            </x-containers.box-primary>
        </div>

    </x-pages.page>
</x-app-layout>
