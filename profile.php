<?php
require_once('class/User.class.php');
require_once('class/Profile.class.php');
session_start();

if(isset($_REQUEST['profileID'])) {
    $profileID = $_REQUEST['profileID'];
    $p = Profile::Get($profileID);
} else {
    if(isset($_SESSION['user'])) {
        //jest zalogowany użytkownik - pokaż jego profil
        //załaduj profil zalogowanego użytkownika
        $p = Profile::GetUserProfile($_SESSION['user']->GetID());
    } else {
        //pokaż domyślny profil
        $p = Profile::Get(2);
    }
}
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
            <a href="index.php" class="navbar-brand">Nazwa Strony</a>
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
                        <img src="<?php echo $p->getFullName(); ?>" class="rounded-circle img-thumbnail" alt="Zdjęcie profilowe" width="150">
                    </div>
                    <div class="col-md-9">
                        <h2 class="mb-3"><?php echo $p->getFullName(); ?></h2>
                        <p class="mb-0">Nie wiem</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>