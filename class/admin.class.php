<?php

class Admin
{

    //klassi sees saab kasutada
    private $connection;

    //$user=new user(see); jouab siia sulgude vahele
    function __construct($mysqli)
    {

        //klassi sees muutujua kasutamiseks $this->
        //this viitab sellele klassile
        $this->connection = $mysqli;

    }

    function login($kasutaja, $parool){

        $error = "";

        $this->connection = new mysqli($GLOBALS["serverHost"],$GLOBALS["serverUsername"],$GLOBALS["serverPassword"],$GLOBALS["database"]);

        //kask
        $stmt = $this->connection->prepare("
			SELECT id, knimi, parool
			FROM admin
			WHERE knimi=?
		");

        echo $this->connection->error;

        //asendan kysimargid
        $stmt->bind_param("s", $kasutaja);

        //maaran tulpadele muutujad
        $stmt->bind_result($id, $kasutajaBaasist, $paroolBaasist);
        $stmt->execute();

        if($stmt->fetch()) {
            //oli rida


            if($kasutaja == $kasutajaBaasist && $parool==$paroolBaasist){

                echo "kasutaja ".$id."logis sisse";

                $_SESSION["userId"]= $id;
                $_SESSION["user"]=$kasutajaBaasist;


                //suunan uuele lehele
                header("location: restoWELCOME.php");


            }else {
                echo "ei saa sisse";
                exit();
            }

        }else {
            echo "mingi viga";
            exit();
        }

        return "jama";
    }




}