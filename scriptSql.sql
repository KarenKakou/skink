#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: COMPTE
#------------------------------------------------------------

CREATE TABLE COMPTE(
        idCompte        int (11) Auto_increment  NOT NULL ,
        nomCompte       Varchar (25) NOT NULL ,
        prenomCompte    Varchar (25) NOT NULL ,
        adresseCompte   Varchar (100) ,
        telephoneCompte Varchar (10) ,
        motDePasse      Varchar (120) NOT NULL ,
        emailCompte     Varchar (60) NOT NULL ,
        avatarCompte    Varchar (100) ,
        idStatut        Int NOT NULL ,
        PRIMARY KEY (idCompte )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MESSAGE
#------------------------------------------------------------

CREATE TABLE MESSAGE(
        idMessage       int (11) Auto_increment  NOT NULL ,
        corpsMessage    Text NOT NULL ,
        pieceJointe     Varchar (100) ,
        idConv          Int NOT NULL ,
        idCompte        Int NOT NULL ,
        idCompte_COMPTE Int NOT NULL ,
        PRIMARY KEY (idMessage )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: IMAGE
#------------------------------------------------------------

CREATE TABLE IMAGE(
        idImage        int (11) Auto_increment  NOT NULL ,
        cheminImage    Varchar (100) NOT NULL ,
        dateAjoutImage Date ,
        idCompte       Int NOT NULL ,
        PRIMARY KEY (idImage )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: STATUT
#------------------------------------------------------------

CREATE TABLE STATUT(
        idStatut  int (11) Auto_increment  NOT NULL ,
        nomStatut Varchar (25) NOT NULL ,
        PRIMARY KEY (idStatut )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PROJET
#------------------------------------------------------------

CREATE TABLE PROJET(
        idProj             int (11) Auto_increment  NOT NULL ,
        nomProjet          Varchar (25) NOT NULL ,
        descriptionProjet  Text ,
        sommeTotaleDue     Double NOT NULL ,
        nbEcheancesTotales Int NOT NULL ,
        nbEcheancesPayees  Int NOT NULL ,
        arrhesPayees       Double NOT NULL ,
        PRIMARY KEY (idProj )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: RDV
#------------------------------------------------------------

CREATE TABLE RDV(
        idRDV        int (11) Auto_increment  NOT NULL ,
        debRdv       TimeStamp NOT NULL ,
        finRdv       TimeStamp NOT NULL ,
        modePaiement Varchar (25) NOT NULL ,
        idProj       Int NOT NULL ,
        PRIMARY KEY (idRDV )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CONVERSATION
#------------------------------------------------------------

CREATE TABLE CONVERSATION(
        idConv int (11) Auto_increment  NOT NULL ,
        PRIMARY KEY (idConv )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: GERER
#------------------------------------------------------------

CREATE TABLE GERER(
        idCompte        Int NOT NULL ,
        idProj          Int NOT NULL ,
        idCompte_COMPTE Int NOT NULL ,
        PRIMARY KEY (idCompte ,idProj ,idCompte_COMPTE )
)ENGINE=InnoDB;

ALTER TABLE COMPTE ADD CONSTRAINT FK_COMPTE_idStatut FOREIGN KEY (idStatut) REFERENCES STATUT(idStatut);
ALTER TABLE MESSAGE ADD CONSTRAINT FK_MESSAGE_idConv FOREIGN KEY (idConv) REFERENCES CONVERSATION(idConv);
ALTER TABLE MESSAGE ADD CONSTRAINT FK_MESSAGE_idCompte FOREIGN KEY (idCompte) REFERENCES COMPTE(idCompte);
ALTER TABLE MESSAGE ADD CONSTRAINT FK_MESSAGE_idCompte_COMPTE FOREIGN KEY (idCompte_COMPTE) REFERENCES COMPTE(idCompte);
ALTER TABLE IMAGE ADD CONSTRAINT FK_IMAGE_idCompte FOREIGN KEY (idCompte) REFERENCES COMPTE(idCompte);
ALTER TABLE RDV ADD CONSTRAINT FK_RDV_idProj FOREIGN KEY (idProj) REFERENCES PROJET(idProj);
ALTER TABLE GERER ADD CONSTRAINT FK_GERER_idCompte FOREIGN KEY (idCompte) REFERENCES COMPTE(idCompte);
ALTER TABLE GERER ADD CONSTRAINT FK_GERER_idProj FOREIGN KEY (idProj) REFERENCES PROJET(idProj);
ALTER TABLE GERER ADD CONSTRAINT FK_GERER_idCompte_COMPTE FOREIGN KEY (idCompte_COMPTE) REFERENCES COMPTE(idCompte);
