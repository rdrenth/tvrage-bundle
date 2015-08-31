RdrenthTvrageBundle
=============

[![Build Status](https://travis-ci.org/rdrenth/tvrage-bundle.svg?branch=master)](http://travis-ci.org/rdrenth/tvrage-bundle) [![Latest Stable Version](https://poser.pugx.org/rdrenth/tvrage-bundle/v/stable)](https://packagist.org/packages/rdrenth/tvrage-bundle) [![Total Downloads](https://poser.pugx.org/rdrenth/tvrage-bundle/downloads)](https://packagist.org/packages/rdrenth/tvrage-bundle) [![Latest Unstable Version](https://poser.pugx.org/adrenth/tvrage/v/unstable)](https://packagist.org/packages/adrenth/tvrage) [![License](https://poser.pugx.org/rdrenth/tvrage-bundle/license)](https://packagist.org/packages/rdrenth/tvrage-bundle)

## About
This is a Symfony2 Bundle for the [adrenth/tvrage](https://github.com/adrenth/tvrage) package. For more info visit [https://github.com/adrenth/tvrage](https://github.com/adrenth/tvrage).

## Installation
### Step 1: Install RdrenthTvrageBundle using [Composer](http://getcomposer.org/) 

```bash
$ composer require rdrenth/rvrage-bundle
```

### Step 2: Enable the bundle

```php
<?php

// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new Rdrenth\TvrageBundle\RdrenthTvrageBundle(),
        // ...
    );
}
```

### Step 3: Configure your `config.yml` file
The [adrenth/tvrage](https://github.com/adrenth/tvrage) package requires a Doctrine `Cache` instance. For more info on how to configure Doctrine Cache visit [https://github.com/doctrine/DoctrineCacheBundle](https://github.com/doctrine/DoctrineCacheBundle).

```yaml
# app/config/config.yml
doctrine_cache:
    providers:
        array_cache:
            type: array
            
rdrenth_tvrage:
    cache: array_cache			# service id for doctrine cache
```
## Usage
Once you've configured the bundle you are able to fetch the client from Symfony's Container, for example in a Controller:

```php
<?php

// src/AppBundle/Controller/DefaultController.php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function searchAction(Request $request)
    {
        $tvrageClient = $this->get('rdrenth_tvrage.client');
        $shows = array();
        
        try {
            $response = $tvrageClient->search($request->get('query', 'Breaking Bad'));
            $shows = $response->getShows();
        } catch (\Exception $e) {
        
        }
        
        return $this->render('default/search.html.twig', array('shows' => $shows));
    }
}
```

## License

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE