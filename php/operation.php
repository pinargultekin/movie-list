<?php

require_once("db.php");
require_once("component.php");

$con = Createdb();

//Creating button clicks
if (isset($_POST['create'])) {
    createData();
};
if (isset($_POST['update'])) {
    updateData();
};
if (isset($_POST['delete'])) {
    deleteData();
};

function createData()
{
    $moviename = textboxValue("movie_name");
    $movieyear = textboxValue("movie_year");
    $movierate = textboxValue("movie_rate");

    if ($moviename && $movieyear && $movierate) {
        $sql = "INSERT INTO movies (movie_name, movie_year, movie_rate)
        VALUES('$moviename', '$movieyear', '$movierate')
        ";
        if (mysqli_query($GLOBALS['con'], $sql)) {
            TextNode("success", "Record successfully inserted!");
        } else {
            echo "Error";
        }
    } else {
        TextNode("error", "Please provide data in the textbox.");
    }
};

function textboxValue($value)
{
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($textbox)) {
        return false;
    } else {
        return $textbox;
    }
};

//message banner
function TextNode($classname, $msg)
{
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}

//get data from db
function getData()
{
    $sql = "SELECT * FROM movies";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}

function updateData()
{
    $movieid = textboxValue("movie_id");
    $moviename = textboxValue("movie_name");
    $movieyear = textboxValue("movie_year");
    $movierate = textboxValue("movie_rate");

if($moviename && $movieyear && $movierate){
    $sql = "
    UPDATE movies 
    SET 
    movie_name = '$moviename',
    movie_year = '$movieyear',
    movie_rate = '$movierate'
    WHERE id='$movieid';
    ";
if(mysqli_query($GLOBALS['con'], $sql)){
    TextNode("success", "Data successfully updated.");
}else{
    TextNode("error", "Data cannot updated");
}
}else{
    TextNode("error", "Select data using edit icon.");
}
};


function deleteData()
{
    $movieid = (int)textboxValue("movie_id");

    $sql = "DELETE FROM movies WHERE id=$movieid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success", "Data deleted.");
    }else{
        TextNode("error", "Data cannot deleted");
    }
};

function setID(){
    $getid = getData();
    $id = 0;

    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['id'];
        }
    }
    return ($id + 1);
}