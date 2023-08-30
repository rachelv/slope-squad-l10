<?php

namespace App\Livewire\Mountain;

use App\Models\Mountain;
use App\Models\Season;
use App\Models\StatsUserMountain;
use App\Models\StatsUserSeasonMountain;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Leaderboard extends Component
{
    public int $mountainId = 0;
    public int $seasonId = 0;

    public int $limit = 0;

    public function render()
    {
        $mountain = Mountain::find($this->mountainId);
        $season = $this->seasonId > 0 ? Season::find($this->seasonId) : new Season();

        $leaderboardStats = $this->getLeaderboardStats();

        return view('livewire.mountain.leaderboard', [
            'mountain' => $mountain,
            'season' => $season,
            'leaderboardStats' => $leaderboardStats,
        ]);
    }

    private function getLeaderboardStats(): Collection
    {
        if ($this->seasonId > 0) {
            return StatsUserSeasonMountain::with(['user'])
                ->whereMountainId($this->mountainId)
                ->whereSeasonId($this->seasonId)
                ->orderByDesc('total_snowdays')
                ->when($this->limit > 0, function ($query) {
                    return $query->limit($this->limit);
                })
                ->get();
        } else {
            return StatsUserMountain::with(['user'])
                ->whereMountainId($this->mountainId)
                ->orderByDesc('total_snowdays')
                ->when($this->limit > 0, function ($query) {
                    return $query->limit($this->limit);
                })
                ->get();
        }
    }
}