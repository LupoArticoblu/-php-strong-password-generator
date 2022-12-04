<?php

//1 controllo dell'attività della sessione
if(!isset($_SESSION)){
  session_start();
}

//funzione con 2 parametri: 1 i dati. 2 la lunghezza richiesta dall'utente
function pass_generated($length){
  
  //variabile
  $mainCasual = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!?&%$<>^+-*/()[]{}@#_=";
  $password = '';
  
  //ciclo "se la password è compresa tra 8 e 32 caratteri, allora..."
  if($length >= 8 && $length <= 32){
    for ($i = 0; $i < $length; $i++){
        $random_index = rand(0, strlen($mainCasual) - 1);
        //concatenazione sta a password, che è stringa vuota, aggiunge a se stessa un carattere di $maincasual, per tutti i cicli richiesti
        $password.= substr($mainCasual,$random_index, 1);       
    }
  }
  return $password;

}

if (isset($_GET['Length'])){
  $password = pass_generated($_GET['Length']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Generatore di password brutto</title>
</head>
<body>
  <div class="container">
    <h1 class="text-center text-primary">Strong Password Generator</h1>
    
    <?php if (empty($_GET['Length'])) : ?>
    <form class="text-center" action="index.php" method="get">
      <label class="h2 mt-5" for="input_password">Lunghezza password?</label>
      <input type="text" class="form-control my-3" name="Length" placeholder="Digita un numero da 8 a 32">
      <input type="submit" name="Genera" value="Genera">
      
      <?php else : ?>
        <h6 class="text-dark">La tua password: <span><?php echo $password ?></span></h6>
      <?php endif ?>
    </form> 
  </div>
  
</body>
</html>