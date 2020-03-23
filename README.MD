Setting module for Yii2
====================
Setting module for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist it-yakutia/yii2-setting "*"
```

or add

```
"it-yakutia/yii2-setting": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply add in your console config:

```php
'controllerMap' => [
    /* ... */
    'migrate' => [
            // 'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                // '@console/migrations', // yii migrate/create app_init
                // '@yii/rbac/migrations',
                /* ... */
                '@vendor/it-yakutia/yii2-setting/src/migrations'
            ],
    ],
],
```

And just run the command:
```
php yii migrate
```

Add urls in your backend project:

```php
Url::toRoute('/setting/back/index');
```

Add RBAC roles:

```
setting
```
