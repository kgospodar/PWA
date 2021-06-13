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
            <form name="prijava" action="" method="POST">

                <label for="kime">Korisničko ime</label><br>
                <input type="text" name="kime" id="kime"/></br><br>
                <span id="porukaIme" class="error"></span>

                <label for="lozinka">Lozinka</label><br>
                <input type="password" name="lozinka" id="lozinka"/></br><br>
                <span id="porukaLozinka" class="error"></span>

                <button type="submit" value="Prijava" name="Prijava" id="Prijava">Prijava</button>
            </form>
            <?php
                session_start();
                include 'connect.php'; 
                define('UPLPATH', 'img/');
                if (isset($_POST['Prijava'])) {
                    $prijavaImeKorisnika = $_POST['kime']; 
                    $prijavaLozinkaKorisnika = $_POST['lozinka']; 
                    $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?"; 
                    $stmt = mysqli_stmt_init($dbc); 
                    if (mysqli_stmt_prepare($stmt, $sql)) { 
                        mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika); 
                        mysqli_stmt_execute($stmt); 
                        mysqli_stmt_store_result($stmt); 
                    } 
                    mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
                    mysqli_stmt_fetch($stmt);
                    if (password_verify($_POST['lozinka'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) { 
                        $uspjesnaPrijava = true;
                        if($levelKorisnika == 1) { 
                            $admin = true; 
                        } else { 
                            $admin = false; 
                        } 
                        //postavljanje session varijabli 
                        $_SESSION['$username'] = $imeKorisnika; 
                        $_SESSION['$level'] = $levelKorisnika; 
                    } else { 
                        $uspjesnaPrijava = false;
                        echo $uspjesnaPrijava; 
                    } 
                    if (($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['$username'])) && $_SESSION['$level'] == 1) { 
                        $query = "SELECT * FROM vijesti"; 
                        $result = mysqli_query($dbc, $query); 
                        while($row = mysqli_fetch_array($result)) {
                            echo '<form enctype="multipart/form-data" action="" method="POST"> 
                                <div class="form-item"> 
                                    <label for="title">Naslov vjesti:</label> 
                                    <div class="form-field"> 
                                        <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'"> 
                                    </div> 
                                </div> 
                                <div class="form-item"> 
                                    <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label> 
                                    <div class="form-field"> 
                                        <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">'.$row['sazetak'].'</textarea> 
                                    </div> 
                                </div> 
                                <div class="form-item"> 
                                    <label for="content">Sadržaj vijesti:</label> 
                                    <div class="form-field"> 
                                        <textarea name="content" id="" cols="30" rows="10" class="form-field-textual">'.$row['tekst'].'</textarea> 
                                    </div> 
                                </div> 
                                <div class="form-item"> 
                                    <label for="pphoto">Slika:</label>
                                    <div class="form-field">
                                        <input type="file" class="input-text" id="pphoto" value="'.$row['slika'].'" name="pphoto"/>
                                        <br><img src="' . UPLPATH . $row['slika'] . '" width=100px>
                                    </div> 
                                </div>
                                <div class="form-item"> 
                                    <label for="category">Kategorija vijesti:</label> 
                                    <div class="form-field"> 
                                        <select name="category" id="" class="form-field-textual" value="'.$row['kategorija'].'"> 
                                            <option value="sport">Sport</option> 
                                            <option value="kultura">Kultura</option> 
                                        </select> 
                                    </div> 
                                </div> 
                                <div class="form-item"> 
                                    <label>Spremiti u arhivu: 
                                        <div class="form-field">'; 
                                            if($row['arhiva'] == 0) { 
                                                echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?'; 
                                            } else { 
                                                echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?'; 
                                            } echo '</div> </label> 
                                </div> 
                                <div class="form-item"> 
                                    <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'"> 
                                    <button type="reset" value="Poništi">Poništi</button> 
                                    <button type="submit" name="update" value="Prihvati"> Izmjeni</button> 
                                    <button type="submit" name="delete" value="Izbriši"> Izbriši</button> 
                                </div> 
                            </form>'; 
                        }
                        if(isset($_POST['delete'])){
                            $id=$_POST['id']; 
                            $query = "DELETE FROM vijesti WHERE id=$id ";
                            $result = mysqli_query($dbc, $query); 
                        }
                        if(isset($_POST['update'])){ 
                            $picture = $_FILES['pphoto']['name']; 
                            $title=$_POST['title']; 
                            $about=$_POST['about']; 
                            $content=$_POST['content']; 
                            $category=$_POST['category']; 
                            if(isset($_POST['archive'])){ 
                                $archive=1; 
                            }else{ $archive=0; } 
                                $target_dir = 'img/'.$picture;
                                move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
                                $id=$_POST['id']; 
                                $query = "UPDATE vijesti 
                                    SET naslov='$title', sazetak='$about', tekst='$content', slika='$picture', kategorija='$category', arhiva='$archive' 
                                    WHERE id=$id "; $result = mysqli_query($dbc, $query); 
                        }
                    }
                    else if ($uspjesnaPrijava == true && $admin == false) {
                        echo "<br>$imeKorisnika, nemate dovoljna prava za pristup ovoj stranici!";
                    }
                    else if($uspjesnaPrijava == false){
                        echo("<br>Korisnik ne postoji! <a href='registracija.php'>Registrirajte se!</a>");
                    }
                }
            ?>
            
        </div>
        <footer>
           
        </footer>
    </body>
</html>