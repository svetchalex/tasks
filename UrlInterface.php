<?php
declare(strict_types=1);

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
     * @param string      $key
     * @param string|null $value
     *
     * @return mixed
     */
    public function getQueryParam(string $key, ?string $value = null);
}