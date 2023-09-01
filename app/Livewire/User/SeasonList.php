<?php

namespace App\Livewire\User;

use App\Models\StatsUserSeason;
use Illuminate\Support\Collection;
use Livewire\Component;

class SeasonList extends Component
{
    public int $userId = 0;

    public function render()
    {
        $seasonStats = $this->getSeasonStats();

        return view('livewire.user.season-list', [
            'seasonStats' => $seasonStats,
        ]);
    }

    private function getSeasonStats(): Collection
    {
        return StatsUserSeason::with(['season', 'user'])
        ->whereUserId($this->userId)
        ->get()
        ->sortByDesc(function (StatsUserSeason $seasonStat) {
            return $seasonStat->getSeason()->getRank();
        });
    }
}