CREATE TABLE IF NOT EXISTS `beneficiaire` (
  `IdBene` int(11) NOT NULL AUTO_INCREMENT,
  `NomBene` varchar(50) DEFAULT NULL,
  `PrenomBene` varchar(50) DEFAULT NULL,
  `DateNaissanceBene` date DEFAULT NULL,
  PRIMARY KEY (`IdBene`)
);


CREATE TABLE IF NOT EXISTS `circuit` (
  `IdCircuit` int(11) NOT NULL AUTO_INCREMENT,
  `nomCircuit` varchar(50) DEFAULT NULL,
  `Descriptif` varchar(50) DEFAULT NULL,
  `VilleDepart` varchar(50) DEFAULT NULL,
  `PaysDepart` varchar(50) DEFAULT NULL,
  `VilleArrivee` varchar(50) DEFAULT NULL,
  `DateDepart` date DEFAULT NULL,
  `NbrPlaceDispo` int(11) DEFAULT NULL,
  `Durée` time DEFAULT NULL,
  `PrixInscription` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`IdCircuit`)
);


CREATE TABLE IF NOT EXISTS `client` (
  `IdClient` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  PRIMARY KEY (`IdClient`)
);



CREATE TABLE IF NOT EXISTS `etape` (
  `IdCircuit` int(11) NOT NULL,
  `Ordre` varchar(50) NOT NULL,
  `DateEtape` date DEFAULT NULL,
  `Durée` time DEFAULT NULL,
  `NomLieu` varchar(50) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `Pays` varchar(50) NOT NULL,
  PRIMARY KEY (`IdCircuit`,`Ordre`),
  FOREIGN KEY (Ville) REFERENCES lieuavisiter (Ville),
  FOREIGN KEY (Pays) REFERENCES lieuavisiter (Pays));


CREATE TABLE IF NOT EXISTS `lieuavisiter` (
  `NomLieu` varchar(50) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `Pays` varchar(50) NOT NULL,
  `Descriptif` text,
  `PrixVisite` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`NomLieu`,`Ville`,`Pays`)
);


CREATE TABLE IF NOT EXISTS `reservation` (
  `IdReservation` int(11) NOT NULL AUTO_INCREMENT,
  `DateReservation` date DEFAULT NULL,
  `EtatReservation` varchar(25) DEFAULT NULL,
  `IdCircuit` int(11) NOT NULL,
  `IdBene` int(11) NOT NULL,
  PRIMARY KEY (`IdReservation`),
  FOREIGN KEY (IdCircuit) REFERENCES circuit (IdCircuit),
  FOREIGN KEY (IdBene) REFERENCES beneficiaire (IdBene)
);



CREATE TABLE IF NOT EXISTS `reserver` (
  `IdReservation` int(11) NOT NULL,
  `IdClient` int(11) NOT NULL,
  PRIMARY KEY (`IdReservation`,`IdClient`),
  FOREIGN KEY (IdClient) REFERENCES client (IdClient)
);



INSERT INTO `beneficiaire` (`IdBene`, `NomBene`, `PrenomBene`, `DateNaissanceBene`) VALUES
(1, 'Martin', 'Jeanne', '1980-04-15'),
(2, 'Martin', 'Jacque', '1981-01-10'),
(3, 'Soleo', 'Ginette', '1960-12-20'),
(4, 'Pillo', 'Stephane', '1990-02-13');


INSERT INTO `circuit` (`IdCircuit`, `Descriptif`, `VilleDepart`, `PaysDepart`, `VilleArrivee`, `DateDepart`, `NbrPlaceDispo`, `Durée`, `PrixInscription`) VALUES
(7, 'Voyage a traver les océans', 'Paris', 'France', 'Sydney', '2020-10-03', 10, '96:00:00', '121'),
(8, 'Voyage a traver les océans', 'Paris', 'France', 'Sydney', '2020-10-03', 10, '96:00:00', '121');


INSERT INTO `client` (`IdClient`, `Nom`, `Prenom`, `DateNaissance`) VALUES
(1, 'Martin', 'Jeanne', '1980-04-15'),
(2, 'Soleo', 'Ginette', '1960-12-20'),
(3, 'Dupont', 'Martin', '1975-03-29');


INSERT INTO `etape` (`IdCircuit`, `Ordre`, `DateEtape`, `Durée`, `NomLieu`, `Ville`, `Pays`) VALUES
(7, '1', '2020-10-02', '05:10:00', 'Tour Eiffel', 'Paris', 'France'),
(7, '2', '2020-10-03', '03:10:00', 'Colisée', 'Rome', 'Italie'),
(7, '3', '2020-10-05', '06:00:00', 'Opera', 'Sydney', 'Australie');


INSERT INTO `lieuavisiter` (`NomLieu`, `Ville`, `Pays`, `Descriptif`, `PrixVisite`) VALUES
('Tour Eiffel', 'Paris', 'France', 'Visite rapide mais efficace', '50'),
('Colisée', 'Rome', 'Italie', 'Visite de ce monument incroyable !', '46'),
('Opera', 'Sydney', 'Australie', 'Loin mais ça en vaut la peine', '101');
