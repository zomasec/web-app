<?php 
session_start();
include '../core/functions.php';
include '../core/validations.php';
$errors = [];
if (checkRequestMethod('POST') && isset($_POST["email"]) && isset($_POST["password"]))
{   
    foreach ($_POST as $key => $value )
    {
         $$key = filterInput($value);
    }
    
}
else
{
     echo "There is something wrong";
}

//Email validations

if(requiredVal($email))
{
     $errors[] = "Email is required";
}

if(emailVal($email))
{
     $errors[] = "Please enter a valid email";
}

//Password Validations
if(requiredVal($password))
{
     $errors[] = "Password is required";
}


if(empty($errors))
{
  $email = $_POST["email"];
  $password = sha1($_POST["password"]);
  $csv_file = "../data/users.csv"; 
  $handle = fopen($csv_file, "r");
  
  while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
  {
    if ($data[1] == $email && $data[2] == $password)
    {
      $_SESSION["auth"] = [$data[0],$email];
      redirect("../index.php");
      $auth = true;
    }
    else
    {
      $auth = false;
       
         
    }
  }
}
if ($auth == false)
{
       $_SESSION["errors"] = $errors;
       //echo var_dump($errors);
       redirect("../login.php");
}       
?>
