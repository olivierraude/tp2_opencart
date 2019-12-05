_____________________

    TP2 OPENCART
_____________________

ajout d'un module OCMOD surveillanl les visites sur le site


1_ crétion d'une base de données

2_ création du model 
    !!! A MODIFIER , LE MODEL DOIT SE TROUVER DANS LE CATALOG (dans un fichier existant ???) !!! 
    conserver un modèle dans admin pour afficher différents rapports ???
    le modèle 'add' doit être dans le catalog ???
    admin/model/visites/visites.php

3_ création du controleur
    !!! A MODIFIER , LE CONTROLLER DOIT ÊTRE DANS UN FICHIER EXISTANT !!! 
    conserver un controleur  dans admin pour afficher différents rapports ??? dans visites ou dans rapports ???
    admin/controller/visites/visites.php

    le controleur pour le 'add' (ajout des adresses visités par l'utilisateur) est placé dans common/header (quelque soit la page visitée par l'utilisateur le header est toujours chargé):
    catalog/controller/common/header.php
