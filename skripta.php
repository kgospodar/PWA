
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
                include 'connect.php'; 
                if(isset($_POST['naslov'], $_POST['sazetak'],$_POST['clanak'],$_POST['kategorija'],$_FILES['slika'])){
                    $picture = $_FILES['slika']['name']; 
                    $title=$_POST['naslov']; 
                    $about=$_POST['sazetak']; 
                    $content=$_POST['clanak']; 
                    $category=$_POST['kategorija']; 
                    $datum=date('d.m.Y.'); 
                    if(isset($_POST['arhiva'])){ 
                        $archive=1;
                    }else{ 
                        $archive=0;
                    } 
                    $target_dir = 'img/'.$picture; 
                    move_uploaded_file($_FILES["slika"]['tmp_name'], $target_dir); 
                    $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva ) 
                        VALUES ('$datum', '$title', '$about', '$content', '$picture', '$category', '$archive')"; 
                    $result = mysqli_query($dbc, $query) or die('Error querying databese.'); 
                    mysqli_close($dbc); 
                } else{
                    echo "<br>error!";
                }
            ?>
            <br>
            <span class="kategorija">
                <?php
                    $category=$_POST['kategorija'];
                    echo $category; 
                ?>
            </span>
            <br>
            <section class="prvi">
                <article class="jedan">
                    <a href="prva.html">
                        <?php
                            $picture = $_FILES['slika']['name'];
                            echo "<img src='$picture'";
                        ?>
                        <h2>
                            <?php
                                $title=$_POST['naslov'];
                                echo $title;
                            ?>
                        </h2>
                        <p><?php
                            $datum=date('d.m.Y.');
                            echo $datum;
                        ?></p>
                    </a>
                </article>
            </section>
        </div>
        <footer>
           
        </footer>
    </body>
</html>

