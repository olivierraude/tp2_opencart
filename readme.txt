_____________________

    TP2 OPENCART
_____________________

ajout d'un module OCMOD surveillant les visites sur le site

INSTALLATION:
nom de la base de données = tp2 
prefixe db = _tp2


1_ création d'une base de données

2_ création du model 
    !!! A MODIFIER , LE MODEL DOIT SE TROUVER DANS LE CATALOG (dans un fichier existant) !!! 
    un modèle est conservé dans admin pour afficher différents rapports
    le modèle 'add' est dans le catalog/model/reports/statistics.php

3_ création du controleur
    !!! A MODIFIER , LE CONTROLLER DOIT ÊTRE DANS UN FICHIER EXISTANT !!! 
    admin/controller/visites/visites.php

    le controleur pour le 'add' (ajout des adresses visitées par l'utilisateur) est placé dans common/header 
    (quelque soit la page visitée par l'utilisateur le header est toujours chargé):
    catalog/controller/common/header.php
