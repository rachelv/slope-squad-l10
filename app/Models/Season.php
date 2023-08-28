<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class Season extends SlopeSquadBaseModel
{
    use Traits\hasRank;

    protected $table = 'seasons';

    public static function current(): Season
    {
        return Season::where('is_current', true)->first();
    }

    public static function allSeasons(): Collection
    {
        return Season::orderBy('rank', 'desc')->get();
    }

    public function getIsCurrent(): bool
    {
        return $this->is_current;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getShortName(): string
    {
        $seasons = explode('-', $this->name);

        $firstSeason = substr($seasons[0], -2);
        $secondSeason = substr($seasons[1], -2);

        return "{$firstSeason}-{$secondSeason}";
    }

    public function getStartYear(): int
    {
        return intval(explode('-', $this->getName())[0]);
    }

    public function getEndYear(): int
    {
        return intval(explode('-', $this->getName())[1]);
    }
}
