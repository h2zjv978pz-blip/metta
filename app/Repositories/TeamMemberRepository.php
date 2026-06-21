<?php

namespace App\Repositories;

use App\Models\StorageItem;
use App\Traits\ImageHandler;

class TeamMemberRepository
{
    use ImageHandler;

    public function listTeams()
    {
        return ['Directorial & Advisory', 'Structural & Designer', 'Architectural Designer'];
    }

    public function listSocialPlatforms()
    {
        return ['Facebook', 'Behance', 'Pinterest', 'Whatsapp'];
    }

    public function findTeamMember($id)
    {
        return StorageItem::ofType('team_members')
            ->whereId($id)
            ->first();
    }

    public function getTeamMembers()
    {
        return StorageItem::ofType('team_members')
            ->get();
    }

    public function getTeamMembersGrouped()
    {
        $members = $this->getTeamMembers();
        $tmp_teams = $teams = [];

        foreach ($members as $member) {
            $tmp_teams[$member->prop('team')][] = $member;
        }

        foreach ($this->listTeams() as $team) {
            if (!isset($tmp_teams[$team])) continue;

            $teams[$team] = $tmp_teams[$team];
        }

        return $teams;
    }

    public function storeTeamMember($request)
    {
        $tm = new StorageItem();
        $tm->type = 'team_members';

        if (!empty($request->file('photo'))) {
            $photo = $this->saveImage($request, 'photo', 'tm');
        }

        $social_links = [];

        if (!empty($request->social_links)) {
            foreach ($request->social_links as $sm => $link) {
                if (empty($link)) continue;

                $social_links[$sm] = $link;
            }
        }

        $tm->setProps([
            'name'              => $request->name,
            'team'              => $request->team,
            'designation'       => $request->designation,
            'qualification_l1'  => $request->qualification_l1,
            'qualification_l2'  => $request->qualification_l2,
            'photo'             => $photo ?? null,
            'social_links'      => $social_links
        ]);
        $tm->save();
    }

    public function updateTeamMember($id, $request)
    {
        $tm = $this->findTeamMember($id);

        if (!empty($request->file('photo'))) {
            $this->deleteImageIfExists($tm->prop('photo'));
            $photo = $this->saveImage($request, 'photo', 'tm');
        }

        $social_links = [];

        if (!empty($request->social_links)) {
            foreach ($request->social_links as $sm => $link) {
                if (empty($link)) continue;

                $social_links[$sm] = $link;
            }
        }

        $tm->setProps([
            'name'              => $request->name,
            'team'              => $request->team,
            'designation'       => $request->designation,
            'qualification_l1'  => $request->qualification_l1,
            'qualification_l2'  => $request->qualification_l2,
            'photo'             => $photo ?? $tm->prop('photo'),
            'social_links'      => $social_links
        ]);
        $tm->save();
    }

    public function deleteTeamMember($id)
    {
        $tm = $this->findTeamMember($id);

        if (!empty($tm)) {
            $this->deleteImageIfExists($tm->prop('photo'));
            $tm->delete();
        }
    }
}
