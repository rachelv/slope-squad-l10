<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Stats;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateUserStats extends Command
{
    protected $signature = 'ssq:update-user-stats {userId=0}';
    protected $description = 'Update all stats for the given userId, or all users if no ID is given';

    public function handle()
    {
        $userId = $this->argument('userId');

        $this->line('===');
        $this->line('=== Updating user stats for ' . ($userId > 0 ? "user {$userId}" : 'all users') . ' ===');
        $this->line('===');

        if ($userId > 0) {
            $userIds = collect([$userId]);
        } else {
            $userIds = User::all()->pluck('id');
        }

        foreach ($userIds as $userId) {
            $mountainSeasonCombos = DB::table('snowdays')
                ->where('user_id', $userId)
                ->distinct()->get(['season_id', 'mountain_id']);

            $this->line("- user {$userId}: {$mountainSeasonCombos->count()} mountain/season combos");

            foreach ($mountainSeasonCombos as $idx => $mountainSeasonCombo) {
                $mountainId = $mountainSeasonCombo->mountain_id;
                $seasonId = $mountainSeasonCombo->season_id;

                if ($idx % 10 === 0) {
                    $this->line('  .');
                }
                Stats::updateAllForUser($userId, $seasonId, $mountainId);
            }

            Stats::updateUserStats($userId);
            sleep(1);
        }
    }
}