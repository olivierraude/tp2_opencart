_____________________

    TP2 OPENCART

    branche gael_v2
_____________________

ajout d'un module OCMOD surveillant les visites sur le site

INSTALLATION:
nom de la base de données = tp2 
prefixe db = _tp2


1_ création d'une base de données

2_ création du model 
    le modèle 'add' est dans le catalog/model/reports/visites.php (nouveau fichier)

3_ création du controleur
    À AJOUTER DANS LE OCMOD:    
    admin/controller/report/report.php  (ajout des liens vers les rapports)
    catalog/controller/common/header.php  (appel de methode addVisites())
