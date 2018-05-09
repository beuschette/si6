<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="images/logo.png" width="200" height="74" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="Index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form action ="recherche.php" method="get">
                    <input type="text" size="50" name ="chercher">
                    <input type="submit" value="OK">
                </form>
            </div>
        </nav>
    </header>
    <div class="row">
        <div class="col-3">
            <ul class="menu-familles">
                <form action="type.php">
                    <div="form-group">
                    <label for = "element">
                        choisir un element </label>
                    <select class="form control" name = "Type" id="element">
                        <option value ="FEU">le feu sa brûle</option>
                        <option value ="EAU">Zora</option>
                        <option value ="PLANTE">Tarzan</option>
                        <option value ="COMBAT">bruce lee</option>
                        <option value ="DRAGON">dragon ball</option>
                        <option value ="ELECTRIK">pas la prise</option>
                        <option value ="GLACE">sakaÏ</option>
                        <option value ="INSECT">c'est pas beau</option>
                        <option value ="NORMAL">simple, basic</option>
                        <option value ="POISON">kamoulox</option>
                        <option value ="PSY">tout va bien ?</option>
                        <option value ="ROCHE">Pas mou l'caillou</option>
                        <option value ="SOL">Goron</option>
                        <option value ="SPECTRE">BOUH</option>
                        <option value ="VOl"> fly away</option>

                    </select>
        </div>
        <button class="btn">go!</button>
        </form>
        </ul>
    </div>

    <?php
    if(isset($_GET['Type'])){
        $avatar=$_GET['Type'];
    }
    try{
        $db=new PDO(
            "mysql:dbname=local;host=localhost",
            "root",
            "root",
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")

        );


    }catch(PDOException $exception){
        echo "Erreur:".$exception->getMessage();
    }
    $reponse=$db->query("SELECT * FROM Pokemon WHERE Type1 LIKE '%$avatar%' OR Type2 LIKE '%$avatar%'");
    while ($ligne=$reponse->fetch()){


        echo "
<div class='col-9 block-pokemon'>
            <!-- Fiche pokemon début -->

            <div class='row'>
                <div class='col-2'>";
        echo '<img class="img-fluid"  src="images/'.$ligne['Numero'].".png".'" />

                </div>
                <div class=col-10>';
        echo "<h4>"."Numéro: ".$ligne['Numero']." ".$ligne['Nom_fr']."/".$ligne['Nom_en'] ." ". '<img class="img-fluid" src="images/'.$ligne['Type1'].".png".'"> <img class="img-fluid" src="images/'.$ligne['Type2'].".png".'"></h4>';

        echo "<p>".$ligne['Description']."</p>
                </div>
            </div>
            </div>
            <!-- Fiche pokemon fin -->";
    }
    ?>
</body>
</html>