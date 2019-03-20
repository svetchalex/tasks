<?php

/**
 * Interface UrlInterface
 * Интерфейс для класса Url
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