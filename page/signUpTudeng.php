<?php
require("../functions.php");

$bm = "";
$BM = "";
$bmError = "";
$eesnimi = "";
$eesnimiError = "";
$perenimi = "";
$perenimiError = "";
$email = "";
$emailError = "";
$telnr = "";
$telnrError = "";
$kursus = "";
$kursusError = "";
$vanus = "";
$vanusError = "";
$eriala = "";
$eriala2 = "";
$visibility = "fadeable";



if (isset ($_POST ["bm"])) {
    // oli olemas, ehk keegi vajutas nuppu
    if (empty($_POST ["bm"])) {
        //oli t�esti t�hi
        $bmError = "Vali kraad!";
    } else {
        $bm = $_POST ["bm"];
        $_SESSION["bm"]= $_POST ["bm"];
    }
}

if (isset ($_POST ["eesnimi"])) {
    // oli olemas, ehk keegi vajutas nuppu
    if (empty($_POST ["eesnimi"])) {
        //oli t�esti t�hi
        $eesnimiError = "Eesnimi puudub!";
    } else {
        $eesnimi = $_POST ["eesnimi"];
    }
}

if (isset ($_POST ["perenimi"])) {
    // oli olemas, ehk keegi vajutas nuppu
    if (empty($_POST ["perenimi"])) {
        //oli t�esti t�hi
        $perenimiError = "Perekonnanimi puudub!";
    } else {
        $perenimi = $_POST ["perenimi"];
    }
}

if (isset ($_POST ["email"])) {
    // oli olemas, ehk keegi vajutas nuppu
    if (empty($_POST ["email"])) {
        //oli t�esti t�hi
        $emailError = "Email puudub!";
    } else {
        $email = $_POST ["email"];
    }
}

if (isset ($_POST ["telnr"])) {
    // oli olemas, ehk keegi vajutas nuppu
    if (empty($_POST ["telnr"])) {
        //oli t�esti t�hi
        $telnrError = "Telefoninumber puudub!";
    } else {
        $telnr = $_POST ["telnr"];
    }
}
if (isset ($_POST ["kursus"])) {
    // oli olemas, ehk keegi vajutas nuppu
    if (empty($_POST ["kursus"])) {
        //oli t�esti t�hi
        $kursusError = "kursus puudub!";
    } else {
        $kursus = $_POST ["kursus"];
    }
}
if (isset ($_POST ["vanus"])) {
    // oli olemas, ehk keegi vajutas nuppu
    if (empty($_POST ["vanus"])) {
        //oli t�esti t�hi
        $vanusError = "Vanus puudub!";
    } else {
        $vanus = $_POST ["vanus"];
    }
}
if (isset ($_POST ["eriala"])) {
    // oli olemas, ehk keegi vajutas nuppu
    if (empty($_POST ["eriala"])) {
        //oli t�esti t�hi
        $erialaError = "eriala puudub!";
    } else {
        $eriala = $_POST ["eriala"];
    }
}
if (isset ($_POST ["eriala2"])) {
    // oli olemas, ehk keegi vajutas nuppu
    if (empty($_POST ["eriala2"])) {
        //oli t�esti t�hi
        $eriala2Error = "Eriala puudub!";
    } else {
        $eriala2 = $_POST ["eriala2"];
    }
}

if ($bm == "baka") {
    $dropDownEriala=$Vari->getBaka();
    $dropDownEriala2=$Vari->getBaka2();
    $visibility = "fadeable fade-in";

}
if ($bm == "magi") {
    $dropDownEriala=$Vari->getMagi();
    $dropDownEriala2=$Vari->getMagi2();
    $visibility = "fadeable fade-in";

}

if( isset($_POST["eesnimi"]) &&
    isset($_POST["perenimi"]) &&
    isset($_POST["email"]) &&
    isset($_POST["telnr"]) &&
    isset($_POST["kursus"]) &&
    isset($_POST["vanus"]) &&
    isset($_POST["eriala"]) &&
    !empty($_POST["eesnimi"]) &&
    !empty($_POST["perenimi"]) &&
    !empty($_POST["email"]) &&
    !empty($_POST["telnr"]) &&
    !empty($_POST["kursus"]) &&
    !empty($_POST["vanus"]) &&
    !empty($_POST["eriala"])
)	{
    echo "sainSISSE";
    $Tudeng->saveTudeng($_POST["eesnimi"],$_POST["perenimi"],$_POST["email"],$_POST["telnr"],$_POST["kursus"],$_POST["vanus"],$_SESSION["bm"],$_POST["eriala"]);
    header("Location: welcome.php");
    exit();
}
?>

<?php require("../header.php");?>
<?php require("../style/style.css");?>


    <head>


    </head>

    <body>
    <br>
    <p class="pageHeading">
        Registreerimine TUDENGIKS
    </p>

    <form  method="POST">
        <button value="baka" name="bm" placeholder="BAKA">BAKALAUREUS</button>
        <button value="magi" name="bm" placeholder="MAGI">MAGISTER</button><br><br>
    </form>
    <form  method="POST" class="<?php echo $visibility ?>">
        <input type="text" placeholder="Eesnimi" value="<?=$eesnimi;?>" name="eesnimi"><br><br>
        <input type="text" placeholder="Perekonnanimi" value="<?=$perenimi;?>" name="perenimi"><br><br>
        <input type="text" placeholder="Email" value="<?=$email;?>" name="email"><br><br>
        <input type="text" placeholder="Telefoninumber" value="<?=$telnr;?>" name="telnr"><br><br>
        <input type="text" placeholder="Vanus" value="<?=$vanus;?>" name="vanus"><br><br>


        eriala: <select name="eriala" type="text" placeholder="Eriala" style="width: 150px">
            <?php

            $listHtml = "";

            foreach($dropDownEriala as $d){


                $listHtml .= "<option value='".$d->eriala."'>".$d->eriala."</option>";

            }

            echo $listHtml;

            ?>
        </select><br><br>
        <input type="text" placeholder="Mitmes kursus" value="<?=$kursus;?>" name="kursus"><br><br>

        <button style="width: 300px;height: 50px" type="submit">SALVESTA</button><br><br>

    </form>

    </body>



<?php require("../footer.php");?>