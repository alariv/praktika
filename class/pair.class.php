<?php

class Pair
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

    function getPairId(){

        $stmt = $this->connection->prepare("
                SELECT pairId 
                FROM paar
                WHERE id=1
            ");
        echo $this->connection->error;

//        $stmt->bind_param("s",$bm);

        $stmt->bind_result($pairId);
        $stmt->execute();

        if ($stmt->fetch()) {
            $_SESSION["PairId"]= $pairId;
            echo "JOUDSIN SIIA";
        }else {
            echo "midagi valesti";
            exit();
        }

        $stmt->close();

    }



    function updatePairId(){

        $stmt = $this->connection->prepare("UPDATE paar SET pairId=pairId+1 WHERE id=1");

        // kas õnnestus salvestada
        if ($stmt->execute()) {
            // õnnestus
            echo "PairId uuendamine õnnestus!";
        }

        $stmt->close();

    }

    function updateVari($pairId, $varjuId){

        $stmt = $this->connection->prepare("UPDATE tudengivarjud SET pairId=? WHERE id=?");
        $stmt->bind_param("ii", $pairId, $varjuId);

        // kas õnnestus salvestada
        if ($stmt->execute()) {
            // õnnestus
            echo "Varju pairId salvestus õnnestus!";
        }

        $stmt->close();

    }
    function updateTudeng($pairId, $tudengiId){

        $stmt = $this->connection->prepare("UPDATE tudengid SET pairId=? WHERE id=?");
        $stmt->bind_param("ii", $pairId, $tudengiId);

        // kas õnnestus salvestada
        if ($stmt->execute()) {
            // õnnestus
            echo "Tudengi pairId salvestus õnnestus!";
        }

        $stmt->close();

    }

    function getVarjud(){

        $stmt = $this->connection->prepare("
			SELECT id, eesnimi, perekonnanimi, email, telefoninr, kool, vanus, bm, eriala, eriala2, pairId
            FROM tudengivarjud
            WHERE pairId !=0
            ORDER BY pairId
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
            WHERE pairId !=0
            ORDER BY pairId
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