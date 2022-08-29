<?php

declare(strict_types=1);

namespace Model\Repository;

use AbstractRepository;
use Model\Entity;

class User extends AbstractRepository
{
    private IdentityMap $identityMap;

    /**
     * Получаем пользователя по идентификатору
     *
     * @param int $id
     * @param  int  $id
     * @return Entity\User|null
     */
    public function getById(int $id): ?Entity\User
    {
        foreach ($this->identityMap->get($id) as $user) {
            return $this->createUser($user);
        }
        

        return null;
    }

    

    public function getByLogin(string $login): ?Entity\User
    {
        {
            foreach ($this->identityMap->get($login) as $user) {
                if ($user['login'] === $login) {
                    return $this->createUser($user);
                }
            }
    
            return null;

        
    }
    /**
     * Фабрика по созданию сущности пользователя
     *
     * @param array $user
     * @param  array  $user
     * @return Entity\User
     */
    private function createUser(array $user): Entity\User
    {
        $role = $user['role'];
        return new Entity\User(
            $user['id'],
            $user['name'],
            $user['login'],
            $user['password'],
            new Entity\Role($role['id'], $role['title'], $role['role'])
        );
    }


}