<x-app-layout>
    <x-slot name="title">{{ user_page_title($user, "Leaderboard") }}</x-slot>

    <x-pages.page :logged-in-user="$loggedInUser">

        <div class="mt-4 mb-8 space-y-4">
            <x-user.user-nav :user="$user" active="following"/>

            <x-containers.box-primary class="space-y-3">
                <h2>Leaderboard</h2>

                <livewire:user.leaderboard
                    :user-id="$user->getId()"
                    :season-id="$currentSeason->getId()" />
            </x-containers.box>
        </div>

    </x-pages.page>
</x-app-layout>
