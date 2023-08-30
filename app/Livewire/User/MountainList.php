<?php

namespace App\Livewire\User;

use App\Interfaces\TotalSnowdaysInterface;
use App\Models\Season;
use App\Models\StatsUserMountain;
use App\Models\StatsUserSeasonMountain;
use Illuminate\Support\Collection;
use Livewire\Component;

class MountainList extends Component
{
    public int $userId = 0;
    public int $seasonId = 0;

    public string $context = 'index';

    public function render()
    {
        $season = $this->seasonId === 0 ? new Season() : Season::find($this->seasonId);
        $mountainStats = $this->getMountainStats();

        $totalDays = $mountainStats->sum(function (TotalSnowdaysInterface $item) {
            return $item->getTotalSnowdays();
        });

        $totalMountains = count($mountainStats);

        return view("livewire.user.{$this->getViewName()}", [
            'season' => $season,
            'mountainStats' => $mountainStats,
            'totalDays' => $totalDays,
            'totalMountains' => $totalMountains,
        ]);
    }

    private function getViewName(): string
    {
        if ($this->context === 'mountain') {
            return 'mountain-list-mountain';
        } else {
            return 'mountain-list';
        }
    }

    private function getMountainStats(): Collection
    {
        if ($this->seasonId > 0) {
            return StatsUserSeasonMountain::with(['mountain', 'user'])
                ->whereUserId($this->userId)
                ->whereSeasonId($this->seasonId)
                ->orderByDesc('total_snowdays')
                ->get();
        } else {
            return StatsUserMountain::with(['mountain', 'user'])
                ->whereUserId($this->userId)
                ->orderByDesc('total_snowdays')
                ->get();
        }
    }
}