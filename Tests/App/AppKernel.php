<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

/**
 * AppKernel
 *
 * @author   Ronald Drenth <ronalddrenth@gmail.com>
 * @license  http://opensource.org/licenses/MIT The MIT License (MIT)
 * @link     https://github.com/rdrenth/tvrage-bundle
 */
class AppKernel extends Kernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles()
    {
        return array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle(),
            new Rdrenth\TvrageBundle\RdrenthTvrageBundle(),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config.yml');
    }
}