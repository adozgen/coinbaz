<?php

namespace App\Coinbaz;

abstract class Api
{
    private $parameters = [
        'start' => 1,
        'limit' => 500
    ];

    public function handle(){
        $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: ' . $this->apiKey()
        ];
        $qs = http_build_query($this->parameters); // query string encode the parameters
        $request = "{$this->url()}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource

        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $headers,     // set the headers
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response

        return json_decode($response, true);
    }
    /**
     * @param int[] $parameters
     */
    public function mergeParameters(array $parameters): Api
    {
        $this->parameters = array_merge($this->parameters, $parameters);
        return $this;
    }

    /**
     * @param int[] $parameters
     */
    public function setParameters(array $parameters): Api
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @return int[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }


    abstract function url();
    abstract function apiKey();

}
