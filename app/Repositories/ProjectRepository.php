<?php

namespace App\Repositories;

use App\Models\StorageItem;
use App\Traits\ImageHandler;

class ProjectRepository
{
    use ImageHandler;

    public function findProject($id)
    {
        return StorageItem::ofType('projects')
            ->whereId($id)
            ->first();
    }

    public function getProjects($request = null)
    {
        $projects = StorageItem::ofType('projects');

        if (!empty($request->project_category_id)) {
            $projects->where('parent_id', $request->project_category_id);
        }

        return $projects->orderByDesc('sort')
        ->with('parent')
        ->get();
    }

    public function storeProject($request)
    {
        $project = $this->createStorageItem('projects');
        $project->parent_id = $request->category;

        $feature_image = $this->saveImage($request, 'feature_image', "proj_fi");

        if (!empty($request->file('gallery_images'))) {
            $gallery_images = [];

            foreach ($request->img_sort_orders as $sl) {
                $gallery_images[] = $this->saveImage($request, null, 'proj_gi', $request->file('gallery_images')[$sl]);
            }
        }
        elseif (!empty($request->file('video'))) {
            $video = $this->saveVideo($request, 'video', 'proj_vid');
        }

        $project->setProps([
            'name'              => $request->name,
            'category'          => intval($request->category),
            'type'              => $request->type,
            'client'            => $request->client,
            'location'          => $request->location,
            'time'              => $request->time,
            'description'       => $request->description,
            'feature_image'     => $feature_image ?? null,
            'gallery_images'    => $gallery_images ?? null,
            'video'             => $video ?? null,
        ]);
        $project->save();
    }

    public function updateProject($id, $request)
    {
        $project = $this->findProject($id);
        $project->parent_id = $request->category;

        if ($project->prop('gallery_images')) {
            $curr_gallery_images = $request->curr_gallery_images ?? [];
            $discarded_gallery_images = array_diff($project->prop('gallery_images'), $curr_gallery_images); //dd($discarded_gallery_images);

            foreach ($discarded_gallery_images as $discarded_gallery_image) {
                $this->deleteImageIfExists($discarded_gallery_image);
            }
        }

        if (!empty($request->file('new_gallery_images'))) {
            $new_gallery_images = $this->saveBatchImages($request, 'new_gallery_images', 'proj_gi');
        }
        elseif (!empty($request->file('video'))) {
            $this->deleteVideoIfExists($project->prop('video'));
            $video = $this->saveVideo($request, 'video', 'proj_vid');
        }

        $gallery_images = array_merge($curr_gallery_images ?? [], $new_gallery_images ?? []);

        if (!empty($request->file('feature_image'))) {
            $feature_image = $this->saveImage($request, 'feature_image', "proj_fi");
            $this->deleteImageIfExists($project->prop('feature_image'));
        }

        $project->setProps([
            'name'              => $request->name,
            'category'          => intval($request->category),
            'client'            => $request->client,
            'location'          => $request->location,
            'time'              => $request->time,
            'description'       => $request->description,
            'feature_image'     => $feature_image ?? $project->prop('feature_image'),
            'gallery_images'    => $gallery_images,
            'video'             => $video ?? $project->prop('video'),
        ]);
        $project->save();
    }

    public function deleteProject($id)
    {
        $project = $this->findProject($id);

        if (!empty($project)) {
            $this->deleteImageIfExists($project->prop('feature_image'));

            if (!empty($project->prop('gallery_images'))) {
                foreach ($project->prop('gallery_images') as $gallery_image) {
                    $this->deleteImageIfExists($gallery_image);
                }
            }

            $project->delete();
        }
    }

    private function createStorageItem($type)
    {
        $si = new StorageItem();
        $si->type = $type;

        return $si;
    }

    public function sortProjects($request)
    {
        $count = count($request->sort_orders);

        foreach ($request->sort_orders as $i => $project_id) {
            $project = $this->findProject($project_id);
            $project->sort = $count - $i;
            $project->save();
        }
    }
}
