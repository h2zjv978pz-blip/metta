<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\ContactMessageRepository;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new ContactMessageRepository();
    }

    public function index()
    {
        $contact_messages = $this->repo->getContactMessages();

        return view('backend.contact-messages.index', compact('contact_messages'));
    }

    public function show($id)
    {
        $contact_message = $this->repo->findContactMessage($id);

        return view('backend.contact-messages.show', compact('contact_message'));
    }
}
