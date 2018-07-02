<?php

namespace BetaGouv\MesAides;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class SituationProvider
{
    private $client;
    private $username;
    private $password;

    public function __construct($username, $password, Client $client = null)
    {
        $this->username = $username;
        $this->password = $password;

        if (null === $client) {
            $client = new Client(['base_uri' => 'https://mes-aides.gouv.fr']);
        }

        $this->client = $client;
    }

    public function fromToken($token)
    {
        $uri = sprintf('/api/situations/via/%s', $token);

        $request = new Request('GET', $uri, [
            'Authorization' => sprintf('%s %s', 'Basic', base64_encode($this->username . ':' . $this->password))
        ]);

        try {
            $response = $this->client->get($uri);
            return json_decode((string) $response->getBody(), true);
        } catch (\Exception $e) {
            // TODO Handle Exception
        }
    }
}
