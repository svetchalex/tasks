<?php
/**
 * 1. Добавлена проверка данных на входе и выходе методов
 * 2. Добавлены комментарии
 * 3. Переменные модуля,множителя и приращения вынесены в конструктор
 * 4. Переменные модуля,множителя и приращения переименованы согласно их значению
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
     * Метод, возврающающий новое случайное число
     *
     * @return float
     */
    public function getNext(): float
    {
        $this->seed = ($this->factor * $this->seed + $this->increment) % $this->module;
        return $this->seed;
    }

    /**
     * Метод, сбрасывающий генератор на начальное значение
     *
     * @return mixed
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


