<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new JMS\TranslationBundle\JMSTranslationBundle(),
            new Ydle\HubBundle\YdleHubBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Ydle\RoomBundle\YdleRoomBundle(), 
            new Ydle\APIBundle\YdleAPIBundle(),
            new Ydle\LogsBundle\YdleLogsBundle(),
            new Ydle\NodesBundle\YdleNodesBundle(),
            new Ydle\UserBundle\YdleUserBundle(),
            new FOS\RestBundle\FOSRestBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),
            new Sonata\DatagridBundle\SonataDatagridBundle(),
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Ydle\SettingsBundle\YdleSettingsBundle(),
            new Ydle\CoreBundle\YdleCoreBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
