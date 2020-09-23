<?php 

function Createdb(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movielist";
 
//Creating connection
$con = mysqli_connect($servername, $username, $password);

//Checking connection
if(!$con){
    die("Connection failed! : " .mysqli_connect_error());
}

//Creationg database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if(mysqli_query($con, $sql)){
    $con = mysqli_connect($servername, $username, $password, $dbname);

    $sql = "
    CREATE TABLE IF NOT EXISTS movies(
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        movie_name VARCHAR(25) NOT NULL,
        movie_year INT(4),
        movie_rate INT(2)
    );
    ";
if(mysqli_query($con,$sql)){
    return $con;
}else{
    echo "ERROR: Table cannot created!";
}

}else{
    echo "Error occured while creating the database " .mysqli_error($con);
}
}