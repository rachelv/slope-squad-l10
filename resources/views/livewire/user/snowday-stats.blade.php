<div class="flex">
    <a href="{{ route_user_season($user, $season) }}" class="flex flex-col px-3 items-center border-r border-black-300 border-dotted">
        <p class="text-lg">Day {{ $seasonDayNum }}</p>
        <p class="text-xs">of {{ $season->getShortName() }}</p>
    </a>
    <a href="{{ route_user_mountain($user, $mountain) }}" class="flex flex-col px-3 items-center border-r border-black-300 border-dotted">
        <p class="text-lg">Day {{ $seasonDaysAtMountain }}</p>
        <p class="text-xs block">at {{ $mountain->getNickname() }} in {{ $season->getShortName() }}</p>
    </a>
    <a href="{{ route_user_mountain($user, $mountain) }}" class="flex flex-col px-3 items-center">
        <p class="text-lg">Day {{ $totalDaysAtMountain }}</p>
        <p class="text-xs">at {{ $mountain->getNickname() }} all time</p>
    </a>
</div>
