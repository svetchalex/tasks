<?php
/**
 * 1. Добавлена проверка данных на входе и выходе методов, а так же в конструкторе
 * 2. Добавлены комментарии
 * 3. Интерфейс выведен в отдельный файл
 * 4. Вычисление компонентов URL вынесено в конструктор
 */
declare(strict_types=1);

/**
 *
 * Class Url
 * Данный класс разбирает строку URL на компоненты
 *
 */
class Url implements UrlInterface
{
    private $scheme;
    private $host;
    private $params;

    /**
     * Url constructor.
     *
     * @param $http
     *
     * @throws Exception
     */
    public function __construct(string $http)
    {
        if (filter_var($http, FILTER_VALIDATE_URL)) {
            $this->scheme = parse_url($http, PHP_URL_SCHEME);
            $this->host = parse_url($http, PHP_URL_HOST);
            $query = parse_url($http, PHP_URL_QUERY);
            $query = explode('&', $query);
            foreach ($query as $item) {
                $arr = explode('=', $item);
                $this->params[$arr[0]] = $arr[1];
            }
        } else {
            throw new Exception('Строка не содержит URL');
        }
    }

    /**
     * @return mixed
     * Метод возвращает компонент  scheme в введенном URL
     */
    public function getScheme(): string
    {
        return $this->scheme;
    }

    /**
     * @return mixed
     * Метод возвращает компонент host в введенном URL
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return array
     * Метод возвращает массив с параметрами введенного URL
     */
    public function getQueryParams(): array
    {

        return $this->params;
    }

    /**
     * @param      $key
     * @param null $value
     *
     * @return mixed|null
     * Метод проверяет наличие заданного параметра $key в  URL  и возвращает его значение по ключу, если заданного
     * ключа - нет, возвращает новое значение, указанное в $value.
     */
    public function getQueryParam($key, $value = null): string
    {

        if (array_key_exists($key, $this->params)) {
            $value = $this->params[$key];
        }
        return $value;
    }
}


$url = new Url('http://yandex.ru?key=value&key2=value2');
$url->getScheme();
$url->getHost();
$url->getQueryParams();
$url->getQueryParam('key');
$url->getQueryParam('key2', 'lala');
$url->getQueryParam('new', 'ehu');




