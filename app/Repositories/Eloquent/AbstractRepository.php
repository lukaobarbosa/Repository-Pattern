<?php

namespace App\Repositories\Eloquent;


class AbstractRepository
{
    protected $model;

    protected function resolveModel()
    {
        return app($this->model);
    }

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function getId($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }
}