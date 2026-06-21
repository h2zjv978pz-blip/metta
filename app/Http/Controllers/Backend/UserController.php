<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $users = $this->repo->getUsers($request);

        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(Request $request)
    {
        $this->repo->store($request);

        return redirect()->route('backend.users.index');
    }

    public function edit($id)
    {
        $user = $this->repo->find($id);

        return view('backend.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->repo->update($id, $request);

        return redirect()->route('backend.users.index');
    }

    public function destroy($id)
    {
        $this->repo->destroy($id);

        return redirect()->route('backend.users.index');
    }
}
