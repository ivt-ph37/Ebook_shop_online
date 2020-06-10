<?php


namespace App\Repositories\User;


interface UserRepositoryInterface
{
    public function getUsers();
    public function getUserById($id);
    public function addUser(array $data);
    public function updateUser($id, array $attributes);
    public function deleteUser($id);
}
