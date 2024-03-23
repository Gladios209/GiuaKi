<?php
// Require the PHP file containing the "Db" class definition
require_once("config/db.class.php");

// Define a PHP class named "Category"
class Category
{
    // Public properties to store category details
    public $cateId;
    public $cateName;
    public $cateDes;

    // Constructor method to initialize category object with name and description
    public function __construct(
        $cate_name,
        $cate_des
    ) {
        $this->cateName = $cate_name;
        $this->cateDes = $cate_des;
    }

    // Method to save the category to the database
    public function save()
    {
        // Create a new instance of the "Db" class
        $db = new Db();

        // SQL query to insert category details into the database
        $sql = "INSERT INTO category (CategoryName, Description) VALUES ('$this->cateName','$this->cateDes')";
        
        // Execute the query using the query_execute method of the Db class
        $result = $db->query_execute($sql);
        
        // Return the result of the query execution
        return $result;
    }

    // Method to retrieve a list of categories from the database
    public static function list_category()
    {
        // Create a new instance of the "Db" class
        $db = new DB();
        
        // SQL query to select all categories from the database
        $sql = "SELECT * FROM category";
        
        // Execute the query and retrieve the results as an array using the select_to_array method of the Db class
        $rs = $db->select_to_array($sql);
        
        // Return the array of category results
        return $rs;
    }
}
?>
