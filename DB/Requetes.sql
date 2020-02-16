--creer le compte d'un enfant
--ici on prend un enfant du parent numero1 comme l'exemple
INSERT INTO Enfant VALUES((SELECT MAX(idEnfant) FROM ENFANT)+1,'Nom','Prenom',sysdate,'0699999999',1);
INSERT INTO Flux VALUES(sysdate,0,(SELECT MAX(numFlux) FROM FLUX)+1,(SELECT idEnfant FROM ENFANT WHERE nomEnfant='Nom' and prenomEnfant='Prenom'));

--supprimer les compte d'un enfant
DELETE FROM Enfant WHERE nomEnfant='Nom' and prenomEnfant='Prenom';

--consulter l'argent du compte de l'enfant 1
SELECT SUM(montant)
FROM FLUX
WHERE idEnfant=1;

--traiter l'argent
--ajouter de l'argent
INSERT INTO Flux VALUES(sysdate,30,(SELECT MAX(numFlux) FROM Flux)+1,1);
--retirer de l'argent
INSERT INTO Flux VALUES(sysdate,-30,(SELECT MAX(numFlux) FROM Flux)+1,1);

--consulter les prix des produits
SELECT nomProduit,prixProduit
FROM Produit;

--consulter les stocks disponibles
SELECT nomProduit,nbRestant
FROM Produit;

--Gerer les stocks
--ajouter les stocks
UPDATE Produit
SET nbRestant=nbRestant+2
WHERE nomProduit='Donut chocolat';
--diminuer les stocks
UPDATE Produit
SET nbRestant=nbRestant-2
WHERE nomProduit='Donut chocolat';

--modifier le prix
UPDATE Produit
SET prixProduit=1.2
WHERE nomProduit='Donut chocolat';