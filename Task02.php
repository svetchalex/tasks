<?php

/**
 * Class Random
 */
class Random
{
    private $seed;
    public static $hold;

    /**
     * Random constructor.
     *
     * @param $seed
     */
    public function __construct($seed)
    {
        $this->seed = $seed;

        self::$hold = $this->seed;
    }


    /**
     * @return int
     */
    public function getNext()
    {
        $aaa = 16807;
        $mmm = 2147483647;
        $ccc = 12345;
        $this->seed = ($aaa * $this->seed + $ccc) % $mmm;
        return $this->seed;
    }

    /**
     * @return mixed
     */
    public function reset()
    {

        $this->seed = self::$hold;
        return $this->seed;
    }
}


$seq = new Random(100);
$result1 = $seq->getNext();
$result2 = $seq->getNext();
$seq->reset();
$result21 = $seq->getNext();
$result22 = $seq->getNext();


