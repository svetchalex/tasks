<?php
/**
 * 1. Добавлена проверка данных на входе и выходе методов
 * 2. Добавлелны комментарии
 * 3. Переменные модуля,множителя и приращения вынесены в конструктор
 */
declare(strict_types=1);

/**
 * Class Random
 * Класс реализует генератор рандомных чисел
 */
class Random
{
    private $seed;
    private $hold;
    private $factor;
    private $module;
    private $increment;


    /**
     * Random constructor.
     *
     * @param $seed
     */
    public function __construct(float $seed)
    {
        $this->seed = $seed;
        $this->hold = $seed;
        $this->factor = 16807;
        $this->module = 2147483647;
        $this->increment = 12345;
    }


    /**
     * @return float
     * Метод, возврающающий новое случайное число
     */
    public function getNext(): float
    {
        $this->seed = ($this->factor * $this->seed + $this->increment) % $this->module;
        return $this->seed;
    }

    /**
     * @return mixed
     * Метод, сбрасывающий генератор на начальное значение
     */
    public function reset(): float
    {
        $this->seed = $this->hold;
        return $this->seed;
    }
}


$seq = new Random(100);
$result1 = $seq->getNext();
$result2 = $seq->getNext();
$seq->reset();
$result21 = $seq->getNext();
$result22 = $seq->getNext();


