<?php

namespace BetaGouv\MesAides;

class SituationProvider
{
    private $baseUrl;
    private $username;
    private $password;

    public function __construct($baseUrl, $username, $password)
    {
        $this->baseUrl = $baseUrl;
        $this->username = $username;
        $this->password = $password;
    }

    public function fromToken($token)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "{$this->baseUrl}/api/situations/via/{$token}");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        // TODO Send authentication headers
        // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // curl_setopt($curl, CURLOPT_USERPWD, "{$this->username}:{$this->password}");

        $response = curl_exec($curl);

        if (false !== $response) {
            return json_decode($response, true);
        }
    }
}
