<?php

namespace App\Providers;

use App\Repositories\StorageItemRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $repo = new StorageItemRepository();
        $gData['contactInfo']   = $repo->getContactInfo();
        $gData['socialLinks']   = $repo->getSocialLinks();
        $gData['menuSettings']  = $repo->getMenuSettings();
        $gData['menuOrder']     = $repo->getMenuOrder();
        $gData['homeSectionOrder'] = $repo->getHomeSectionOrder();
        $gData['buddhistSitesDisplay'] = $repo->getBuddhistSitesDisplay();
        $gData['splashScreen'] = $repo->getSplashScreen();
        $gData['quickLinks']   = $repo->getQuickLinks();
        $gData['zenMusic']     = $repo->getZenMusic();
        $gData['heroSettings'] = $repo->getHeroSettings();

        View::share('gData', $gData);
    }
}
