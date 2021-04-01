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
| 4. [Models](#4-models)  | The Model files can be used to select, insert, create, update and delete database data  |
| 5. [Views](#5-views) | This View files can be used to output html to the end user |
| 6. [Layouts](#6-layouts) | The Layout files can be used to be a parent layout of the view |

## Available Library Classes

| Class  | Description |
| -------| ----------- |
| [Asset](#how-to-use-the-assets-class) | This class can be used to store and retrieve HTML include attributes for css and javascript  |
| [Cache](#how-to-use-the-cache-class)  | This class can be used to store and retrieve data to and from the cache  |
| [Config](#how-to-use-the-config-class) | This class can be used to get the config files from the /config folder into an data array|
| [Env](#how-to-use-the-env-class) | This class can be used to retrieve environment config data from the /.env file |
| [Exception](#how-to-use-the-exception-class) | This class can be used to display exception messages to the user in html or json format |
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
2. For example UsersController.php
3. Add the following template
```php
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use SpaceMvc\Framework\Mvc\View;

/**
 * Class UsersController
 * @package App\Http\Controllers\Frontend
 */
class UsersController extends BaseController
{
    /**
     * index
     * @return View
     */
    public function index() : View
    {
        return $this->app->getView('frontend.users.index', []);
    }
}
```
4. Change where it says ```UsersController``` to your new Controller Name
5. Change where it says ```frontend.users.index``` to your new view name for example ```frontend.examples.index```

## 3. Migrations

1. Create a file inside the folder /database/migrations
2. For example 2021_03_03_0000002_create_posts_table.php
3. Copy the template below into the file
4. Update the table creation settings as desired

```php
<?php

declare(strict_types=1);

use \SpaceMvc\Framework\Library\Migration;

/**
 * Class CreateUsersTable
 */
final class CreateUsersTable extends Migration
{
    /**
     * up
     */
    public function up(): void
    {
        $table = $this->table('users');
        $table->addColumn('first_name', 'string')
            ->addColumn('last_name', 'string')
            ->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addColumn('gender', 'string')
            ->addColumn('date_of_birth', 'string')
            ->create();
    }

    /**
     * down
     */
    public function down(): void
    {
        $this->table('users')->drop()->save();
    }
}
```

## 4. Models

#### How to create a new Model file
1. Create a new file inside /app/Model
2. For example User.php
3. Copy the following template into the file
```php
<?php

namespace App\Model;

use SpaceMvc\Framework\Mvc\Model;

/**
 * Class User
 * @package App\Model
 */
class User extends Model
{
    /** @var string $table */
    protected static string $table = 'users';

    /** @var array $fillable  */
    protected static array $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'created_at',
        'updated_at'
    ];
}
```
4. Update where it says ```class User``` to your new Model name
5. Update where it says ```$table = 'users';'``` to your new database table name
6. Update where it says ```$fillable = []``` to your correct database table field names for your selected table

## 5. Views
 
#### How to create a view
1. Create a new file inside this folder /resources/views/backend/
2. For example /resources/views/backend/users/index.php
3. Copy in the following template
```html
<h1>Users</h1>

<p>This is the users page</p>
```

## 6. Layouts

#### How to select a layout

1. At the start of your controller add the new ```$layout``` like below
2. Set the value to your new layout name the default is frontend.php
```php
/**
 * Class UsersController
 * @package App\Http\Controllers\Frontend
 */
class UsersController extends BaseController
{
    /** @var string $layout */
    protected string $layout = 'backend';
```
3. Create a new layout file inside ```/resources/layouts/```
4. For example ```/resources/layouts/backend.php```
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

## How to use the Assets Class
#### Add HTML Asset
```php
$this->app->getAsset()->add('css', '/assets/css/sample.css');
$this->app->getAsset()->add('js', '/assets/js/sample.js');
```

#### List HTML Assets
```php
$assets = $this->app->getAsset()->get();
```

```json
{
  "css" : [
    {
      "url":"/assets/css/sample.css",
      "attributes":[]
    }
  ],
  "js" : [
    {
      "url":"/assets/js/sample.js",
      "attributes":[]
    }
  ]
}
```

#### List HTML Assets - Select Single Type
```php
$assets = $this->app->getAsset()->get('css');
```

```json
[
  {
    "url":"/assets/css/sample.css",
    "attributes":[]
  }
]
```

#### Render HTML Assets
##### CSS
```php
echo $this->app->getAsset()->render('css');
```
```html
<link type="text/css" rel="stylesheet" src="/example.com/assets/css/sample.css">
```

##### Javascript
```php
echo $this->app->getAsset()->render('js');
```
```html
<script type="text/javascript" src="/example.com/assets/js/sample.js">
```

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

## How to use the Exception Class

#### Display html exception message
```php
$this->app->getException()->throw("There was a problem creating a new user", 501);
```

#### Display json exception message
```php
$this->app->getException()->throwJson("There was a problem creating a new user", 501);
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