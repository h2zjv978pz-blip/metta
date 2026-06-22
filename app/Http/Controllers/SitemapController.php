<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepository;
use App\Repositories\BuddhistSiteRepository;
use App\Repositories\TeachingRepository;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = Cache::remember('sitemap-urls', 3600, function () {
            $urls = [];
            $locales = ['en', 'bn'];

            $staticRoutes = [
                'home', 'about-us', 'buddhist-sites.index', 'teachings.index', 'blogs.index',
                'library.index', 'library.books', 'library.videos', 'library.audios',
                'library.image-gallery', 'kids-corner.show', 'donate', 'contact-us',
            ];

            foreach ($locales as $locale) {
                foreach ($staticRoutes as $routeName) {
                    $urls[] = ['url' => route($routeName, ['locale' => $locale]), 'priority' => $routeName === 'home' ? '1.0' : '0.7'];
                }
            }

            $buddhistSiteRepo = new BuddhistSiteRepository();
            foreach ($buddhistSiteRepo->getBuddhistSites() as $site) {
                foreach ($locales as $locale) {
                    $urls[] = ['url' => route('buddhist-sites.show', ['locale' => $locale, 'buddhist_site' => $site->slug ?? $site->id]), 'priority' => '0.8'];
                }
            }

            $teachingRepo = new TeachingRepository();
            foreach ($teachingRepo->getTeachings() as $teaching) {
                $teachingSlug = \Illuminate\Support\Str::slug($teaching->props['title'] ?? '') ?: $teaching->id;
                foreach ($locales as $locale) {
                    $urls[] = ['url' => route('teachings.show', ['locale' => $locale, 'teaching' => $teachingSlug]), 'priority' => '0.6'];
                }
            }

            $blogRepo = new BlogRepository();
            foreach ($blogRepo->getBlogs() as $blog) {
                $blogSlug = \Illuminate\Support\Str::slug($blog->props['title'] ?? '') ?: $blog->id;
                foreach ($locales as $locale) {
                    $urls[] = ['url' => route('blogs.show', ['locale' => $locale, 'blog' => $blogSlug]), 'priority' => '0.6'];
                }
            }

            return $urls;
        });

        return response()
            ->view('sitemap', compact('urls'))
            ->header('Content-Type', 'text/xml');
    }
}
