<?php

/**
 * Class Url
 */
class Url implements UrlInterface
{
    private $http;

    /**
     * Url constructor.
     *
     * @param $http
     */
    public function __construct($http)
    {
        $this->http = $http;
    }

    /**
     * @return mixed
     */
    public function getScheme()
    {
        return parse_url($this->http, PHP_URL_SCHEME);
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return parse_url($this->http, PHP_URL_HOST);
    }

    /**
     * @return array
     */
    public function getQueryParams()
    {
        $query = parse_url($this->http, PHP_URL_QUERY);
        return explode('&', $query);
    }

    /**
     * @param      $key
     * @param null $value
     *
     * @return mixed|null
     */
    public function getQueryParam($key, $value = null)
    {
        $query_param = [];
        $query = $this->getQueryParams();
        foreach ($query as $item) {
            $arr = explode('=', $item);
            $query_param[$arr[0]] = $arr[1];
        }
        if (array_key_exists($key, $query_param)) {
            $value = $query_param[$key];
        }
        return $value;
    }
}

interface UrlInterface
{
    public function getScheme();

    public function getHost();

    public function getQueryParams();

    /**
     * @param      $key
     * @param null $value
     *
     * @return mixed
     */
    public function getQueryParam($key, $value = null);
}



