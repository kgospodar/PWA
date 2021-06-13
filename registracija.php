<?php
    include 'connect.php'; 
    if(isset($_POST['ime'], $_POST['prezime'], $_POST['kime'], $_POST['lozinka'], $_POST['lozinka1'])){
        $ime = $_POST['ime'];
        $prezime =$_POST['prezime'];
        $kIme =$_POST['kime'];
        $lozinka = $_POST['lozinka']; 
        $hashLozinka = password_hash($lozinka, CRYPT_BLOWFISH);
        $razina = 0; 
        $registriranKorisnik = '';
        $upit = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc); 
        if (mysqli_stmt_prepare($stmt, $upit)) { 
            mysqli_stmt_bind_param($stmt, 's', $kIme); 
            mysqli_stmt_execute($stmt); 
            mysqli_stmt_store_result($stmt); 
        } 
        if(mysqli_stmt_num_rows($stmt) > 0){ 
            $msg='Korisničko ime već postoji!'; 
        }else{
            $upit = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) values (?, ?, ?, ?, ?)"; 
            /* Inicijalizira statement objekt nad konekcijom */
            $stmt=mysqli_stmt_init($dbc); 
            /* Povezuje parametre statement objekt s upitom */ 
            if (mysqli_stmt_prepare($stmt, $upit)){ 
                /* Povezuje parametre i njihove tipove s statement objektom */ 
                mysqli_stmt_bind_param($stmt,'ssssd',$ime,$prezime,$kIme,$hashLozinka,$razina); 
                /* Izvršava pripremljeni upit */ 
                mysqli_stmt_execute($stmt); 
                $registriranKorisnik = true;
            }
        }
        mysqli_close($dbc);
        if($registriranKorisnik == true) {
            echo '<p>Korisnik je uspješno registriran!</p>'; 
        } else {
            echo '<br>Registracija neuspješna!';
        }
    }
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
            <form name="registracija" id ="slanje" enctype="multipart/form-data" action="" method="POST">

                <label for="ime">Unesite ime:</label><br>
                <input type="text" name="ime" id="ime"/>
                <span id="porukaIme" class="error"></span></br><br>

                <label for="prezime">Unesite prezime:</label><br>
                <input type="text" name="prezime" id="prezime"/>
                <span id="porukaPrezime" class="error"></span></br><br>

                <label for="kime">Unesite korisničko ime:</label><br>
                <input type="text" name="kime" id="kime"/>
                <?php  echo '<span id="porukaKime">', $msg ,'</span>';?></br><br>

                <label for="lozinka">Unesite lozinku:</label><br>
                <input type="password" name="lozinka" id="lozinka"/>
                <span id="porukaLozinka" class="error"></span></br><br>

                <label for="lozinka1">Ponovite lozinku:</label><br>
                <input type="password" name="lozinka1" id="lozinka1"/>
                <span id="porukaLozinka1" class="error"></span></br><br>

                <button type="reset" value="Odustani">Odustani</button> 
                <button type="submit" value="Registracija" name="Registracija" id="Registracija">Registracija</button>
            </form>
            <script type="text/javascript"> 
                document.getElementById("slanje").onclick = function(event) { 
                    var slanjeForme = true; 
                    // Ime korisnika mora biti uneseno 
                    var poljeIme = document.getElementById("ime"); 
                    var ime = document.getElementById("ime").value; 
                    if (ime.length == 0) { 
                        slanjeForme = false; 
                        poljeIme.style.border="1px dashed red"; 
                        document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>"; 
                    } else { 
                        poljeIme.style.border="1px solid green"; 
                        document.getElementById("porukaIme").innerHTML=""; 
                    } 
                    // Prezime korisnika mora biti uneseno 
                    var poljePrezime = document.getElementById("prezime"); 
                    var prezime = document.getElementById("prezime").value; 
                    if (prezime.length == 0) { 
                        slanjeForme = false;
                        poljePrezime.style.border="1px dashed red"; 
                        document.getElementById("porukaPrezime").innerHTML="<br>Unesite Prezime!<br>"; 
                    } else { 
                        poljePrezime.style.border="1px solid green"; 
                        document.getElementById("porukaPrezime").innerHTML=""; 
                        } 
                    // Korisničko ime mora biti uneseno 
                    var poljeUsername = document.getElementById("kime"); 
                    var username = document.getElementById("kime").value; 
                    if (username.length == 0) { 
                        slanjeForme = false; 
                        poljeUsername.style.border="1px dashed red";
                        document.getElementById("porukaKime").innerHTML="<br>Unesite korisničko ime!<br>"; 
                    } else { 
                        poljeUsername.style.border="1px solid green"; 
                        document.getElementById("porukaKime").innerHTML=""; 
                    } 
                    // Provjera podudaranja lozinki 
                    var poljePass = document.getElementById("lozinka"); 
                    var pass = document.getElementById("lozinka").value; 
                    var poljePassRep = document.getElementById("lozinka1");
                    var passRep = document.getElementById("lozinka1").value; 
                    if (pass.length == 0 || passRep.length == 0 || pass != passRep) { 
                        slanjeForme = false; poljePass.style.border="1px dashed red"; 
                        poljePassRep.style.border="1px dashed red"; 
                        document.getElementById("porukaLozinka").innerHTML="<br>Lozinke nisu iste!<br>"; 
                        document.getElementById("porukaLozinka1").innerHTML="<br>Lozinke nisu iste!<br>"; 
                    } else { 
                        poljePass.style.border="1px solid green"; 
                        poljePassRep.style.border="1px solid green"; 
                        document.getElementById("porukaLozinka").innerHTML=""; 
                        document.getElementById("porukaLozinka1").innerHTML=""; 
                    } 
                    if (slanjeForme != true) { 
                        event.preventDefault(); 
                    }
                }; 
            </script>
        </div>
    </body>
</html>

