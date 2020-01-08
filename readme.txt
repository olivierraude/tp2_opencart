_____________________

    TP2 OPENCART

    branche gael_v2
_____________________

ajout d'un module OCMOD surveillant les visites sur le site

INSTALLATION:
nom de la base de données = tp2 
prefixe db = _tp2


1_ BD

2_ CRÉATION DE FICHIER 
    modèle : 
        catalog/model/reports/visites.php
        admin/model/visites.php (emplacement correcte ?)
    controleur:
        admin/controller/extension/report/pages_visitees.php
    vue:
        admin/view/template/extension/report/pages_visitees.twig
    langage:
        admin/langage/en-gb/extension/report/pages_visitees.php
        admin/langage/fr-fr/extension/report/pages_visitees.php   

<<<<<<< HEAD

3_ À AJOUTER DANS LE OCMOD:    
    admin/controller/report/report.php  (ajout des liens vers les rapports)
    catalog/controller/common/header.php  (appel de methode addVisites())
=======
2_ création du model 
    le modèle 'add' est dans le catalog/model/reports/visites.php
    ajout du model visites dans admin

3_ création du controleur
    modification du controleur report.php dans admin
    modification du controleur common/header.php dans le catalogs  (appel de methode addVisites())
    ajout du controleur visites.php dans admin
    modification de la vue report.twig dans admin
>>>>>>> gael
