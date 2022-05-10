Setting module for Yii2
====================
Setting module for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run
```shell
php composer.phar require --prefer-dist it-yakutia/yii2-setting "*"
```
or add
```json lines
"it-yakutia/yii2-setting": "*"
```
to the require section of your `composer.json` file.

Add Module in backend config `main.php`:
```php
return [
    ...
    'modules' => [
        ...
        'setting' => \ityakutia\setting\Module::class,
        ...
    ],
    ...
];
```

In console config `main.php` add `migrationPath` value in `controllerMap` `migration` section:

```php
return [
    ...
    'controllerMap' => [
        ...
	    'migrate' => [
		    'class' => \yii\console\controllers\MigrateController::class,
		    'migrationPath' => [
				'@console/migrations',
				...
			    '@ityakutia/setting/migrations',
			    ...
		    ],
	    ],
    ],
```

And just run the command:
```shell
php yii migrate
```

Add urls in your backend project:

```php
Url::toRoute('/setting/back/index');
```

Check permission `settings` that it are added to your RBAC role

Usage
-----

Use in front:

```php
<span><a href="<?= Setting::valueOf('social_link_vk'); ?>"><i class="fab fa-vk"></i></a></span>
```
or
```php
<?= Setting::valueOf('social_link_vk', '<span><a href="[[value]]"><i class="fab fa-vk"></i></a></span>'); ?>
```