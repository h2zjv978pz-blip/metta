<?php

namespace App\Repositories;

use App\Helpers\Utils;
use App\Models\BuddhistSite;
use App\Models\Country;
use App\Models\StorageItem;
use App\Traits\ImageHandler;

class BuddhistSiteRepository
{
    use ImageHandler;

    public function findBuddhistSite($id)
    {
        return BuddhistSite::find($id);
    }

    public function getBuddhistSites($request = null)
    {
        $buddhist_sites = BuddhistSite::query();

        if (!empty($request->search)) {
            $buddhist_sites->where('name', 'LIKE', "%{$request->search}%");
        }

        return $buddhist_sites->orderByDesc('id')
            ->with('country')
            ->get();
    }

    public function listCountries()
    {
        $country_ids = BuddhistSite::selectRaw("DISTINCT country_id as country_id")->pluck('country_id');

        return Country::whereIn('id', $country_ids)->get();
    }

    public function storeBuddhistSite($request)
    {
        $buddhist_site = new BuddhistSite();
        $this->mapFields($buddhist_site, $request);

        $buddhist_site->feature_image = $this->saveImage($request, 'feature_image', "b_site_fi");

        if (!empty($request->file('gallery_images'))) {
            $gallery_images = [];

            foreach ($request->gallery_images_sort_orders as $sl) {
                $gallery_images[] = $this->saveImage($request, null, 'b_site_gi', $request->file('gallery_images')[$sl]);
            }
        }
        if (!empty($request->file('arch_images'))) {
            $arch_images = [];

            foreach ($request->file('arch_images') as $sl) {
                $arch_images[] = $this->saveImage($request, null, 'b_site_ai', $sl);
            }
        }
        if (!empty($request->file('video'))) {
            $video = $this->saveVideo($request, 'video', 'b_site_vid');
        }

        $buddhist_site->setJson('media', [
            'gallery_images'    => $gallery_images ?? null,
            'arch_images'       => $arch_images ?? null,
            'video'             => $video ?? null,
        ]);

        $buddhist_site->save();
    }

    public function updateBuddhistSite($id, $request)
    {
        $buddhist_site = $this->findBuddhistSite($id);
        $this->mapFields($buddhist_site, $request);

        if (!empty($request->file('feature_image'))) {
            $buddhist_site->feature_image = $this->saveImage($request, 'feature_image', "b_site_fi");
            $this->deleteImageIfExists($buddhist_site->feature_image);
        }

        if ($buddhist_site->getJson('media', 'gallery_images')) {
            $curr_gallery_images = $request->curr_gallery_images ?? [];
            $discarded_gallery_images = array_diff($buddhist_site->getJson('media', 'gallery_images'), $curr_gallery_images);

            foreach ($discarded_gallery_images as $discarded_gallery_image) {
                $this->deleteImageIfExists($discarded_gallery_image);
            }
        }

        if (!empty($request->file('new_gallery_images'))) {
            $new_gallery_images = $this->saveBatchImages($request, 'new_gallery_images', 'b_site_gi');
        }

        $gallery_images = array_merge($curr_gallery_images ?? [], $new_gallery_images ?? []);

        if ($buddhist_site->getJson('media', 'arch_images')) {
            $curr_arch_images = $request->curr_arch_images ?? [];
            $discarded_arch_images = array_diff($buddhist_site->getJson('media', 'arch_images'), $curr_arch_images);

            foreach ($discarded_arch_images as $discarded_arch_image) {
                $this->deleteImageIfExists($discarded_arch_image);
            }
        }

        if (!empty($request->file('new_arch_images'))) {
            $new_arch_images = $this->saveBatchImages($request, 'new_arch_images', 'b_site_ai');
        }

        $arch_images = array_merge($curr_arch_images ?? [], $new_arch_images ?? []);

        if (!empty($request->file('video'))) {
            $this->deleteVideoIfExists($buddhist_site->getJson('media', 'video'));
            $video = $this->saveVideo($request, 'video', 'b_site_vid');
        }

        $buddhist_site->setJson('media', [
            'gallery_images'    => $gallery_images,
            'arch_images'       => $arch_images,
            'video'             => $video ?? $buddhist_site->getJson('media', 'video', null),
        ]);

        $buddhist_site->save();
    }

    public function deleteBuddhistSite($id)
    {
        $buddhist_site = $this->findBuddhistSite($id);

        if (!empty($buddhist_site)) {
            $this->deleteImageIfExists($buddhist_site->feature_image);
            $this->deleteVideoIfExists($buddhist_site->getJson('media', 'video'));

            if (!empty($buddhist_site->getJson('media', 'gallery_images'))) {
                foreach ($buddhist_site->getJson('media', 'gallery_images') as $gallery_image) {
                    $this->deleteImageIfExists($gallery_image);
                }
            }
            if (!empty($buddhist_site->getJson('media', 'arch_images'))) {
                foreach ($buddhist_site->getJson('media', 'arch_images') as $arch_image) {
                    $this->deleteImageIfExists($arch_image);
                }
            }

            $buddhist_site->delete();
        }
    }

    private function createStorageItem($type)
    {
        $si = new StorageItem();
        $si->type = $type;

        return $si;
    }

    public function sortBuddhistSites($request)
    {
        $count = count($request->sort_orders);

        foreach ($request->sort_orders as $i => $project_id) {
            $project = $this->findBuddhistSite($project_id);
            $project->sort = $count - $i;
            $project->save();
        }
    }

    private function mapFields(&$buddhist_site, $request)
    {
        $buddhist_site->name            = $request->name;
        $buddhist_site->country_id      = $request->country_id;
        $buddhist_site->location_name   = $request->location_name;
        $buddhist_site->map_location    = Utils::extractMapEmbedLink($request->map_location ?? '');

        $buddhist_site->setJson('description', [
            'name_bn'           => $request->name_bn ?? null,
            'intro'             => $request->intro,
            'intro_bn'          => $request->intro_bn ?? null,
            'history'           => $request->history,
            'history_bn'        => $request->history_bn ?? null,
            'architecture'      => $request->architecture ?? null,
            'architecture_bn'   => $request->architecture_bn ?? null,
            'how_to_go'         => $request->how_to_go ?? null,
            'how_to_go_bn'      => $request->how_to_go_bn ?? null,
            'where_to_stay'     => $request->where_to_stay ?? null,
            'where_to_stay_bn'  => $request->where_to_stay_bn ?? null,
            'location_name_bn'  => $request->location_name_bn ?? null,
        ]);
    }
}
