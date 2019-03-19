<?php

/**
 * Class Square
 */
class Square
{
    private $side;

    /**
     * Square constructor.
     *
     * @param $side
     */
    public function __construct($side)
    {
        $this->side = $side;
    }

    public function getSide()
    {
        return $this->side;
    }
}

/**
 * Class SquaresGenerator
 */
class SquaresGenerator
{
    /**
     * @param $side
     * @param $cnt
     *
     * @return array
     */
    public static function generate($side, $cnt)
    {
        $arr = [];
        for ($i = 0; $i < $cnt; $i++) {
            $arr [] = new Square($side);
        }
        return $arr;
    }
}

$square = new Square(10);
$square->getSide();
$squares = SquaresGenerator::generate(3, 2);

