# space-mvc (A Lightweight PHP 8 MVC Framework)

## Space MVC - Install instructions
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

## Library Classes

| Class  | Description |
| -------| ----------- |
| [Asset](#how-to-use-the-assets-class) | This class can be used to store and retrieve HTML include attributes for css and javascript  |
| [Cache](#how-to-use-the-cache-class)  | This class can be used to store and retrieve data to and from the cache  |
| [Config](#how-to-use-the-config-class) | This class can be used to get the config files from the /configs folder into an data array|


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
$configPaths = $this->app->getConfig()->setxConfig('paths')->get();
```

## How to use the Env Class

#### Get env properties
```php
$envDbHostname = $this->app->getEnv()->get('DB_HOSTNAME', '127.0.0.1');
```

## How to use the Exception Class

#### Display html exception message
```php
$this->app->getException()->throw("page not found", 404);
```

#### Display json exception message
```php
$this->app->getException()->throwJson("page not found", 404);
```

## How to use the Log Class

#### Write a message to a log file
```php
$this->app->getLog()->write("custom error message", 'app.log');
```