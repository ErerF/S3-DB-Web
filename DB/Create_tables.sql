CREATE TABLE UTILISATEUR(
	login         VARCHAR2 (50) NOT NULL  ,
	password      VARCHAR2 (30) NOT NULL  ,
	nomParent     VARCHAR2 (25) NOT NULL  ,
	prenomParent  VARCHAR2 (50)  ,
	president     NUMBER (1) NOT NULL  ,
--il n'existe pas le type boolean en SQL, donc on utilise NUMBER(1)
--1=TRUE et 0=FALSE
	tel           CHAR (10)  NOT NULL  ,
	benevole      NUMBER (1) NOT NULL  ,
	CONSTRAINT cleUtilisateur PRIMARY KEY (login) ,
	CONSTRAINT CHK_BOOLEAN_president CHECK (president IN (0,1)),
	CONSTRAINT CHK_BOOLEAN_benevole CHECK (benevole IN (0,1))
);

CREATE TABLE CATEGORIE(
	numCategorie  NUMBER(2) NOT NULL ,
	nomCategorie  VARCHAR2 (25)NOT NULL  ,
	CONSTRAINT cleCategorie PRIMARY KEY (numCategorie) ,
	CONSTRAINT CATEGORIE_Uniq UNIQUE (nomCategorie)
);

CREATE TABLE ENFANT(
	idEnfant       NUMBER(5) NOT NULL ,
	nomEnfant      VARCHAR2 (25) NOT NULL  ,
	prenomEnfant   VARCHAR2 (50) NOT NULL  ,
	dateNaissance  DATE ,
	telParent      CHAR (10)  NOT NULL  ,
	numCategorie   NUMBER(2)  NOT NULL  ,
	CONSTRAINT cleEnfant PRIMARY KEY (idEnfant),
  FOREIGN KEY (numCategorie) REFERENCES CATEGORIE(numCategorie)
);

CREATE TABLE COMMANDE(
	numCommande   NUMBER(10) NOT NULL ,
	dateCommande  DATE  NOT NULL  ,
	idEnfant      NUMBER(5)  NOT NULL  ,
	CONSTRAINT cleCommande PRIMARY KEY (numCommande),
  FOREIGN KEY (idEnfant) REFERENCES ENFANT(idEnfant)
);

CREATE TABLE PRODUIT(
	idProduit    NUMBER(5) NOT NULL ,
	nomProduit   VARCHAR2 (25) NOT NULL  ,
	nbRestant    NUMBER(5,2)  NOT NULL  ,
	prixProduit  NUMBER(4,2)  NOT NULL  ,
	CONSTRAINT cleProduit PRIMARY KEY (idProduit),
  CONSTRAINT clePrixPositif CHECK (prixProduit>=0),
  CONSTRAINT clePrixMax CHECK (prixProduit<100),
);

CREATE TABLE RESTOCKAGE(
	dateRestockage  DATE  NOT NULL  ,
	numRestockage   NUMBER(10) NOT NULL ,
	CONSTRAINT cleRestockage PRIMARY KEY (numRestockage)
);

CREATE TABLE FLUX(
	dateFlux  DATE  NOT NULL  ,
	montant   NUMBER(5,2) NOT NULL  ,
	numFlux   NUMBER(10) NOT NULL ,
	idEnfant  NUMBER(5)  NOT NULL  ,
	CONSTRAINT cleFlux PRIMARY KEY (numFlux),
  FOREIGN KEY (idEnfant) REFERENCES ENFANT(idEnfant) ON DELETE CASCADE
);

CREATE TABLE PARENT_ENFANT(
	idParent  VARCHAR2 (50) NOT NULL  ,
	idEnfant  NUMBER(5)  NOT NULL  ,
	CONSTRAINT clePE PRIMARY KEY (idParent,idEnfant),
  FOREIGN KEY (idParent) REFERENCES UTILISATEUR(login),
  FOREIGN KEY (idEnfant) REFERENCES ENFANT(idEnfant)
);

CREATE TABLE COMMANDE_PRODUIT(
	quantiteProduit  NUMBER(5,2)  NOT NULL  ,
	numCommande      NUMBER(10)  NOT NULL  ,
	idProduit        NUMBER(5)  NOT NULL  ,
	CONSTRAINT cleCP PRIMARY KEY (numCommande,idProduit),
  FOREIGN KEY (numCommande) REFERENCES COMMANDE(numCommande),
  FOREIGN KEY (idProduit) REFERENCES PRODUIT(idProduit),
  CONSTRAINT cleNbPositif CHECK (quantiteProduit>=0)
);

CREATE TABLE RESTOCKAGE_PRODUIT(
	nbRestockageProd    NUMBER(5,2)  NOT NULL  ,
	prixRestockageProd  NUMBER(5,2)  NOT NULL  , --prix unitaire
	idProduit           NUMBER(5)  NOT NULL  ,
	numRestockage       NUMBER(10)  NOT NULL  ,
	CONSTRAINT cleRP PRIMARY KEY (idProduit,numRestockage),
  FOREIGN KEY (idProduit) REFERENCES PRODUIT(idProduit),
  FOREIGN KEY (numRestockage) REFERENCES RESTOCKAGE(numRestockage),
  CONSTRAINT clePrixRPositif CHECK (prixRestockageProd>=0),
  CONSTRAINT clePrixRMax CHECK (prixRestockageProd<100),
  CONSTRAINT cleNbRPositif CHECK (nbRestockageProd>=0)
);
CREATE TABLE COMPO_PRODUIT(
	quantiteComposant  NUMBER(5,2) NOT NULL  ,
	idProdCompose    NUMBER(5)  NOT NULL  ,
	idProdComposant  NUMBER(5)  NOT NULL  ,
	CONSTRAINT cleCompoProd PRIMARY KEY (idProdCompose,idProdComposant),
  FOREIGN KEY (idProdCompose) REFERENCES PRODUIT(idProduit),
  FOREIGN KEY (idProdComposant) REFERENCES PRODUIT(idProduit),
  CONSTRAINT cleQuanPositif CHECK (quantiteComposant>=0)
);