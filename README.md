# space-mvc (A Lightweight PHP 8 MVC Framework)

| Tutorial  | Description |
| -------| ----------- |
| [Install&nbsp;Guide](#install-instructions) | How to install space mvc on to your linux, windows or mac computer or server |

## Quick Start Guide

| Class  | Description |
| -------| ----------- |
| 1. [Routes](#1-routes) | The Routes can be used to create uris that point to controller actions |
| 2. [Controllers](#2-controllers) | This Controller files can be used to manage the model data and view response output |
| 3. [Migrations](#3-migrations)  | The Migrations files can be used to create, alter or drop database tables  |
| 4. [Seeds](#4-database-seeds) | The Database seeds files contains insert statements to pre populate the database  |
| 5. [Models](#5-models)  | The Model files can be used to select, insert, create, update and delete database data  |
| 6. [Views](#6-views) | This View files can be used to output html to the end user |
| 7. [Layouts](#7-layouts) | The Layout files can be used to be a parent layout of the view |

## Available Library Classes

| Class  | Description |
| -------| ----------- |
| [Cache](#how-to-use-the-cache-class)  | This class can be used to store and retrieve data to and from the cache  |
| [Config](#how-to-use-the-config-class) | This class can be used to get the config files from the /config folder into an data array|
| [Env](#how-to-use-the-env-class) | This class can be used to retrieve environment config data from the /.env file |
| [Log](#how-to-use-the-log-class)| This class can be used to write log entries to the log files (default: /storage/logs/app.log)|
| [Path](#how-to-use-the-path-class) | This class can be used to retrieve config data from /config/paths.php | 
| [Request](#how-to-use-the-request-class) | This class can be used to retrieve the current request uri, method, get and post data | 
| [Router](#how-to-use-the-router-class) | This class can be used to get the current selected route or a list of all available routes | 
| [Session](#how-to-use-the-session-class) | This class can be use to set and get session data | 

## Install instructions
- git clone https://github.com/space-mvc/space-mvc.git
- cp .env.example .env
- composer install
- chmod 755 -R storage/logs

## Redis Cache - Install Instructions
- sudo apt update
- sudo apt install redis-server -y

## All Config Settings are inside the .env file
- APP_NAME="SpaceMvc"
- APP_URL="http://localhost"
- DB_HOSTNAME="127.0.0.1"
- DB_PORT=3306
- DB_USERNAME="root"
- DB_PASSWORD=""
- DB_DATABASE="space_mvc"
- REDIS_HOSTNAME="127.0.0.1"
- REDIS_PORT=6379

## Notes
- This project requires the following plugin below installed to work correctly
- This plugin will automatically be installed when you run the composer install command
- https://github.com/space-mvc/space-mvc-framework.git

## 1. Routes 
#### How to create a new Route

1. Open the file /routes/web.php
2. Add a new entry to the array
```php
[
    'name' => 'frontend.users',
    'uri' => '/users',
    'controller' => \App\Http\Controllers\Frontend\UsersControllerController::class,
    'action' => 'index',
],
```

## 2. Controllers

#### How to create a new Controller
1. Create a new file in the Controllers folder /app/Http/Controllers/Frontend
2. For example PostsController.php
3. Add the following template
```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use SpaceMvc\Framework\Library\Request;
use SpaceMvc\Framework\Mvc\View;
use App\Model\Post;

/**
 * Class PostsController
 * @package App\Http\Controllers\Admin
 */
class PostsController extends BaseController
{
    /** @var string $layout */
    protected string $layout = 'admin';

    /**
     * index
     * @return View
     */
    public function index(): View
    {
        $results = Post::find('all');

        return $this->app->getView('admin.posts.index', [
            'results' => $results
        ]);
    }

    /**
     * create
     * @return View
     */
    public function create() : View
    {
        return $this->app->getView('admin.posts.create');
    }

    /**
     * store
     */
    public function store(): void
    {
        /** @var Request $post */
        $request = $this->app->getRequest();

        /** @var Model $result */
        $result = Post::create($request->post());

        // redirect to uri base
        header('Location: /admin/posts', 0);
    }

    /**
     * edit
     * @return View
     */
    public function edit() : View
    {
        $id = $this->app->getRequest()->get('id');

        $result = Post::find(['id' => $id]);
        
        if(!empty($result)) {
            $result = $result->attributes();
        }

        return $this->app->getView('admin.posts.edit', [
            'result' => $result
        ]);
    }

    /**
     * update
     */
    public function update(): void
    {
        $id = $this->app->getRequest()->get('id');
        $data = $this->app->getRequest()->post();

        $result = Post::find(['id' => $id]);
        $result->update_attributes($data);
        $result->save();

        header('Location: /admin/posts', 0);
    }

    /**
     * delete
     * @return View
     */
    public function delete(): View
    {
        $id = $this->app->getRequest()->get('id');
        $result = Post::find(['id' => $id]);
        
        if(!empty($result)) {
            $result = $result->attributes();
        }

        return $this->app->getView('admin.posts.delete', [
            'result' => $result
        ]);
    }

    /**
     * destroy
     */
    public function destroy(): void
    {
        $id = $this->app->getRequest()->get('id');

        $result = Post::find(['id' => $id]);
        $result->delete();

        header('Location: /admin/posts', 0);
    }
}

```
4. Change where it says ```PostsController``` to your new Controller Name
5. Change where it says ```admin.posts.index``` to your new view name for example ```admin.examples.index```

## 3. Migrations

1. Create a file inside the folder /database/migrations
2. For example 2021_03_03_0000002_create_posts_table.php
3. Copy the template below into the file
4. Update the table creation settings as desired
5. Run this command to create all database table - ```vendor/bin/phinx migrate```
6. Run this command to insert seed data - ```vendor/bin/phinx seed:run```
7. Run this command to remove tables - ```vendor/bin/phinx rollback```

```php
<?php

declare(strict_types=1);

use \SpaceMvc\Framework\Library\Migration;

/**
 * Class CreatePostsTable
 */
final class CreatePostsTable extends Migration
{
    /**
     * up
     */
    public function up(): void
    {
        $table = $this->table('posts');
        $table->addColumn('title', 'string')
            ->addColumn('subject', 'string')
            ->addColumn('description', 'string')
            ->addColumn('body', 'text')
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->create();
    }

    /**
     * down
     */
    public function down(): void
    {
        $this->table('posts')->drop()->save();
    }
}
```

## 4. Database Seeds

1. Create a file inside the folder /database/seeds
2. For example 20210404000001.php (Year-Month-Day Timestamp)
3. Copy the template below into the file
4. Update the table creation settings as desired
5. Run the database seeds to insert test data using ```vendor/bin/phinx seed:run```

```php
<?php

use SpaceMvc\Framework\Library\Seed;

/**
 * Class UserSeeder
 */
class UserSeeder extends Seed
{
    /**
     * run
     */
    public function run(): void
    {
        $this->insert('posts', [
            'title' => 'Post Title',
            'subject' => 'Post Subject',
            'description' => 'Post Description',
            'body' => '<p>This is my text</p>',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
```

## 5. Models

#### How to create a new Model file
1. Create a new file inside /app/Model
2. For example Post.php
3. Copy the following template into the file
```php
<?php

namespace App\Model;

use SpaceMvc\Framework\Mvc\Model;

/**
 * Class Post
 * @package App\Model
 */
class Post extends Model
{
    /** @var string $table */
    protected static string $table = 'posts';

    /** @var array $fillable  */
    protected static array $fillable = [
        'title',
        'subject',
        'description',
        'body',
        'created_at',
        'updated_at'
    ];
}
```
4. Update where it says ```class Post``` to your new Model name
5. Update where it says ```$table = 'posts';'``` to your new database table name
6. Update where it says ```$fillable = []``` to your correct database table field names for your selected table

## 6. Views
 
#### How to create a view
1. Create a new file inside this folder /resources/views/backend/
2. For example /resources/views/backend/posts/index.php
3. Copy in the following template
```html
<h1>Users</h1>

<p>This is the users page</p>
```

## 7. Layouts

#### How to select a layout

1. At the start of your controller add the new ```$layout``` like below
2. Set the value to your new layout name the default is frontend.php
```php
/**
 * Class PostsController
 * @package App\Http\Controllers\Frontend
 */
class PostsController extends BaseController
{
    /** @var string $layout */
    protected string $layout = 'admin';
```
3. Create a new layout file inside ```/resources/layouts/```
4. For example ```/resources/layouts/admin.php```
5. Copy in the following Html 5 template to use as a starting point
```php
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Page Title</title>

  <meta name="description" content="Page Description">
  <meta name="author" content="Page Author">

  <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>

  <?php echo !empty($content) ? $content : null; ?>
  
  <script src="js/scripts.js"></script>
  
</body>
</html>
```
6. The ```$content``` variable will be the actual view response output

## General Information

The ```$this->app``` variable contains access to all library classes below. 

The ```$this->app``` variable is automatically included and accessible in all controllers

## Available Library Classes

## How to use the Cache Class

#### Write to cache
```php
$data = [
  'key 1' => 'value 1',
  'key 2' => 'value 2',
  'key 3' => 'value 3',
];

$this->app->getCache()->set('custom-key', $data);
```

#### Get data from cache
```php
$result = $this->app->getCache()->get('custom-key');
```

#### Delete data from cache
```php
$result = $this->app->getCache()->delete('custom-key');
```

#### Flush the whole cache
```php
$result = $this->app->getCache()->flushDb();
```

## How to use the Config Class

#### Get config files
```php
$configApp   = $this->app->getConfig()->setConfig('app')->get();
$configPaths = $this->app->getConfig()->setConfig('paths')->get();
```

## How to use the Env Class

#### Get env properties
```php
$envDbHostname = $this->app->getEnv()->get('DB_HOSTNAME', '127.0.0.1');
```

## How to use the Log Class

#### Write a message to a log file
```php
$this->app->getLog()->write('custom error message', 'app.log');
```

## How to use the Path class

#### Get all paths from config
```php
$results = $this->app->getPath()->get()
```
```php
[
    'configs' => '/var/www/space-mvc/config',
    'layouts' => '/var/www/space-mvc/resources/layouts',
    'logs'    => '/var/www/space-mvc/storage/logs',
    'models'  => '/var/www/space-mvc/app/Model',
    'public'  => '/var/www/space-mvc/public',
    'routes'  => '/var/www/space-mvc/routes',
    'views'   => /var/www/space-mvc/resources/views'
]
```

#### Get selected path from config
```php
$results = $this->app->getPath()->get()['public']
```
```php
/var/www/space-mvc/public
```

## How to use the Request Class

#### Get the current request uri
```php
$uri = $this->app->getRequest()->getUri();
```

```php
/books/action
```

#### Get the current request method

```php
$method = $this->app->getRequest()->getMethod();
```

```php
GET
```
#### Get the current request $_GET data

```php
$get = $this->app->getRequest()->get();
```
```php
[
  'field_1' => 'value_1',
  'field_2' => 'value_2',
  'field_3' => 'value_3',
]
```

#### Get the current request $_POST data

```php
$post = $this->app->getRequest()->post();
```
```php
[
  'field_1' => 'value_1',
  'field_2' => 'value_2',
  'field_3' => 'value_3',
]
```
## How to use the Router Class

#### Get the full list of available routes

```php
$routes = $this->app->getRoute()->getRoutes();
```

```php
[
    [
        'name' => 'frontend.home',
        'uri' => '/',
        'controller' => \App\Http\Controllers\Frontend\IndexController::class,
        'action' => 'index',
    ],
    [
        'name' => 'frontend.examples.assets',
        'uri' => '/examples/assets',
        'controller' => \App\Http\Controllers\Frontend\ExamplesController::class,
        'action' => 'assets',
    ],
    [
        'name' => 'frontend.examples.cache',
        'uri' => '/examples/cache',
        'controller' => \App\Http\Controllers\Frontend\ExamplesController::class,
        'action' => 'cache',
    ],
]
```

#### retrieve the current selected route

```php
$route = $this->app->getRoute()->getRoute();
```

```php
[
    'name' => 'frontend.home',
    'uri' => '/',
    'controller' => \App\Http\Controllers\Frontend\IndexController::class,
    'action' => 'index',
]
```

## How to use the Session Class

#### Write to session key
```php
$this->app->getSession()->set('key1', 'value1');
```

#### Retrieve a session key
```php
$result = $this->app->getSession()->get('key1');
```