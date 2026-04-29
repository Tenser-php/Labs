<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'title' => 'HOME',
            'customText' => 'Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.',
        ]);
    }

    public function products()
    {
        return view('pages.products', [
            'title' => 'Products',
            'customText' => 'Browse our amazing collection of products designed to meet your needs.',
        ]);
    }

    public function pricing()
    {
        return view('pages.pricing', [
            'title' => 'Pricing',
            'customText' => 'Choose the plan that works best for you and your team.',
        ]);
    }

    public function contact()
    {
        return view('pages.contact', [
            'title' => 'Contact',
            'customText' => 'We would love to hear from you. Reach out to us anytime!',
        ]);
    }
}
