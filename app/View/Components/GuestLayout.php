<?php

namespace App\View\Components;


use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;
use ProtoneMedia\Splade\Facades\Splade;
use function MongoDB\BSON\toJSON;

class GuestLayout extends Component
{
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.guest');
    }
}
