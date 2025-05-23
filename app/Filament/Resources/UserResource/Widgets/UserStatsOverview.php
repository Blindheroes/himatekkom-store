<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalUsers = \App\Models\User::count();
        $activeUsers = \App\Models\User::where('member_status', true)->count();
        $inactiveUsers = \App\Models\User::where('member_status', false)->count();
        $waitingToBeApproved = \App\Models\User::where('member_id_approved', false)
            ->where('member_status', true)
            ->count();
        return [
            Stat::make('Total Users', $totalUsers)
                ->color('primary'),
            Stat::make('Active Users', $activeUsers)
                ->color('success'),
            Stat::make('Inactive Users', $inactiveUsers)
                ->color('danger'),
            Stat::make('Waiting to be approved', $waitingToBeApproved)
                ->color('warning'),
        ];
    }
}
