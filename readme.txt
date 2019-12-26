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
    catalog/model/reports/visites.php
    admin/model/visites.php (emplacement correcte ?)
    admin/controller/extension/report/pages_visites.php
    admin/view/template/extension/report/pages_visites.twig
    


3_ À AJOUTER DANS LE OCMOD:    
    admin/controller/report/report.php  (ajout des liens vers les rapports)
    catalog/controller/common/header.php  (appel de methode addVisites())
