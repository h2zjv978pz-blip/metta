<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function find($id)
    {
        return User::find($id);
    }

    public function getUsers($request)
    {
        $users = User::query();

        if (!empty($request->level)) {
            $users = $users->where('level', $request->level);
        }

        return $users->get();
    }

    public function store($request)
    {
        $user = new User();
        $user->username     = $request->username;
        $user->name         = $request->name;
        $user->level        = $request->level ?? 1000;
        $user->password     = bcrypt($request->password);
        $user->save();
    }

    public function update($id, $request)
    {
        $user = $this->find($id);

        $user->username     = $request->username;
        $user->name         = $request->name;
        $user->level        = $request->level ?? 1000;

        if (!empty($request->password)) {
            $user->password         = bcrypt($request->password);
            $user->remember_token   = null;
        }

        $user->save();
    }

    public function destroy($id)
    {
        $user = $this->find($id);
        $user->delete();
    }
}
