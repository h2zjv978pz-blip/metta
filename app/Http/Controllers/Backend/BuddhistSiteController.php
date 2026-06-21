<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
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
        $buddhist_sites = $this->repo->getBuddhistSites($request);

        return view('backend.buddhist-sites.index', compact('buddhist_sites'));
    }

    public function create()
    {
        $countries = Country::orderBy('iso')->pluck('nicename', 'id');

        return view('backend.buddhist-sites.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $this->repo->storeBuddhistSite($request);

        return redirect()->route('backend.buddhist-sites.index');
    }

    public function edit($id)
    {
        $countries = Country::orderBy('iso')->pluck('nicename', 'id');
        $buddhist_site = $this->repo->findBuddhistSite($id);

        return view('backend.buddhist-sites.edit', compact('countries', 'buddhist_site'));
    }

    public function update(Request $request, $id)
    {
        $this->repo->updateBuddhistSite($id, $request);

        return redirect()->route('backend.buddhist-sites.index');
    }

    public function destroy($id)
    {
        $this->repo->deleteBuddhistSite($id);

        return redirect()->route('backend.buddhist-sites.index');
    }
}
