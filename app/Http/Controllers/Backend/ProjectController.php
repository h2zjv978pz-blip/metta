<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new ProjectRepository();
    }

    public function index(Request $request)
    {
        $projects = $this->repo->getProjects($request);

        return view('backend.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = (new ProjectCategoryRepository())->listProjectCategories();

        return view('backend.projects.create', compact('categories'));
    }

    public function edit($id)
    {
        $project = $this->repo->findProject($id);
        $categories = (new ProjectCategoryRepository())->listProjectCategories();

        return view('backend.projects.edit', compact('project', 'categories'));
    }

    public function store(Request $request)
    {
        $this->repo->storeProject($request);

        return redirect()->route('backend.projects.index');
    }

    public function update($id, Request $request)
    {
        $this->repo->updateProject($id, $request);

        return redirect()->route('backend.projects.index');
    }

    public function destroy($id)
    {
        $this->repo->deleteProject($id);

        return redirect()->route('backend.projects.index');
    }

    public function sort(Request $request)
    {
        $this->repo->sortProjects($request);

        return redirect()->route('backend.projects.index');
    }
}
