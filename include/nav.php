<ul class="nav">
  
  <li class="nav-item">
    <a class="nav-link" href="index.php">Home</a>
  </li>
  <?php if(!isset($_SESSION["auth"])):?>
  <li class="nav-item">
    <a class="nav-link" href="login.php">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="register.php">Register</a>
  </li>
  <?php else:?>
  <li class="nav-item">
    <a class="nav-link" href="profile.php">Profile</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="logout.php">Logout</a>
  </li>
  <?php endif;?>
  
</ul>
