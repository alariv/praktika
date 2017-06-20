<?php
class Vari
{
    private $connection;
    function __construct($mysqli)
    {
        $this->connection = $mysqli;
    }
    function getBaka(){
        $stmt = $this->connection->prepare("
                SELECT eriala 
                FROM eriala WHERE bm LIKE ('baka')
                ORDER BY eriala
            ");
        echo $this->connection->error;
        $stmt->bind_result($eriala);
        $stmt->execute();
        $result = array();
        while ($stmt->fetch()) {
            $d = new StdClass();
            $d->eriala = $eriala;
            array_push($result, $d);
        }
        $stmt->close();
        return $result;
    }
    function getMagi(){
        $stmt = $this->connection->prepare("
                SELECT eriala 
                FROM eriala WHERE bm LIKE ('magi')
                ORDER BY eriala
            ");
        echo $this->connection->error;
        $stmt->bind_result($eriala);
        $stmt->execute();
        $result = array();
        while ($stmt->fetch()) {
            $d = new StdClass();
            $d->eriala = $eriala;
            array_push($result, $d);
        }
        $stmt->close();
        return $result;
    }
    function getBaka2(){
        $stmt = $this->connection->prepare("
                SELECT eriala 
                FROM eriala WHERE bm LIKE ('baka')
                ORDER BY eriala
            ");
        echo $this->connection->error;
        $stmt->bind_result($eriala2);
        $stmt->execute();
        $result = array();
        while ($stmt->fetch()) {
            $d = new StdClass();
            $d->eriala2 = $eriala2;
            array_push($result, $d);
        }
        $stmt->close();
        return $result;
    }
    function getMagi2(){
        $stmt = $this->connection->prepare("
                SELECT eriala 
                FROM eriala WHERE bm LIKE ('magi')
                ORDER BY eriala
            ");
        echo $this->connection->error;
        $stmt->bind_result($eriala2);
        $stmt->execute();
        $result = array();

        while ($stmt->fetch()) {

            $d = new StdClass();
            $d->eriala2 = $eriala2;

            array_push($result, $d);
        }

        $stmt->close();

        return $result;
    }

    function saveVari($eesnimi, $perenimi, $email, $telnr, $kool, $vanus, $bm, $eriala, $eriala2){

        $stmt = $this->connection->prepare("INSERT INTO tudengivarjud (eesnimi, perekonnanimi, email, telefoninr, kool, vanus, bm, eriala, eriala2) 
                                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        echo $this->connection->error;
        $stmt->bind_param("sssisisss", $eesnimi, $perenimi, $email, $telnr, $kool, $vanus, $bm, $eriala, $eriala2);

        if ($stmt->execute()) {
            echo "salvestamine onnestus ";
        } else {
            echo "ERROR " . $stmt->error;
        }
    }
}