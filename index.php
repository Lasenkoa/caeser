<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Caesar</title>
</head>

<body>

<?php
    $specialChars = [' ', 'ß', '\'', '/', 'ä', 'ö', 'ü' ] // Definition von Sonderzeichen bei Eingabe
?>

    <div class="header-container"></div>



    <div class="card">
        <form>
            <h2>Verschlüsselung</h2>
            <input name="encrypt" placeholder="Text zum Verschlüsseln eingeben">
    <?php
        if(isset($_GET['encrypt'])) { // Funktion zur Verschlüsselung
            $text = strtolower($_GET['encrypt']);
            $array = str_split($text);
            echo '<b>Der zu verschlüsselnde Text:</b>';
            foreach ($array as $char) {
                if (in_array($char, $specialChars)) {
                    echo $char;
                } else {
                echo toChar(toNum($char) + 1);
            }
        }
    }
    ?>
            <button type="submit">VERSCHLÜSSELN</button>
        </form>

        <form>
            <h2>Entschlüsselung</h2>
            <input name="decrypt" placeholder="Text zum Entschlüsseln eingeben">

            <?php
        if(isset($_GET['decrypt'])) { // Funktion zur Entschlüsselung
            $text = strtolower($_GET['decrypt']);
            $array = str_split($text);
            echo '<b>Der entschlüsselte Text:</b>';
            foreach ($array as $char) {
                echo toChar(toNum($char) - 1);
            }
        }
    ?>

            <button type="submit">VERSCHLÜSSELN</button>
    </div>
    </form>
</body>

</html>

<?php

        function toNum($data) { // Funktion zur Umwandlung des Alphabets in Zahlen
            $alphabet = array(  'a', 'b', 'c', 'd', 'e', 
                                'f', 'g', 'h', 'i', 'j',
                                'k', 'l', 'm', 'n', 'o',
                                'p', 'q', 'r', 's', 't',
                                'u', 'v', 'w', 'x', 'y', 'z' );
        $alpha_flip = array_flip($alphabet);
        $return_value = -1;
        $length = strlen($data);
        for ($i = 0; $i < $length; $i++) {
            $return_value +=
                ($alpha_flip[$data[$i]] + 1) * pow(26, ($length - $i - 1));
        }
        return $return_value;
    }

    function toChar($number) { // Funktion zur Umwandlung von Zahlen in Buchstaben

        if($number < 0) {
            $number = $number + 26;
        }

        if ($number > 25) {
            $number = $number - 26;
        }

        $alphabet = array(  'a', 'b', 'c', 'd', 'e', 
                            'f', 'g', 'h', 'i', 'j',
                            'k', 'l', 'm', 'n', 'o',
                            'p', 'q', 'r', 's', 't',
                            'u', 'v', 'w', 'x', 'y', 'z' );
    return $alphabet[$number];
}

?>