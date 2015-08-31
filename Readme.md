# SRF EzLegacyDebugBundle

## Description
Symfony bundle `SRFEzLegacyDebugBundle` show EzLegacy debug informations in the Web-Profiler


## Installation

**Get the Bundle**

Choose your version from [packagist.org](https://packagist.org/packages/mmz-srf/ez-legacy-debug-bundle) and add a requirement to your ```composer.json```:

Using the console:

```bash
php composer.phar require mmz-srf/ez-legacy-debug-bundle
```

Composer will add the dependency to your configuration.

**Register the Bundle**

Add the bundle in your ```app/AppKernel.php``` like this:

```php
public function registerBundles()
{
    $bundles = array(
        // ...
        new SRF\Bundles\EzLegacyDebugBundle\SRFEzLegacyDebugBundle(),
```

**Update your dependencies**

Run ```php composer.phar update mmz-srf/ez-legacy-debug-bundle```

## Configuration
Add the configuration to your ```app/config/site.ini```:

```ini
[DebugSettings]
Debug=only_in_symfony
```

**Clear the caches**

Run ```php app/console cache:clear```


## License
The Bundle is licensed under MIT. For details, see
[LICENSE](https://github.com/mmz-srf/SRFEzLegacyDebugBundle/blob/master/Resources/meta/LICENSE).

Maintained by [@mms-uret](https://github.com/mms-uret) and [@hasankryeziuSRF](https://github.com/hasankryeziuSRF).