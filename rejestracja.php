<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4 text-center">Rejestracja</h2>
                <form method="post">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Imię:</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $firstName ?? "" ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Nazwisko:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $lastName ?? "" ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adres E-Mail:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $email ?? "" ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Hasło:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_repeat" class="form-label">Powtórz Hasło:</label>
                        <input type="password" class="form-control" id="password_repeat" name="password_repeat" required>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="accept_terms" name="accept_terms" required>
                        <label class="form-check-label" for="accept_terms">Akceptuję regulamin</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block w-100">Zarejestruj się</button>
                </form>
                <div class="mt-3 text-center">
                    Masz już konto? <a href="logowanie.php">Zaloguj się</a>.
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>