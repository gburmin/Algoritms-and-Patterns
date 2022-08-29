<?php

use Model\Repository\IdentityMap;

abstract class AbstractRepository
{

    /**
     * @var IdentityMap
     */
    protected $identityMap;


    public function __construct()
    {
        $this->identityMap = new IdentityMap();
    }
}
