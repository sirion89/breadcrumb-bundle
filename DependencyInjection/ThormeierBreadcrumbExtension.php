<?php

namespace Thormeier\BreadcrumbBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * @codeCoverageIgnore
 */
class ThormeierBreadcrumbExtension extends Extension {
    /**
     * {@inheritDoc}
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container): void {
        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('thormeier_breadcrumb.template', $config['template']);
        $container->setParameter('thormeier_breadcrumb.class.model', $config['model_class']);
        $container->setParameter('thormeier_breadcrumb.class.collection', $config['collection_class']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        $container->setAlias('thormeier_breadcrumb.breadcrumb_provider', $config['provider_service_id']);
    }
}
