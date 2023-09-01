<?php

namespace App\Http\Controllers;

use App\Models\Mountain;
use App\Models\Season;
use App\Models\Snowday;
use App\Models\User;
use Illuminate\View\View;

class UsersController extends SlopeSquadBaseController
{
    public function user(int $id): View
    {
        $user = User::findOrFail($id);

        return view('users.user', [
            'loggedInUser' => $this->getLoggedInUser(),
            'user' => $user,
            'currentSeason' => Season::current(),
        ]);
    }

    public function seasons(int $id): View
    {
        $user = User::findOrFail($id);

        return view('users.seasons', [
            'loggedInUser' => $this->getLoggedInUser(),
            'user' => $user,
        ]);
    }

    public function seasonsCompare(int $id): View
    {
        $user = User::findOrFail($id);

        return view('users.seasons-compare', [
            'loggedInUser' => $this->getLoggedInUser(),
            'user' => $user
        ]);
    }

    public function season(int $id, int $seasonId): View
    {
        $user = User::findOrFail($id);
        $season = Season::findOrFail($seasonId);

        return view('users.season', [
            'loggedInUser' => $this->getLoggedInUser(),
            'user' => $user,
            'season' => $season,
        ]);
    }

    public function mountains(int $id): View
    {
        $user = User::findOrFail($id);

        return view('users.mountains', [
            'loggedInUser' => $this->getLoggedInUser(),
            'user' => $user,
        ]);
    }

    public function mountain(int $id, int $mountainId): View
    {
        $user = User::findOrFail($id);
        $mountain = Mountain::findOrFail($mountainId);

        return view('users.mountain', [
            'loggedInUser' => $this->getLoggedInUser(),
            'user' => $user,
            'mountain' => $mountain,
        ]);
    }

    public function snowdays(int $id): View
    {
        $user = User::findOrFail($id);

        return view('users.snowdays', [
            'loggedInUser' => $this->getLoggedInUser(),
            'user' => $user,
        ]);
    }

    public function snowday(int $id, int $snowdayId): View
    {
        $user = User::findOrFail($id);
        $snowday = Snowday::with(['mountain'])->findOrFail($snowdayId);

        return view('users.snowday', [
            'loggedInUser' => $this->getLoggedInUser(),
            'user' => $user,
            'snowday' => $snowday,
        ]);
    }

    public function following(int $id): View
    {
        $user = User::findOrFail($id);

        return view('users.following', [
            'loggedInUser' => $this->getLoggedInUser(),
            'user' => $user,
            'currentSeason' => Season::current(),
        ]);
    }
}