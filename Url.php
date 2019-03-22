<?php
/**
 * 1. Добавлена проверка данных на входе и выходе методов, а так же в конструкторе на наличие URL-адреса в строке
 * 2. Добавлены комментарии
 * 3. Интерфейс выведен в отдельный файл
 * 4. Вычисление компонентов URL вынесено в конструктор
 */
declare(strict_types=1);
require_once('UrlInterface.php');

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
     * Метод возвращает компонент scheme введенного URL
     *
     * @return mixed
     */
    public function getScheme(): string
    {
        return $this->scheme;
    }

    /**
     * Метод возвращает компонент host введенного URL
     *
     * @return mixed
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * Метод возвращает массив с параметрами введенного URL
     *
     * @return array
     */
    public function getQueryParams(): array
    {

        return $this->params;
    }

    /**
     * Метод проверяет наличие заданного параметра $key в  URL  и возвращает его значение по ключу, если заданного
     * ключа - нет, возвращает новое значение, указанное в $value.
     *
     * @param string      $key
     * @param string|null $value
     *
     * @return mixed|null
     */
    public function getQueryParam(string $key, ?string $value = null): ?string
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




