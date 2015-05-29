# SliderPHP
La tu vois c'est un slider en PHP/html/javascript, ce qui est magique avec, c'est que mon slider qui fonctionne en javascript a besoin d'une liste en html des photos a afficher. 
bon jusque là c'est ok, mais comme je suis feignant je vais générer la liste de mes photos qui sont dans un dossier, de tel manière que mon slider vienne chercher tout seul les photo dont il a besoin.
Je rajoute une photo, j'actualise la page du slider et hop! la photo est dans le slider!.

en trois étapes:
1. script php viens checker les photos deans mon dossier 
2. et génère ma liste en html
3. mon script javascript utilise ma liste fraichement générée pour faire passer mes photos

Toujours dans l'optique de rien glander je me suis fait une interface qui me (ou même ma grand mère) permet d'ajouter,  une photo.
la version v1 est pas très design mais pratique, 
il est composé de:
 - un petit formulaire pour envoyer une photo sur le serveur
 - un aperçut de la photo
 - le nom de la photo
 - un commentaire sur son état (pris en compte dans la diapo, ...)
 - 
