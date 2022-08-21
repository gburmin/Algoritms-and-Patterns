<?php
interface ISquare
{
    function squareArea(int $sideSquare);
}
interface ICircle
{
    function circleArea(int $circumference);
}


class SquareAreaLib
{
    public function getSquareArea(int $diagonal)
    {
        $area = ($diagonal ** 2) / 2;
        return $area;
    }
}
class CircleAreaLib
{
    public function getCircleArea(int $diagonal)
    {
        $area = ((M_PI * $diagonal) ** 2) / 4;
        return $area;
    }
}

class SquareAdapter implements ISquare
{
    public function squareArea(int $sideSquare)
    {
        $diagonal = $sideSquare * sqrt(2);
        $squareAreaLib = new SquareAreaLib;
        return $squareAreaLib->getSquareArea($diagonal);
    }
}

class CircleAdapter implements ICircle
{
    public function circleArea(int $circumference)
    {
        $diagonal = $circumference / M_PI;
        $circleAreaLib = new CircleAreaLib;
        return $circleAreaLib->getCircleArea($diagonal);
    }
}

echo (new SquareAdapter)->squareArea(4);
// А еще она не будет нормально работать, потому что в подключаемой библиотеке передаваемая диагональ int, но 
// она должно быть float
