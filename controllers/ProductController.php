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
        return view('products/home.php',  $data);
    }

    public function allProducts()
    {
        $data = $this->productModel->getProducts();
        return view('products/items.php',  $data);
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
        $category = request('name');

        try {

            $cat = $this->productModel->get('cat', 'small_title', json_decode($category));
            $data = $this->productModel->get('item', 'pid', $cat[0]->id);

            return view('products/items.php', $data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getProductById($id)
    {
        $data = $this->productModel->get('item', 'id', $id);
        return view('products/item.php',  $data);
    }

    public function getItemsWithChildren()
    {
        $parent = $this->productModel->getById('id', 1);
        $data = $this->productModel->getChildProducts($parent);

        return view('products/all.php',  $data);
    }

    public function update($id)
    {
        header('Content-Type: application/json');

        // Handle the incoming request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the JSON data from the request body
            $requestData = json_decode(file_get_contents('php://input'), true);



            $this->productModel->update($id, $requestData);
            echo  json_encode($this->productModel->getById('id', $id));
        } else {
            // Invalid request method
            http_response_code(405); // Method Not Allowed
            echo json_encode(['error' => 'Invalid request method']);
        }
    }
}
