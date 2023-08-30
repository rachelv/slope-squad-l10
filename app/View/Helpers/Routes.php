<?php

use App\Models\Mountain;
use App\Models\Season;
use App\Models\Snowday;
use App\Models\User;

function route_user_season(User $user, Season $season): string
{
    return route('users.season', [
        'id' => $user->getId(),
        'seasonId' => $season->getId(),
    ]);
}

function route_user_mountain(User $user, Mountain $mountain): string
{
    return route('users.mountain', [
        'id' => $user->getId(),
        'mountainId' => $mountain->getId(),
    ]);
}

function route_user_snowday(User $user, Snowday $snowday): string
{
    return route('users.snowday', [
        'id' => $user->getId(),
        'snowdayId' => $snowday->getId(),
    ]);
}