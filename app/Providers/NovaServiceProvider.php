<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Acme\CalendarFull\CalendarFull;
use Acme\UserOnboarding\UserOnboarding;
use Laravel\Nova\Dashboards\Main;
use Illuminate\Http\Request;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Laravel\Nova\Menu\MenuSection;
use App\Nova\User;
use Laravel\Nova\Events\ServingNova;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::mainMenu(function (Request $request, Menu $menu) {
            return [
                MenuSection::dashboard(Main::class)->icon('chart-bar'),
                MenuSection::make('Customers', [
                    MenuItem::make('User onboarding')->path('/user-onboarding'),
                    MenuItem::make('Calendar Full')->path('/calendar-full')
                ])->icon('user')->collapsable(),
            ];
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new CalendarFull,
            new UserOnboarding
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
