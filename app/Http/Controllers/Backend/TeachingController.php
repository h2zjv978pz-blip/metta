<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\TeachingRepository;
use Illuminate\Http\Request;

class TeachingController extends Controller
{
    public function __construct(TeachingRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $teachings = $this->repo->getTeachings($request);

        return view('backend.teachings.index', compact('teachings'));
    }

    public function create()
    {
        return view('backend.teachings.create');
    }

    public function store(Request $request)
    {
        $this->repo->storeTeaching($request);

        return redirect()->route('backend.teachings.index');
    }

    public function edit($id)
    {
        $teaching = $this->repo->findTeaching($id);

        return view('backend.teachings.edit', compact('teaching'));
    }

    public function update(Request $request, $id)
    {
        $this->repo->updateTeaching($id, $request);

        return redirect()->route('backend.teachings.index');
    }

    public function destroy($id)
    {
        $this->repo->deleteTeaching($id);

        return redirect()->route('backend.teachings.index');
    }
}
