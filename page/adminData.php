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
?>
<body>
<h3>OLED ADMINIGA SISSE LOGITUD</h3>


<a href="?logout=1">logi valja</a>




</body>