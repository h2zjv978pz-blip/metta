<?php

namespace App\Repositories;

use App\Models\StorageItem;

class ProjectCategoryRepository
{
    public function findProjectCategory($id)
    {
        return StorageItem::ofType('project_categories')
            ->whereId($id)
            ->first();
    }

    public function getProjectCategories()
    {
        return StorageItem::ofType('project_categories')
            ->orderByRaw("props->>'$.name'")
            ->withCount('children')
            ->get();
    }

    public function listProjectCategories()
    {
        return StorageItem::ofType('project_categories')
            ->selectRaw("props->>'$.name' as name, id")
            ->orderByRaw('name')
            ->pluck('name', 'id');
    }

    public function storeProjectCategory($request)
    {
        $pc = new StorageItem();
        $pc->type = 'project_categories';
        $pc->setProps([
            'name'      => $request->name,
            'name_bn'   => $request->name_bn ?? null,
        ]);
        $pc->save();
    }

    public function updateProjectCategory($id, $request)
    {
        $pc = $this->findProjectCategory($id);
        $pc->setProps([
            'name'      => $request->name ?? $pc->prop('name'),
            'name_bn'   => $request->name_bn ?? null,
        ]);
        $pc->save();
    }

    public function deleteProjectCategory($id)
    {
        $pc = $this->findProjectCategory($id);

        if (!empty($pc)) {
            $pc->delete();
        }
    }
}
