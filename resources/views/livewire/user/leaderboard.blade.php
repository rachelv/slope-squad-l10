<div class="space-y-2">
    <p class="text-black-500">Most {{ $season->getName() }} days from people {{ $user->getName() }} is following</p>
    <div>
        @forelse ($followingUsers as $idx => $followingUser)
            <x-list-items.left-right :last="$loop->last">
                <x-slot name="left">
                    <div class="space-x-1">
                        <span class="text-black-500">{{ $idx + 1 }}.</span>
                        <a href="{{ route_user_season($followingUser->getFollowingUser(), $season) }}">{{ $followingUser->getFollowingUser()->getName() }}</a>
                    </div>
                </x-slot>
                <x-slot name="right">
                    <a href="{{ route_user_season($followingUser->getFollowingUser(), $season) }}">{{ $followingUser->getFollowingUserStats()->getTotalSnowdays() }}</a>
                </x-slot>
            </x-list-items.left-right>
        @empty
            <x-empty-message />
        @endforelse
    </div>
</div>