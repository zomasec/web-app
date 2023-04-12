<?php
session_start();

// Check if user is logged in and is an admin
if (!isset($_SESSION['auth']) || $_SESSION["auth"] !== ["admin","admin@admin.com"]){
    header('Location:index.php');
    exit;
}

// Function to read the users.csv file and return the data as an array
function readUsersFile() {
    $file = fopen('data/users.csv', 'r');
    $users = array();

    while (($data = fgetcsv($file)) !== false) {
        $users[] = array(
            'username' => $data[0],
            'email' => $data[1],
            'password' => $data[2]);
       }

    fclose($file);
    return $users;
}

// Read the users.csv file
$users = readUsersFile();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="admin.php">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2>Users</h2>
    <table class="table">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><button class="btn btn-danger" onclick="if(confirm('Are you sure you want to delete this user?')){deleteUser('<?php echo $user['username']; ?>'); location.reload();}">Delete</button></td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
