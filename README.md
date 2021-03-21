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

## How to use the Assets Class

### Add HTML Asset
```php
$this->app->getAsset()->add('css', '/example.com/assets/css/sample.css');
$this->app->getAsset()->add('js', '/example.com/assets/js/sample.js');
$this->app->getAsset()->add('less', '/example.com/assets/less/sample.less');
```

### List HTML Assets
```php
$assets = $this->app->getAsset()->get();
```

```json
{
  "css" : [
    {
      "url":"/example.com/assets/css/sample.css",
      "attributes":[]
    }
  ],
  "js" : [
    {
      "url":"/example.com/assets/js/sample.js",
      "attributes":[]
    }
  ],
  "less" : [
    {
      "url":"/example.com/assets/less/sample.less",
      "attributes":[]
    }
  ]
}
```


### Render HTML Assets
```php
echo $this->app->getAsset()->render();
```

## How to use the Cache Class

### Write to cache
```php
$data = [
  'key 1' => 'value 1',
  'key 2' => 'value 2',
  'key 3' => 'value 3',
];

$this->app->getCache()->set('custom-key', $data);
```

### Get data from cache
```php
$result = $this->app->getCache()->get('custom-key');
```

### Delete data from cache
```php
$result = $this->app->getCache()->delete('custom-key');
```

### Flush the whole cache
```php
$result = $this->app->getCache()->flushDb();
```