<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;

class User extends SlopeSquadBaseModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract,
    MustVerifyEmailContract
{
    use Authenticatable;
    use Authorizable;
    use CanResetPassword;
    use MustVerifyEmail;
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    use Traits\hasTotalSnowdays;

    protected $table = 'users';

    private ?Collection $seasons = null;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_logged_in_at' => 'datetime',
    ];

    public function scopeWhereHasSnowdays(Builder $builder): Builder
    {
        return $builder->whereNotNull('total_snowdays')
            ->where('total_snowdays', '>', 0);
    }

    public function getSeasons(): Collection
    {
        if ($this->seasons === null) {
            $seasonIds = StatsUserSeason::whereUserId($this->getId())
                ->select('season_id')
                ->get()
                ->pluck('season_id')
                ->unique();

            if ($seasonIds->isEmpty()) {
                $this->seasons = collect([Season::current()]);
            } else {
                $this->seasons = Season::whereIn('id', $seasonIds)
                    ->orderByRank()
                    ->get();
            }
        }

        return $this->seasons;
    }

    public function getFollowingUsers(): Collection
    {
        return $this->followingUsers;
    }

    public function getName(): string
    {
        return $this->name ?? 'unknown';
    }

    public function getTotalMountains(): int
    {
        return $this->total_mountains ?? 0;
    }

    public function setTotalMountains(int $totalMountains): void
    {
        $this->total_mountains = $totalMountains;
    }

    public function getTotalSeasons(): int
    {
        return $this->total_seasons ?? 0;
    }

    public function setTotalSeasons(int $totalSeasons): void
    {
        $this->total_seasons = $totalSeasons;
    }

    public function getTotalFriends(): int
    {
        return $this->total_friends ?? 0;
    }

    public function setTotalFriends(int $totalFriends): void
    {
        $this->total_friends = $totalFriends;
    }

    public function getLastLoggedInAt(): Carbon
    {
        return $this->last_logged_in_at ?? new Carbon(0);
    }

    public function setLastLoggedInAt(int $lastLoggedInAt): void
    {
        $this->last_logged_in_at = $lastLoggedInAt;
    }

    public function followingUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, UserFollowing::class, 'user_id', 'following_user_id');
    }
}