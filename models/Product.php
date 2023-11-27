<?php
class Product
{
    private $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function all()
    {
        $query = "SELECT * FROM products";
        $stmt = $this->conn->query($query);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProducts()
    {
        $query = "SELECT * FROM products WHERE type = 'item'";
        $stmt = $this->conn->query($query);

        return $this->addMediaUrl($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function addMediaUrl($array)
    {
        return array_map(function ($product) {
            if ($product['type'] == 'item') {
                $product['media_url'] = "/store/" . $product['model_number'] . ".png"; // Replace 'new_key' and 'new_value' with your desired key-value pair
            }
            return $product;
        }, $array);
    }

    public function get($type, $key, $itemvalue)
    {
        $query = "SELECT * FROM products WHERE type = :itemType AND $key = :itemvalue";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':itemvalue', $itemvalue);
        $stmt->bindParam(':itemType', $type);
        $stmt->execute();
        // ONE FUNCTION FOR TWO ACTIONS
        if ($type == 'item') {
            return $this->addMediaUrl($stmt->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function getById($key, $itemValue)
    {
        $query = "SELECT * FROM products WHERE $key = :ID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ID', $itemValue);
        $stmt->execute();
        return $this->addMediaUrl($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function getChildProducts($parentProducts)
    {
        $result = [];
        foreach ($parentProducts as $parentProduct) {

            $childProducts = $this->getById('pid', $parentProduct['id']);

            if (count($childProducts) > 0) {
                $parentProduct['children'] = $this->getChildProducts($childProducts);
            }

            $result[] = $parentProduct;
        }

        return $result;
    }
}
