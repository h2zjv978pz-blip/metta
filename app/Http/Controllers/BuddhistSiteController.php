<?php

namespace App\Http\Controllers;

use App\Repositories\BuddhistSiteRepository;
use Illuminate\Http\Request;

class BuddhistSiteController extends Controller
{
    private $repo;

    public function __construct(BuddhistSiteRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $countries = $this->repo->listCountries();
        $buddhist_sites = $this->repo->getBuddhistSites($request);

        return view('frontend.buddhist-sites.index', compact('countries', 'buddhist_sites'));
    }

    public function show($locale, $id)
    {
        if (ctype_digit((string) $id)) {
            $buddhist_site = $this->repo->findBuddhistSite($id);

            if ($buddhist_site && $buddhist_site->slug) {
                return redirect()->route('buddhist-sites.show', ['locale' => $locale, 'buddhist_site' => $buddhist_site->slug], 301);
            }
        } else {
            $buddhist_site = $this->repo->findBuddhistSiteBySlug($id);
        }

        abort_unless($buddhist_site, 404);

        return view('frontend.buddhist-sites.show', compact('buddhist_site'));
    }
}
