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
            <form name="unos podataka" id="unos" enctype="multipart/form-data" action="skripta.php" method="POST">

                <label for="naslov">Unesite naslov vijesti:</label><br>
                <input type="text" name="naslov" id="naslov"/></br>
                <span id="porukaNaslov" class="error"></span></br><br>

                <label for="sazetak">Unesite sažetak vijesti (do 50 znakova):</label><br>
                <textarea name="sazetak" id="sazetak" cols="30" rows="10"></textarea><br>
                <span id="porukaSazetak" class="error"></span></br><br>

                <label for="clanak">Unesite tekst vijesti:</label><br>
                <textarea name="clanak" id="clanak" rows="10" cols="30"></textarea><br>
                <span id="porukaClanak" class="error"></span></br><br>

                <br>
                <label for="slika">Odaberite sliku vijesti:</label><br>
                <input type="file" name="slika" id="slika" accept="image/jpg,image/jpeg,image/png"><br>
                <span id="porukaSlika" class="error"></span>
                <br><br>

                
                <label for="kategorija">Kategorija vijesti</label><br>
                <select name ="kategorija" id="kategorija">
                    <option value="none">/</option>
                    <option value="glazba">glazba</option>
                    <option value="sport">sport</option>
                </select><br>
                <span id="porukaKategorija" class="error"></span>
                <br><br>

                

                <label for="obavijest">Spremiti u arhivu:</label><br>
                <input type="checkbox" id="arhiva" name="arhiva" value="1">
                <br><br>

                <button type="reset" value="Poništi">Poništi</button> 
                <button type="submit" value="Prihvati" name="Prihvati" id="Prihvati">Prihvati</button>
            </form>
            <script type="text/javascript">
                document.getElementById("Prihvati").onclick = function(event) { 
                    var slanjeForme = true; 
                    // Naslov vjesti (5-30 znakova) 
                    var poljeTitle = document.getElementById("naslov"); 
                    var title = document.getElementById("naslov").value; 
                    if (title.length < 5 || title.length > 30) { 
                        slanjeForme = false; 
                        poljeTitle.style.border="1px dashed red"; 
                        document.getElementById("porukaNaslov").innerHTML="Naslov vijesti mora imati između 5 i 30 znakova!<br>"; 
                    } else { 
                        poljeTitle.style.border="1px solid green"; 
                        document.getElementById("porukaNaslov").innerHTML=""; 
                    } 
                    // Kratki sadržaj (10-100 znakova) 
                    var poljeAbout = document.getElementById("sazetak"); 
                    var about = document.getElementById("sazetak").value; 
                    if (about.length < 10 || about.length > 100) { 
                        slanjeForme = false; poljeAbout.style.border="1px dashed red"; 
                        document.getElementById("porukaSazetak").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>"; 
                    } else { 
                        poljeAbout.style.border="1px solid green";
                        document.getElementById("porukaSazetak").innerHTML=""; 
                    } 
                    // Sadržaj mora biti unesen 
                    var poljeContent = document.getElementById("clanak"); 
                    var content = document.getElementById("clanak").value; 
                    if (content.length == 0) { 
                        slanjeForme = false; 
                        poljeContent.style.border="1px dashed red"; 
                        document.getElementById("porukaClanak").innerHTML="Sadržaj mora biti unesen!<br>"; 
                    } else { 
                        poljeContent.style.border="1px solid green";
                        document.getElementById("porukaClanak").innerHTML=""; 
                    } 
                    // Slika mora biti unesena 
                    var poljeSlika = document.getElementById("slika"); 
                    var slika = document.getElementById("slika").value; 
                    if (slika.length == 0) { 
                        slanjeForme = false; 
                        poljeSlika.style.border="1px dashed red";
                        document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>"; 
                    } else { 
                        poljeSlika.style.border="1px solid green"; 
                        document.getElementById("porukaSlika").innerHTML=""; 
                    } 
                    // Kategorija mora biti odabrana 
                    var poljeCategory = document.getElementById("kategorija"); 
                    if(document.getElementById("kategorija").selectedIndex == 0) { 
                        slanjeForme = false; poljeCategory.style.border="1px dashed red";
                        document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>"; 
                    } else { 
                        poljeCategory.style.border="1px solid green"; 
                        document.getElementById("porukaKategorija").innerHTML=""; 
                    } 
                    if (slanjeForme != true) { 
                        event.preventDefault(); 
                    }
                }; 
            </script>
        </div>
        <footer>
           
        </footer>
    </body>
</html>