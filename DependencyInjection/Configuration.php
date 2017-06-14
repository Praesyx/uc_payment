<?php

namespace Uc\PaymentBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('uc_payment');

        $rootNode
            ->children()
                ->arrayNode('stripe')
                    ->children()
                        ->scalarNode('app_id')->cannotBeEmpty()->isRequired()->info('Your Stripe ID key')->end()
                        ->scalarNode('app_secret')->cannotBeEmpty()->isRequired()->info('Your Stripe secret API key')->end()
                        ->scalarNode('public_key')->cannotBeEmpty()->isRequired()->info('Your Stripe public key')->end()
                    ->end()
                ->end() // stripe
                ->arrayNode('paypal')
                    ->children()
                        ->scalarNode('client_id')->cannotBeEmpty()->isRequired()->info('Your PayPal client ID key')->end()
                        ->scalarNode('secret')->cannotBeEmpty()->isRequired()->info('Your secret PayPal API key')->end()
                    ->end()
                ->end() // stripe
            ->end();

        return $treeBuilder;
    }
}
