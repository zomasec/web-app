<?php include 'include/header.php' ?>
<?php include 'include/nav.php' ?>
<?php include 'include/footer.php' ?>
<?php 
if(!isset($_SESSION["auth"])) 
{
    header("location:login.php");
    die;
}
?>
<h1 align = 'center' >Profile Page</h1>
<br>
<div class="container">
    <div class="row">
      <div class="col-8 mx-auto my-5 border p-2">
        <h1 class="border my-2 bg-success p-2">Name:<?php echo $_SESSION["auth"][0];?></h1>
        <h1 class="border my-2 bg-primary p-2">Email:<?php echo $_SESSION["auth"][1];?></h1>
        
      </div>
    </div>
</div>
