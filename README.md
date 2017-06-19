# TUDENGIVARJUVEEB

![N|Solid](https://www.tlu.ee/UserFiles/Turundus-%20ja%20kommunikatsiooniosakond/Logo/TLU-logo-pilt-vrv-suur.jpg)

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
- PHP
- SwiftMailer 6.0.0

# Paigaldusjuhised

Kuna projekt ise on veebipõhine leht, siis kasutuseks ei ole muud vaja kui ühte mitmeist veebibrauseritest. Ise soovitame kasutada Google Chrome kõige uuemat versiooni (hetkel 59.0.3071.86).

Leht asub Tallinna Ülikooli greeny serveris, millesse saab siseneda näiteks läbi sellise tarkvara nagu Putty ja sinna pääsevad ainult kasutajat omavad isikud. Tavakasutaja lehele pääsemiseks tuleb minna localhost:5555/~alariv/praktika/welcome.php. Admini lehele pääsemiks localhost:5555/~alariv/praktika/admin.php, kasutajanimi on "admin" ja parooliks "opelpoleauto".

Kasutame ka MySQL'i tabeleid, millede valmistamise skriptid on:
1) 

CREATE TABLE `admin` (
  `id` int(11) PRIMARY KEY NOT NULL,
  `knimi` varchar(50) NOT NULL,
  `parool` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

2) 

CREATE TABLE `eriala` (
  `id` int(11) PRIMARY KEY NOT NULL,
  `bm` varchar(100) NOT NULL,
  `eriala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

3) 

CREATE TABLE `paar` (
  `id` int(11) PRIMARY KEY NOT NULL,
  `pairId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

4)

CREATE TABLE `tervitusTekst` (
  `id` int(11) PRIMARY KEY NOT NULL,
  `tekst` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

5) 

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

6) 

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

# Config fail

	$serverHost = "xxxxxxxxx";
	$serverUsername = "xxxx";
	$serverPassword = "xxxxxxxx";
	
	$mailPassword="xxxxxxxxxxxx";

# Litsents

Litsents asub projekti repositooriumi juurkaustas.

