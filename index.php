<?php

error_reporting(0);

require 'db.php';

if(isset($_POST['submit']))
{
    $meno = $_POST['meno'];
    $priezvisko = $_POST['priezvisko'];
    $ulica = $_POST['ulica'];
    $cislo_domu = $_POST['cislo_domu'];
    $psc = $_POST['psc'];
    $mesto = $_POST['mesto'];
    $iban = $_POST['iban'];

    if($meno == "" || $priezvisko == "" || $ulica == "" || $cislo_domu == "" || $psc == "" || $mesto == "" || $iban == "")
    {
        if($meno == "") { $meno_text = " meno"; }
        if($priezvisko == "") { $priezvisko_text = " priezvisko"; }
        if($ulica == "") { $ulica_text = " ulicu"; }
        if($cislo_domu == "") { $cislo_domu_text = " číslo domu"; }
        if($psc == "") { $psc_text = " PSČ"; }
        if($mesto == "") { $mesto_text = " mesto"; }
        if($iban == "") { $iban_text = " IBAN"; }

        $error = "Nevyplnil si:";

        echo "<script>alert('" . $error . $meno_text . $priezvisko_text . $ulica_text . 
        $cislo_domu_text . $psc_text . $mesto_text . $iban_text . "');</script>";

        if(strlen($psc) != 5)
        {
            echo "<script>alert('PSČ musí mať 5 znakov!')</script>";
        }

    }

    else
    {
        if (strlen($psc) == 5)
        {
            $query = "INSERT INTO data (meno, priezvisko, ulica, cislo_domu, psc, mesto, iban) 
            VALUES('$meno', '$priezvisko', '$ulica', '$cislo_domu','$psc', '$mesto', '$iban')";
            mysqli_query($con, $query);
    
            echo "<script>alert('Úspešne si odoslal údaje!')</script>";
    
            $meno = ""; $priezvisko = ""; $ulica = ""; $cislo_domu = ""; $psc = ""; $mesto = ""; $iban = "";
        }

        else
        {
            echo "<script>alert('PSČ musí mať 5 znakov!')</script>";
        }    
        
    }
}



?>

<!DOCTYPE html>
<html lang="sk">

<?php
include("inc/head.php");
?>

<body>
    <div class="container">
        <div class="step-row">
          <div id="progress"></div>
            <div class="step-col"><small id="meno-priezvisko">Meno a Priezvisko</small></div>
            <div class="step-col"><small id="adresa">Adresa</small></div>
            <div class="step-col"><small id="iban">IBAN</small></div>
        </div>

        <form class="form" id="form" method="post">
            <div id="page1" class="page">
                <h3>Meno a Priezvisko</h3>
                <input type="text" name="meno" placeholder="Meno" id="meno" value="<?php echo $meno; ?>">
                <input type="text" name="priezvisko" placeholder="Priezvisko" id="priezvisko" value="<?php echo $priezvisko; ?>">

                <div class="btn-box">
                <input type="button" name="next1" value="Pokračovať" id="next1">
                </div>

            </div>  

            <div id="page2" class="page">
                <h3>Adresa</h3>
                <input type="text" name="ulica" placeholder="Ulica" id="ulica" value="<?php echo $ulica; ?>">
                <input type="text" name="cislo_domu" placeholder="Číslo domu" id="cislo_domu" value="<?php echo $cislo_domu; ?>">
                <input type="text" name="psc" placeholder="PSČ" id="psc" value="<?php echo $psc; ?>">
                <input type="text" name="mesto" placeholder="Mesto" id="mesto" value="<?php echo $mesto; ?>">

                <div class="btn-box">
                <input type="button" name="back1" value="Krok Späť" id="back1">
                <input type="button" name="next2" value="Pokračovať" id="next2">
                </div>
            </div>  

            <div id="page3" class="page" method="post">
                <h3>IBAN</h3>
                <input type="text" name="iban" placeholder="IBAN" id="iban" value="<?php echo $iban; ?>">

                <div class="btn-box">
                <input type="button" name="back2" value="Krok Späť" id="back2">
                <br><br><br><br>
                <input type="submit" name="submit" value="Submit" id="submit">
                </div>
            </div>  
        </form>
        
    </div>
    
    <?php
        $data = "SELECT * FROM data";

        if($udaje = mysqli_query($con, $data))
        {
            if(mysqli_num_rows($udaje) > 0)
            {
                echo "<div class='table-link'><a href='table.php'>Tabuľka</a></div>";
            }

        }
    ?>

<?php
include("inc/footer.php");
?>