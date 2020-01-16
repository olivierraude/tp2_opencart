# TP2 OPENCART
## ajout d'un module OCMOD surveillant les visites sur le site



### Procédure installation:

1 - installer OPENCART
    nom de la base de données = tp2 
    prefixe db = _tp2
2 - installer le pack fr
3 - installer la pack bd 'visites'
4 - copier les fichiers visites
5 - installer le OCMOD visites



### Fichiers Créés
    ##### modèle : 
        * catalog/model/reports/visites.php
        * admin/model/extension/report/visites.php
    ##### controleur:
        * admin/controller/extension/report/pages_visitees.php
        * admin/controller/extension/report/visites.php
    ##### vue:
        * admin/view/template/extension/report/pages_visitees.twig
        * admin/view/template/extension/report/visites_info.twig
    ####langage:
        * admin/langage/en-gb/extension/report/pages_visitees.php
        * admin/langage/en-gb/extension/report/visites.php
        * admin/langage/fr-fr/extension/report/pages_visitees.php   
        * admin/langage/fr-fr/extension/report/visites.php   


#### Fichiers ajoutées dans le OCMOD:    
    * catalog/controller/common/header.php  (appel de methode addVisites())
    * admin/controller/report/report.php  (ajout des liens vers les rapports)
