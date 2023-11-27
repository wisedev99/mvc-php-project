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

    public function allProducts()
    {
        $data = $this->productModel->getProducts();
        return view(page: 'products/items.php',  data: $data);
    }
    // get product by parent id // by group  //
    // public function getById()
    // {
    //     $itemId = $_GET['id'];

    //     $data = $this->productModel->getById('id', $itemId);
    //     return view(page: 'products/item.php',  data: $data);
    // }
    public function getProductByCat()
    {
        $category = $_REQUEST['name'];

        $cat = $this->productModel->get('cat', 'small_title', json_decode($category));
        $data = $this->productModel->get('item', 'pid', $cat[0]->id);
        return view(page: 'products/items.php',  data: $data);
    }

    public function getProductById($id)
    {
        $data = $this->productModel->get('item', 'id', $id);
        return view(page: 'products/item.php',  data: $data);
    }

    public function getItemsWithChildren()
    {
        $parent = $this->productModel->getById('id', 1);
        $data = $this->productModel->getChildProducts($parent);

        return view(page: 'products/all.php',  data: $data);
    }
}
