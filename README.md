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

## View Helper
You can use ```$this->version()``` to append the version number in your static resources
```php
<html>
    ...    
    <?php echo $this->headScript()
        ->prependFile($this->basePath() . "/js/script.js?v={$this->vesion()}")
        ->prependFile($this->basePath() . '/js/bootstrap.min.js')
        ->prependFile($this->basePath() . '/js/jquery.min.js')
    ; ?>
    ...
</html>
```

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
