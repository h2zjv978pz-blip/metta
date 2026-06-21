<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\TeamMemberRepository;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new TeamMemberRepository();
    }

    public function index()
    {
        $team_members = $this->repo->getTeamMembers();

        return view('backend.team-members.index', compact('team_members'));
    }

    public function create()
    {
        $teams = $this->repo->listTeams();

        return view('backend.team-members.create', compact('teams'));
    }

    public function edit($id)
    {
        $team_member = $this->repo->findTeamMember($id);
        $teams = $this->repo->listTeams();

        return view('backend.team-members.edit', compact('team_member', 'teams'));
    }

    public function store(Request $request)
    {
        $this->repo->storeTeamMember($request);

        return redirect()->route('backend.team-members.index');
    }

    public function update($id, Request $request)
    {
        $this->repo->updateTeamMember($id, $request);

        return redirect()->route('backend.team-members.index');
    }

    public function destroy($id)
    {
        $this->repo->deleteTeamMember($id);

        return redirect()->route('backend.team-members.index');
    }
}
