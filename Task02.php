<?php

/**
 * Class Random
 */
class Random{
    private $seed;

    /**
     * Random constructor.
     *
     * @param $seed
     */
    public function __construct($seed) {
        $this-> seed = $seed;
        global $hold;
        $hold = $this->seed;
    }


    /**
     * @return int
     */
    public function getNext(){
        $aaa=16807;
        $mmm=2147483647;
        $ccc = 12345;
        $this->seed = ($aaa * $this->seed + $ccc)%$mmm;
    return $this->seed;
    }

    /**
     * @return mixed
     */
    public function reset(){
    global $hold;
    $this->seed = $hold;
        return $this->seed;
    }
}




