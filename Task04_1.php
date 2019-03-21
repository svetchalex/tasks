<?php
/**
 * 1. Добавлена проверка данных на входе и выходе методов, а так же в конструкторе дополнительная проверка на
 * отрицательное значение
 * 2. Добавлены комментарии
 * 3. Класс SquaresGenerator выведен в отдельный файл
 * 4. Дополнительная проверка в классе SquaresGenerator в методе generate на отрицательное значение
 */
declare(strict_types=1);
require_once('Task04_2.php');

/**
 * Class Square
 * Класс описания квадратов
 */
class Square
{
    private $side;

    /**
     * Square constructor.
     *
     * @param $side
     *
     * @throws Exception
     */
    public function __construct(float $side)
    {
        if ($side > 0) {
            $this->side = $side;
        } else {
            throw new Exception('Значение должно быть больше нуля');
        }
    }

    /**
     * @return float
     * Метод, возвращающий значение стороны.
     */
    public function getSide(): float
    {
        return $this->side;
    }
}

$square = new Square(10);
$square->getSide();
$squares = SquaresGenerator::generate(3, 2);

