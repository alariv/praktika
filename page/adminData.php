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
if (isset ($_POST ["pairVari"])) {
    if (isset ($_SESSION["pairVari"])) {
        if ($_SESSION["pairVari"] > 0 && $_SESSION["pairVari"] == $_POST["pairVari"]) {
            $_SESSION["pairVari"] = "";
        } else {
            $pairVari = $_POST ["pairVari"];
            $_SESSION["pairVari"] = $_POST["pairVari"];
        }
    } else {
        $pairVari = $_POST ["pairVari"];
        $_SESSION["pairVari"] = $_POST["pairVari"];
    }
}
if (isset ($_POST ["pairTudeng"])) {
    if (isset ($_SESSION["pairTudeng"])) {
        if ($_SESSION["pairTudeng"] > 0 && $_SESSION["pairTudeng"] == $_POST["pairTudeng"]) {
            $_SESSION["pairTudeng"] = "";
        }else{
            $pairTudeng = $_POST ["pairTudeng"];
            $_SESSION["pairTudeng"] = $_POST["pairTudeng"];
        }
    }else{
        $pairTudeng = $_POST ["pairTudeng"];
        $_SESSION["pairTudeng"] = $_POST["pairTudeng"];
    }

}


if (isset ($_POST ["pair"])) {
    if( isset($_SESSION["pairVari"]) &&
        isset($_SESSION["pairTudeng"]) &&
        !empty($_SESSION["pairVari"]) &&
        !empty($_SESSION["pairTudeng"])
    ){
        $pairId = $Pair->getPairId();
        $Pair->checkTudengPairIdStatus($_SESSION["pairTudeng"]);
        $Pair->updatePairId();
        if($_SESSION["PairId1Status"]==0){
            $Pair->updateTudeng($_SESSION["PairId"], $_SESSION["pairTudeng"]);

        }else{
            $Pair->updateTudeng2($_SESSION["PairId"], $_SESSION["pairTudeng"]);

        }

        $Pair->updateVari($_SESSION["PairId"], $_SESSION["pairVari"]);
    }
}
if (isset ($_POST ["delTudeng"])) {
    // oli olemas, ehk keegi vajutas nuppu
    if (empty($_POST ["delTudeng"])) {
        //oli t�esti t�hi
        $delTudengError = "";
    } else {
        $delTudeng = $_POST ["delTudeng"];
        $_SESSION["delTudeng"]= $_POST["delTudeng"];
        $cancel="visible";
        $modify="hidden";
    }
}
if (isset ($_POST ["delVari"])) {
    // oli olemas, ehk keegi vajutas nuppu
    if (empty($_POST ["delVari"])) {
        //oli t�esti t�hi
        $delVariError = "";
    } else {
        $delVari = $_POST ["delVari"];
        $_SESSION["delVari"]= $_POST["delVari"];
        $cancel="visible";
        $modify="hidden";
    }
}
if (isset ($_POST ["cancel"])) {
    if (empty($_POST ["delVari"])) {
        $cancel = $_POST ["cancel"];
        $_SESSION["delTudeng"] = 0;
        $_SESSION["delVari"] = 0;
        $cancel = "hidden";
        $modify = "visible";
    }
}
if (isset ($_POST ["deleteTudeng"])) {
    $_SESSION["deleteTudeng"]=$_POST["deleteTudeng"];
    $modalVisibility="visible;z-index: 1001;";
    $DT = $Admin->getSingleTudeng($_POST["deleteTudeng"]);
    $cancel="visible";
    $modify="hidden";

}
if (isset ($_POST ["deleteVari"])) {
    $_SESSION["deleteVari"]=$_POST["deleteVari"];
    $modalVisibility="visible;z-index: 1001;";
    $DV = $Admin->getSingleVari($_POST["deleteVari"]);
    $cancel="visible";
    $modify="hidden";


}
if (isset ($_POST ["cancelDelete"])) {
    $modalVisibility="hidden;z-index: -100;";
    $cancel="visible";
    $modify="hidden";
}
if (isset ($_POST ["linkedStudents"])) {
    header("Location:adminLinked");
}
if (isset ($_POST ["confirmDelete"])) {
    $modalVisibility="hidden;z-index: -100;";
    if( $_SESSION["deleteTV"]=="T") {
        $Admin->deleteTudeng($_SESSION["deleteTudeng"]);
    }elseif( $_SESSION["deleteTV"]=="V"){
        $Admin->deleteVari($_SESSION["deleteVari"]);
    }
    $cancel = "hidden";
    $modify = "visible";
    $_SESSION["delVari"] = 0;
    $_SESSION["delTudeng"] = 0;

}


$varjud = $Admin->getVarjud();
$tudengid = $Admin->getTudengid();



?>
<?php require ("../header.php")?>
<?php require("../style/style.css");?>


<head>
    <script src="../js/modify.js"></script>
    <meta charset="utf-8">
    <p style="background-color: #B71234;font-size: 25px"><a style="color: black" href="adminData.php"> Tagasi</a><a style="float: right;color: black" href="?logout=1">logi valja</a></p>
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

<p class="pageHeading"> ADMIN </p>

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
                if (isset($_SESSION["delTudeng"]) && $_SESSION["delTudeng"] == 1) {
                    $html .= "<tr>";
                    $html .= "<td><center><button class='selBtn' style='background: #cecece;color: darkslategray;cursor: no-drop;border: none'>VALI</button></center></td>";
                    $html .= "<td><center><a >$V->eesnimi</a></center></td>";
                    $html .= "<td><center><a >$V->perekonnanimi</a></center></td>";
                    $html .= "<td><center><a >$V->vanus</a></center></td>";
                    $html .= "<td><center><a >$V->bm</a></center></td>";
                    $html .= "<td><center><a >$V->eriala</a></center></td>";
                    $html .= "<td><center><a >$V->eriala2</a></center></td>";
                    $html .= "</tr>";
                }else{
                    if( isset($_SESSION["pairVari"])){
                        if($V->id == $_SESSION["pairVari"]) {
                            if (isset($_SESSION["delVari"])) {
                                $html .= "<tr>";
                                if ($_SESSION["delVari"] == 1) {
                                    $html .= "<td style='background-color: lightgreen'><center><form  method='POST' style='margin: 0'><button value='$V->id' name='deleteVari' class='delBtn'>KUSTUTA</button></form></center></td>";
                                } else {
                                    $html .= "<td style='background-color: lightgreen'><center><form  method='POST' style='margin: 0'><button value='$V->id' name='pairVari' class='selBtn'>VALI</button></form></center></td>";
                                }
                                $html .= "<td style='background-color: lightgreen'><center><a >$V->eesnimi</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$V->perekonnanimi</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$V->vanus</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$V->bm</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$V->eriala</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$V->eriala2</a></center></td>";
                                $html .= "</tr>";
                            }else{
                                $html .= "<tr>";
                                $html .= "<td style='background-color: lightgreen'><center><form  method='POST' style='margin: 0'><button value='$V->id' name='pairVari' class='selBtn'>VALI</button></form></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$V->eesnimi</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$V->perekonnanimi</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$V->vanus</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$V->bm</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$V->eriala</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$V->eriala2</a></center></td>";
                                $html .= "</tr>";
                            }

                        } else{
                            if (isset($_SESSION["delVari"])) {
                                $html .= "<tr>";
                                if ($_SESSION["delVari"] == 1) {
                                    $html .= "<td><center><form  method='POST' style='margin: 0'><button value='$V->id' name='deleteVari' class='delBtn'>KUSTUTA</button></form></center></td>";
                                } else {
                                    $html .= "<td><center><form  method='POST' style='margin: 0'><button value='$V->id' name='pairVari' class='selBtn'>VALI</button></form></center></td>";
                                }
                                $html .= "<td><center><a >$V->eesnimi</a></center></td>";
                                $html .= "<td><center><a >$V->perekonnanimi</a></center></td>";
                                $html .= "<td><center><a >$V->vanus</a></center></td>";
                                $html .= "<td><center><a >$V->bm</a></center></td>";
                                $html .= "<td><center><a >$V->eriala</a></center></td>";
                                $html .= "<td><center><a >$V->eriala2</a></center></td>";
                                $html .= "</tr>";
                            }else{
                                $html .= "<tr>";
                                $html .= "<td><center><form  method='POST' style='margin: 0'><button value='$V->id' name='pairVari' class='selBtn'>VALI</button></form></center></td>";
                                $html .= "<td><center><a >$V->eesnimi</a></center></td>";
                                $html .= "<td><center><a >$V->perekonnanimi</a></center></td>";
                                $html .= "<td><center><a >$V->vanus</a></center></td>";
                                $html .= "<td><center><a >$V->bm</a></center></td>";
                                $html .= "<td><center><a >$V->eriala</a></center></td>";
                                $html .= "<td><center><a >$V->eriala2</a></center></td>";
                                $html .= "</tr>";
                            }
                        }
                    } else{
                        $html .= "<tr>";
                        if (isset($_SESSION["delVari"])) {
                            if ($_SESSION["delVari"] == 1) {
                                $html .= "<td><center><form  method='POST' style='margin: 0'><button value='$V->id' name='deleteVari' class='delBtn'>KUSTUTA</button></form></center></td>";
                            } else {
                                $html .= "<td><center><form  method='POST' style='margin: 0'><button value='$V->id' name='pairVari' class='selBtn'>VALI</button></form></center></td>";
                            }
                            $html .= "<td><center><a >$V->eesnimi</a></center></td>";
                            $html .= "<td><center><a >$V->perekonnanimi</a></center></td>";
                            $html .= "<td><center><a >$V->vanus</a></center></td>";
                            $html .= "<td><center><a >$V->bm</a></center></td>";
                            $html .= "<td><center><a >$V->eriala</a></center></td>";
                            $html .= "<td><center><a >$V->eriala2</a></center></td>";
                            $html .= "</tr>";
                        } else{
                            $html .= "<td><center><form  method='POST' style='margin: 0'><button value='$V->id' name='pairVari' class='selBtn'>VALI</button></form></center></td>";
                            $html .= "<td><center><a >$V->eesnimi</a></center></td>";
                            $html .= "<td><center><a >$V->perekonnanimi</a></center></td>";
                            $html .= "<td><center><a >$V->vanus</a></center></td>";
                            $html .= "<td><center><a >$V->bm</a></center></td>";
                            $html .= "<td><center><a >$V->eriala</a></center></td>";
                            $html .= "<td><center><a >$V->eriala2</a></center></td>";
                            $html .= "</tr>";
                        }
                    }

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
                if (isset($_SESSION["delVari"]) && $_SESSION["delVari"] == 1) {
                                $html .= "<tr>";
                                $html .= "<td><center></center><button class='selBtn' style='background: #cecece;color: darkslategray;cursor: no-drop;border: none'>VALI</button></center></td>";
                                $html .= "<td><center><a >$T->eesnimi</a></center></td>";
                                $html .= "<td><center><a >$T->perekonnanimi</a></center></td>";
                                $html .= "<td><center><a >$T->vanus</a></center></td>";
                                $html .= "<td><center><a >$T->bm</a></center></td>";
                                $html .= "<td><center><a >$T->eriala</a></center></td>";
                                $html .= "</tr>";
                }else{
                    if (isset($_SESSION["pairTudeng"])) {
                        if ($T->id == $_SESSION["pairTudeng"]) {
                            if (isset($_SESSION["delTudeng"])) {
                                $html .= "<tr>";
                                if ($_SESSION["delTudeng"] == 1) {
                                    $html .= "<td style='background-color: lightgreen'><center><form  method='POST' style='margin: 0'><button value='$T->id' name='deleteTudeng' class='delBtn'>KUSTUTA</button></form></center></td>";
                                } else {
                                    $html .= "<td style='background-color: lightgreen'><center><form  method='POST' style='margin: 0'><button value='$T->id' name='pairTudeng' class='selBtn'>VALI</button></form></center></td>";
                                }
                                $html .= "<td style='background-color: lightgreen'><center><a >$T->eesnimi</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$T->perekonnanimi</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$T->vanus</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$T->bm</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$T->eriala</a></center></td>";
                                $html .= "</tr>";
                            }else{
                                $html .= "<tr>";
                                $html .= "<td style='background-color: lightgreen'><center><form  method='POST' style='margin: 0'><button value='$T->id' name='pairTudeng' class='selBtn'>VALI</button></form></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$T->eesnimi</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$T->perekonnanimi</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$T->vanus</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$T->bm</a></center></td>";
                                $html .= "<td style='background-color: lightgreen'><center><a >$T->eriala</a></center></td>";
                                $html .= "</tr>";
                            }
                        } else {
                            if (isset($_SESSION["delTudeng"])) {
                                $html .= "<tr>";
                                if ($_SESSION["delTudeng"] == 1) {
                                    $html .= "<td><center><form  method='POST' style='margin: 0'><button value='$T->id' name='deleteTudeng' class='delBtn'>KUSTUTA</button></form></center></td>";
                                } else {
                                    $html .= "<td><center><form  method='POST' style='margin: 0'><button value='$T->id' name='pairTudeng' class='selBtn'>VALI</button></form></center></td>";
                                }
                                $html .= "<td><center><a >$T->eesnimi</a></center></td>";
                                $html .= "<td><center><a >$T->perekonnanimi</a></center></td>";
                                $html .= "<td><center><a >$T->vanus</a></center></td>";
                                $html .= "<td><center><a >$T->bm</a></center></td>";
                                $html .= "<td><center><a >$T->eriala</a></center></td>";
                                $html .= "</tr>";
                            }else{
                                $html .= "<tr>";
                                $html .= "<td><center><form  method='POST' style='margin: 0'><button value='$T->id' name='pairTudeng' class='selBtn'>VALI</button></form></center></td>";
                                $html .= "<td><center><a >$T->eesnimi</a></center></td>";
                                $html .= "<td><center><a >$T->perekonnanimi</a></center></td>";
                                $html .= "<td><center><a >$T->vanus</a></center></td>";
                                $html .= "<td><center><a >$T->bm</a></center></td>";
                                $html .= "<td><center><a >$T->eriala</a></center></td>";
                                $html .= "</tr>";
                            }
                        }
                    } else {
                        $html .= "<tr>";
                        if (isset($_SESSION["delTudeng"])) {
                            if($_SESSION["delTudeng"]==1) {
                                $html .= "<td><center><form method='POST' style='margin: 0'><button value='$T->id' name='deleteTudeng' class='delBtn'>KUSTUTA</button></form></center></td>";
                            }else{
                                $html .= "<td><center><form  method='POST' style='margin: 0'><button value='$T->id' name='pairTudeng' class='selBtn'>VALI</button></form></center></td>";
                            }
                            $html .= "<td><center><a >$T->eesnimi</a></center></td>";
                            $html .= "<td><center><a >$T->perekonnanimi</a></center></td>";
                            $html .= "<td><center><a >$T->vanus</a></center></td>";
                            $html .= "<td><center><a >$T->bm</a></center></td>";
                            $html .= "<td><center><a >$T->eriala</a></center></td>";
                            $html .= "</tr>";
                        }else{
                            $html .= "<td><center><form  method='POST' style='margin: 0'><button value='$T->id' name='pairTudeng' class='selBtn'>VALI</button></form></center></td>";
                            $html .= "<td><center><a >$T->eesnimi</a></center></td>";
                            $html .= "<td><center><a >$T->perekonnanimi</a></center></td>";
                            $html .= "<td><center><a >$T->vanus</a></center></td>";
                            $html .= "<td><center><a >$T->bm</a></center></td>";
                            $html .= "<td><center><a >$T->eriala</a></center></td>";
                            $html .= "</tr>";
                        }
                    }
                }
            }


            $html .= "</Table>";
            echo $html;

            ?>
        </div>
        <div class="col">
            <form method="post">
                <button class="delBtn" style="font-size: 25px;position: fixed;width: 250px;right: 0;bottom: 55%;visibility: <?php echo $cancel ?>" name="cancel" value="0" >TÜHISTA</button>
            </form>
            <form style="visibility: <?php echo $modify ?>" method="post">
                <div  class="btn-group-vertical" style="position: fixed;right: 0;bottom: 45%">
                    <button id="btnGroupMain" style="width: 250px" onmouseover="show('modifyBtns')" onmouseout="hide('modifyBtns')">MUUDA</button>
                    <div id="modifyBtns"  class="btn-group-vertical" onmouseover="show('modifyBtns')" onmouseout="hide('modifyBtns')" style="opacity: 0;visibility: hidden">
                        <button type="submit" style="margin-bottom:1px;margin-top: 1px;width: 250px" value="1" name="delTudeng">KUSTUTA TUDENG</button>
                        <button type="submit" style="width: 250px" value="1" name="delVari">KUSTUTA VARI</button>
                    </div>
                </div>
            </form>

            <form style="visibility: <?php echo $modify ?>" method="post">
                <div style="position: fixed;right: 0;bottom: 1%">
                    <button type="submit" style="width: 250px;float: right" name="pair">LIIDA KOKKU</button><br><br>
                    <button style="float: right" name="linkedStudents">KOKKU LIIDETUD TUDENGID</button>
                </div>
            </form>
        </div>
    </div>
</div>




</body>

<?php require ("../footer.php")?>
