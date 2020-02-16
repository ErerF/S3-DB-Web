--ajoute 4 parents
INSERT INTO Utilisateur VALUES('ADF','123456','De Framond','A',1,'0600000000',0);
INSERT INTO Utilisateur VALUES('BDF','123456','De Framond','B',0,'0600000001',0);
INSERT INTO Utilisateur VALUES('CF','123456','Feng','C',0,'0600000003',0);
INSERT INTO Utilisateur VALUES('DF','123456','Feng','D',0,'0600000004',0);

--ajoute 2 categories
INSERT INTO Categorie VALUES(1,'<8ans');
INSERT INTO Categorie VALUES(2,'8-10ans');

--ajoute 2 enfants
INSERT INTO Enfant VALUES(1,'De Framond','Hector',TO_DATE('29-11-2011','DD-MM-YYYY'),'0600000000',1);
INSERT INTO Enfant VALUES(2,'Feng','Zixuan',TO_DATE('29-11-2008','DD-MM-YYYY'),'0600000003',2);

--ajoute 2 flux sur le compte 1 et on initialise le compte 2
INSERT INTO Flux VALUES(sysdate,50,1,1);
INSERT INTO Flux VALUES(sysdate,-2.2,2,1);
INSERT INTO Flux VALUES(sysdate,0,3,2);

--ajoute 5 produits
INSERT INTO Produit VALUES(1,'Donut chocolat',3,1);
INSERT INTO Produit VALUES(2,'pain au chocolat',5,1.2);
INSERT INTO Produit VALUES(3,'croissant',10,1.2);
INSERT INTO Produit VALUES(4,'Coca Zero',12,1);
INSERT INTO Produit VALUES(5,'produit speciale chocolat',10,1.2);

--ajoute 2 lignes dans COMPO_PRODUIT
INSERT INTO Compo_Produit VALUES(0.5,5,1);
INSERT INTO Compo_Produit VALUES(0.5,5,2);

--ajoute 1 commande
INSERT INTO Commande VALUES(1,sysdate,1);

--ajoute 2 produits dans cette commande
INSERT INTO Commande_Produit VALUES(1,1,5);
INSERT INTO Commande_Produit VALUES(1,1,4);

--ajoute 1 ligne dans restockage
INSERT INTO Restockage VALUES(TO_DATE('28-11-2017','DD-MM-YYYY'),1);

--ajoute 2 lignes dans restockage_produit
INSERT INTO Restockage_Produit VALUES(10,0.7,1,1);
INSERT INTO Restockage_Produit VALUES(5,1,2,1);