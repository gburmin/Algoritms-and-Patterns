<?php

namespace Model\Repository;

class IdentityMap
{
    private $identityMap = [];
    public function add(IDomainObject $obj)
    {
        $key = $this->getGlobalKey(get_class($obj), $obj->getId());
        $this->identityMap[$key] = $obj;
    }
    public function get(string $login, int $id)
    {
        $key = $this->getGlobalKey($login, $id);
        if (isset($this->identityMap[$key])) {
            return $this->identityMap[$key];
        }
        throw new EmptyCacheException();
    }
    private function getGlobalKey(int $id, string $login)
    {
        return sprintf('%s.%d', $id, $login);
    }
}
