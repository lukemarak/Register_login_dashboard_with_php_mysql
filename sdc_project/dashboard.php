<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Users-Dashboard</title>
</head>
<body>
    <div class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo htmlspecialchars($_SESSION["username"])?> <span><img src="<?= $_SESSION['image']?>" width="40"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </form>
        </div>
        </nav>
        <div class="body-content">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h1><?php echo htmlspecialchars($_SESSION["username"])?>'s Dashboard</h1>
                    <div class="user"><img src="<?= $_SESSION['image']?>"></div>
                </div>
                <div class="col-md-3">
                    <h1>Your Detail</h1>
                    <hr>
                    <div class="row">
                        Name: <?php echo htmlspecialchars($_SESSION["fullname"])?>
                    </div>
                    <div class="row">
                        Email:<?php echo htmlspecialchars($_SESSION["email"])?>
                    </div>
                    <div class="row">
                        Contact: <?php echo htmlspecialchars($_SESSION["mobile"])?>
                    </div>
                </div>
            </div>
            <div class="welcome">
                <div class="alert-success">
                    <?= $_SESSION['message']?>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>