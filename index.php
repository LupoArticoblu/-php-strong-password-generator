<?php

if(isset ($_POST['Genera'])){
  $upper_case = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $lower_case = "abcdifghijklmnopqrstuvwxyz";
  $numbers = "0123456789";
  $special = "!?&%$<>^+-*/()[]{}@#_=";

  $generated_upper_case = substr(str_shuffle($upper_case), 0, 25);
  $generated_lower_case = substr(str_shuffle($lower_case), 0, 25);
  $generated_numbers = substr(str_shuffle($numbers), 0, 9);
  $generated_special = substr(str_shuffle($special), 0, 22);

  //creare una funzione che: 1 riconoscere il numero inserito nel input e restituire in stampa tanti elementi quanto il numero inserito 2 se il numero è minore di 8 riportare errore e stampare una cosa tipo "il numero inserito dev'essere maggiore di 8" 3 se il numero è maggiore di 32 ripetere la stampa precedente ma dicendo "minore di 32"
}

//if($length >= 8 || $length <= 32){
  //echo $i = 0; $i < $length; $i++;
//}

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
    <form class="text-center" action="index.php" method="post">
      <label class="h2 mt-5" for="">Lunghezza password?</label>
      <input type="text" class="form-control my-3" name="Length" placeholder="Digita un numero da 8 a 32">
      <input type="submit" name="Genera" value="Genera">
    </form>
    <?php //echo  ?>
  </div>
  
</body>
</html>