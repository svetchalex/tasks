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
        $query_param = [];
        $query = parse_url($this->http, PHP_URL_QUERY);
        $query = explode('&', $query);
        foreach ($query as $item) {
            $arr = explode('=', $item);
            $query_param[$arr[0]] = $arr[1];
        }
        return $query_param;
    }

    /**
     * @param      $key
     * @param null $value
     *
     * @return mixed|null
     */
    public function getQueryParam($key, $value = null)
    {
        $query = $this->getQueryParams();
        if (array_key_exists($key, $query)) {
            $value = $query[$key];
        }
        return $value;
    }
}

/**
 * Interface UrlInterface
 */
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

$url = new Url('http://yandex.ru?key=value&key2=value2');
$url->getScheme();
$url->getHost();
$url->getQueryParams();
$url->getQueryParam('key');
$url->getQueryParam('key2', 'lala');
$url->getQueryParam('new', 'ehu');




