 # TP2 OPENCART
## Rapport de visites sur le site

`Olivier Raude` et `Gaël Comeau`

### Note
Les rapports sont visibles sous Reports/Reports, puis sélectionner le rapport `15 pages les plus visités` ou `02 - Rapport pages visitées`

### lien vers webdev:
https://e1895410.webdev.cmaisonneuve.qc.ca/session_4/solution_web/tp2/

___

### Procédure installation:

1. installer OPENCART
    * nom de la base de données = tp2 
    * prefixe db = _tp2
    * username = master
    * password = master
2. copier le pack frenchpacktranslation_v2.2
3. 3. copier les fichiers présent dans le répertoire 'fichier_a_copier' dans le repertoire opencart
4. installer le module 'visites' (installation de la table visite)
   * sur le site opencart admin, ouvrir extensions / extensions
   * sélectionner modules
   * sur Visites , cliquez sur '+'
5. installer le OCMOD visites:
   * sur le site opencart admin, ouvrir extensions / installer
   * cliquez upload / choisir le visites.ocmod.zip

___
   
### Fichiers créés

##### modèle : 
    * catalog/model/reports/visites.php
    * admin/model/extension/report/visites.php
    * admin/model/extension/module/visites.php
##### controleur:
    * admin/controller/extension/report/pages_visitees.php
    * admin/controller/extension/report/visites.php
    * admin/controller/extension/module/visites.php
##### vue:
    * admin/view/template/extension/report/pages_visitees.twig
    * admin/view/template/extension/report/visites_info.twig
    * admin/view/template/extension/module/visites.twig
#### langage:
    * admin/langage/en-gb/extension/report/pages_visitees.php
    * admin/langage/en-gb/extension/report/visites.php
    * admin/language/en-gb/extension/module/visites.php
    * admin/langage/fr-fr/extension/report/pages_visitees.php   
    * admin/langage/fr-fr/extension/report/visites.php
    * admin/language/fr-fr/extension/module/visites.php
___

### Fichiers ajoutées dans le OCMOD:    
    * catalog/controller/common/header.php  (appel de methode addVisites())
    * admin/controller/report/report.php  (ajout des liens vers les rapports)
