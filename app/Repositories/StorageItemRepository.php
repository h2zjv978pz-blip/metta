<?php

namespace App\Repositories;

use App\Models\StorageItem;
use App\Traits\ImageHandler;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class StorageItemRepository
{
    use ImageHandler;

    public function findProjectCategory($id)
    {
        return StorageItem::ofType('project_category')
            ->whereId($id)
            ->first();
    }

    public function getProjectCategories()
    {
        return StorageItem::ofType('project_category')
            ->orderByRaw("props->>'$.name'")
            ->get();
    }

    public function findProject($id)
    {
        return StorageItem::ofType('project')
            ->whereId($id)
            ->first();
    }

    public function getProjects($request)
    {
        $projects = StorageItem::ofType('project');

        if (!empty($request->project_category)) {
            $projects->where('parent_id', $request->project_category);
        }

        return $projects->get();
    }

    public function findHomeSlide($id)
    {
        return StorageItem::ofType('home_slides')
            ->whereId($id)
            ->first();
    }

    public function getHomeSlides()
    {
        return StorageItem::ofType('home_slides')
            ->get();
    }

    public function storeHomeSlide($request)
    {
        $imageName = $this->saveImage($request, 'slide_image', 'home_slide');

        $hs = new StorageItem();
        $hs->type = 'home_slides';

        $props = [
            'image'     => $imageName,
            'title'     => $request->title ?? null,
            'link'      => $request->link ?? null,
        ];

        $hs->setProps($props);
        $hs->save();
    }

    public function updateHomeSlide($id, $request)
    {
        $hs = $this->findHomeSlide($id);

        if ($request->file('slide_image')) {
            $imageName = $this->saveImage($request, 'slide_image', 'home_slide');
            $this->deleteImageIfExists($hs->prop('image'));
        }


        $props = [
            'image'     => $imageName ?? $hs->prop('image', null),
            'title'     => $request->title ?? null,
            'link'      => $request->link ?? null,
        ];

        $hs->setProps($props);
        $hs->save();
    }

    public function deleteHomeSlide($id)
    {
        $hs = $this->findHomeSlide($id);

        if (!empty($hs)) {
            $this->deleteImageIfExists($hs->prop('image'));
            $hs->delete();
        }
    }

    public function getHomeHighlights()
    {
        return StorageItem::ofType('home_highlights')
            ->first();
    }

    public function saveHomeHighlights($request)
    {
        $ac = StorageItem::ofType('home_highlights')->first();

        if (empty($ac)) {
            $ac = new StorageItem();
            $ac->type = 'home_highlights';
        }

        $props = [];

        foreach ($request->highlights as $key => $val) {
            $props[$key] = $val;
        }

        $ac->setProps($props);
        $ac->save();
    }

    public function findClient($id)
    {
        return StorageItem::ofType('clients')->where('id', $id)->first();
    }

    public function getClients()
    {
        return StorageItem::ofType('clients')
            ->get();
    }

    public function storeClient($request)
    {
        $client = new StorageItem();
        $client->type = 'clients';

        $logo = $this->saveImage($request, 'logo', 'client');


        $client->setProps([
            'name'  => $request->name,
            'logo'  => $logo
        ]);
        $client->save();
    }

    public function updateClient($id, $request)
    {
        $client = $this->findClient($id);

        if (!empty($request->file('logo'))) {
            $logo = $this->saveImage($request, 'logo', 'client');

            if ($client->prop('logo')) {
                $this->deleteImageIfExists($client->prop('logo'));
            }
        }

        $client->setProps([
            'name'  => $request->name,
            'logo'  => $logo ?? $client->prop('logo')
        ]);
        $client->save();
    }

    public function deleteClient($id)
    {
        $client = $this->findClient($id);

        if (!empty($client)) {
            $this->deleteImageIfExists($client->prop('logo'));
            $client->delete();
        }
    }

    public function findTestimonial($id)
    {
        return StorageItem::ofType('testimonials')
            ->whereId($id)
            ->first();
    }

    public function getTestimonials()
    {
        return StorageItem::ofType('testimonials')
            ->get();
    }

    public function storeTestimonial($request)
    {
        if (!empty($request->file('photo'))) {
            $photo = $this->saveImage($request, 'photo', 'tp');
        }

        $testimonial = new StorageItem();
        $testimonial->type = 'testimonials';
        $testimonial->setProps([
            'person'        => $request->person,
            'designation'   => $request->designation,
            'testimonial'   => $request->testimonial,
            'photo'         => $photo ?? null,
        ]);
        $testimonial->save();
    }

    public function updateTestimonial($id, $request)
    {
        $testimonial = $this->findTestimonial($id);

        if (!empty($request->file('photo'))) {
            $photo = $this->saveImage($request, 'photo', 'tp');
            $this->deleteImageIfExists($testimonial->prop('photo'));
        }

        $testimonial->setProps([
            'person'        => $request->person,
            'designation'   => $request->designation,
            'testimonial'   => $request->testimonial,
            'photo'         => $photo ?? $testimonial->prop('photo', null),
        ]);
        $testimonial->save();
    }

    public function deleteTestimonial(mixed $id)
    {
        $testimonial = $this->findTestimonial($id);

        if (!empty($testimonial)) {
            $this->deleteImageIfExists($testimonial->prop('photo'));
            $testimonial->delete();
        }
    }

    public function getContactInfo()
    {
        return StorageItem::ofType('contact_info')->first();
    }

    public function saveContactInfo($request)
    {
        $ci = StorageItem::firstOrNew([
            'type'  => 'contact_info'
        ]);

        $props = [];

        foreach ($request->contact_info as $key => $val) {
            $props[$key] = !empty($val) ? $val : null;
        }

        $ci->setProps($props);
        $ci->save();
    }

    public function getSocialLinks()
    {
        return StorageItem::ofType('social_links')->first();
    }

    public function saveSocialLinks($request)
    {
        $ci = StorageItem::firstOrNew([
            'type'  => 'social_links'
        ]);

        $props = [];

        foreach ($request->social_links as $key => $val) {
            $props[$key] = !empty($val) ? $val : null;

            if (!empty($props[$key])) {
                if ($key == 'sLinkWhatsapp' && !Str::contains($props[$key], 'wa.me')) {
                    $props[$key] = 'https://wa.me/' . $props[$key];
                }
            }
        }

        $ci->setProps($props);
        $ci->save();
    }

    public function getDonationInfo()
    {
        return StorageItem::ofType('donation_info')->first();
    }

    public function saveDonationInfo($request)
    {
        $ci = StorageItem::firstOrNew([
            'type'  => 'donation_info'
        ]);

        $props = [];

        foreach ($request->donation_info as $key => $val) {
            $props[$key] = !empty($val) ? $val : null;
        }

        $ci->setProps($props);
        $ci->save();
    }

    public function getMenuSettings()
    {
        return StorageItem::ofType('menu_settings')->first();
    }

    public function saveMenuSettings($request)
    {
        $ms = StorageItem::firstOrNew([
            'type'  => 'menu_settings'
        ]);

        $logoDesktop = $ms->prop('logo_desktop');
        $logoMobile  = $ms->prop('logo_mobile');

        if ($request->file('logo_desktop')) {
            $this->deleteImageIfExists($logoDesktop);
            $logoDesktop = $this->saveImage($request, 'logo_desktop', 'menu_logo_desktop');
        }

        if ($request->file('logo_mobile')) {
            $this->deleteImageIfExists($logoMobile);
            $logoMobile = $this->saveImage($request, 'logo_mobile', 'menu_logo_mobile');
        }

        $ms->setProps([
            'logo_desktop'          => $logoDesktop,
            'logo_mobile'           => $logoMobile,
            'logo_desktop_width'    => !empty($request->logo_desktop_width) ? (int) $request->logo_desktop_width : null,
            'logo_mobile_width'     => !empty($request->logo_mobile_width) ? (int) $request->logo_mobile_width : null,
        ]);
        $ms->save();
    }

    public function getMenuOrder()
    {
        $mo = StorageItem::ofType('menu_order')->first();

        return $mo?->prop('order') ?: ['home', 'buddhist_sites', 'teachings', 'video', 'about', 'library', 'research', 'kids_corner', 'donate', 'contact'];
    }

    public function saveMenuOrder($request)
    {
        $mo = StorageItem::firstOrNew([
            'type'  => 'menu_order'
        ]);

        $mo->setProps([
            'order' => array_values(array_filter(explode(',', $request->menu_order ?? ''))),
        ]);
        $mo->save();
    }
}
