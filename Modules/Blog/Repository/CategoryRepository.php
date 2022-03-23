<?php

namespace Modules\Blog\Repository;

use  Modules\Blog\Entities\Category;
use PhpParser\Node\Stmt\TryCatch;

class ProductRepository
{
    //global
    private $model;

    //object
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    


}