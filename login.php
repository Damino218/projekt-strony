<?php
//włącz obsługę sesji w tym pliku
session_start();
//zaimportuj definicję klasy
//require wymaga zaimportowania - wykrzaczy skrypt jeśli nie uda się zaimportować
require("./class/User.class.php");
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-body-secondary">
    <div class="container mt-5">
    <?php if(isset($_REQUEST['submit'])) : ?>
        <!-- Jeśli został wysłany formularz to... -->
        <?php
        //użyj metody z klasy
        //dostaniemy do $result true lub false jeśli się uda lub nie
        $result = User::Login($_REQUEST['email'], $_REQUEST['password']);
        ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4 text-center">
                    <?php
                        if($result)
                            echo "Udało się zalogować";
                        else
                            echo "Nastąpił błąd podczas logowania"
                    ?>
                </h2>
                <a class="text-canter" href="index.php">Powrót do strony głównej</a>
            </div>
        </div>
    <?php else : ?>
        <!-- Jeśli nie został wysłany formularz to... -->
        <div class="row justify-content-center">
            <div class="col-md-6 p-4 bg-white shadow rounded-4 align-middle">
                <h2 class="mb-4 text-center">Logowanie</h2>
                <form method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Adres E-Mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Hasło:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" name="submit" class="btn w-100 btn-primary btn-block">Zaloguj się</button>
                </form>
                <div class="mt-3 text-center">
                    <a href="index.php">Powrót do strony głównej.</a>
                </div>
                <div class="mt-3 text-center">
                    Nie masz jeszcze konta? <a href="register.php">Zarejestruj się</a>.
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>