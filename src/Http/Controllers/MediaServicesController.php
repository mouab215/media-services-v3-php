<?php


namespace Mouab215\MediaServices\Http\Controllers;


use App\Http\Controllers\Controller;

class MediaServicesController extends Controller
{
    public function index()
    {
        return view('media-services::test')->with('something', config('media-services.api-key' ));
    }
}
