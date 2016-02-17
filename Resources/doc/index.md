# Artscore Studio Backend Bundle

Backend Bundle is a Symfony 2+ bundle for create and manage backends in your Symfony 2+ application. This package is a part of Artscore Studio Framework.

> IMPORTANT NOTICE: This bundle is still under development. Any changes will be done without prior notice to consumers of this package. Of course this code will become stable at a certain point, but for now, use at your own risk.

> BE CARREFUL : This bundle does not include external libraries, you must install the libraries via Compoer, in accordance with best practices of Symfony documentation.
 
## Prerequisites

This version of the bundle requires :
* Symfony 2.0+
* Assetic bundle 2.7+ (suggest [symfony/assetic-bundle](https://packagist.org/packages/symfony/assetic-bundle))
* [ASFCoreBundle >= 1](https://github.com/artscorestudio/core-bundle)
* [ASFLayoutBundle >= 1](https://github.com/artscorestudio/layout-bundle)

### Translations

If you wish to use default texts provided in this bundle, you have to make sure you have translator enabled in your config.

```yaml
# app/config/config.yml
framework:
    translator: ~
```

For more information about translations, check [Symfony documentation](https://symfony.com/doc/current/book/translation.html).

## Installation

### Step 1 : Download ASFBackendBundle using composer

Require the bundle with composer :

```bash
$ composer require artscorestudio/backend-bundle "dev-master"
```

Composer will install the bundle to your project's *vendor/artscorestudio/backend-bundle* directory. It also install dependencies. 

### Step 2 : Enable the bundle

Enable the bundle in the kernel :

```php
// app/AppKernel.php

public function registerBundles()
{
	$bundles = array(
		// ...
		new ASF\BackendBundle\ASFBackendBundle()
		// ...
	);
}
```

### Next Steps

Now you have completed the basic installation and configuration of the ASFBackendBundle, you are ready to learn about more advanced features and usages of the bundle.

The following documents are available :
* [ASFBackendBundle Configuration Reference](configuration.md)