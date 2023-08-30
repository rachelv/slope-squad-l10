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
}