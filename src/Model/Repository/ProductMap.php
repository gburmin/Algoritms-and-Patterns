<?php

class Product
{
private IdentityMap $identityMap;


/**
* Поиск продуктов по массиву id
*
* @param int[] $ids
* @param int[] $ids
* @return Entity\Product[]
*/
/**
     * Поиск продуктов по массиву id
     *
     * @param int[] $ids
     * @return Entity\Product[]
     */
    public function search(array $ids = []): array
    {
        if (!count($ids)) {
            return [];
        }

        $productList = [];
        foreach ($this->identityMap->get($ids) as $item) {
            $productList[] = new Entity\Product($item['id'], $item['name'], $item['price']);
        }

        return $productList;
    }




/**
* Получаем все продукты
*
* @return Entity\Product[]
*/
public function fetchAll(): array
{
    $productList = [];
    foreach ($this->identityMap->get() as $item) {
        $productList[] = new Entity\Product($item['id'], $item['name'], $item['price']);
    }

    return $productList;
}

