--la vue pour voir le solde de tous les enfants
CREATE OR REPLACE VIEW soldeE(idEnfant,nomEnfant,prenomEnfant,solde)
AS SELECT idEnfant,nomEnfant,prenomEnfant,SUM(montant)
    FROM ENFANT NATURAL LEFT JOIN FLUX
    GROUP BY idEnfant,nomEnfant,prenomEnfant; 
    
--si on veux voir le solde d¡¯un enfant , ici on prend l¡¯enfant ¡®Hector De Framond¡¯
CREATE OR REPLACE VIEW soldeUnE(idEnfant,nomEnfant,prenomEnfant,solde)
AS SELECT idEnfant,nomEnfant,prenomEnfant,SUM(montant)
    FROM ENFANT NATURAL JOIN FLUX
    WHERE nomEnfant='De Framond' and prenomEnfant='Hector'
    GROUP BY idEnfant,nomEnfant,prenomEnfant;