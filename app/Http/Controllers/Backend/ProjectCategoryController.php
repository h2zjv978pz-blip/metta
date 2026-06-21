<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\ProjectCategoryRepository;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new ProjectCategoryRepository();
    }

    public function index()
    {
        $categories = $this->repo->getProjectCategories();

        return view('backend.project-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.project-categories.create');
    }

    public function store(Request $request)
    {
        $this->repo->storeProjectCategory($request);

        return redirect()->route('backend.project-categories.index');
    }

    public function edit($id)
    {
        $category = $this->repo->findProjectCategory($id);

        return view('backend.project-categories.edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        $this->repo->updateProjectCategory($id, $request);

        return redirect()->route('backend.project-categories.index');
    }

    public function destroy($id)
    {
        $this->repo->deleteProjectCategory($id);

        return redirect()->route('backend.project-categories.index');
    }
}
