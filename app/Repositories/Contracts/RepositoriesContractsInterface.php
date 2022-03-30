<?php

namespace App\Repositories\Contracts;


interface RepositoriesContractsInterface
{
    public function all();
    public function create(array $data);
    public function delete($id);
    public function update($id, array $data);
    public function getId($id);

}