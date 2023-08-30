<?php

namespace App\Http\Controllers;

use App\Models\Season;
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
}