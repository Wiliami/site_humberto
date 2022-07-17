<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <div div="container mt-5">
        <form action="">
            <div>
                <label for="num"></label>
                <input type="number" name="num" id="num" placeholder="Digite um número">
            </div>
            <input type="submit" class="btn btn-success"value="Enviar">
        </form>
        <div>
            <?php
            if(!empty($_GET['num'])) {
                $number = $_GET['num'];
                for($i = 1; $i <= 10; $i++) {
                    echo "$i * $number = ".($i * $number);
                    echo "<br><br>";
                }
            }
            ?>
        </div>
    </div>
    </body>
</html>
