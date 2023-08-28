<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Snowday extends SlopeSquadBaseModel
{
    use Traits\hasMountain;
    use Traits\hasRank;
    use Traits\hasSeason;
    use Traits\hasUser;

    protected $table = 'snowdays';

    public function scopeOrderByMostRecent(Builder $builder): Builder
    {
        return $builder->orderByDesc('date');
    }

    public function getDisplayTitle(): string
    {
        if ($this->isAtMountain()) {
            return $this->getMountain()->getNickname();
        } elseif ($this->isBackcountry()) {
            return Mountain::getBackcountryMock()->getName();
        } elseif (!empty($this->getTitle())) {
            return $this->getTitle();
        }

        return '';
    }

    public function getDayNum(): int
    {
        return $this->day_num;
    }

    public function setDayNum(int $dayNum): void
    {
        $this->day_num = $dayNum;
    }

    public function getDate(): Carbon
    {
        // todo: think I need to explicitly make this noon
        // otherwise carbon defaults to time in current timezone
        // and I'm not sure that will always return the same date?
        return Carbon::createFromFormat('Y-m-d', $this->date);
    }

    public function setDate(Carbon $date): void
    {
        $this->date = $date;
    }

    public function getTitle(): string
    {
        return $this->title ?? '';
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getVertical(): int
    {
        return $this->vertical ?? 0;
    }

    public function setVertical(int $vertical): void
    {
        $this->vertical = $vertical;
    }

    public function hasNotes(): bool
    {
        return !empty($this->getNotes());
    }

    public function getNotes(): string
    {
        return $this->notes ?? '';
    }

    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }
}