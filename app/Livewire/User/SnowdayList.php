<?php

namespace App\Livewire\User;

use App\Models\Snowday;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;

class SnowdayList extends Component
{
    public int $userId = 0;
    public int $seasonId = 0;
    public int $mountainId = 0;

    public int $limit = 0;

    public bool $hideSeasonSelector = false;

    public string $context = 'snowday';

    public function render()
    {
        $snowdays = $this->getSnowdays();

        $totalMountains = $this->getTotalMountains($snowdays);
        $totalSeasons = $this->getTotalSeasons($snowdays);

        return view("livewire.user.{$this->getViewName()}", [
            'user' => User::find($this->userId),
            'snowdays' => $snowdays,
            'totalMountains' => $totalMountains,
            'totalSeasons' => $totalSeasons,
        ]);
    }

    private function getViewName(): string
    {
        if ($this->context === 'season') {
            return 'snowday-list-season';
        } elseif ($this->context === 'mountain') {
            return 'snowday-list-mountain';
        } else {
            return 'snowday-list';
        }
    }

    private function getSnowdays(): Collection
    {
        return Snowday::with(['mountain', 'user', 'season'])
            ->whereUserId($this->userId)
            ->when($this->seasonId > 0, function ($query) {
                return $query->whereSeasonId($this->seasonId);
            })
            ->when($this->mountainId > 0, function ($query) {
                return $query->whereMountainId($this->mountainId);
            })
            ->orderByMostRecent()
            ->when($this->limit > 0, function ($query) {
                return $query->limit($this->limit);
            })
            ->get();
    }

    private function getTotalMountains(Collection $snowdays): int
    {
        if ($this->mountainId > 0) {
            return 1;
        }

        return $snowdays->countBy(function (Snowday $snowday) {
            return $snowday->getMountainId();
        })->count();
    }

    private function getTotalSeasons(Collection $snowdays): int
    {
        if ($this->seasonId > 0) {
            return 1;
        }

        return $snowdays->countBy(function (Snowday $snowday) {
            return $snowday->getSeasonId();
        })->count();
    }
}