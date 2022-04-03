<?php

namespace Modules\Blog\Repository;

use  Modules\Blog\Entities\Category;
use PhpParser\Node\Stmt\TryCatch;

class CategoryRepository
{
    //Model property in class instance
    private $model;

    //constructor to bind Model to Reopository
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    //Functions
    public function index()
    {
        return $this->model::all();
    }


    public function create()
    {
    }

    public function store($data)
    {
        try {
            $data = $this->model->create($data);
            return $data;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        return $this->model->find($id);
    }


    public function update($data)
    {
        try {
            $data = $this->model->update($data);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destory($id)
    {
        
        return $this->model->destroy($id);
    }
}
