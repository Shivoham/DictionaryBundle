<?php

namespace Knp\DictionaryBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Knp\DictionaryBundle\DependencyInjection\Compiler\DictionaryBuildingPass;

class KnpDictionaryExtension extends Extension
{
    public function load(array $config, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('dictionary.yml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $config);
        $container->setParameter('knp_dictionary.configuration', $config);
    }
}
