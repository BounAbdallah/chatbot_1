<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            ['question' => 'Comment installer Laravel?', 'answer' => 'Utilisez la commande `composer create-project --prefer-dist laravel/laravel nom_du_projet` pour installer Laravel.'],
            ['question' => 'Qu\'est-ce que Laravel?', 'answer' => 'Laravel est un framework PHP pour le développement web avec un modèle MVC.'],
            ['question' => 'Comment utiliser Eloquent ORM?', 'answer' => 'Eloquent ORM permet d\'interagir avec votre base de données en utilisant des modèles. Par exemple, `$users = User::all();` récupère tous les utilisateurs.'],
            ['question' => 'Comment créer une migration?', 'answer' => 'Utilisez la commande `php artisan make:migration nom_de_la_migration --create=nom_de_la_table` pour créer une nouvelle migration.'],
            ['question' => 'Comment exécuter des migrations?', 'answer' => 'Exécutez `php artisan migrate` pour appliquer toutes les migrations à la base de données.'],
            ['question' => 'Qu\'est-ce qu\'un seed dans Laravel?', 'answer' => 'Un seed est utilisé pour insérer des données de test ou initiales dans la base de données via des seeders.'],
            ['question' => 'Comment créer un seeder?', 'answer' => 'Utilisez `php artisan make:seeder NomDuSeeder` pour créer un nouveau seeder.'],
            ['question' => 'Comment exécuter un seeder?', 'answer' => 'Utilisez `php artisan db:seed` pour exécuter tous les seeders, ou spécifiez un seeder avec `--class=NomDuSeeder`.'],
            ['question' => 'Qu\'est-ce qu\'un middleware dans Laravel?', 'answer' => 'Un middleware est une couche de logique qui filtre les requêtes HTTP avant qu\'elles n\'atteignent les routes ou les controlleurs.'],
            ['question' => 'Comment créer un middleware?', 'answer' => 'Utilisez la commande `php artisan make:middleware NomDuMiddleware` pour créer un nouveau middleware.'],
            ['question' => 'Comment utiliser un middleware sur une route?', 'answer' => 'Ajoutez-le à la méthode `middleware` de votre route ou dans le constructeur de votre contrôleur.'],
            ['question' => 'Qu\'est-ce qu\'un route model binding?', 'answer' => 'C\'est une fonctionnalité qui permet d\'injecter automatiquement un modèle dans une route en fonction de l\'ID de la route.'],
            // ... (suite des questions jusqu'à 140)

            ['question' => 'Comment configurer des relations dans Eloquent?', 'answer' => 'Définissez des méthodes dans vos modèles avec des noms comme `hasOne`, `hasMany`, `belongsTo`, etc., pour établir des relations.'],
            ['question' => 'Qu\'est-ce que Blade dans Laravel?', 'answer' => 'Blade est le moteur de templating de Laravel qui permet d\'écrire des vues avec une syntaxe simple et puissante.'],
            ['question' => 'Comment passer des données à une vue Blade?', 'answer' => 'Utilisez `return view(\'nom_de_la_vue\')->with([\'cle\' => $valeur]);` ou `return view(\'nom_de_la_vue\', compact(\'variable\'));`.'],
            ['question' => 'Qu\'est-ce qu\'un contrôleur dans Laravel?', 'answer' => 'Un contrôleur gère la logique de votre application pour une ou plusieurs routes.'],
            ['question' => 'Comment créer un contrôleur?', 'answer' => 'Utilisez `php artisan make:controller NomDuController` pour en créer un.'],
            ['question' => 'Comment passer des données d\'un contrôleur à une vue?', 'answer' => 'Retournez la vue avec des données comme `return view(\'vue\')->with([\'nom\' => $nom]);`.'],
            ['question' => 'Qu\'est-ce que l\'injection de dépendance dans Laravel?', 'answer' => 'C\'est une technique où les dépendances d\'un objet sont fournies par le conteneur de service de Laravel lors de la création de l\'objet.'],
            ['question' => 'Comment organiser les fichiers de vue dans Laravel?', 'answer' => 'Les vues sont généralement organisées dans le dossier `resources/views` selon des sous-dossiers logiques.'],
            ['question' => 'Qu\'est-ce qu\'un service provider dans Laravel?', 'answer' => 'Un service provider est une classe de configuration pour lier des services dans le conteneur de service de Laravel.'],
            ['question' => 'Comment créer une API RESTful avec Laravel?', 'answer' => 'Utilisez les ressources de contrôleur avec `php artisan make:controller NomController --resource` pour des routes CRUD automatiques.'],
            ['question' => 'Comment sécuriser les formulaires contre les attaques CSRF?', 'answer' => 'Laravel utilise des tokens CSRF automatiquement pour les formulaires. Assurez-vous que la directive `@csrf` est dans vos formulaires.'],
            ['question' => 'Comment gérer les sessions dans Laravel?', 'answer' => 'Laravel fournit un système de gestion de session intégré. Utilisez `session()->put(\'clé\', \'valeur\')` pour stocker des données.'],
            ['question' => 'Qu\'est-ce que l\'authentification dans Laravel?', 'answer' => 'Laravel fournit un système complet d\'authentification via le package `auth` avec des commandes comme `php artisan make:auth`.'],
            ['question' => 'Comment utiliser les jobs dans Laravel?', 'answer' => 'Les jobs permettent de déplacer le travail lourd en arrière-plan. Créez un job avec `php artisan make:job NomDuJob`.'],
            ['question' => 'Comment configurer le mail dans Laravel?', 'answer' => 'Configurez les paramètres de mail dans `.env` et utilisez la facade `Mail` pour envoyer des emails.'],
            ['question' => 'Qu\'est-ce que l\'artisan dans Laravel?', 'answer' => 'Artisan est l\'interface de ligne de commande de Laravel pour gérer diverses tâches de développement.'],
            ['question' => 'Comment gérer les fichiers de configuration dans Laravel?', 'answer' => 'Utilisez les fichiers dans le dossier `config` et accédez-y avec `config(\'nom_du_fichier.clé\')`.'],

            ['question' => 'Comment utiliser les directives Blade?', 'answer' => 'Les directives Blade comme `@if`, `@foreach`, `@yield` facilitent la gestion des structures conditionnelles et boucles dans les vues.'],
            ['question' => 'Qu\'est-ce que le cache dans Laravel?', 'answer' => 'Le cache permet de stocker temporairement des données pour améliorer les performances, accessible via la facade `Cache`.'],
            ['question' => 'Comment gérer la pagination dans Laravel?', 'answer' => 'Utilisez `paginate()` sur une collection Eloquent pour paginer automatiquement les résultats avec une pagination simple à intégrer dans vos vues.'],
            ['question' => 'Comment utiliser les événements et les listeners dans Laravel?', 'answer' => 'Déclarez des événements avec `php artisan make:event NomDeLEvenement` et des listeners avec `php artisan make:listener NomDuListener`.'],
            ['question' => 'Qu\'est-ce que le système de notification de Laravel?', 'answer' => 'Il permet d\'envoyer des notifications aux utilisateurs via différents canaux comme la base de données, le courrier, Slack, etc.'],
            ['question' => 'Comment configurer les notifications dans Laravel?', 'answer' => 'Créez des notifications avec `php artisan make:notification NomDeLaNotification` et implémentez les méthodes de canaux dans la classe.'],
            ['question' => 'Comment utiliser le système de filesystems dans Laravel?', 'answer' => 'Laravel supporte plusieurs systèmes de stockage via `config/filesystems.php`. Utilisez `Storage::disk(\'local\')->put(\'file.txt\', \'Contents\');` par exemple.'],
            ['question' => 'Qu\'est-ce que la validation dans Laravel?', 'answer' => 'La validation vérifie les données entrantes selon des règles définies. Utilisez `$request->validate([ ... ])` dans vos contrôleurs.'],
            ['question' => 'Comment gérer les erreurs de validation dans Laravel?', 'answer' => 'Les erreurs de validation sont automatiquement passées aux vues via `$errors`, ou vous pouvez les récupérer avec `$validator->errors()`.'],
            ['question' => 'Qu\'est-ce que l\'injection de dépendance dans les contrôleurs?', 'answer' => 'Vous pouvez injecter des services ou des modèles directement dans les méthodes de contrôleur via le constructeur ou les méthodes elles-mêmes.'],
            ['question' => 'Comment utiliser des traits dans Laravel?', 'answer' => 'Les traits permettent de réutiliser du code entre différentes classes. Par exemple, `use SoftDeletes;` pour les modèles avec suppression douce.'],
            ['question' => 'Comment configurer les logs dans Laravel?', 'answer' => 'Laravel utilise Monolog pour la journalisation. Configurez dans `config/logging.php` et utilisez `Log::info(\'Message\');` pour enregistrer des messages.'],
            ['question' => 'Qu\'est-ce que la commande artisan dans Laravel?', 'answer' => 'Artisan est l\'interface CLI de Laravel pour diverses tâches de développement comme la création de migrations, de modèles, etc.'],
            ['question' => 'Comment créer une commande Artisan personnalisée?', 'answer' => 'Utilisez `php artisan make:command NomDeLaCommande` pour créer une nouvelle commande artisan.'],
            ['question' => 'Comment utiliser les tâches programmées (Cron Jobs) dans Laravel?', 'answer' => 'Définissez vos tâches dans `app/Console/Kernel.php` dans la méthode `schedule` et utilisez `php artisan schedule:run` pour les exécuter.'],
            ['question' => 'Comment gérer les migrations de base de données?', 'answer' => 'Utilisez `migrate`, `migrate:fresh`, `migrate:rollback`, et `migrate:reset` pour gérer vos migrations.'],
            ['question' => 'Comment créer un modèle dans Laravel?', 'answer' => 'Utilisez `php artisan make:model NomDuModele` pour créer un modèle. Ajoutez `-m` pour créer aussi une migration.'],
            ['question' => 'Comment utiliser les scopes dans les modèles Eloquent?', 'answer' => 'Définissez des méthodes dans vos modèles avec le préfixe `scope` pour filtrer dynamiquement les requêtes.'],
            ['question' => 'Qu\'est-ce qu\'un observer dans Laravel?', 'answer' => 'Les observers surveillent les événements des modèles Eloquent comme `creating`, `updating`, etc., pour exécuter du code spécifique.'],
            ['question' => 'Comment utiliser les vues partagées dans Laravel?', 'answer' => 'Utilisez `view()->share(\'clé\', $valeur)` pour partager des données avec toutes les vues, ou `@include(\'nom_de_la_vue\')` pour inclure des vues.'],
            ['question' => 'Comment gérer les relations polymorphes dans Eloquent?', 'answer' => 'Utilisez `morphTo()`, `morphMany()`, `morphOne()` dans vos modèles pour définir des relations polymorphes.'],

        ];

        foreach ($questions as $q) {
            Question::create($q);
        }
    }
}





