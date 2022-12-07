<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>User Registration</title>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand me-auto" href="#">Users Data</a>
            <?php
            // 24 dynamic logout button and then logout in controller.php
            if (isset($_SESSION['user_data'])) {
              echo '<a class="btn btn-primary" href="logout">Logout</a>';
            }else{
              // 17 dynamic header button and then code for login in controler.php
              if ($_SERVER['PATH_INFO'] == '/login') {
                echo '<a class="btn btn-primary" href="register">Register Now</a>';
              }elseif ($_SERVER['PATH_INFO'] == '/register') {
                echo '<a class="btn btn-primary" href="login">Login Now</a>';
              }
            }
            
            ?>
          </div>
        </div>
      </nav>
