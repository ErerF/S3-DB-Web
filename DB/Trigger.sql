--1 trigger permet de gerer des alertes quand on n'a pas assez de produits
CREATE OR REPLACE TRIGGER trigPasAssez
BEFORE Update ON Produit FOR EACH ROW WHEN(new.nbRestant<0)
BEGIN
    RAISE_APPLICATION_ERROR(-20001,'Pas assez de produit!');
END;  