<?php
require_once '../models/Product.php';
require_once '../controllers/Helpers/functions.php';

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function index()
    {
        $data = $this->productModel->getProducts();
        return view(page: 'products/home.php',  data: $data);
    }
}
