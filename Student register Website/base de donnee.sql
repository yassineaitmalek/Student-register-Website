Database insea

CREATE TABLE userinfo(
id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
matricule varchar(255) NOT NULL unique,
email_rec varchar(255) NOT NULL ,
pass varchar(255) NOT NULL,
nom varchar(255) NOT NULL,
prenom varchar(255) NOT NULL,
email varchar(255) NOT NULL ,
cycle varchar(255) NOT NULL,
filiere varchar(255) NOT NULL,
niveau varchar(255) NOT NULL,
date_de_naissance date not null,
sexe varchar(255) NOT NULL,
date_inscription date not null,
etat varchar(255) NOT NULL,
admin varchar(255) NOT NULL,
code varchar(255) NOT NULL,
checkcode varchar(255) NOT NULL
)


CREATE TABLE userdata(
id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
matricule varchar(255) NOT NULL unique ,
photo varchar(255) NOT NULL,
copie_cin varchar(255) NOT NULL,
copie_baccalaureat varchar(255) NOT NULL,
attestation_reussite varchar(255) NOT NULL
)



INSERT INTO `userinfo` (`id`, `matricule`, `email_rec`, `pass`, `nom`, `prenom`, `email`, `cycle`, `filiere`, `niveau`, `date_de_naissance`, `sexe`, `date_inscription`, `etat`, `admin`, `code`, `checkcode`) VALUES
(0, '0', '0', 'admin', 'admin', 'admin', 'admin.admin@insea.ac.ma', '0', '0', '0', '0000-00-00', '0', '0000-00-00', '0', 'oui', '0', '0');


