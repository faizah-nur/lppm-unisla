<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\StatsOverviewWidget;
use App\Filament\Widgets\WelcomeAdminWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->brandName('Litbang Pemas UNISLA')
            ->brandLogo(fn () => asset('img/logo litbang pemas.png'))
            ->darkModeBrandLogo(fn () => asset('img/logo litbang pemas.png'))
            ->brandLogoHeight('2.75rem')
            ->favicon(fn () => asset('img/logounisla.png'))
            ->homeUrl('/')
            ->login()
            ->colors([
                'primary' => Color::Emerald,
                'accent' => Color::Amber,
                'secondary' => Color::Amber,
                'success' => Color::Emerald,
                'warning' => Color::Amber,
                'danger' => Color::Rose,
                'info' => Color::Sky,
                'gray' => Color::Slate,
            ])
            ->font('Plus Jakarta Sans')
            ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('17.5rem')
            ->collapsedSidebarWidth('4.5rem')
            ->navigationGroups([
                NavigationGroup::make('Profil Lembaga')->icon('heroicon-o-building-office-2'),
                NavigationGroup::make('Penelitian & Pengabdian')->icon('heroicon-o-academic-cap'),
                NavigationGroup::make('Publikasi & KI')->icon('heroicon-o-book-open'),
                NavigationGroup::make('Inovasi & Hilirisasi')->icon('heroicon-o-cube'),
                NavigationGroup::make('KKN')->icon('heroicon-o-user-group'),
                NavigationGroup::make('Kegiatan & Agenda')->icon('heroicon-o-calendar-days'),
                NavigationGroup::make('Konten Web')->icon('heroicon-o-window'),
            ])
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn () => view('filament.custom-styles'),
            )
            ->renderHook(
                PanelsRenderHook::TOPBAR_START,
                fn () => view('filament.custom-topbar'),
            )
            ->renderHook(
                PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE,
                fn () => view('filament.custom-login-header'),
            )
            ->renderHook(
                PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
                fn () => view('filament.custom-login-footer'),
            )
            ->renderHook(
                PanelsRenderHook::FOOTER,
                fn () => view('filament.custom-footer'),
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                WelcomeAdminWidget::class,
                StatsOverviewWidget::class,
                Widgets\AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
