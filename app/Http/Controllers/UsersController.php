<?php

namespace App\Http\Controllers;

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
}