<?php

namespace App\Http\Controllers;

use App\Models\StorageItem;
use App\Repositories\StorageItemRepository;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $data['donationInfo'] = StorageItem::ofType('donation_info')->first();

        return view('frontend.donate.donate', compact('data'));
    }
}
