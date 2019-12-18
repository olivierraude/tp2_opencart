_____________________

    TP2 OPENCART
_____________________

ajout d'un module OCMOD surveillant les visites sur le site

INSTALLATION:
nom de la base de données = tp2 
prefixe db = _tp2


1_ création d'une base de données

2_ création du model 
    le modèle 'add' est dans le catalog/model/reports/visites.php

3_ création du controleur
    !!! A MODIFIER , LE CONTROLLER DOIT ÊTRE DANS UN FICHIER EXISTANT !!!     
    admin/controller/report/report.php
    catalog/controller/common/header.php  (appel de methode addVisites())
