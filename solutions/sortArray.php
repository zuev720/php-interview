<?php

$array = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "22.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "06.06.2020", 'name' => "test3"],
];


// Здесь мы выбираем массив уникальных id
$uniqueIdArray = array_unique(array_map(function ($elem) {
    return ($elem['id']);
}, $array));

/** Здесь мы пробегаемся по массиву с уникальными id и вытаскиваем только первый элемент группировки
отфильтрованных элементов изначального массива по уникальному id
таким образом мы возвращаем только те элементы у которых id не повторяется **/

$uniqueArray = array_map(function ($el) use ($array) {
    $groupKeys = array_filter(array_keys($array), function ($e) use ($array, $el) {
        if ($el === $array[$e]['id']) {
            return $array[$e];
        }
    });

    return $array[array_key_first($groupKeys)];
}, $uniqueIdArray);


// Здесь мы делаем сортировку по id
usort($uniqueArray, function ($a, $b) use ($uniqueArray) {
    return $a['id'] <=> $b['id'];
});


// А здесь мы получаем финальный мыссив с ключем и значением как сказано в тех-задании
$resultArray = array_reduce($uniqueArray, function ($acc, $elem) {
    $key = $elem['name'];
    $value = $elem['id'];
    $acc[$key] = $value;
    return $acc;
}, []);

print_r($resultArray);
