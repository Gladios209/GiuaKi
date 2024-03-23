<?php
// Define a PHP class named "Db"
class Db
{
    // Database connection variable
    protected static $connection;

    // Connection initialization function
    public function connect()
    {
        // Establish a connection to the database using mysqli_connect() function
        $connection = mysqli_connect(
            "localhost",
            "root",
            "",
            "demo_lap3"
        );

        // Set character set to UTF-8
        mysqli_set_charset($connection, 'utf8');

        // Check if the connection was successful
        if (mysqli_connect_errno()) {
            echo "Database connection failed: " . mysqli_connect_error();
        }
        
        // Return the connection object
        return $connection;
    }

    // Function to execute a query statement
    public function query_execute($queryString)
    {
        // Initialize connection
        $connection = $this->connect();

        // Execute the query using the query() method of mysqli library
        $result = $connection->query($queryString);

        // Close the connection
        $connection->close();

        // Return the result of the query execution
        return $result;
    }

    // Function to retrieve results as an array
    public function select_to_array($queryString)
    {
        // Initialize an array to store the results
        $rows = array();

        // Execute the query
        $result = $this->query_execute($queryString);

        // Check if the result is valid
        if ($result == false) return false;

        // Iterate through the result set and store each row in the array
        while ($item = $result->fetch_assoc()) {
            $rows[] = $item;
        }

        // Return the array of results
        return $rows;
    }
}
?>
