

<h2>Bienvenue</h2>



<p><b>Pourquoi, dans les classes du modèle, les attributs sont-ils "protected" plutôt que "private" ?</b><br/>
	Le boulot principal se fait dans Model.php. C'est une classe mère. Si ses enfants ont des attributs privés, elle ne peux y accéder. Personne ne cache des choses à sa môman.
</p>
<p><b>Que se passe-t-il si l'action n'est pas passée en paramètre de la route ?</b><br/>
On détecte le "/" dans la requête de l'utilisateur. Si y pas, alors on fixe l'action à "index". ça se passe dans la route.
</p>
<p><b>Que se passe-t-il si le contrôleur demandé dans la route n'existe pas ? Que faire pour corriger ça ?</b><br/>
L'utilisateur est un filou qui veut vous hacker en demandant un truc qui n'existe pas ? L'autoload ne pourra charger la classe du contrôleur ? Il suffit, dans tools.php, de vérifier l'existence du fichier (file_exists). Si le fichier du contrôleur n'est pas là, diriger vers le contrôleur du site avec un message d'insultes bien salé.
</p>
<p><b>Que fait la fonction "render" dans le contrôleur générique ?</b><br/>
Plein de trucs. Principalement, elle charge un fichier de rendu (dans le dossier view) de la classe demandée, en mettant en global les données voulues ($data)
</p>
<p><b>Comment faire un rendu partiel pour un élément du modèle, pour l'utiliser comme un widget, sans entête et pied html ?</b><br/>
Il faut faire une autre fonction dans Controller.php, sans entête et pied html. C'est l'action spécifique qui appellera cette fonction.
</p>
<p><b>Comment faire une page statique (exemple : page "à propos", page "contact", ...) ?</b><br/>
Il faut créer une action (fonction) dans le controleur de site (SiteController) et la vue adaptée, dans view/site/???
</p>
<p><b>Les relations n-aires entre classes sont elles gérées dans le chargement automatique des instances depuis la base ?</b><br/>
Non. Cf Question suivante/
</p>
<p><b>Comment gérer les chargements et mises à jour automatique de relation n-aires, sans toucher à Model.php ? en touchant à Model.php ?</b><br/>
En créant un constructeur et un __set spécifique dans la classe en questionn (cf Game.php pour exemple)
</p>
<p><b>La hiérarchie des classes est-elle gérée dans l'automatisation des accès à la base de données ?</b><br/>
Non. à gérer en spécifique pour les classes voulues, comme pour les relations n-aires.
</p>
<p><b>Si les classes du modèle sont presque vides (il n'y a que les attributs), à quoi servent-elle ? Est-ce qu'il y aura des cas où elles seront moins vides ?</b><br/>
Si elles sont vides, c'est qu'on a déporté les traitements dans Model.php, parce qu'on avait la flemme de dupliquer du code. On doit gérer les cas particulier dans les classes du modèle : actions particulières (login, logout, ...), relations n-aire....
</p>
<p><b>Comprenez-vous l'utilité de chaque ligne du chargement d'une instance dans Model.php (après le select) ?</b><br/>
Yep :)
</p>
<p><b>A quoi ça sert de mettre tout $_GET et $_POST dans une seule variable ?</b><br/>
à pas s'emmerder à tester les deux à chaque fois. Et concrètement, à avoir la possibilité de gérer les deux en même temps : cf add dans beer, avec le formulaire en post et l'action avec un paramètre get
</p>
<p><b>Quelles sont les 2 variables globales importantes ? Pourquoi utiliser des fonctions d'accès ?</b><br/>
	"parameters" pour ce que demande l'utilisateur (get et post) et "data" pour les données fournies par les controlleurs aux vues. Les fonctions d'accès sont là pour pas s'embeter (et pour pas oublier) avec le mot-clé "global" (berk)
</p>
<p><b>Comment le chargement automatique des classes fait la différence entre une classe du modèle et une classe du contrôler ?</b><br/>
Dans les noms des classes, y'a le mot "Controller" pour les classes de contrôleur. Trop facile :p
</p>
<p><b>Ou doivent se trouver les fonctions d'accès au données (l'équivalent du findAll, mais spécifique à chaque élément du modèle ?)</b><br/>
Dans le modèle ! Modèle = gestion des données.
</p>
<p><b>Comment faire un champ de recherche unique (pour tous les éléments du modèle, sur n'importe quel attribut) ?</b><br/>
On fait une action dans le contrôleur de site qui fait une recherche globale dans les résultats de tous les findAll. C'est bourrin, mais en dessous de 100000 données dans la base, on s'en fiche. 
</p>
<p><b>Allez vous utiliser cette archi pour les sprints ?</b><br/>
Non. Je suis un guerrier du php. Je code tout à la main entre 2h et 3h du matin.
</p>
