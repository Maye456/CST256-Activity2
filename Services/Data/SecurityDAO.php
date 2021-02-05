<?php
namespace App\Services\Data;

use App\Models\UserModel;
use Carbon\Exceptions\Exception;

class SecurityDAO
{
    // Define the connection string
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "activity2";
    private $port = "";
    private $dbQuery;
    
    // Constructor that creates a connection w/ the database
    public function __construct()
    {
        // Create a connection to the database 
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        // Make sure to always test the connection and see if there are any errors
    }
    
    public function findByUser(UserModel $credentials)
    {
        try 
        {
            // Define the query to search the database for the credentials
            $this->dbQuery = "SELECT Username, Password
                              FROM user
                              WHERE Username = '{$credentials->getUsername()}'
                              AND Password = '{$credentials->getPassword()}'";
            
            // If the selected query returns a resultset
            $result = mysqli_query($this->conn, $this->dbQuery);
            
            // If there are rows that are returned we have valid credentials
            if (mysqli_num_rows($result) > 0)
            {
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return true;
            }
            else 
            {
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return false;
            }
        } 
        catch (Exception $e) 
        {
            echo $e->getMessage();
        }
    }
}