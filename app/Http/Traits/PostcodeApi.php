<?php
namespace App\Http\Traits;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

trait PostcodeApi {
    public function getprovinceCode($postcode) {
        $headers = [
            'Content-Type'    => 'application/json',
            'Accept'          => 'application/json',
        ];

        $query = '?fq=postcode:'.$postcode.'??';
        try {
            $client = new Client(['base_uri' => env('POSTCODE_URI', '')]);

            $data = $client->request('GET', $query, [
                'headers' => $headers
            ]);
        } catch (\Exception $e) {
            return $e->getResponse();
        }
        $provinceCode = json_decode($data->getBody())->response->docs;
        if($provinceCode != null) {
            return $provinceCode[0]->provincieafkorting;
        }
        return '--';
    }


}
