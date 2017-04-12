<?php
require("../functions.php");
if(!isset ($_SESSION["userId"])) {

    header("Location: admin.php");
    exit();
}
if(isset($_GET["logout"])) {

    session_destroy();

    header("Location: admin.php");
    exit();
}
if (isset ($_POST ["pairVari"])) {
    // oli olemas, ehk keegi vajutas nuppu
    if (empty($_POST ["pairVari"])) {
        //oli t�esti t�hi
        $pairVariError = "";
    } else {
        $pairVari = $_POST ["pairVari"];
        $_SESSION["pairVari"]= $_POST["pairVari"];
    }
}
if (isset ($_POST ["pairTudeng"])) {
    // oli olemas, ehk keegi vajutas nuppu
    if (empty($_POST ["pairTudeng"])) {
        //oli t�esti t�hi
        $pairTudengError = "";
    } else {
        $pairTudeng = $_POST ["pairTudeng"];
        $_SESSION["pairTudeng"]= $_POST["pairTudeng"];
    }
}


if (isset ($_POST ["pair"])) {
    if( isset($_SESSION["pairVari"]) &&
        isset($_SESSION["pairTudeng"]) &&
        !empty($_SESSION["pairVari"]) &&
        !empty($_SESSION["pairTudeng"])
    ){
        $pairId = $Pair->getPairId();
        var_dump($_SESSION["PairId"]);
        $Pair->updatePairId();
        $Pair->updateVari($_SESSION["PairId"], $_SESSION["pairVari"]);
        $Pair->updateTudeng($_SESSION["PairId"], $_SESSION["pairTudeng"]);
    }
}

$varjud = $Admin->getVarjud();
$tudengid = $Admin->getTudengid();


?>
<?php require ("../header.php")?>
<?php require("../style/style.css");?>


<head>

</head>
<body>


<p class="pageHeading">OLED ADMINIGA SISSE LOGITUD.... <a href="?logout=1">logi valja</a></p>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3>registreeritud varjud:</h3>

            <?php

            $html = "<table style='width: 20%' class='table table-striped'>";
            $html .= "<tr>";

            $html .= "<th><center><a style='font-size: 20px' > Vali</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Eesnimi</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Perenimi</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Vanus</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Aste</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Eriala1</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Eriala2</center></th>";



            foreach($varjud as $V){
                if( isset($_SESSION["pairVari"])){
                    if($V->id == $_SESSION["pairVari"]) {
                        $html .= "<tr>";
                        $html .= "<td style='background-color: lightgreen'><center><form  method='POST' style='margin: 0'><button style='font-size: 10' value='$V->id' name='pairVari'>VALI</button></form></center></td>";
                        $html .= "<td style='background-color: lightgreen'><center><a >$V->eesnimi</a></center></td>";
                        $html .= "<td style='background-color: lightgreen'><center><a >$V->perekonnanimi</a></center></td>";
                        $html .= "<td style='background-color: lightgreen'><center><a >$V->vanus</a></center></td>";
                        $html .= "<td style='background-color: lightgreen'><center><a >$V->bm</a></center></td>";
                        $html .= "<td style='background-color: lightgreen'><center><a >$V->eriala</a></center></td>";
                        $html .= "<td style='background-color: lightgreen'><center><a >$V->eriala2</a></center></td>";
                        $html .= "</tr>";
                    } else{
                        $html .= "<tr>";
                        $html .= "<td><center><form  method='POST' style='margin: 0'><button style='font-size: 10' value='$V->id' name='pairVari'>VALI</button></form></center></td>";
                        $html .= "<td><center><a >$V->eesnimi</a></center></td>";
                        $html .= "<td><center><a >$V->perekonnanimi</a></center></td>";
                        $html .= "<td><center><a >$V->vanus</a></center></td>";
                        $html .= "<td><center><a >$V->bm</a></center></td>";
                        $html .= "<td><center><a >$V->eriala</a></center></td>";
                        $html .= "<td><center><a >$V->eriala2</a></center></td>";
                        $html .= "</tr>";
                    }
                } else{
                    $html .= "<tr>";
                    $html .= "<td><center><form  method='POST' style='margin: 0'><button style='font-size: 10' value='$V->id' name='pairVari'>VALI</button></form></center></td>";
                    $html .= "<td><center><a >$V->eesnimi</a></center></td>";
                    $html .= "<td><center><a >$V->perekonnanimi</a></center></td>";
                    $html .= "<td><center><a >$V->vanus</a></center></td>";
                    $html .= "<td><center><a >$V->bm</a></center></td>";
                    $html .= "<td><center><a >$V->eriala</a></center></td>";
                    $html .= "<td><center><a >$V->eriala2</a></center></td>";
                    $html .= "</tr>";
                }

            }
            $html .= "</Table>";
            echo $html;

            ?>
        </div>
        <div class="col">
            <h3>registreeritud tudengid:</h3>

            <?php

            $html = "<table style='width: 20%' class='table table-striped'>";
            $html .= "<tr>";

            $html .= "<th><center><a style='font-size: 20px' > Vali</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Eesnimi</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Perenimi</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Vanus</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Aste</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Eriala1</center></th>";



            foreach($tudengid as $T) {
                if (isset($_SESSION["pairTudeng"])) {
                    if ($T->id == $_SESSION["pairTudeng"]) {
                        $html .= "<tr>";
                        $html .= "<td style='background-color: lightgreen'><center><form  method='POST' style='margin: 0'><button style='font-size: 10' value='$T->id' name='pairTudeng'>VALI</button></form></center></td>";
                        $html .= "<td style='background-color: lightgreen'><center><a >$T->eesnimi</a></center></td>";
                        $html .= "<td style='background-color: lightgreen'><center><a >$T->perekonnanimi</a></center></td>";
                        $html .= "<td style='background-color: lightgreen'><center><a >$T->vanus</a></center></td>";
                        $html .= "<td style='background-color: lightgreen'><center><a >$T->bm</a></center></td>";
                        $html .= "<td style='background-color: lightgreen'><center><a >$T->eriala</a></center></td>";
                        $html .= "</tr>";
                    } else {
                        $html .= "<tr>";
                        $html .= "<td><center><form  method='POST' style='margin: 0'><button style='font-size: 10' value='$T->id' name='pairTudeng'>VALI</button></form></center></td>";
                        $html .= "<td><center><a >$T->eesnimi</a></center></td>";
                        $html .= "<td><center><a >$T->perekonnanimi</a></center></td>";
                        $html .= "<td><center><a >$T->vanus</a></center></td>";
                        $html .= "<td><center><a >$T->bm</a></center></td>";
                        $html .= "<td><center><a >$T->eriala</a></center></td>";
                        $html .= "</tr>";
                    }
                } else {
                    $html .= "<tr>";
                    $html .= "<td><center><form  method='POST' style='margin: 0'><button style='font-size: 10' value='$T->id' name='pairTudeng'>VALI</button></form></center></td>";
                    $html .= "<td><center><a >$T->eesnimi</a></center></td>";
                    $html .= "<td><center><a >$T->perekonnanimi</a></center></td>";
                    $html .= "<td><center><a >$T->vanus</a></center></td>";
                    $html .= "<td><center><a >$T->bm</a></center></td>";
                    $html .= "<td><center><a >$T->eriala</a></center></td>";
                    $html .= "</tr>";
                }
            }
            $html .= "</Table>";
            echo $html;

            ?>
        </div>
        <div class="col">
            <a href="adminLinked.php" class="toRegister" style="float: right">KOKKU LIIDETUD TUDENGID</a><br><br><br>
            <form method="post"><button type="submit" style="position: fixed;right: 0;bottom: 35px" name="pair">LIIDA KOKKU</button></form>
        </div>
    </div>
</div>




</body>

<?php require ("../footer.php")?>
