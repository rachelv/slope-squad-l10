<x-app-layout>
    <x-slot name="title">{{ user_page_title($user, "All Snowdays") }}</x-slot>

    <x-pages.page :logged-in-user="$loggedInUser">

        <div class="mt-4 mb-8 space-y-4">
            <x-user.user-nav :user="$user" active="snowdays"/>

            <x-containers.box-primary class="space-y-3">
                <h2>All Snowdays</h2>

                {{--
                <div x-data="{ seasonId: {{ $user->getSeasons()->first()->getId() }} }">
                    <x-forms.select x-model="seasonId" @change="Livewire.emit('refreshSnowdays', seasonId)">
                        @foreach ($user->getSeasons() as $season)
                            <option value="{{ $season->getId() }}">{{ $season->getName() }}</option>
                        @endforeach
                    </x-forms.select>
                </div>
                --}}

                <livewire:user.snowday-list
                    :user-id="$user->getId()"
                    :season-id="$user->getSeasons()->first()->getId()" />

            </x-containers.box-primary>
        </div>

    </x-pages.page>
</x-app-layout>
