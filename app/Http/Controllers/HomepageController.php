<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomepageController extends SlopeSquadBaseController
{
    public function index(): View
    {
        return view('homepage.index', [
            'loggedInUser' => $this->getLoggedInUser(),
        ]);
    }
}