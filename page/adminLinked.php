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


$varjuPaarid=$Pair->getVarjud();
$tudengiPaarid=$Pair->getTudengid();

?>
<?php require("../header.php");?>
<?php require("../style/style.css");?>
<html>
<head>

</head>
<body>
<p  class="pageHeading">Kokku liidetud:</p>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h6>Varjud: </h6>
            <?php

            $html = "<table style='width: 20%;' class='table table-striped'>";
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
                if($VP->pairId%2==0) {
                    $html .= "<tr>";
                    $html .= "<td style='background-color: lightblue'><center><a >$VP->eesnimi</a></center></td>";
                    $html .= "<td style='background-color: lightblue'><center><a >$VP->perekonnanimi</a></center></td>";
                    $html .= "<td style='background-color: lightblue'><center><a >$VP->vanus</a></center></td>";
                    $html .= "<td style='background-color: lightblue'><center><a >$VP->bm</a></center></td>";
                    $html .= "<td style='background-color: lightblue'><center><a >$VP->eriala</a></center></td>";
                    $html .= "<td style='background-color: lightblue'><center><a >$VP->email</a></center></td>";
                    $html .= "<td style='background-color: lightblue'><center><a >$VP->telnr</a></center></td>";
                    $html .= "<td style='background-color: lightblue'><center><a >$VP->pairId</a></center></td>";
                    $html .= "</tr>";
                }else{
                    $html .= "<tr>";
                    $html .= "<td><center><a >$VP->eesnimi</a></center></td>";
                    $html .= "<td><center><a >$VP->perekonnanimi</a></center></td>";
                    $html .= "<td><center><a >$VP->vanus</a></center></td>";
                    $html .= "<td><center><a >$VP->bm</a></center></td>";
                    $html .= "<td><center><a >$VP->eriala</a></center></td>";
                    $html .= "<td><center><a >$VP->email</a></center></td>";
                    $html .= "<td><center><a >$VP->telnr</a></center></td>";
                    $html .= "<td><center><a >$VP->pairId</a></center></td>";
                    $html .= "</tr>";
                }
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
            $html .= "<th><center><a style='font-size: 20px' > Eesnimi</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Perenimi</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Vanus</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Aste</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Eriala</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Email</center></th>";
            $html .= "<th><center><a style='font-size: 20px' > Telefoni nr</center></th>";




            foreach($tudengiPaarid as $TP){
                if($TP->pairId%2==0) {
                    $html .= "<tr>";
                    $html .= "<td style='background-color: lightblue'><center><a >$TP->pairId</a></center></td>";
                    $html .= "<td style='background-color: lightblue'><center><a >$TP->eesnimi</a></center></td>";
                    $html .= "<td style='background-color: lightblue'><center><a >$TP->perekonnanimi</a></center></td>";
                    $html .= "<td style='background-color: lightblue'><center><a >$TP->vanus</a></center></td>";
                    $html .= "<td style='background-color: lightblue'><center><a >$TP->bm</a></center></td>";
                    $html .= "<td style='background-color: lightblue'><center><a >$TP->eriala</a></center></td>";
                    $html .= "<td style='background-color: lightblue'><center><a >$TP->email</a></center></td>";
                    $html .= "<td style='background-color: lightblue'><center><a >$TP->telnr</a></center></td>";

                    $html .= "</tr>";
                }else{
                    $html .= "<tr>";
                    $html .= "<td><center><a >$TP->pairId</a></center></td>";
                    $html .= "<td><center><a >$TP->eesnimi</a></center></td>";
                    $html .= "<td><center><a >$TP->perekonnanimi</a></center></td>";
                    $html .= "<td><center><a >$TP->vanus</a></center></td>";
                    $html .= "<td><center><a >$TP->bm</a></center></td>";
                    $html .= "<td><center><a >$TP->eriala</a></center></td>";
                    $html .= "<td><center><a >$TP->email</a></center></td>";
                    $html .= "<td><center><a >$TP->telnr</a></center></td>";
                    $html .= "</tr>";
                }
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
