<?php
function requiredVal($input)
{
    if(empty($input))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function minLenVal($input,$length)
{
    if(strlen($input) < $length)
    {
         return true; 
    }
    else
    {
         return false;    
    }
     
}

function maxLenVal($input,$length)
{
    if(strlen($input) > $length)
    {
         return true; 
    }
    else
    {
         return false;    
    }
     
}
function emailVal($email)
{
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
    {
         return false; 
    }
    else
    {
         return true;    
    } 
}
function loginVal($username,$password,$file)
{
    $file = fopen("users.csv", "r");
    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        if ($data[0] == $username && $data[2] == sha1($password)) {
            fclose($file);
            return true;
        }
    }
    fclose($file);
    return false;
}
/*
function logVal()

// Start the session
session_start();

// Define the CSV file path
$csv_file = "users.csv";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the username and password from the form
  $username = $_POST["username"];
  $password = sha1($_POST["password"]);

  // Open the CSV file for reading
  $handle = fopen($csv_file, "r");

  // Loop through the lines in the CSV file
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    // Check if the username and password match the current line in the CSV file
    if ($data[0] == $username && $data[2] == $password) {
      // Set the auth session variable to indicate that the user is authenticated
      $_SESSION["auth"] = true;
      // Redirect to the dashboard page
      header("Location: dashboard.php");
      exit();
    }
  }

  // If the loop completes without finding a match, display an error message
  $error = "Invalid username or password";
}

// Close the CSV file handle
fclose($handle);
?>
*/
?>
