<?php

namespace App\Libs\Zoop;

use Exception;

/**
 * Class Request
 *
 * @package Zoop
 */
class Request
{
    /**
     * Base url from api
     *
     * @var string
     */
    private $baseUrl = '';


    /**
     * Request constructor.
     *
     * @param Credentials $credentials
     */
    function __construct(Credentials $credentials)
    {
        if ($credentials->getEnv() == "PRODUCTION") {
            $this->baseUrl = 'https://api.zoop.ws';
        } elseif ($credentials->getEnv() == "SANDBOX") {
            $this->baseUrl = 'https://api.zoop.ws';
        } else {
            return false;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }


    /**
     * @param Credentials $credentials
     * @param             $url_path
     *
     * @return bool|string
     * @throws Exception
     */
    function get(Credentials $credentials, $url_path)
    {
        return $this->send($credentials, $url_path, 'GET');
    }

    function delete(Credentials $credentials, $url_path)
    {
        return $this->send($credentials, $url_path, 'DELETE');
    }

    /**
     * @param Credentials $credentials
     * @param             $url_path
     * @param             $method
     * @param null        $json
     *
     * @return bool|string
     * @throws Exception
     */
    private function send(
        Credentials $credentials,
        $url_path,
        $method,
        $json = null
    )
    {
        $curl = curl_init($this->getFullUrl($url_path));

        $defaultCurlOptions = array(
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 60,
            CURLOPT_HTTPHEADER     => array('Content-Type: application/json'),
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSL_VERIFYPEER => 0,
        );
        curl_setopt($curl, CURLOPT_USERPWD,
            $credentials->getPublishableKey().":");

        if ($method == 'POST') {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
            curl_setopt($curl, CURLOPT_ENCODING, "");
            curl_setopt_array($curl, $defaultCurlOptions);
        } elseif ($method == 'GET') {
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        } elseif ($method == 'PUT') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
            curl_setopt($curl, CURLOPT_ENCODING, "");
            curl_setopt_array($curl, $defaultCurlOptions);
        } elseif($method == 'DELETE') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        }

        try {
            $response = curl_exec($curl);
        } catch (Exception $e) {
            return "ERROR";
        }

        if (isset(json_decode($response)->error)) {
            throw new Exception(json_decode($response)->error->message,
                json_decode($response)->error->status_code);
        }

        if (curl_getinfo($curl, CURLINFO_HTTP_CODE) >= 400) {
            throw new Exception($response, 100);
        }
        if ( ! $response) {
            print "ERROR";
            EXIT;
        }
        curl_close($curl);

        return $response;
    }

    /**
     * Get request full url
     *
     * @param string $url_path
     *
     * @return string $url(config) + $url_path
     */
    private function getFullUrl($url_path)
    {
        if (stripos($url_path, $this->baseUrl, 0) === 0) {
            return $url_path;
        }

        return $this->baseUrl.$url_path;
    }

    /**
     * @param Credentials $credentials
     * @param             $url_path
     * @param             $params
     *
     * @return bool|string
     * @throws Exception
     */
    function post(Credentials $credentials, $url_path, $params)
    {
        return $this->send($credentials, $url_path, 'POST', $params);
    }
}