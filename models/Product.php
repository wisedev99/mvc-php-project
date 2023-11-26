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
        $query = "SELECT * FROM products WHERE type = 'item'";
        $stmt = $this->conn->query($query);
        
        return array_map(function ($product) {
            if ($product['type'] == 'item') {
                $product['media_url'] = "/store/" . $product['model_number'] . ".png"; // Replace 'new_key' and 'new_value' with your desired key-value pair
            }
            return $product;
        }, $stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function getTaskById($taskId)
    {
        $query = "SELECT * FROM tasks WHERE id = :taskId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':taskId', $taskId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createTask($title, $content)
    {
        $query = "INSERT INTO tasks (title, content) VALUES (:title, :content)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
    }

    public function updateTask($taskId, $title, $content)
    {
        $query = "UPDATE tasks SET title = :title, content = :content WHERE id = :taskId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':taskId', $taskId);
        $stmt->execute();
    }

    public function deleteTask($taskId)
    {
        $query = "DELETE FROM tasks WHERE id = :taskId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':taskId', $taskId);
        $stmt->execute();
    }
}
