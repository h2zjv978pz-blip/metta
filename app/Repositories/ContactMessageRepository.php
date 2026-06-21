<?php

namespace App\Repositories;

use App\Models\StorageItem;

class ContactMessageRepository
{
    public function findContactMessage($id)
    {
        return StorageItem::ofType('contact_messages')
            ->whereId($id)
            ->first();
    }

    public function getContactMessages()
    {
        return StorageItem::ofType('contact_messages')
            ->orderByDesc('id')
            ->paginate(30);
    }

    public function storeContactMessage($request)
    {
        $cm = new StorageItem();
        $cm->type = 'contact_messages';
        $cm->setProps([
            'name'      => $request->name,
            'email'     => $request->email,
            'message'   => $request->message,
            'ip'        => $request->ip(),
            'agent'     => $request->header('agent')
        ]);
        $cm->save();
    }
}
