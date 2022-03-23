<?php

namespace Modules\Blog\Repository;

use  Modules\Blog\Entities\Product;
use PhpParser\Node\Stmt\TryCatch;

class ProductRepository
{
    //global
    private $model;

    //object
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    

    public function store1($data)
    {
        try {
            $data = $this->model->create($data);
            return $data;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit1($id)
    {
        return $this->model->find($id);
    }

    public function update1($data){
        try {
            $data = $this->model->update($data);
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function destory1($id){
        return $this->model->delete($id);
    }
}
