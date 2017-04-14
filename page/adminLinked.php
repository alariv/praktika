<?php
require("../functions.php");
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
    <div align="left" class="confirm">
        <div class="confirmHead">
            <text style="font-size: 22px;color: white;"><span style="font-size: 30px">T</span>EADE!</text>
        </div>

        <?php if (isset ($_POST ["deleteTudeng"])){ ?>
            <h5 style="margin-top: 20px;margin-left: 10px;font-weight: bold" >Soovid kustutada tudengi:</h5>
            <hr>
            <div style="margin-left: 10px">
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Eesnimi: </text><text class="confirmData"> <?php echo $DT->eesnimi; ?></text></div>
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Perenimi: </text><text class="confirmData"> <?php echo $DT->perekonnanimi ?></text></div>
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Email: </text><text class="confirmData"> <?php echo $DT->email ?></text></div>
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Telefoni nr: </text><text class="confirmData"> <?php echo $DT->telnr ?></text></div>
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Vanus: </text><text class="confirmData"> <?php echo $DT->vanus ?></text></div>
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Aste: </text><text class="confirmData"> <?php echo $DT->bm ?></text></div>
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Eriala: </text><text class="confirmData"> <?php echo $DT->eriala ?></text></div>
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Eriala2: </text><text class="confirmData"> <?php echo $DT->kursus ?></text></div>
            </div>
            <?php $_SESSION["deleteTV"]="T";
        }elseif(isset ($_POST ["deleteVari"])){ ?>
            <h5 style="margin-top: 20px;margin-left: 10px;font-weight: bold" >Soovid kustutada tudengivarju:</h5>
            <hr>
            <div style="margin-left: 10px">
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Eesnimi: </text><text class="confirmData"> <?php echo $DV->eesnimi; ?></text></div>
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Perenimi: </text><text class="confirmData"> <?php echo $DV->perekonnanimi ?></text></div>
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Email: </text><text class="confirmData"> <?php echo $DV->email ?></text></div>
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Telefoni nr: </text><text class="confirmData"> <?php echo $DV->telnr ?></text></div>
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Vanus: </text><text class="confirmData"> <?php echo $DV->vanus ?></text></div>
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Aste: </text><text class="confirmData"> <?php echo $DV->bm ?></text></div>
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Eriala: </text><text class="confirmData"> <?php echo $DV->eriala ?></text></div>
                <div style="border-bottom: 1px solid gray;margin: 10px"><text>Eriala2: </text><text class="confirmData"> <?php echo $DV->eriala2 ?></text></div>
            </div>
            <?php $_SESSION["deleteTV"]="V";
        }?>
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
            <button type="submit" style="width: 250px;background: #cecece;color: darkslategray;cursor: no-drop" name="unPair" disabled>SEO LAHTI</button>
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
