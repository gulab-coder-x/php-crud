<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    // $con=mysqli_connect("localhost","root","root@123","crud") or die("Error In Connection");
    class Dbconnection
    {
        private $con;
        function __construct()
        {
            $con=mysqli_connect("localhost","root","root@123","crud") or die("Error In Connection");
             $this->con=$con;
        }

        function getconnection()
        {
            return $this->con;
           
        }
    }
?>