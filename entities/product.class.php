<?php
// Require the PHP file containing the "Db" class definition
require_once("config/db.class.php");

// Define a PHP class named "Product"
class Product
{
    // Public properties to store product details
    public $productID;
    public $productName;
    public $cateID;
    public $price;
    public $quantity;
    public $description;
    public $picture;

    // Constructor method to initialize product object with details
    public function __construct(
        $pro_name,
        $cate_id,
        $price,
        $quantity,
        $desc,
        $picture
    ) {
        $this->productName = $pro_name;
        $this->cateID = $cate_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $desc;
        $this->picture = $picture;
    }

    // Method to save the product to the database
    public function save()
    {
        // Initialize $db object with class Db from file db.class.php
        $db = new Db();
        
        // SQL query to insert product details into the database
        $sql = "INSERT INTO product (ProductName, CateID, Price, Quantity, Description, Picture) VALUES ('$this->productName','$this->cateID','$this->price','$this->quantity','$this->description','$this->picture')";
        
        // Execute the query using the query_execute method of the Db class
        $result = $db->query_execute($sql);
        
        // Return the result of the query execution
        return $result;
    }

    // Method to retrieve a list of products from the database
    public static function list_product()
    {
        // Create a new instance of the "Db" class
        $db = new DB();
        
        // SQL query to select all products from the database
        $sql = "SELECT * FROM product";
        
        // Execute the query and retrieve the results as an array using the select_to_array method of the Db class
        $rs = $db->select_to_array($sql);
        
        // Return the array of product results
        return $rs;
    }
}
?>
