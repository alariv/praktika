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
                $html .= "<tr>";
                $html .= "<td><center><input type='radio' name='pairVari'></input></center></td>";
                $html .= "<td><center><a >$V->eesnimi</a></center></td>";
                $html .= "<td><center><a >$V->perekonnanimi</a></center></td>";
                $html .= "<td><center><a >$V->vanus</a></center></td>";
                $html .= "<td><center><a >$V->bm</a></center></td>";
                $html .= "<td><center><a >$V->eriala</a></center></td>";
                $html .= "<td><center><a >$V->eriala2</a></center></td>";
                $html .= "</tr>";

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



            foreach($tudengid as $T){
                $html .= "<tr>";
                $html .= "<td><center><input type='radio' name='pairTudeng'></input></center></td>";
                $html .= "<td><center><a >$T->eesnimi</a></center></td>";
                $html .= "<td><center><a >$T->perekonnanimi</a></center></td>";
                $html .= "<td><center><a >$T->vanus</a></center></td>";
                $html .= "<td><center><a >$T->bm</a></center></td>";
                $html .= "<td><center><a >$T->eriala</a></center></td>";
                $html .= "</tr>";

            }
            $html .= "</Table>";
            echo $html;

            ?>
        </div>
        <div class="col">
            <button style="float: right">KOKKU LIIDETUD TUDENGID</button><br><br><br>
            <button style="position: fixed;right: 0;bottom: 35px">LIIDA KOKKU</button>
        </div>
    </div>
</div>




</body>

<?php require ("../footer.php")?>
