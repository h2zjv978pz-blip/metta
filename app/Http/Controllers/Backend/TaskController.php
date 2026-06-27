<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use App\Repositories\StorageItemRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TaskController extends Controller
{
    public function __invoke(Request $request, $task, $id = null)
    {
        $repo = new StorageItemRepository();

        switch ($task)
        {
            case 'manage-home':
                $data['homeSlides'] = $repo->getHomeSlides();
                $data['homeHighlights'] = $repo->getHomeHighlights();
                $data['clients'] = $repo->getClients();
                $data['testimonials'] = $repo->getTestimonials();
                $data['heroSettings'] = $repo->getHeroSettings();

                return view('backend.manage-home', compact('data'));

            case 'save-hero-settings':
                $repo->saveHeroSettings($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-home', '#hero-settings']);

            case 'create-home-slide':
                return view('backend.home-slides.create');

            case 'edit-home-slide':
                $home_slide = $repo->findHomeSlide($id);
                return view('backend.home-slides.edit', compact('home_slide'));

            case 'store-home-slide':
                $repo->storeHomeSlide($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-home']);

            case 'update-home-slide':
                $repo->updateHomeSlide($id, $request);
                return redirect()->route('backend.tasks', ['task' => 'manage-home']);

            case 'delete-home-slide':
                $repo->deleteHomeSlide($id);
                return redirect()->route('backend.tasks', ['task' => 'manage-home']);

            case 'save-home-highlights':
                $repo->saveHomeHighlights($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-home', '#achievement-counters']);

            case 'create-client':
                return view('backend.clients.create');

            case 'edit-client':
                $client = $repo->findClient($id);
                return view('backend.clients.edit', compact('client'));

            case 'store-client':
                $repo->storeClient($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-home', '#clients']);

            case 'update-client':
                $repo->updateClient($id, $request);
                return redirect()->route('backend.tasks', ['task' => 'manage-home', '#clients']);

            case 'delete-client':
                $repo->deleteClient($id);
                return redirect()->route('backend.tasks', ['task' => 'manage-home', '#clients']);

            case 'create-testimonial':
                return view('backend.testimonials.create');

            case 'edit-testimonial':
                $testimonial = $repo->findTestimonial($id);
                return view('backend.testimonials.edit', compact('testimonial'));

            case 'store-testimonial':
                $repo->storeTestimonial($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-home', '#testimonials']);

            case 'update-testimonial':
                $repo->updateTestimonial($id, $request);
                return redirect()->route('backend.tasks', ['task' => 'manage-home', '#testimonials']);

            case 'delete-testimonial':
                $repo->deleteTestimonial($id);
                return redirect()->route('backend.tasks', ['task' => 'manage-home', '#testimonials']);

            case 'manage-general-info':
                $data['contactInfo']    = $repo->getContactInfo();
                $data['socialLinks']    = $repo->getSocialLinks();
                $data['bankInfo']       = $repo->getDonationInfo();

                return view('backend.manage-general-info', compact('data'));

            case 'save-contact-info':
                $repo->saveContactInfo($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-general-info']);

            case 'save-social-links':
                $repo->saveSocialLinks($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-general-info']);

            case 'save-bank-info':
                $repo->saveDonationInfo($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-general-info']);

            case 'manage-menu-settings':
                $data['menuSettings'] = $repo->getMenuSettings();
                $data['menuOrder'] = $repo->getMenuOrder();
                $data['homeSectionOrder'] = $repo->getHomeSectionOrder();
                $data['buddhistSitesDisplay'] = $repo->getBuddhistSitesDisplay();

                return view('backend.manage-menu-settings', compact('data'));

            case 'save-menu-settings':
                $repo->saveMenuSettings($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-menu-settings']);

            case 'save-menu-order':
                $repo->saveMenuOrder($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-menu-settings']);

            case 'save-home-section-order':
                $repo->saveHomeSectionOrder($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-menu-settings']);

            case 'save-buddhist-sites-display':
                $repo->saveBuddhistSitesDisplay($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-menu-settings']);

            case 'manage-splash-screen':
                $data['menuSettings'] = $repo->getMenuSettings();
                $data['splashScreen'] = $repo->getSplashScreen();

                return view('backend.manage-splash-screen', compact('data'));

            case 'save-splash-screen':
                $repo->saveSplashScreen($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-splash-screen']);

            case 'manage-site-widgets':
                $data['quickLinks']  = $repo->getQuickLinks();
                $data['zenMusic']    = $repo->getZenMusic();
                $data['socialLinks'] = $repo->getSocialLinks();

                return view('backend.manage-site-widgets', compact('data'));

            case 'save-quick-links':
                $repo->saveQuickLinks($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-site-widgets']);

            case 'save-zen-music':
                $repo->saveZenMusic($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-site-widgets']);

            case 'save-whatsapp-floating':
                $repo->saveWhatsAppFloatingEnabled($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-site-widgets']);

            case 'manage-about-us':
                $data['aboutUs'] = $repo->getAboutUs();

                return view('backend.manage-about-us', compact('data'));

            case 'save-about-us':
                $repo->saveAboutUs($request);
                return redirect()->route('backend.tasks', ['task' => 'manage-about-us']);
        }
    }
}
