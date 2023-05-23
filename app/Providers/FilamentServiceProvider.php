<?php

namespace App\Providers;

use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource;
use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource;
use App\Filament\Resources\GameResource;
use App\Filament\Resources\MiniGameResource;
use App\Filament\Resources\PartnershipResource;
use App\Filament\Resources\PostCategoryResource;
use App\Filament\Resources\PostResource;
use App\Filament\Resources\SliderResource;
use App\Filament\Resources\TeamResource;
use App\Filament\Resources\TournamentResource;
use App\Filament\Resources\UserResource;
use App\Filament\Resources\VideoCategoryResource;
use App\Filament\Resources\VideoResource;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {

            // Using Laravel Mix
            Filament::registerTheme(
                mix('css/filament.css'),
            );
        });
    }
}
