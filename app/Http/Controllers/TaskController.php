<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __invoke(Request $request, $task, $id = null)
    {
        switch ($task)
        {
            case 'change-content-lang':
                if (empty($request->content_lang) || !in_array($request->content_lang, ['en', 'bn'])) {
                    abort(403, 'Invalid content language');
                }

                session()->put('content_lang', $request->content_lang);

                return redirect()->back();

        }
    }
}
