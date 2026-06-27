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
            'title_bn'  => $request->title_bn ?? null,
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
            'title_bn'  => $request->title_bn ?? null,
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
            'designation_bn' => $request->designation_bn ?? null,
            'testimonial'   => $request->testimonial,
            'testimonial_bn' => $request->testimonial_bn ?? null,
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
            'designation_bn' => $request->designation_bn ?? null,
            'testimonial'   => $request->testimonial,
            'testimonial_bn' => $request->testimonial_bn ?? null,
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

    public function getHomeSectionOrder()
    {
        $so = StorageItem::ofType('home_section_order')->first();

        return $so?->prop('order') ?: ['hero', 'about', 'library', 'buddhist_sites'];
    }

    public function saveHomeSectionOrder($request)
    {
        $so = StorageItem::firstOrNew([
            'type'  => 'home_section_order'
        ]);

        $so->setProps([
            'order' => array_values(array_filter(explode(',', $request->section_order ?? ''))),
        ]);
        $so->save();
    }

    public function getBuddhistSitesDisplay()
    {
        $bs = StorageItem::ofType('buddhist_sites_display')->first();

        return [
            'title_font_size'    => $bs?->prop('title_font_size') ?: 14,
            'location_font_size' => $bs?->prop('location_font_size') ?: 11,
        ];
    }

    public function saveBuddhistSitesDisplay($request)
    {
        $bs = StorageItem::firstOrNew([
            'type'  => 'buddhist_sites_display'
        ]);

        $bs->setProps([
            'title_font_size'    => !empty($request->title_font_size) ? (int) $request->title_font_size : 14,
            'location_font_size' => !empty($request->location_font_size) ? (int) $request->location_font_size : 11,
        ]);
        $bs->save();
    }

    public function getSplashScreen()
    {
        $ss = StorageItem::ofType('splash_screen')->first();

        return [
            'enabled'           => $ss ? (bool) $ss->prop('enabled') : false,
            'logo'              => $ss?->prop('logo'),
            'logo_size'         => $ss?->prop('logo_size') ?: 300,
            'title'             => $ss?->prop('title') ?: 'Metta',
            'tagline'           => $ss?->prop('tagline') ?: "Following in the Buddha's Footsteps",
            'alignment'         => $ss?->prop('alignment') ?: 'center',
            'font_family'       => $ss?->prop('font_family') ?: 'Poppins',
            'title_font_size'   => $ss?->prop('title_font_size') ?: 32,
            'tagline_font_size' => $ss?->prop('tagline_font_size') ?: 16,
        ];
    }

    public function saveSplashScreen($request)
    {
        $ss = StorageItem::firstOrNew([
            'type'  => 'splash_screen'
        ]);

        $logo = $ss->prop('logo');

        if ($request->file('splash_logo')) {
            $this->deleteImageIfExists($logo);
            $logo = $this->saveImage($request, 'splash_logo', 'splash_logo');
        } elseif ($request->boolean('remove_logo')) {
            $this->deleteImageIfExists($logo);
            $logo = null;
        }

        $ss->setProps([
            'enabled'           => $request->boolean('enabled'),
            'logo'              => $logo,
            'logo_size'         => !empty($request->logo_size) ? (int) $request->logo_size : 300,
            'title'             => $request->title ?: 'Metta',
            'tagline'           => $request->tagline ?: "Following in the Buddha's Footsteps",
            'alignment'         => in_array($request->alignment, ['left', 'center', 'right']) ? $request->alignment : 'center',
            'font_family'       => $request->font_family ?: 'Poppins',
            'title_font_size'   => !empty($request->title_font_size) ? (int) $request->title_font_size : 32,
            'tagline_font_size' => !empty($request->tagline_font_size) ? (int) $request->tagline_font_size : 16,
        ]);
        $ss->save();
    }

    public function getQuickLinks()
    {
        $ql = StorageItem::ofType('quick_links')->first();

        return [
            'enabled' => $ql ? (bool) $ql->prop('enabled', true) : true,
            'links'   => $ql?->prop('links') ?: [],
        ];
    }

    public function saveQuickLinks($request)
    {
        $ql = StorageItem::firstOrNew([
            'type'  => 'quick_links'
        ]);

        $links = [];

        foreach ($request->input('links', []) as $link) {
            if (!empty($link['label']) && !empty($link['url'])) {
                $links[] = [
                    'label'    => $link['label'],
                    'label_bn' => $link['label_bn'] ?? '',
                    'url'      => $link['url'],
                ];
            }
        }

        $ql->setProps([
            'enabled' => $request->boolean('enabled'),
            'links'   => $links,
        ]);
        $ql->save();
    }

    public function getZenMusic()
    {
        $zm = StorageItem::ofType('zen_music')->first();

        return [
            'enabled'  => $zm ? (bool) $zm->prop('enabled') : false,
            'file'     => $zm?->prop('file'),
            'label'    => $zm?->prop('label') ?: 'Zen Music',
            'label_bn' => $zm?->prop('label_bn') ?: 'জেন সংগীত',
            'volume'   => $zm?->prop('volume') ?: 0.4,
        ];
    }

    public function saveZenMusic($request)
    {
        $zm = StorageItem::firstOrNew([
            'type'  => 'zen_music'
        ]);

        $file = $zm->prop('file');

        if ($request->file('zen_audio')) {
            $this->deleteAudioIfExists($file);
            $file = $this->saveAudio($request, 'zen_audio', 'zen_music');
        } elseif ($request->boolean('remove_audio')) {
            $this->deleteAudioIfExists($file);
            $file = null;
        }

        $zm->setProps([
            'enabled'  => $request->boolean('enabled'),
            'file'     => $file,
            'label'    => $request->label ?: 'Zen Music',
            'label_bn' => $request->label_bn ?: 'জেন সংগীত',
            'volume'   => !empty($request->volume) ? (float) $request->volume : 0.4,
        ]);
        $zm->save();
    }

    public function saveWhatsAppFloatingEnabled($request)
    {
        $ci = StorageItem::firstOrNew([
            'type'  => 'social_links'
        ]);

        $ci->setProps([
            'whatsapp_floating_enabled' => $request->boolean('whatsapp_floating_enabled'),
        ]);
        $ci->save();
    }

    public function getHeroSettings()
    {
        $hs = StorageItem::ofType('hero_settings')->first();

        return [
            'heading'            => $hs?->prop('heading') ?: 'Metta',
            'heading_bn'         => $hs?->prop('heading_bn') ?: ($hs?->prop('heading') ?: 'Metta'),
            'read_more_label'    => $hs?->prop('read_more_label') ?: 'Read More',
            'read_more_label_bn' => $hs?->prop('read_more_label_bn') ?: 'আরও পড়ুন',
            'read_more_link'     => $hs?->prop('read_more_link') ?: null,
            'mobile_align'       => $hs?->prop('mobile_align') ?: 'center',
        ];
    }

    public function saveHeroSettings($request)
    {
        $hs = StorageItem::firstOrNew([
            'type'  => 'hero_settings'
        ]);

        $hs->setProps([
            'heading'            => $request->heading ?: 'Metta',
            'heading_bn'         => $request->heading_bn ?: null,
            'read_more_label'    => $request->read_more_label ?: 'Read More',
            'read_more_label_bn' => $request->read_more_label_bn ?: null,
            'read_more_link'     => $request->read_more_link ?: null,
            'mobile_align'       => in_array($request->mobile_align, ['left', 'center', 'right']) ? $request->mobile_align : 'center',
        ]);
        $hs->save();
    }

    public function getAboutUs()
    {
        $au = StorageItem::ofType('about_us_page')->first();

        $defaults = [
            'page_title'        => ['About Us', 'আমাদের সম্পর্কে'],
            'intro_body'        => [
                "Welcome to Metta digital platform, a sanctuary of wisdom and serenity dedicated to exploring the profound teachings of Buddha, unraveling the sacred stories embedded in Buddhist sites, and capturing the essence of enlightenment through captivating documentaries.",
                "মেত্তা ডিজিটাল প্ল্যাটফর্মে স্বাগতম, প্রজ্ঞা ও প্রশান্তির এক অভয়ারণ্য, যা বুদ্ধের গভীর শিক্ষা অন্বেষণ, বৌদ্ধ স্থানগুলোর পবিত্র কাহিনী উদ্ঘাটন এবং চিত্তাকর্ষক ডকুমেন্টারির মাধ্যমে জ্ঞানার্জনের সারমর্ম ধারণ করতে নিবেদিত।",
            ],
            'mission_body'      => [
                "At Metta, we embark on a journey to share the timeless teachings of Buddha that illuminate the path to inner peace, compassion, and mindfulness. Our mission is to bring the profound wisdom of Buddhism to the digital realm, making it accessible to seekers and enthusiasts worldwide.",
                "মেত্তায়, আমরা বুদ্ধের চিরন্তন শিক্ষা ভাগ করে নেওয়ার যাত্রা শুরু করি, যা অন্তরের শান্তি, করুণা এবং সচেতনতার পথ আলোকিত করে। আমাদের লক্ষ্য হলো বৌদ্ধধর্মের গভীর জ্ঞানকে ডিজিটাল জগতে এনে বিশ্বব্যাপী অনুসন্ধানকারী ও উৎসাহীদের জন্য সহজলভ্য করা।",
            ],
            'sites_body'        => [
                "Embark on a virtual pilgrimage with us as we uncover the mystique surrounding sacred Buddhist sites. From the serene landscapes of Bodh Gaya, where Siddhartha Gautama attained enlightenment, to the ancient ruins of Nalanda, witness the echoes of ancient wisdom that resonate through these hallowed grounds.",
                "আমাদের সাথে এক ভার্চুয়াল তীর্থযাত্রায় যোগ দিন যেখানে আমরা পবিত্র বৌদ্ধ স্থানগুলোর রহস্য উদ্ঘাটন করি। বোধগয়ার শান্ত নিসর্গ থেকে, যেখানে সিদ্ধার্থ গৌতম জ্ঞান লাভ করেছিলেন, নালন্দার প্রাচীন ধ্বংসাবশেষ পর্যন্ত, এই পবিত্র ভূমিতে অনুরণিত প্রাচীন প্রজ্ঞার প্রতিধ্বনি প্রত্যক্ষ করুন।",
            ],
            'teachings_body'    => [
                "Dive deep into the ocean of Buddha's teachings, exploring the Dharma that forms the foundation of Buddhism. Through insightful articles, discussions, and reflections, we strive to unravel the profound messages that continue to guide seekers on the path to awakening.",
                "বুদ্ধের শিক্ষার সমুদ্রে গভীরভাবে ডুব দিন, বৌদ্ধধর্মের ভিত্তি গঠনকারী ধর্ম অন্বেষণ করুন। অন্তর্দৃষ্টিপূর্ণ প্রবন্ধ, আলোচনা এবং প্রতিফলনের মাধ্যমে, আমরা সেই গভীর বার্তাগুলো উদ্ঘাটনের চেষ্টা করি যা অনুসন্ধানকারীদের জাগরণের পথে পরিচালিত করে চলেছে।",
            ],
            'explorations_body' => [
                "Enhancing our journey are captivating documentaries that weave together the threads of history, spirituality, and culture. Immerse yourself in visual narratives that bring to life the stories of great masters, the evolution of Buddhist philosophy, and the enduring legacy of this ancient tradition.\n\nWe invite you to be a part of our community, where the exchange of ideas and experiences enriches our collective understanding. Whether you're a seasoned practitioner or a curious soul taking the first steps on the Eightfold Path, your attendance is a space for everyone seeking inspiration and enlightenment.\n\nEmbark on this transformative journey with us as we explore the intersections of Buddhist wisdom, sacred sites, and the cinematic artistry that brings it all to life.",
                "আমাদের যাত্রাকে সমৃদ্ধ করে মুগ্ধকর ডকুমেন্টারিগুলো যা ইতিহাস, আত্মিকতা এবং সংস্কৃতির সূত্রগুলোকে একসাথে বুনে দেয়। মহান গুরুদের কাহিনী, বৌদ্ধ দর্শনের বিকাশ এবং এই প্রাচীন ঐতিহ্যের চিরস্থায়ী উত্তরাধিকারকে জীবন্ত করে তোলা দৃশ্যপটে নিজেকে নিমজ্জিত করুন।\n\nআমরা আপনাকে আমাদের সম্প্রদায়ের অংশ হতে আহ্বান জানাই, যেখানে ধারণা ও অভিজ্ঞতার বিনিময় আমাদের সম্মিলিত উপলব্ধিকে সমৃদ্ধ করে।\n\nবৌদ্ধ প্রজ্ঞা, পবিত্র স্থান এবং চলচ্চিত্রের শিল্পকলার সংযোগস্থল অন্বেষণ করতে আমাদের সাথে এই রূপান্তরমূলক যাত্রা শুরু করুন।",
            ],
        ];

        $result = [];

        foreach ($defaults as $key => [$en, $bn]) {
            $result[$key] = $au?->prop($key) ?: $en;
            $result[$key . '_bn'] = $au?->prop($key . '_bn') ?: $bn;
        }

        return $result;
    }

    public function saveAboutUs($request)
    {
        $au = StorageItem::firstOrNew([
            'type'  => 'about_us_page'
        ]);

        $props = [];

        foreach (['page_title', 'intro_body', 'mission_body', 'sites_body', 'teachings_body', 'explorations_body'] as $key) {
            $props[$key] = $request->input($key) ?: null;
            $props[$key . '_bn'] = $request->input($key . '_bn') ?: null;
        }

        $au->setProps($props);
        $au->save();
    }
}
