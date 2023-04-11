<?php 
session_start();
include '../core/functions.php';
include '../core/validations.php';
$errors = [];
if (checkRequestMethod('POST'))
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

// Username Validations

if(requiredVal($username))
{
     $errors[] = "name is required";
}
elseif(minLenVal($username,4))
{
     $errors[] = "The minimum length is 4 for username";         
}
elseif(maxLenVal($username,14))
{
     $errors[] = "The maximum length is 14 for username";         
}


//Email validations

if(requiredVal($email))
{
     $errors[] = "Email is required";
}
elseif(emailVal($email))
{
     $errors[] = "Please enter a valid email";
}

//Password Validations
if(requiredVal($password))
{
     $errors[] = "Password is required";
}
elseif(minLenVal($password,6))
{
     $errors[] = "The minimum length is 6 for password";         
}
elseif(maxLenVal($password,20))
{
     $errors[] = "The maximum length is 20 for password";         
}

//Confirm Password validations

if(requiredVal($confirm))
{
     $errors[] = "Confirm Password is required";
}

elseif($confirm != $password)
{
     $errors[] = "Password doesn't match with confirm";
}

if(empty($errors))
{
     $users_file = fopen("../data/users.csv","a+");
     $data = [$username ,$email ,sha1($password)];
     fputcsv($users_file ,$data);
     //redirection
     $_SESSION["auth"] = [$username,$email];
     redirect("../index.php");
}
else
{
     $_SESSION["errors"] = $errors;
     //echo var_dump($errors);
     redirect("../register.php");
}

?>
