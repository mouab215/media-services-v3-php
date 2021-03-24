<?php


namespace Mouab215\MediaServices;


use GuzzleHttp\Client;

class MediaServicesApiClient
{

    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function setAADToken()
    {
        $response = $this->client->request('POST',
            'https://login.microsoftonline.com/'. config('media-services.tenantDomain') . '/oauth2/token',
            ['form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => config('media-services.clientId'),
                'client_secret' => config('media-services.clientSecret'),
                'resource' => 'https://management.core.windows.net/',
            ]]
        );
        $content = json_decode($response->getBody()->getContents(), true);
//        dd($content);
        config(["media-services.AADToken" => $content['access_token']]);
    }

    public function createAsset(string $assetName)
    {
        $url = "https://" . config("media-services.baseUri") . "/subscriptions/" .
            config("media-services.subscriptionId") . "/resourceGroups/" .
            config("media-services.resourceGroup") . "/providers/Microsoft.Media/mediaServices/" .
            config("media-services.accountName") . "/assets/" .
            $assetName . "?api-version=" . config("media-services.apiVersion");
        $response = $this->client->request('PUT', $url,
            ['debug' => true],
            ['headers' => [
                [
                    'Authorization' => 'Bearer ' . config('media-services.access_token')
                ]
            ]]);
        dd($response);
    }



}
