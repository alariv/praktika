# TUDENGIVARJUVEEB



Tudengivarjuveeb on tellitud Tallinna Ülikooli Üliõpilaskonna poolt ja on loodud selleks, et Tallinna Ülikooli Tudengivarjunädala korraldajatel ja osalejatel oleks lihtne teha järgnevaid tegevusi:

  - Registreerida tudengiks
  - Registreerida tudengivarjuks
  - Näha registreerinud osalejaid
  - Panna paari registreerunud osalejaid
  - Vajadusel paari pandud osalejad lahku lüüa
  
Välja tooks veel eraldi sellise tehnoloogia nagu SwiftMaileri kasutamise, mis aitab hõlpsasti automaatselt emaile saata tudengite/tudengivarjude registreerimisel, nende paari panemisel ja lahku löömisel.

# Mõned pildid lehest endast

![N|Solid](https://www.upload.ee/image/7119897/leht3.png)
_________________________________________________________
![N|Solid](https://www.upload.ee/image/7119906/leht4.png)


# Projekti meeskond
  - Rasmus Aaviste (tiimijuht)
  - Alari Verev (arendaja)
  - Siim Hütsi (arendaja)
  - Johan Reili (testija)
  - Kristjan Känd (testija)
  - Ats Klemmer (blogija)

# Kasutatud tehnoloogiad
- HTML 5.1
- CSS3
- JavaScript
- MySQL 5.5.54
- PHP 5.6.29
- SwiftMailer 6.0.0

# Paigaldusjuhised

Kuna projekt ise on veebipõhine leht, siis kasutuseks ei ole muud vaja kui ühte mitmeist veebibrauseritest. Ise soovitame kasutada Google Chrome kõige uuemat versiooni (hetkel 59.0.3071.86).

Leht asub Tallinna Ülikooli greeny serveris, millesse saab siseneda näiteks läbi sellise tarkvara nagu Putty ja sinna pääsevad ainult kasutajat omavad isikud. Tavakasutaja lehele pääsemiseks tuleb minna localhost:5555/~alarvere/praktika/welcome.php. Admini lehele pääsemiseks localhost:5555/~alarvere/praktika/admin.php, kasutajanimi on "admin" ja parooliks "opelpoleauto".

Step by step juhised, kuidas leht endal tööle saada:
1) Klooni GitHubi repositoorium: https://github.com/alariv/praktika.git
2) Loo tabelid (käsklused all pool)
3) Mine asukohta, kuhu kloonisid GitHubi repositooriumi
4) Tavakasutaja lehele saamiseks ava sealt "welcome.php", edasisi juhiseid on ekraanil näha
5) Admini lehele pääsemiseks ava kloonitud kaustast "admin.php", kasutajanimi ja parool ülal välja toodud.

Kasutame ka MySQL'i tabeleid, millede valmistamise skriptid on:
```
CREATE TABLE `admin` (
  `id` int(11) PRIMARY KEY NOT NULL,
  `knimi` varchar(50) NOT NULL,
  `parool` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `eriala` (
  `id` int(11) PRIMARY KEY NOT NULL,
  `bm` varchar(100) NOT NULL,
  `eriala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

CREATE TABLE `paar` (
  `id` int(11) PRIMARY KEY NOT NULL,
  `pairId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tervitusTekst` (
  `id` int(11) PRIMARY KEY NOT NULL,
  `tekst` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tudengid` (
  `id` int(11) PRIMARY KEY NOT NULL,
  `eesnimi` varchar(50) NOT NULL,
  `perekonnanimi` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoninr` int(11) NOT NULL,
  `vanus` int(11) NOT NULL,
  `eriala` varchar(100) NOT NULL,
  `kursus` int(11) NOT NULL,
  `bm` varchar(50) NOT NULL,
  `mituVarju` int(11) NOT NULL,
  `pairId` int(11) NOT NULL,
  `pairId2` int(11) NOT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tudengivarjud` (
  `id` int(11) PRIMARY KEY NOT NULL,
  `eesnimi` varchar(50) NOT NULL,
  `perekonnanimi` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoninr` int(11) NOT NULL,
  `kool` varchar(100) NOT NULL,
  `vanus` int(11) NOT NULL,
  `bm` varchar(50) NOT NULL,
  `eriala` varchar(100) NOT NULL,
  `eriala2` varchar(100) NOT NULL,
  `pairId` int(11) NOT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
```

# Litsents

Litsents asub projekti repositooriumi juurkaustas.

# Config fail

```php
<?php
	$serverHost = "xxxxxxxxx";
	$serverUsername = "xxxx";
	$serverPassword = "xxxxxxxx";
	$mailName="xxxxxxxxxxxxxxxxxxxxxxxxxxxx";
	$mailPassword="xxxxxxxxxxxx";
?>