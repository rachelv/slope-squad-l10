<x-app-layout>
    <x-slot name="title">{{ mountain_page_title($mountain, 'Leaderboard') }}</x-slot>

    <x-pages.page :logged-in-user="$loggedInUser">

        <div class="mt-4 mb-8 space-y-4">
            <x-mountain.mountain-nav :mountain="$mountain"/>

            <x-containers.box-primary class="space-y-3">
                <h2>Leaderboard</h2>

                <livewire:mountain.leaderboard
                    :mountain-id="$mountain->getId()" />

            </x-containers.box-primary>
        </div>

    </x-pages.page>
</x-app-layout>
