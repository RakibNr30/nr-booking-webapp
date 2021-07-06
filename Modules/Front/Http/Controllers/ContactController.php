<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Setting\Services\ContactService;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        // data object
        $data = new \stdClass();

        // contact
        $data->contact = $this->contactService->firstOrCreate([]);

        return view('front::' . config('core.theme') . '.contact.index', compact('data'));
    }
}
