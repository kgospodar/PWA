<?php 
include 'connect.php'; 
define('UPLPATH', 'img/'); 
?> 

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Projekt</title>
		<meta author="Karla Gospodarić"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <header>
            <div class="omotac">
                <img src="logo.png"/>
                <nav>
                    <ul>
                        <li><a href="index.php">početna</a></li>
                        <li><a href="kategorija.php?id=glazba">glazba</a></li>
                        <li><a href="kategorija.php?id=sport">sport</a></li>
                        <li><a href="administracija.php">administracija</a></li>
                        <li><a href="unos.php">unos vijesti</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="wrapper"> 
            <?php
                $id = $_GET['id'];
                $query = "SELECT * FROM vijesti WHERE arhiva=0 AND id='$id'";
                $result = mysqli_query($dbc, $query); 
                $i=0; 
                while($row = mysqli_fetch_array($result)) {
                    echo '<section class="slika">'; 
                    echo '<img src="' . UPLPATH . $row['slika'] . '">'; 
                    echo '</section>'; 
                    echo '<h1 class="title">';
                    echo $row["naslov"];
                    echo '</h1>';
                    echo "<span>".$row['datum']."</span>";
                    echo '<section class="about">';
                    echo "<br><i>".$row['sazetak']."</i>";
                    echo '</section>';
                    echo '<br><section class="sadrzaj">';
                    echo $row['tekst'];
                    echo '</section>'; 
                }
            ?>
        </div>
        <footer>
           
        </footer>
    </body>
</html>