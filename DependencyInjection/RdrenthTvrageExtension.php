<?php

namespace Rdrenth\TvrageBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * RdrenthTvrageExtension
 *
 * @author   Ronald Drenth <ronalddrenth@gmail.com>
 * @license  http://opensource.org/licenses/MIT The MIT License (MIT)
 * @link     https://github.com/rdrenth/tvrage-bundle
 */
class RdrenthTvrageExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $configuration = $this->getConfiguration($config, $container);
        $config = $this->processConfiguration($configuration, $config);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $definition = $container->findDefinition('rdrenth_tvrage.client');
        $definition->replaceArgument(0, new Reference($config['cache']));
        $container->setAlias('rdrenth_tvrage.client_cache', $config['cache']);
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'rdrenth_tvrage';
    }
}