<?php

namespace App\Http\Controllers;

use App\Models\StorageItem;
use App\Repositories\BuddhistSiteRepository;
use App\Repositories\StorageItemRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new StorageItemRepository();
    }

    public function getHomePage()
    {
        $data['homeSlides']         = $this->repo->getHomeSlides();
        $data['homeHighlights']     = $this->repo->getHomeHighlights();
        $data['buddhistSites']      = (new BuddhistSiteRepository())->getBuddhistSites();

        return view('frontend.home', compact('data'));
    }

    public function getSearch(Request $request)
    {
        if (empty($request->search)) {
            return redirect()->back();
        }

        $results = [];

        $buddhist_sites = (new BuddhistSiteRepository())->getBuddhistSites($request);

        if (!empty($buddhist_sites)) {
            $results = $buddhist_sites->map(function ($site) {
                return [
                    'entity'        => 'Buddhist Site',
                    'id'            => $site->id,
                    'name'          => $site->name,
                    'url'           => route('buddhist-sites.show', $site->id),
                    'short_desc'    => Str::limit($site->getJson('description', 'intro'), 300),
                ];
            });
        }

        $storage_items = StorageItem::whereRaw("LOWER(props->'$.title') LIKE LOWER(?)", ["%{$request->search}%"])
            ->whereIn('type', ['blogs', 'teachings'])
            ->limit(50)
            ->get();

        if (!empty($storage_items)) {
            $results = $results->concat($storage_items->map(function ($item) {
                $res = [
                    'id'            => $item->id,
                    'name'          => $item->prop('title'),
                    'short_desc'    => Str::limit(strip_tags($item->prop('body', '')), 300),
                ];

                switch ($item->type) {
                    case 'blogs':
                        $res['entity'] = 'Research & Publication';
                        $res['url'] = route('blogs.show', $item->id);
                        break;

                    case 'teachings':
                        $res['entity'] = 'Teachings';
                        $res['url'] = route('teachings.show', $item->id);
                }

                return $res;
            }));
        }

        return view('frontend.search', compact('results'));
    }

    public function getAboutUsPage()
    {
        $data['aboutUs'] = $this->repo->getAboutUs();

        return view('frontend.about-us', compact('data'));
    }
}
