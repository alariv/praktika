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
$kool = "";
$koolError = "";
$vanus = "";
$vanusError = "";
$eriala = "";
$eriala2 = "";



if (isset ($_POST ["baka"])) {
    $_SESSION["bm"]=$_POST["baka"];
}

if (isset ($_POST ["magi"])) {
    $_SESSION["bm"]=$_POST["magi"];
}

if (isset ($_POST ["eesnimi"])) {
    if (empty($_POST ["eesnimi"])) {
        $eesnimiError = "Eesnimi puudub!";
    } else {
        $eesnimi = $_POST ["eesnimi"];
    }
}

if (isset ($_POST ["perenimi"])) {
    if (empty($_POST ["perenimi"])) {
        $perenimiError = "Perekonnanimi puudub!";
    } else {
        $perenimi = $_POST ["perenimi"];
    }
}

if (isset ($_POST ["email"])) {
    if (empty($_POST ["email"])) {
        $emailError = "Email puudub!";
    } else {
        $email = $_POST ["email"];
    }
}

if (isset ($_POST ["telnr"])) {
    if (empty($_POST ["telnr"])) {
        $telnrError = "Telefoninumber puudub!";
    } else {
        $telnr = $_POST ["telnr"];
    }
}
if (isset ($_POST ["kool"])) {
    if (empty($_POST ["kool"])) {
        $koolError = "Koolinimi puudub!";
    } else {
        $kool = $_POST ["kool"];
    }
}
if (isset ($_POST ["vanus"])) {
    if (empty($_POST ["vanus"])) {
        $vanusError = "Vanus puudub!";
    } else {
        $vanus = $_POST ["vanus"];
    }
}
if (isset ($_POST ["eriala"])) {
    if (empty($_POST ["eriala"])) {
        $erialaError = "eriala puudub!";
    } else {
        $eriala = $_POST ["eriala"];
    }
}
if (isset ($_POST ["eriala2"])) {
    if (empty($_POST ["eriala2"])) {
        $eriala2Error = "Eriala puudub!";
    } else {
        $eriala2 = $_POST ["eriala2"];
    }
}

$bakaDropDownEriala=$Vari->getBaka();
$bakaDropDownEriala2=$Vari->getBaka2();



$magiDropDownEriala=$Vari->getMagi();
$magiDropDownEriala2=$Vari->getMagi2();


if( isset($_POST["eesnimi"]) &&
    isset($_POST["perenimi"]) &&
    isset($_POST["email"]) &&
    isset($_POST["telnr"]) &&
    isset($_POST["kool"]) &&
    isset($_POST["vanus"]) &&
    isset($_POST["eriala"]) &&
    isset($_POST["eriala2"]) &&
    !empty($_POST["eesnimi"]) &&
    !empty($_POST["perenimi"]) &&
    !empty($_POST["email"]) &&
    !empty($_POST["telnr"]) &&
    !empty($_POST["kool"]) &&
    !empty($_POST["vanus"]) &&
    !empty($_POST["eriala"]) &&
    !empty($_POST["eriala2"])
)	{
    
	$firstname = $Helper->cleanInput($_POST["eesnimi"]);
    $lastname = $Helper->cleanInput($_POST["perenimi"]);
    $email = $Helper->cleanInput($_POST["email"]);
    $phonenr = $Helper->cleanInput($_POST["telnr"]);
    $age = $Helper->cleanInput($_POST["vanus"]);
	$school = $Helper->cleanInput($_POST["kool"]);
	
	
    $Vari->saveVari($firstname,$lastname,$email,$phonenr,$school,$age,$_SESSION["bm"],$_POST["eriala"],$_POST["eriala2"]);

    require_once '../swiftmailer/lib/swift_required.php';

    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
        ->setUsername($mail)
        ->setPassword($password);

    $mailer = Swift_Mailer::newInstance($transport);

    $message = Swift_Message::newInstance('registreerimine õnnestus')
        ->setFrom(array($mail => 'Tudengivarjuveeb'))
        ->setTo(array($email))
        ->setBody('Registreerusid edukalt tlu tudengivarju lehel tudengivarjuks.');

    $result = $mailer->send($message);

    header("Location: welcome.php");
    exit();
}
?>

<?php require("../header.php");?>
<?php require("../style/style.css");?>
<!DOCTYPE html>
<html lang="et">
<head>
    <script type="text/javascript" src="../js/modify.js" defer></script>
    <p style="background-color: #B71234;font-size: 25px"><a style="color: black" href="welcome.php"> Avaleht</a></p>
</head>

<body>
<div id="background">
<br>
<p class="pageHeading">
    Registreerimine VARJUKS
</p>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">

            <button id="baka" value="baka" name="bm" style=";width: 50%" onclick="showBakaForm()">BAKALAUREUS</button>
            <button id="magi" value="magi" name="bm" style="position: absolute;width: 50%;float: right;margin: 0" onclick="showMagiForm()">MAGISTER</button><br><br>
            <div id="bakaForm" class="bakaForm" style="position: absolute;">
                <form  method="POST" style=" transition:all 1s;">
                    <input type="text" placeholder="Eesnimi" value="<?=$eesnimi;?>" name="eesnimi" maxlength="50"><br><br>
                    <input type="text" placeholder="Perekonnanimi" value="<?=$perenimi;?>" name="perenimi" maxlength="50"><br><br>
                    <input type="email" placeholder="Email" value="<?=$email;?>" name="email" maxlength="50"><br><br>
                    <input type="tel" placeholder="Telefoninumber" value="<?=$telnr;?>" name="telnr" maxlength="15"><br><br>
                    <input type="text" placeholder="Kool" value="<?=$kool;?>" name="kool" maxlength="50"><br><br>
                    <input type="tel" placeholder="Vanus" value="<?=$vanus;?>" name="vanus" min="14" max="99" maxlength="2"><?php echo $vanusError; ?><br><br>


                    1.eelistus: <select name="eriala" type="text" placeholder="Eriala" style="width: 150px">
                        <?php

                        $listHtml = "";

                        foreach($bakaDropDownEriala as $d){


                            $listHtml .= "<option value='".$d->eriala."'>".$d->eriala."</option>";

                        }

                        echo $listHtml;

                        ?>
                    </select><br><br>
                    2.eelistus: <select name="eriala2" type="text" placeholder="Eriala" style="width: 150px">
                        <?php

                        $listHtml = "";

                        foreach($bakaDropDownEriala2 as $d){


                            $listHtml .= "<option value='".$d->eriala2."'>".$d->eriala2."</option>";

                        }

                        echo $listHtml;

                        ?>
                    </select><br><br>
                    <button style="width: 100%;height: 50px;font-size: 30px" type="submit" value="baka" name="baka">SALVESTA</button><br><br>

                </form>
            </div>


            <div id="magiForm" class="magiForm" style="position: absolute;right: 0">
                <form  method="POST" style=" transition:all 1s;" >
                    <input type="text" placeholder="Eesnimi" value="<?=$eesnimi;?>" name="eesnimi" maxlength="50"><br><br>
                    <input type="text" placeholder="Perekonnanimi" value="<?=$perenimi;?>" name="perenimi" maxlength="50"><br><br>
                    <input type="email" placeholder="Email" value="<?=$email;?>" name="email" maxlength="50"><br><br>
                    <input type="tel" placeholder="Telefoninumber" value="<?=$telnr;?>" name="telnr" maxlength="15"><br><br>
                    <input type="text" placeholder="Kool" value="<?=$kool;?>" name="kool" maxlength="50"><br><br>
                    <input type="tel" placeholder="Vanus" value="<?=$vanus;?>" name="vanus" min="14" max="99" maxlength="2"><?php echo $vanusError; ?><br><br>


                    1.eelistus: <select name="eriala" type="text" placeholder="Eriala" style="width: 150px">
                        <?php

                        $listHtml = "";

                        foreach($magiDropDownEriala as $d){


                            $listHtml .= "<option value='".$d->eriala."'>".$d->eriala."</option>";

                        }

                        echo $listHtml;

                        ?>
                    </select><br><br>
                    2.eelistus: <select name="eriala2" type="text" placeholder="Eriala" style="width: 150px">
                        <?php

                        $listHtml = "";

                        foreach($magiDropDownEriala2 as $d){


                            $listHtml .= "<option value='".$d->eriala2."'>".$d->eriala2."</option>";

                        }

                        echo $listHtml;

                        ?>
                    </select><br><br>
                    <button style="width: 100%;height: 50px;font-size: 30px" type="submit" value="magi" name="magi">SALVESTA</button><br><br>

                </form>
            </div>
        </div>
    </div>
</div>

</div>
</body>



<?php require("../footer.php");?>
</html>
