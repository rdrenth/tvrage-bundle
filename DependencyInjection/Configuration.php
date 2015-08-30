<?php

namespace Rdrenth\TvrageBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * RdrenthTvrageBundle configuration structure
 *
 * @author   Ronald Drenth <ronalddrenth@gmail.com>
 * @license  http://opensource.org/licenses/MIT The MIT License (MIT)
 * @link     https://github.com/rdrenth/tvrage-bundle
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('rdrenth_tvrage');

        $rootNode
            ->children()
                ->scalarNode('cache')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
            ->end();

        return $treeBuilder;
    }
}