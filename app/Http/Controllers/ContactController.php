<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function showContactInfo()
    {
        return view('contact');
    }
}
