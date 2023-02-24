<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    header("Location: index.html");
    exit();
  } else {
    $err = "Hayoo bukan tamu.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="shortcut icon" href="images/va logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .login-form {
      margin-top: 200px;
      margin-bottom: 50px;
      padding: 25px;
      background-color: #FFD301;
      border-radius: 10px;
    }
    .login-form h2 {
      margin-bottom: 20px;
    }
  </style>
  <title>Login</title>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4 login-form">
      <h2 class="text-center"><b>Guest Login</b></h2>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" placeholder="Enter your username" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" placeholder="Enter your password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>
      <?php if (isset($err)) { ?>
      <div class="alert alert-danger"><?php echo $err ?></div>
      <?php } ?>
    </div>
  </div>
</div>
</body>
</html>


