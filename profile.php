<?php
//pobierz sobie z url ID profilu
if(isset($_GET['profileID'])) {
    //jeśli istnieje profile id w url (w linku)
    $id = $_GET['profileID'];
} else {
    //jeśli nie istnieje w linku (nie podano) to ustaw 1
    $id = 1;
}


//kwerenda pobiera jeden profil z tabeli po jego ikd
$sql = "SELECT p.ID AS profileID, p.firstName, p.lastName, p.description, ph.url FROM profile p LEFT JOIN photo ph ON p.profilePhotoID = ph.ID WHERE p.ID=?";

//połącz się z bazą danych
$db = new mysqli('localhost', 'root', '', 'projekt-strony');

//przygotuj kwerendę do wysłania
$query = $db->prepare($sql);

//podstaw ID
$query->bind_param('i', $id);

//wykonujemy kwerendę
$query->execute();

//odbierz wynik
$result = $query->get_result()->fetch_assoc();

$firstName = $result['firstName'];
$lastName = $result['lastName'];
$description = $result['description'];
$profilePhotoUrl = $result['url'];
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil użytkownika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Nazwa Strony</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Szukaj zawartości" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Szukaj</button>
                </form>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Aktualności</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Zawartość strony</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Zawartość strony</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="btn btn-primary">Zaloguj się</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 p-4 bg-light rounded">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center">
                        <img src="<?php echo $profilePhotoUrl; ?>" class="rounded-circle img-thumbnail" alt="Zdjęcie profilowe" width="150">
                    </div>
                    <div class="col-md-9">
                        <h2 class="mb-3"><?php echo $firstName . " " . $lastName; ?></h2>
                        <p class="mb-0"><?php echo $description; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>