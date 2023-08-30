<?php
namespace App\Interfaces;

use App\Models\User;

interface LeaderboardInterface
{
    public function getUser(): User;

    public function getTotalSnowdays(): int;
}
