<?php

namespace App\Livewire\Mountain;

use App\Models\Mountain;
use App\Models\Season;
use App\Models\Snowday;
use Illuminate\Support\Collection;
use Livewire\Component;

class SnowdayList extends Component
{
    public int $mountainId = 0;
    public int $seasonId = 0;

    public int $limit = 0;

    public function render()
    {
        $mountain = Mountain::find($this->mountainId);
        $season = $this->seasonId > 0 ? Season::find($this->seasonId) : new Season();

        $snowdays = $this->getSnowdays();

        return view('livewire.mountain.snowday-list', [
            'mountain' => $mountain,
            'season' => $season,
            'snowdays' => $snowdays,
        ]);
    }

    private function getSnowdays(): Collection
    {
        return Snowday::with(['mountain', 'user', 'season'])
            ->whereMountainId($this->mountainId)
            ->when($this->seasonId > 0, function ($query) {
                return $query->whereSeasonId($this->seasonId);
            })
            ->orderByMostRecent()
            ->when($this->limit > 0, function ($query) {
                return $query->limit($this->limit);
            })
            ->get();
    }
}