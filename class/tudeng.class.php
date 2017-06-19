<?php

class Tudeng
{

    private $connection;

    function __construct($mysqli)
    {

        $this->connection = $mysqli;

    }

    function saveTudeng($eesnimi, $perenimi, $email, $telnr, $kursus, $vanus, $bm, $eriala, $mituVarju){
        $stmt = $this->connection->prepare("INSERT INTO tudengid (eesnimi, perekonnanimi, email, telefoninr, kursus, vanus, bm, eriala, mituVarju) 
                                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        echo $this->connection->error;
        $stmt->bind_param("sssisissi", $eesnimi, $perenimi, $email, $telnr, $kursus, $vanus, $bm, $eriala, $mituVarju);

        if ($stmt->execute()) {
            echo "salvestamine onnestus ";
        } else {
            echo "ERROR " . $stmt->error;
        }
    }


}