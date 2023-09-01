<x-app-layout>
    <x-slot name="title">{{ user_page_title($user, "{$season->getName()} Season Stats") }}</x-slot>

    <x-pages.page :logged-in-user="$loggedInUser">

        <div class="mt-4 mb-8 space-y-4">
            <x-user.user-nav :user="$user" active="seasons"/>

            <x-containers.box-primary class="space-y-4">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-3 md:col-span-1">
                        <div class="space-y-3">
                            <x-nav.back-link href="{{ route('users.seasons', $user) }}">All Seasons</x-nav.back-link>

                            <h2>{{ $season->getName() }}</h2>

                            <livewire:user.snowday-list
                                :user-id="$user->getId()"
                                :season-id="$season->getId()"
                                context="season" />
                        </div>
                    </div>
                    <div class="col-span-3 md:col-span-2">
                        <div class="space-y-4">
                            <x-containers.box-secondary class="p-2">
                                chart
                            </x-containers.box-secondary>

                            <livewire:user.mountain-map
                                :user-id="$user->getId()"
                                :season-id="$season->getId()" />
                        </div>
                    </div>
                </div>
            </x-containers.box-primary>
        </div>

    </x-pages.page>
</x-app-layout>
