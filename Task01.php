<?php

/**
 * Class Circle
 */
class Circle
{
    private $radius;

    /**
     * Circle constructor.
     *
     * @param $radius
     */
    public function __construct($radius) {
        $this-> radius = $radius;
    }

    /**
     * @return float|int
     */
    public  function getArea()
    {  $area = M_PI * $this->radius * $this->radius;
        return $area;
    }

    /**
     * @return float|int
     */
    public function getCircumference()
    {  $circumference = 2 * M_PI * $this->radius;
        return $circumference;
    }
}

