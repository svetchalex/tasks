<?php
declare(strict_types=1);

/**
 * Class SquaresGenerator
 * Класс создает экзмепляры квадратов
 */
class SquaresGenerator
{
    /**
     * Метод возвращает массив из $cnt квадратов со стороной $side
     *
     * @param $side
     * @param $cnt
     *
     * @return array
     * @throws Exception
     */
    public static function generate(float $side, int $cnt): array
    {
        $squares = [];
        if ($cnt > 0) {
            for ($i = 0; $i < $cnt; $i++) {
                $squares[] = new Square($side);
            }
        } else {
            throw new Exception('Количество квадратов должно быть больше нуля');
        }
        return $squares;
    }
}
