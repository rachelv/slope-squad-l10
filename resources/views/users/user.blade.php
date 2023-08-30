<x-app-layout>
    <x-slot name="title">{{ user_page_title($user, "{$currentSeason->getName()} Overview") }}</x-slot>

    <x-pages.page :logged-in-user="$loggedInUser">

        <div class="mt-4 mb-8 space-y-4">

            <x-user.user-nav :user="$user" active="index"/>

            <x-containers.box-primary class="space-y-6">
                <h2>{{ $currentSeason->getName() }} Overview</h2>
                <div class="grid grid-cols-12 gap-6">

                    <div class="col-span-12 md:col-span-3">
                        <div class="space-y-2">
                            <livewire:user.snowday-count
                                :user-id="$user->getId()"
                                :season-id="$currentSeason->getId()" />
                            <x-nav.more-link href="{{ route('users.seasons.compare', $user) }}">Compare to past seasons</x-nav.more-link>
                        </div>
                    </div>

                </div>
            </x-containers.box-primary>

        </div>

    </x-pages.page>
</x-app-layout>