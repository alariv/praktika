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
                header("location: admin.php");
                exit();
            }

        }else {
            header("location: admin.php");
            exit();
        }

        header("location: admin.php");
    }

    function getVarjud(){

        $stmt = $this->connection->prepare("
			SELECT id, eesnimi, perekonnanimi, email, telefoninr, kool, vanus, bm, eriala, eriala2, pairId
            FROM tudengivarjud
            WHERE pairId=0
            ORDER BY eriala
		");
        echo $this->connection->error;

        $stmt->bind_result($id,$eesnimi,$perenimi,$email,$telnr, $kool, $vanus, $bm, $eriala, $eriala2, $pairId);
        $stmt->execute();


        //tekitan massiivi
        $result = array();

        // tee seda seni, kuni on rida andmeid
        // mis vastab select lausele
        while ($stmt->fetch()) {

            //tekitan objekti
            $person = new StdClass();
            $person->id = $id;
            $person->eesnimi = $eesnimi;
            $person->perekonnanimi = $perenimi;
            $person->email = $email;
            $person->telnr = $telnr;
            $person->kool = $kool;
            $person->vanus = $vanus;
            $person->bm = $bm;
            $person->eriala = $eriala;
            $person->eriala2 = $eriala2;
            $person->pairId = $pairId;

            array_push($result, $person);
        }

        $stmt->close();

        return $result;
    }

    function getTudengid(){

        $stmt = $this->connection->prepare("
			SELECT id, eesnimi, perekonnanimi, email, telefoninr, vanus, eriala, kursus, bm, pairId
            FROM tudengid
            WHERE pairId=0
            ORDER BY eriala
		");
        echo $this->connection->error;

        $stmt->bind_result($id,$eesnimi,$perenimi,$email,$telnr, $vanus, $eriala, $kursus, $bm, $pairId);
        $stmt->execute();


        //tekitan massiivi
        $result = array();

        // tee seda seni, kuni on rida andmeid
        // mis vastab select lausele
        while ($stmt->fetch()) {

            //tekitan objekti
            $tudeng = new StdClass();
            $tudeng->id = $id;
            $tudeng->eesnimi = $eesnimi;
            $tudeng->perekonnanimi = $perenimi;
            $tudeng->email = $email;
            $tudeng->telnr = $telnr;
            $tudeng->vanus = $vanus;
            $tudeng->eriala = $eriala;
            $tudeng->kursus = $kursus;
            $tudeng->bm = $bm;
            $tudeng->pairId = $pairId;

            array_push($result, $tudeng);
        }

        $stmt->close();

        return $result;
    }


}