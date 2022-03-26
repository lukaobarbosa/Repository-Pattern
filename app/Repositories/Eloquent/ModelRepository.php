<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Eloquent\AbstractRepository;
use App\Repositories\Contracts\RepositoriesContractsInterface;

class ModelRepository extends AbstractRepository implements RepositoriesContractsInterface
{
    protected $model = User::class;
}