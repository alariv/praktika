<?php
require("../functions.php");
$unPairId="";

$_SESSION["change"]=0;
if($_SESSION["change"]==0){
    $cancel="hidden";
    $modify="visible";
    $_SESSION["change"]=1;
}


$modalVisibility="hidden";
if(!isset ($_SESSION["userId"])) {

    header("Location: admin.php");
    exit();
}
if(isset($_GET["logout"])) {

    session_destroy();

    header("Location: admin.php");
    exit();
}

if (isset ($_POST ["unPairId"])) {
    // oli olemas, ehk keegi vajutas nuppu
    if (empty($_POST ["unPairId"])) {
        //oli t�esti t�hi
        $unPairId = "";
    } else {
        $unPairId = $_POST ["unPairId"];
        $_SESSION["unPairId"]=$_POST["unPairId"];
        $modalVisibility="visible;z-index: 1001;";
        $SLV = $Admin->unPairVariData($_POST["unPairId"]);
        $SLT = $Admin->unPairTudengData($_POST["unPairId"]);
    }
}

if (isset ($_POST ["cancelDelete"])) {
    $modalVisibility="hidden;z-index: -100;";
    $cancel="visible";
    $modify="hidden";
}
if (isset ($_POST ["confirmDelete"])) {
    $modalVisibility="hidden;z-index: -100;";
    $Admin->unPairVari($_SESSION["unPairId"]);
    $SLT = $Admin->unPairTudengData($_SESSION["unPairId"]);
    if($SLT->pairId==$_SESSION["unPairId"]){
        $Admin->unPairTudeng($_SESSION["unPairId"]);
    }else{
        $Admin->unPairTudeng2($_SESSION["unPairId"]);
    }
    $_SESSION["unPairId"] = 0;

}




$varjuPaarid=$Pair->getVarjud();
$tudengiPaarid= array_merge($Pair->getTudengid(),$Pair->getTudengid2());
sort($tudengiPaarid);

?>
<?php require("../header.php");?>
<?php require("../style/style.css");?>
<html>
<head>
    <script src="../js/modify.js"></script>
    <p style="background-color: #B71234;font-size: 25px"><a style="color: black" href="adminData.php"> Tagasi</a><a style="color: black;margin-left: 40%" href="welcome.php">Welcome page</a><a style="float: right;color: black" href="?logout=1">logi valja</a></p>
</head>
<body>
<div class="mymodal" style="visibility: <?php echo $modalVisibility ?>;">
    <div align="left" class="confirm" style="width: 600px">
        <div class="confirmHead">
            <text style="font-size: 22px;color: white;"><span style="font-size: 30px">T</span>EADE!</text>
        </div>
            <h5 style="margin-top: 20px;margin-left: 10px;font-weight: bold" >Soovid lõhkuda seose:</h5>
            <hr>
        <div style="margin-left: 10px">
            <div style="border-bottom: 1px solid gray;margin: 10px"><text style="max-width: 150px;text-transform: uppercase;"><?php echo $SLV->eesnimi; ?></text><text class="confirmData"> <?php echo $SLT->eesnimi; ?></text></div>
            <div style="border-bottom: 1px solid gray;margin: 10px"><text style="max-width: 150px;text-transform: uppercase;"><?php echo $SLV->perekonnanimi; ?></text><text class="confirmData"> <?php echo $SLT->perekonnanimi ?></text></div>
            <div style="border-bottom: 1px solid gray;margin: 10px"><text style="max-width: 150px;text-transform: uppercase;"><?php echo $SLV->email; ?></text><text class="confirmData"> <?php echo $SLT->email ?></text></div>
            <div style="border-bottom: 1px solid gray;margin: 10px"><text style="max-width: 150px;text-transform: uppercase;"><?php echo $SLV->telnr; ?></text><text class="confirmData"> <?php echo $SLT->telnr ?></text></div>
            <div style="border-bottom: 1px solid gray;margin: 10px"><text style="max-width: 150px;text-transform: uppercase;"><?php echo $SLV->vanus; ?></text><text class="confirmData" > <?php echo $SLT->vanus ?></text></div>
            <div style="border-bottom: 1px solid gray;margin: 10px"><text style="max-width: 150px;text-transform: uppercase;"><?php echo $SLV->bm; ?></text><text class="confirmData"> <?php echo $SLT->bm ?></text></div>
            <div style="border-bottom: 1px solid gray;margin: 10px"><text style="max-width: 150px;text-transform: uppercase;"><?php echo $SLV->eriala; ?></text><text class="confirmData"> <?php echo $SLT->eriala ?></text></div>
            <div style="border-bottom: 1px solid gray;margin: 10px"><text style="max-width: 150px;text-transform: uppercase;"><?php echo $SLV->eriala2; ?></text><text class="confirmData"> <?php echo $SLT->kursus ?></text></div>
        </div>
        <div style="margin-top: 40px">
            <form method="post">
                <button style="position: absolute;bottom: 0;left:0" name="cancelDelete">TÜHISTA</button>
                <button style="position: absolute;bottom: 0;right:0" name="confirmDelete">KINNITA</button>
            </form>
        </div>
    </div>
</div>
<text class="pageHeading">OLED ADMINIGA SISSE LOGITUD.... </text>
<form  method="post">
    <div class="btn-group" style="position: absolute;right: 0">
        <div id="modifyBtns" onmouseenter="show('modifyBtns')" onmouseleave="hide('modifyBtns')" class="btn-group" style="opacity: 0;visibility: hidden">
            <div class="input-group">
                <form method="post">
                    <input id="unPairId" type="text" placeholder="Vali id" value="<?=$unPairId; ?>" name="unPairId">
                    <button id="unPairButton" type="submit" style="width: 250px" name="unPair">SEO LAHTI</button>
                </form>
            </div>
        </div>
        <button id="btnGroupMain" style="width: 250px" onmouseenter="show('modifyBtns')" onmouseleave="hide('modifyBtns')">MUUDA</button>

    </div>
</form>
<br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col" style="float: right">
            <h6>Varjud: </h6>
            <?php

            $html = "<table style='width: 20%' class='table table-striped'>";
            $html .= "<tr>";
            $html .= "<th><center><a style='font-size: 20px' > Eesnimi</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Perenimi</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Vanus</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Aste</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Eriala</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Email</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Telefoni nr</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > PairId</center></th>";




            foreach($varjuPaarid as $VP){
                    $html .= "<tr>";
                    $html .= "<td><center><a >$VP->eesnimi</a></center></td>";
                    $html .= "<td><center><a >$VP->perekonnanimi</a></center></td>";
                    $html .= "<td><center><a >$VP->vanus</a></center></td>";
                    $html .= "<td><center><a >$VP->bm</a></center></td>";
                    $html .= "<td><center><a >$VP->eriala</a></center></td>";
                    $html .= "<td><center><a >$VP->email</a></center></td>";
                    $html .= "<td><center><a >$VP->telnr</a></center></td>";
                    $html .= "<td><center><a style='font-size: 20px;font-weight: bold;color: #B71234'>$VP->pairId</a></center></td>";
                    $html .= "</tr>";

            }
            $html .= "</Table>";
            echo $html;
            ?>
        </div>
        <div class="col">
            <h6>Tudengid: </h6>
            <?php

            $html = "<table style='width: 20%' class='table table-striped'>";
            $html .= "<tr>";
            $html .= "<th><center><a style='font-size: 20px' > PairId</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > PairId2</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Eesnimi</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Perenimi</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Vanus</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Aste</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Eriala</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Email</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Telefoni nr</center></th>";




            foreach($tudengiPaarid as $TP){
                    $html .= "<tr>";
                    if (isset($TP->pairId2)) {
                        $html .= "<td><center><a >-</a></center></td>";
                        $html .= "<td><center><a style='font-size: 20px;font-weight: bold;color: #B71234'>$TP->pairId2</a></center></td>";
                    }else{
                        $html .= "<td><center><a style='font-size: 20px;font-weight: bold;color: #B71234'>$TP->pairId</a></center></td>";
                        $html .= "<td><center><a>-</a></center></td>";
                    }
                    $html .= "<td><center><a >$TP->eesnimi</a></center></td>";
                    $html .= "<td><center><a >$TP->perekonnanimi</a></center></td>";
                    $html .= "<td><center><a >$TP->vanus</a></center></td>";
                    $html .= "<td><center><a >$TP->bm</a></center></td>";
                    $html .= "<td><center><a >$TP->eriala</a></center></td>";
                    $html .= "<td><center><a >$TP->email</a></center></td>";
                    $html .= "<td><center><a >$TP->telnr</a></center></td>";

                    $html .= "</tr>";

            }
            $html .= "</Table>";
            echo $html;
            ?>
        </div>
    </div>
</div>


</body>
</html>
<?php require("../footer.php");?>
