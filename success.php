<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous'/>
  <title>success password verify</title>
</head>
<body>
  <div class="wrapper">
    <div class="container mb-3 pt-3">
      <div class="row">
        <div class="col-12 text-center">
          <h2>La tua password: </h2>
          <div class="alert alert-success" role="alert">
          <span class="text-primary"><?php echo $_SESSION['password'] ?></span>
          </div>
        </div>

        <div class="col-12">
          <a href="index.php" class="btn btn-primary">Torna alla pagina principale</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>