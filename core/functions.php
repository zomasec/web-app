<?php
function checkRequestMethod($method)
{
    if($_SERVER['REQUEST_METHOD'] == $method)
    {
        return true;
    }
        return false ;
   
}

function filterInput($input)
{
    return trim(htmlspecialchars(htmlentities($input)));
    
}
function redirect($path)
{
    header("location:$path");
    die;    
}

?>
