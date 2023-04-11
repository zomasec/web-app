<?php include 'include/header.php' ?>
<?php include 'include/nav.php' ?>
<?php include 'include/footer.php' ?>
<?php 
if(isset($_SESSION["auth"])) 
{
    header("location:profile.php");
    die;
}
?>
<h1 align = 'center' >Login Page</h1>
<?php
if(!empty($_SESSION["errors"])):
    foreach ($_SESSION["errors"] as $error):?>    
      <div class="alert alert-danger text-center">
      <?php echo $error ; ?>
      </div>
<?php
    endforeach;
    unset($_SESSION["errors"]);
endif;

?>
<form method="POST" action="handlers/handellogin.php">

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="example@example.com">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
</form>

