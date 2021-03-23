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
        $response = $client->request('POST',
            'https://login.microsoftonline.com/'. config('media-services.tenantDomain') . '/oauth2/token',
            ['form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => config('media-services.clientId'),
                'client_secret' => config('media-services.clientSecret'),
                'resource' => 'https://management.core.windows.net/',
            ]]
        );
        dd($response->getBody()->getContents());

//        echo $response->getStatusCode(); // 200
        echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
        echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

        return view('media-services::test')->with('something', config('media-services.api-key' ));
    }
}
