<?php
namespace App\Models;

use App\Interfaces\ChartItemInterface;
use App\Interfaces\TotalSnowdaysInterface;

class StatsUserSeason extends SlopeSquadBaseModel implements ChartItemInterface, TotalSnowdaysInterface
{
    use Traits\hasSeason;
    use Traits\hasTotalSnowdays;
    use Traits\hasUser;

    protected $table = 'stats_users_seasons';

    // need these for firstOrCreate() to work
    protected $fillable = [
        'season_id',
        'user_id',
    ];

    public function getLabel(): string
    {
        return $this->getSeason()->getShortName();
    }

    public function getValue(): int
    {
        return $this->getTotalSnowdays();
    }

    public function getTotalMountains(): int
    {
        return $this->total_mountains ?? 0;
    }

    public function setTotalMountains(int $totalMountains): void
    {
        $this->total_mountains = $totalMountains;
    }

    public function getTotalVertical(): int
    {
        return $this->total_vertical ?? 0;
    }

    public function setTotalVertical(int $totalVertical): void
    {
        $this->total_vertical = $totalVertical;
    }
}
