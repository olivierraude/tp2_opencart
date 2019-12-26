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
    ajout du model visites dans admin

3_ création du controleur
    modification du controleur report.php dans admin
    modification du controleur common/header.php dans le catalogs  (appel de methode addVisites())
    ajout du controleur visites.php dans admin
    modification de la vue report.twig dans admin