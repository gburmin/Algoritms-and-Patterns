<?php

function LinearSearch($myArray, $num)
{
    $count = count($myArray);
    for ($i = 0; $i < $count; $i++) {
        if ($myArray[$i] == $num) {
            unset($myArray[$i]);
        };
    }
    return $myArray;
}



function binarySearch($myArray, $num, $searchFirst)
{
    //определяем границы массива
    $left = 0;
    $right = count($myArray) - 1;
    while ($left <= $right) {
        //находим центральный элемент с округлением индекса в меньшую сторону
        $middle = floor(($right + $left) / 2);
        //если центральный элемент и есть искомый
        if ($myArray[$middle] == $num) {
            $result = $middle;
            // Проверяем, ищем ли мы первое вхождение числа в массив
            if ($searchFirst) {
                $right = $middle - 1;
            } else {
                $left = $middle + 1;
            }
        } elseif ($myArray[$middle] > $num) {
            //сдвигаем границы массива до диапазона от left до middle-1
            $right = $middle - 1;
        } elseif ($myArray[$middle] < $num) {
            $left = $middle + 1;
        }
    }
    return $result;
}


$array = [1, 2, 3, 3, 3, 3, 4, 4, 5, 6];
// Значение, которое нужно удалить из массива
$num = 3;
// Первое вхождение удаляемого значение
$first = binarySearch($array, $num, true);
// Последнее вхождение удаляемого значения
$last = binarySearch($array, $num, false);
// 
for ($i = $first; $i <= $last; $i++) {
    unset($array[$i]);
}
foreach ($array as $item) echo $item;
