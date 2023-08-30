<?php

namespace App\Livewire\User;

use App\Models\StatsUserMountain;
use App\Models\StatsUserSeasonMountain;
use Illuminate\Support\Collection;
use Livewire\Component;

class MountainMap extends Component
{
    public int $userId = 0;
    public int $seasonId = 0;

    public function render()
    {
        $mountains = $this->getMountains();

        return view('livewire.user.mountain-map', [
            'mountains' => $mountains,
        ]);
    }

    private function getMountains(): Collection
    {
        if ($this->seasonId > 0) {
            $stats = StatsUserSeasonMountain::with(['mountain'])
                ->whereUserId($this->userId)
                ->whereSeasonId($this->seasonId)
                ->orderByDesc('total_snowdays')
                ->get();
        } else {
            $stats = StatsUserMountain::with(['mountain', 'user'])
                ->whereUserId($this->userId)
                ->orderByDesc('total_snowdays')
                ->get();
        }

        return $stats->map(function ($stat) {
            if ($stat->getMountainId() > 0) {
                return $stat->getMountain();
            }
        })->filter()->values();
    }
}