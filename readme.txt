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


3_ À AJOUTER DANS LE OCMOD:    
    catalog/controller/common/header.php  (appel de methode addVisites())
    admin/controller/report/report.php  (ajout des liens vers les rapports)
