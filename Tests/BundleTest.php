<?php

namespace Rdrenth\TvrageBundle\Tests\DependencyInjection;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * BundleTest
 *
 * @author   Ronald Drenth <ronalddrenth@gmail.com>
 * @license  http://opensource.org/licenses/MIT The MIT License (MIT)
 * @link     https://github.com/rdrenth/tvrage-bundle
 */
class BundleTest extends WebTestCase
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->client = static::createClient();
        $this->container = $this->client->getContainer();
    }

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        unset($this->client);
        unset($this->container);
    }

    /**
     * Test registered services in the DiC
     */
    public function testDependencyInjectionServices()
    {
        $this->assertInstanceOf('Adrenth\\Tvrage\\ClientInterface', $this->container->get('rdrenth_tvrage.client'));
        $this->assertInstanceOf('Doctrine\\Common\\Cache\\Cache', $this->container->get('rdrenth_tvrage.client_cache'));
    }
}