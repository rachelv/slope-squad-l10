<?php

namespace App\Http\Controllers;

use App\Models\Mountain;
use App\Models\Season;
use Illuminate\View\View;

class MountainsController extends SlopeSquadBaseController
{
    public function mountain(int $id): View
    {
        $mountain = Mountain::findOrFail($id);

        return view('mountains.mountain', [
            'loggedInUser' => $this->getLoggedInUser(),
            'mountain' => $mountain,
            'currentSeason' => Season::current(),
        ]);
    }

    public function snowdays(int $id): View
    {
        $mountain = Mountain::findOrFail($id);

        return view('mountains.snowdays', [
            'loggedInUser' => $this->getLoggedInUser(),
            'mountain' => $mountain,
            'seasons' => Season::allSeasons(),
        ]);
    }

    public function leaderboard(int $id): View
    {
        $mountain = Mountain::findOrFail($id);

        return view('mountains.leaderboard', [
            'loggedInUser' => $this->getLoggedInUser(),
            'mountain' => $mountain,
            'seasons' => Season::allSeasons(),
        ]);
    }
}