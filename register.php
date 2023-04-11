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
<h1 align = 'center' >Register Page</h1>
<br>

<?php
if(isset($_SESSION["errors"])):
    foreach ($_SESSION["errors"] as $error):?>    
      <div class="alert alert-danger text-center">
      <?php echo $error ; ?>
      </div>
<?php
    endforeach;
    unset($_SESSION["errors"]);
endif;

?>
<br>
<form method="POST" action="handlers/handelregister.php">
    
  <div class="form-row">
    
    <div class="col">
        <label>Username </label>
      <input type="text" class="form-control" placeholder="Username" name="username">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="example@example.com">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name="confirm" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Register Now</button>
</form>



