<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class UserWelcomeWidget extends Widget
{
    protected string $view = 'filament.widgets.user-welcome-widget';

    protected int|string|array $columnSpan = 1;

    public function getUserName(): string
    {
        return auth()->user()?->name ?? 'User';
    }

    public function getUserRole(): string
    {
        return auth()->user()?->role?->name ?? 'No Role';
    }

    public function getUserInitial(): string
    {
        return strtoupper(substr($this->getUserName(), 0, 1));
    }
}