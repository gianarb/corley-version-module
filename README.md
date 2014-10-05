Manage version bump in your [Zend Framework](https://github.com/zendframework/zf2) Application

## Console Command
```bash
php index.php version-show
```
Return current version

```bash
php index.php version-bump 0.0.1
```
Bump version 0.0.1
* Write or edit VERSION file
* Add version node in your global.php configuration file

## Configuration
```php
<?php
return array(
    'corley-version' => array(
        'version-file-path' => ".",
        'config-path' => "./config/autoload/global.php",
    )
);
```

```version-file-path``` is path of VERSION file

Write 'version' node into ```config-path```
