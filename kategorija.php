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
        <?php 
            include 'connect.php'; 
            define('UPLPATH', 'img/');
            $kategorija =$_GET['id']; 
        ?> 
        <div class="wrapper">
            <br>
            <?php 
                if($kategorija == 'glazba'){
                    echo"<span class='kategorija' style='background-color:rgb(216, 53, 86)' style='border: 1px solid rgb(216, 53, 86)'>$kategorija</span>";
                }else{
                    echo"<span class='kategorija' style='background-color:rgb(34, 201, 34)' style='border: 1px solid rgb(34, 201, 34)'>$kategorija</span>";
                }
            ?>
            <br>
            <section class="kategorija"> 
                <?php 
                    $query = "SELECT * FROM vijesti WHERE kategorija = '$kategorija' AND arhiva = 0 ORDER BY id DESC";
                    $result = mysqli_query($dbc, $query); 
                    $i=0; 
                    while($row = mysqli_fetch_array($result)) {
                        echo '<article>'; 
                        echo'<div class="article">'; 
                        echo '<div class="glazba_img">'; 
                        echo '<img src="' . UPLPATH . $row['slika'] . '"'; 
                        echo '</div>'; echo '<div class="media_body">'; 
                        echo '<h4 class="title">'; 
                        echo '<a href="clanak.php?id='.$row['id'].'">'; 
                        echo $row['naslov']; echo '</a></h4>'; 
                        echo '</div></div>'; echo '</article>'; 
                    }
                ?> 
            </section>
        </div>
        <footer>
           
        </footer>
    </body>
</html>