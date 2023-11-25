<?php
require_once '../models/Product.php';

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function index()
    {

        $data = $this->productModel->all();
        $view = 'products/index.php';
        include '../views/layout.php';
    }

}
