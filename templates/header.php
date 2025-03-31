<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="styles/main.css" rel="stylesheet">
    <title><?= $title ?? "Pokédex" ?></title>
</head>

<body>

    <header class="navbar">
        <div class="leftLinks">
            <img src="styles/images/pokeball.png" alt="">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                </ul>
        </div>
        <form class="searchForm" action="index.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Cherchez un pokémon" aria-label="Search" name="pokemonSelection">
            <input name="action" value="homePage" type="hidden">
            <!-- index.php?action=homePage -->
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

            <!-- SI le nom rentré existe
            if($this->getName != false) {  -->
            <!-- ALORS redirection vers la page de sa description -->
             <!-- header('Location: selectionPage.php');
             exit(); -->
        </form>



    </header>