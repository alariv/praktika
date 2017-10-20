# TUDENGIVARJUVEEB
Tudengivarjuveeb on tellitud Tallinna Ülikooli Üliõpilaskonna poolt ja 
on loodud selleks, et Tallinna Ülikooli Tudengivarjunädala korraldajatel 
ja osalejatel oleks lihtne teha järgnevaid tegevusi:
  - Registreerida tudengiks
  - Registreerida tudengivarjuks
  - Näha registreerinud osalejaid
  - Panna paari registreerunud osalejaid
  - Vajadusel paari pandud osalejad lahku lüüa
  
Välja tooks veel eraldi sellise tehnoloogia nagu SwiftMaileri 
kasutamise, mis aitab hõlpsasti automaatselt emaile saata 
tudengite/tudengivarjude registreerimisel, nende paari panemisel ja 
lahku löömisel.
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
- HTML 5.1 - CSS3 - JavaScript - MySQL 5.5.54 - PHP 5.6.29 - SwiftMailer 
6.0.0
# Paigaldusjuhised
Kuna projekt ise on veebipõhine leht, siis kasutuseks ei ole muud vaja 
kui ühte mitmeist veebibrauseritest. Ise soovitame kasutada Google 
Chrome kõige uuemat versiooni (hetkel 59.0.3071.86). Leht asub Tallinna 
Ülikooli greeny serveris, millesse saab siseneda näiteks läbi sellise 
tarkvara nagu Putty ja sinna pääsevad ainult kasutajat omavad isikud. 
Tavakasutaja lehele pääsemiseks tuleb minna 
localhost:5555/~alarvere/praktika/page/welcome.php. Admini lehele 
pääsemiseks localhost:5555/~alarvere/praktika/page/admin.php, 
kasutajanimi on "admin" ja parooliks "opelpoleauto". Step by step 
juhised, kuidas leht endal tööle saada: 1) Klooni GitHubi repositoorium: 
https://github.com/alariv/praktika.git 2) Loo tabelid (käsklused all 
pool) 3) Mine asukohta, kuhu kloonisid GitHubi repositooriumi 4) 
Tavakasutaja lehele saamiseks ava sealt "page/welcome.php", edasisi 
juhiseid on ekraanil näha 5) Admini lehele pääsemiseks ava kloonitud 
kaustast "page/admin.php", kasutajanimi ja parool ülal välja toodud. 
Kasutame ka MySQL'i tabeleid, millede valmistamise skriptid on: ``` 
CREATE TABLE `admin` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `knimi` varchar(50) NOT NULL,
  `parool` varchar(255) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1; 
CREATE TABLE `eriala` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `bm` varchar(100) NOT NULL,
  `eriala` varchar(100) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1 
ROW_FORMAT=COMPACT; CREATE TABLE `paar` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `pairId` int(11) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1; 
CREATE TABLE `tervitusTekst` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `tekst` text NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1; CREATE 
TABLE `tudengid` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
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
  `deleted` datetime DEFAULT NULL ) ENGINE=InnoDB DEFAULT 
CHARSET=latin1; CREATE TABLE `tudengivarjud` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
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
  `deleted` datetime DEFAULT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1 
ROW_FORMAT=COMPACT; INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Ajakirjandus'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Integreeritud kunst, muusika ja multimeedia'); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Koreograafia'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Audiovisuaalne meedia'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Reklaam ja imagoloogia'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Ristimeedia filmis ja televisioonis'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Suhtekorraldus'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Informaatika'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Infoteadus'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Matemaatika'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Alushariduse pedagoog'); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Andragoogika'); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Eripedagoogika'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Klassiõpetaja'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Kutsepedagoogika'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Noorsootöö'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Pedagoogika'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Jaapani uuringud'); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'baka', 'Hiina uuringud'); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Lähis-Ida uuringud'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Ajalugu'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Antropoloogia'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Referent-toimetaja'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Eesti keel ja kirjandus'); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'baka', 'Eesti keel teise keelena ja 
eesti kultuur'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Itaalia keel ja kultuur'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Prantsuse keel ja kultuur'); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Soome keel ja 
kultuur'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Inglise keel ja kultuur'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Saksa keel ja kultuur'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Hispaania keel ja kultuur'); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Filosoofia'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Interdistsiplinaarsed humanitaarteadused - artes liberales'); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Kultuuriteadus'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Vene 
filoloogia'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Bioloogia (kõrvalerialaga)'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Integreeritud loodusteadused'); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Integreeritud 
tehnoloogiad ja käsitöö'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Kehakultuur'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Keskkonnakorraldus'); INSERT INTO eriala (id, 
bm, eriala) VALUES (DEFAULT, 'baka', 'Psühholoogia'); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'baka', 'Rekreatsioonikorraldus'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Haldus- ja 
ärikorraldus'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Interdistsiplinaarsed sotsiaalteadused - Artes Liberales'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Poliitika 
ja valitsemine'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Riigiteadused'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Riigiteadused'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Sotsiaaltöö'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Sotsioloogia'); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'baka', 'Õigusteadus'); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Õigusteadus (inglise 
keeles)'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Kommunikatsioon"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Kommunikatsioonijuhtimine"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Koreograafia"); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'magi', "Kunstiõpetaja"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Muusikaõpetaja"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Kommunikatsioon"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Nüüdismeedia"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Digitaalsed õppemängud"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Haridustehnoloogia"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Infoteadus"); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Infotehnoloogia 
juhtimine"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Inimese ja arvuti interaktsioon"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Matemaatikaõpetaja"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Alushariduse 
pedagoogia"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Andragoogika"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Eripedagoog-nõustaja"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Hariduse juhtimine"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Kasvatusteadused"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Kutseõpetaja"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Mitme aine õpetaja"); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'magi', "Noorsootöö korraldus"); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'magi', "Aasia uuringud"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Ajaloo ja 
ühiskonnaõpetuse õpetaja"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Ajalugu"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Antropoloogia"); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'magi', "Eesti keele ja kirjanduse õpetaja"); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Eesti keele kui 
teise keele ja eesti kultuuri õpetaja"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Eesti uuringud"); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'magi', "Keeleteadus ja 
keeletoimetamine"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Kirjalik tõlge"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Kirjandusteadus"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Kirjandus-, visuaalkultuuri ja 
filmiteooria"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Kultuuriteooria ja filosoofia"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Slaavi keeled ja kultuurid"); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Suuline tõlge"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Vene keele 
ja kirjanduse õpetaja"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Võõrkeeleõpetaja"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Gümnaasiumi loodusteaduslike ainete 
õpetaja"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Kehakultuuri õpetaja"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Keskonnakorraldus"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Kunstiteraapiad"); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'magi', "Linnakorraldus"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Maastike ökoloogia"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Molekulaarne biokeemia ja ökoloogia"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Organisatsioonikäitumine"); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Psühholoogia"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Rekreatsioonikorraldus"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Tehnoloogiavaldkonna ainete õpetaja"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "haldusjuhtimine"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Politoloogia"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Rahvusvahelised suhted"); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'magi', "Riigiteadused"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Sotsiaalpedagoogika ja lastekaitse"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Sotsiaaltöö"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Sotsioloogia"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Õigusteadus"); ```
# Litsents
Litsents asub projekti repositooriumi juurkaustas.
# Config fail
```php <?php
	$serverHost = "xxxxxxxxx";
	$serverUsername = "xxxx";
	$serverPassword = "xxxxxxxx";
	$mailName="xxxxxxxxxxxxxxxxxxxxxxxxxxxx";
	$mailPassword="xxxxxxxxxxxx"; ?># TUDENGIVARJUVEEB 
Tudengivarjuveeb on tellitud Tallinna Ülikooli Üliõpilaskonna poolt ja 
on loodud selleks, et Tallinna Ülikooli Tudengivarjunädala korraldajatel 
ja osalejatel oleks lihtne teha järgnevaid tegevusi:
  - Registreerida tudengiks
  - Registreerida tudengivarjuks
  - Näha registreerinud osalejaid
  - Panna paari registreerunud osalejaid
  - Vajadusel paari pandud osalejad lahku lüüa
  
Välja tooks veel eraldi sellise tehnoloogia nagu SwiftMaileri 
kasutamise, mis aitab hõlpsasti automaatselt emaile saata 
tudengite/tudengivarjude registreerimisel, nende paari panemisel ja 
lahku löömisel.
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
- HTML 5.1 - CSS3 - JavaScript - MySQL 5.5.54 - PHP 5.6.29 - SwiftMailer 
6.0.0
# Paigaldusjuhised
Kuna projekt ise on veebipõhine leht, siis kasutuseks ei ole muud vaja 
kui ühte mitmeist veebibrauseritest. Ise soovitame kasutada Google 
Chrome kõige uuemat versiooni (hetkel 59.0.3071.86). Leht asub Tallinna 
Ülikooli greeny serveris, millesse saab siseneda näiteks läbi sellise 
tarkvara nagu Putty ja sinna pääsevad ainult kasutajat omavad isikud. 
Tavakasutaja lehele pääsemiseks tuleb minna 
localhost:5555/~alarvere/praktika/page/welcome.php. Admini lehele 
pääsemiseks localhost:5555/~alarvere/praktika/page/admin.php, 
kasutajanimi on "admin" ja parooliks "opelpoleauto". Step by step 
juhised, kuidas leht endal tööle saada: 1) Klooni GitHubi repositoorium: 
https://github.com/alariv/praktika.git 2) Loo tabelid (käsklused all 
pool) 3) Mine asukohta, kuhu kloonisid GitHubi repositooriumi 4) 
Tavakasutaja lehele saamiseks ava sealt "page/welcome.php", edasisi 
juhiseid on ekraanil näha 5) Admini lehele pääsemiseks ava kloonitud 
kaustast "page/admin.php", kasutajanimi ja parool ülal välja toodud. 
Kasutame ka MySQL'i tabeleid, millede valmistamise skriptid on: ``` 
CREATE TABLE `admin` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `knimi` varchar(50) NOT NULL,
  `parool` varchar(255) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1; 
CREATE TABLE `eriala` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `bm` varchar(100) NOT NULL,
  `eriala` varchar(100) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1 
ROW_FORMAT=COMPACT; CREATE TABLE `paar` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `pairId` int(11) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1; 
CREATE TABLE `tervitusTekst` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `tekst` text NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1; CREATE 
TABLE `tudengid` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
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
  `deleted` datetime DEFAULT NULL ) ENGINE=InnoDB DEFAULT 
CHARSET=latin1; CREATE TABLE `tudengivarjud` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
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
  `deleted` datetime DEFAULT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1 
ROW_FORMAT=COMPACT; INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Ajakirjandus'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Integreeritud kunst, muusika ja multimeedia'); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Koreograafia'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Audiovisuaalne meedia'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Reklaam ja imagoloogia'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Ristimeedia filmis ja televisioonis'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Suhtekorraldus'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Informaatika'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Infoteadus'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Matemaatika'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Alushariduse pedagoog'); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Andragoogika'); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Eripedagoogika'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Klassiõpetaja'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Kutsepedagoogika'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Noorsootöö'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Pedagoogika'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Jaapani uuringud'); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'baka', 'Hiina uuringud'); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Lähis-Ida uuringud'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Ajalugu'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Antropoloogia'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Referent-toimetaja'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Eesti keel ja kirjandus'); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'baka', 'Eesti keel teise keelena ja 
eesti kultuur'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Itaalia keel ja kultuur'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Prantsuse keel ja kultuur'); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Soome keel ja 
kultuur'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Inglise keel ja kultuur'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Saksa keel ja kultuur'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Hispaania keel ja kultuur'); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Filosoofia'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Interdistsiplinaarsed humanitaarteadused - artes liberales'); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Kultuuriteadus'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Vene 
filoloogia'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Bioloogia (kõrvalerialaga)'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Integreeritud loodusteadused'); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Integreeritud 
tehnoloogiad ja käsitöö'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Kehakultuur'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Keskkonnakorraldus'); INSERT INTO eriala (id, 
bm, eriala) VALUES (DEFAULT, 'baka', 'Psühholoogia'); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'baka', 'Rekreatsioonikorraldus'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Haldus- ja 
ärikorraldus'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Interdistsiplinaarsed sotsiaalteadused - Artes Liberales'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Poliitika 
ja valitsemine'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Riigiteadused'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Riigiteadused'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Sotsiaaltöö'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Sotsioloogia'); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'baka', 'Õigusteadus'); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Õigusteadus (inglise 
keeles)'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Kommunikatsioon"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Kommunikatsioonijuhtimine"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Koreograafia"); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'magi', "Kunstiõpetaja"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Muusikaõpetaja"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Kommunikatsioon"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Nüüdismeedia"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Digitaalsed õppemängud"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Haridustehnoloogia"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Infoteadus"); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Infotehnoloogia 
juhtimine"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Inimese ja arvuti interaktsioon"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Matemaatikaõpetaja"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Alushariduse 
pedagoogia"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Andragoogika"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Eripedagoog-nõustaja"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Hariduse juhtimine"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Kasvatusteadused"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Kutseõpetaja"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Mitme aine õpetaja"); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'magi', "Noorsootöö korraldus"); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'magi', "Aasia uuringud"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Ajaloo ja 
ühiskonnaõpetuse õpetaja"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Ajalugu"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Antropoloogia"); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'magi', "Eesti keele ja kirjanduse õpetaja"); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Eesti keele kui 
teise keele ja eesti kultuuri õpetaja"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Eesti uuringud"); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'magi', "Keeleteadus ja 
keeletoimetamine"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Kirjalik tõlge"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Kirjandusteadus"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Kirjandus-, visuaalkultuuri ja 
filmiteooria"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Kultuuriteooria ja filosoofia"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Slaavi keeled ja kultuurid"); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Suuline tõlge"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Vene keele 
ja kirjanduse õpetaja"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Võõrkeeleõpetaja"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Gümnaasiumi loodusteaduslike ainete 
õpetaja"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Kehakultuuri õpetaja"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Keskonnakorraldus"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Kunstiteraapiad"); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'magi', "Linnakorraldus"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Maastike ökoloogia"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Molekulaarne biokeemia ja ökoloogia"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Organisatsioonikäitumine"); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Psühholoogia"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Rekreatsioonikorraldus"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Tehnoloogiavaldkonna ainete õpetaja"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "haldusjuhtimine"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Politoloogia"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Rahvusvahelised suhted"); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'magi', "Riigiteadused"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Sotsiaalpedagoogika ja lastekaitse"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Sotsiaaltöö"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Sotsioloogia"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Õigusteadus"); ```
# Litsents
Litsents asub projekti repositooriumi juurkaustas.
# Config fail
```php <?php
	$serverHost = "xxxxxxxxx";
	$serverUsername = "xxxx";
	$serverPassword = "xxxxxxxx";
	$mailName="xxxxxxxxxxxxxxxxxxxxxxxxxxxx";
	$mailPassword="xxxxxxxxxxxx"; ?># TUDENGIVARJUVEEB 
Tudengivarjuveeb on tellitud Tallinna Ülikooli Üliõpilaskonna poolt ja 
on loodud selleks, et Tallinna Ülikooli Tudengivarjunädala korraldajatel 
ja osalejatel oleks lihtne teha järgnevaid tegevusi:
  - Registreerida tudengiks
  - Registreerida tudengivarjuks
  - Näha registreerinud osalejaid
  - Panna paari registreerunud osalejaid
  - Vajadusel paari pandud osalejad lahku lüüa
  
Välja tooks veel eraldi sellise tehnoloogia nagu SwiftMaileri 
kasutamise, mis aitab hõlpsasti automaatselt emaile saata 
tudengite/tudengivarjude registreerimisel, nende paari panemisel ja 
lahku löömisel.
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
- HTML 5.1 - CSS3 - JavaScript - MySQL 5.5.54 - PHP 5.6.29 - SwiftMailer 
6.0.0
# Paigaldusjuhised
Kuna projekt ise on veebipõhine leht, siis kasutuseks ei ole muud vaja 
kui ühte mitmeist veebibrauseritest. Ise soovitame kasutada Google 
Chrome kõige uuemat versiooni (hetkel 59.0.3071.86). Leht asub Tallinna 
Ülikooli greeny serveris, millesse saab siseneda näiteks läbi sellise 
tarkvara nagu Putty ja sinna pääsevad ainult kasutajat omavad isikud. 
Tavakasutaja lehele pääsemiseks tuleb minna 
localhost:5555/~alarvere/praktika/page/welcome.php. Admini lehele 
pääsemiseks localhost:5555/~alarvere/praktika/page/admin.php, 
kasutajanimi on "admin" ja parooliks "opelpoleauto". Step by step 
juhised, kuidas leht endal tööle saada: 1) Klooni GitHubi repositoorium: 
https://github.com/alariv/praktika.git 2) Loo tabelid (käsklused all 
pool) 3) Mine asukohta, kuhu kloonisid GitHubi repositooriumi 4) 
Tavakasutaja lehele saamiseks ava sealt "page/welcome.php", edasisi 
juhiseid on ekraanil näha 5) Admini lehele pääsemiseks ava kloonitud 
kaustast "page/admin.php", kasutajanimi ja parool ülal välja toodud. 
Kasutame ka MySQL'i tabeleid, millede valmistamise skriptid on: ``` 
CREATE TABLE `admin` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `knimi` varchar(50) NOT NULL,
  `parool` varchar(255) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1; 
CREATE TABLE `eriala` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `bm` varchar(100) NOT NULL,
  `eriala` varchar(100) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1 
ROW_FORMAT=COMPACT; CREATE TABLE `paar` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `pairId` int(11) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1; 
CREATE TABLE `tervitusTekst` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `tekst` text NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1; CREATE 
TABLE `tudengid` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
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
  `deleted` datetime DEFAULT NULL ) ENGINE=InnoDB DEFAULT 
CHARSET=latin1; CREATE TABLE `tudengivarjud` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
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
  `deleted` datetime DEFAULT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1 
ROW_FORMAT=COMPACT; INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Ajakirjandus'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Integreeritud kunst, muusika ja multimeedia'); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Koreograafia'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Audiovisuaalne meedia'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Reklaam ja imagoloogia'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Ristimeedia filmis ja televisioonis'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Suhtekorraldus'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Informaatika'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Infoteadus'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Matemaatika'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Alushariduse pedagoog'); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Andragoogika'); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Eripedagoogika'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Klassiõpetaja'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Kutsepedagoogika'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Noorsootöö'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Pedagoogika'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Jaapani uuringud'); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'baka', 'Hiina uuringud'); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Lähis-Ida uuringud'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Ajalugu'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Antropoloogia'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Referent-toimetaja'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Eesti keel ja kirjandus'); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'baka', 'Eesti keel teise keelena ja 
eesti kultuur'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Itaalia keel ja kultuur'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Prantsuse keel ja kultuur'); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Soome keel ja 
kultuur'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Inglise keel ja kultuur'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Saksa keel ja kultuur'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Hispaania keel ja kultuur'); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Filosoofia'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 
'Interdistsiplinaarsed humanitaarteadused - artes liberales'); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Kultuuriteadus'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Vene 
filoloogia'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Bioloogia (kõrvalerialaga)'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Integreeritud loodusteadused'); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Integreeritud 
tehnoloogiad ja käsitöö'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Kehakultuur'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Keskkonnakorraldus'); INSERT INTO eriala (id, 
bm, eriala) VALUES (DEFAULT, 'baka', 'Psühholoogia'); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'baka', 'Rekreatsioonikorraldus'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Haldus- ja 
ärikorraldus'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Interdistsiplinaarsed sotsiaalteadused - Artes Liberales'); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Poliitika 
ja valitsemine'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'baka', 'Riigiteadused'); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'baka', 'Riigiteadused'); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'baka', 'Sotsiaaltöö'); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'baka', 'Sotsioloogia'); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'baka', 'Õigusteadus'); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'baka', 'Õigusteadus (inglise 
keeles)'); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Kommunikatsioon"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Kommunikatsioonijuhtimine"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Koreograafia"); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'magi', "Kunstiõpetaja"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Muusikaõpetaja"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Kommunikatsioon"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Nüüdismeedia"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Digitaalsed õppemängud"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Haridustehnoloogia"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Infoteadus"); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Infotehnoloogia 
juhtimine"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Inimese ja arvuti interaktsioon"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Matemaatikaõpetaja"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Alushariduse 
pedagoogia"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Andragoogika"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Eripedagoog-nõustaja"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Hariduse juhtimine"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Kasvatusteadused"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Kutseõpetaja"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Mitme aine õpetaja"); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'magi', "Noorsootöö korraldus"); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'magi', "Aasia uuringud"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Ajaloo ja 
ühiskonnaõpetuse õpetaja"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Ajalugu"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Antropoloogia"); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'magi', "Eesti keele ja kirjanduse õpetaja"); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Eesti keele kui 
teise keele ja eesti kultuuri õpetaja"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Eesti uuringud"); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'magi', "Keeleteadus ja 
keeletoimetamine"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Kirjalik tõlge"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Kirjandusteadus"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Kirjandus-, visuaalkultuuri ja 
filmiteooria"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Kultuuriteooria ja filosoofia"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Slaavi keeled ja kultuurid"); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Suuline tõlge"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Vene keele 
ja kirjanduse õpetaja"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Võõrkeeleõpetaja"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Gümnaasiumi loodusteaduslike ainete 
õpetaja"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Kehakultuuri õpetaja"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Keskonnakorraldus"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Kunstiteraapiad"); INSERT INTO eriala 
(id, bm, eriala) VALUES (DEFAULT, 'magi', "Linnakorraldus"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Maastike ökoloogia"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Molekulaarne biokeemia ja ökoloogia"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Organisatsioonikäitumine"); INSERT 
INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "Psühholoogia"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Rekreatsioonikorraldus"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Tehnoloogiavaldkonna ainete õpetaja"); INSERT INTO 
eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', "haldusjuhtimine"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Politoloogia"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Rahvusvahelised suhted"); INSERT INTO eriala (id, bm, eriala) 
VALUES (DEFAULT, 'magi', "Riigiteadused"); INSERT INTO eriala (id, bm, 
eriala) VALUES (DEFAULT, 'magi', "Sotsiaalpedagoogika ja lastekaitse"); 
INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 'magi', 
"Sotsiaaltöö"); INSERT INTO eriala (id, bm, eriala) VALUES (DEFAULT, 
'magi', "Sotsioloogia"); INSERT INTO eriala (id, bm, eriala) VALUES 
(DEFAULT, 'magi', "Õigusteadus"); ```
# Litsents
Litsents asub projekti repositooriumi juurkaustas.
# Config fail
```php <?php
	$serverHost = "xxxxxxxxx";
	$serverUsername = "xxxx";
	$serverPassword = "xxxxxxxx";
	$mailName="xxxxxxxxxxxxxxxxxxxxxxxxxxxx";
	$mailPassword="xxxxxxxxxxxx";
?>
