<?php


namespace Ajax\Helpers;


use Zend\Http\Client;
use Zend\Http\Request;

class FlightApi
{
    private $user;
    private $pass;

    public function setCredentials(array $credentials)
    {
        $this->user = $credentials['user'];
        $this->pass = $credentials['pass'];
    }

    public function routes(array $params)
    {
        $data = $this->makeCall('flightroutes/', $params);

        return $data->flightroutes;
    }

    public function schedules(array $params)
    {
        return $this->makeCall('flightschedules/', $params);
    }

    public function availability(array $params)
    {
        return $this->makeCall('flightavailability', $params);
    }

    /**
     * @param $uri
     * @param $params
     *
     * @return mixed
     */
    private function makeCall($uri, $params)
    {
        $client = new Client();
        $client->setAuth('php-applicant', 'Z7VpVEQMsXk2LCBc', Client::AUTH_BASIC);

        $request = new Request();
        $request->setMethod(Request::METHOD_GET);
        $request->setUri('http://tstapi.duckdns.org/api/json/1F/' . $uri);

        foreach ($params as $key => $value) {
            $request->getQuery()->set($key, $value);
        }

        $response = $client->dispatch($request);

        return json_decode($response->getContent());
    }
}