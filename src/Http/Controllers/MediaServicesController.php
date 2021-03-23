<?php

namespace Mouab215\MediaServices\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class MediaServicesController extends Controller
{
    public function index()
    {
        // Get Azure Ad token
        $client = new Client();
        $response = $client->request('POST', 'https://login.microsoftonline.com/:aadTenantDomain/oauth2/token');
        dd($response);

//        echo $response->getStatusCode(); // 200
        echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
        echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

        return view('media-services::test')->with('something', config('media-services.api-key' ));
    }
}
