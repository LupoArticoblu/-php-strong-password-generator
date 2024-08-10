<?php

// Controllo dell'attività della sessione
if (!isset($_SESSION)) {
    session_start();
}

// Funzione per ottenere un carattere casuale da una stringa specifica
function getChar($mainCasual, $characters) {
    $index = $characters[rand(0, count($characters) - 1)];
    $charStr = $mainCasual[$index];
    return $charStr[rand(0, strlen($charStr) - 1)];
}

// Funzione per generare la password
function pass_generated($length) {

  $totalLength = 0;

  
  $mainCasual = [
        'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz', // Lettere
        '0123456789', // Numeri
        '!?&%$<>^+-*/()[]{}@#_="' // Simboli
    ];

    $characters = $_GET['characters'] ?? [0, 1, 2];
    $password = '';
    
    foreach ($characters as $charIndex) {
      //calcolo la lunghezza totale dei caratteri
      $totalLength += strlen($mainCasual[$charIndex]);
    }
    //controllo la lunghezza se più lungo di totallength assume la sua lunghezza
    if ($length > $totalLength) $length = $totalLength; //<= evitiamo il loop infinito

    if ($length >= 8 && $length <= 32) {
        // Generazione della password
        while (strlen($password) < $length) {
            
            $char = getChar($mainCasual, $characters);

            if ($_GET['allow_duplicates'] == '1' || !str_contains($password, $char)) {
                $password .= $char;
            }
        }

        // Salva la password nella sessione e reindirizza
        $_SESSION['password'] = $password;
        header("Location: success.php");
        exit;
    } else {
        return 'La lunghezza della password dev\'essere compresa tra gli 8 e i 32 caratteri';
    }
}

if (isset($_GET['Length'])) {
    $password = pass_generated($_GET['Length']);
}

?>

<!DOCTYPE html>
<html lang="it">
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

        <?php if (empty($_GET['Length'])) { ?>
        <form class="text-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <div class="row offset-3">

                <label class="col-form-label col-sm-5" for="input_password">Lunghezza password?</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control my-3" name="Length" placeholder="Digita un numero da 8 a 32">
                </div>
            </div>
            <fieldset class="form-group mb-3 offset-3">
                <div class="row">
                    <legend class="col-form-label col-sm-5">Consenti ripetizioni caratteri:</legend>
                    <div class="col-sm-5">

                        <div class="form-check">
                            <label class="form-check-label" for="allow_duplicates">
                                Si
                            </label>
                            <input class="form-check-input" type="radio" name="allow_duplicates" value="1" id="allow_duplicates" checked>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label" for="disallow_duplicates">
                                No
                            </label>
                            <input class="form-check-input" type="radio" name="allow_duplicates" value="0" id="disallow_duplicates">
                        </div>
                    </div>
            </fieldset>

            <div class="row mb-3 offset-3">
                <div class="col-sm-5 offset-sm-5">
                    <div class="form-check">
                        <label class="form-check-label" for="characters1">
                            Lettere
                        </label>
                        <input class="form-check-input" type="checkbox" name="characters[]" value="0" id="characters1">
                    </div>

                    <div class="form-check">
                        <label class="form-check-label" for="characters2">
                            Numeri
                        </label>
                        <input class="form-check-input" type="checkbox" name="characters[]" value="1" id="characters2">
                    </div>

                    <div class="form-check">
                        <label class="form-check-label" for="characters3">
                            Simboli
                        </label>
                        <input class="form-check-input" type="checkbox" name="characters[]" value="2" id="characters3">
                    </div>
                </div>
            </div>
            <input type="submit" name="Genera" value="Genera">
            <input type="reset" name="Annulla" value="Annulla">

        </form>
        <?php } ?>
    </div>

</body>
</html>