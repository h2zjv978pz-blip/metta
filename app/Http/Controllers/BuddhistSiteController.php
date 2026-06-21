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

    public function show($id)
    {
        $buddhist_site = $this->repo->findBuddhistSite($id);

        return view('frontend.buddhist-sites.show', compact('buddhist_site'));
    }
}
