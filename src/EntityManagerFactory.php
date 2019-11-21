<?php

namespace InterTree;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver;
use Doctrine\Common\Persistence\Mapping\Driver\MappingDriver;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;

class EntityManagerFactory
{
    /**
     * Create instance of entity manager.
     * @return EntityManager
     * @throws ORMException on mapping fail
     */
    public function getEntityManager(): EntityManager
    {
        $driver = $this->getDriver();
        $config = $this->getConfiguration($driver);

        return EntityManager::create(require_once __DIR__ . '/../config/database.php', $config);
    }

    /**
     * Create instance of configuration.
     * @param MappingDriver $driver instance of driver
     * @return Configuration
     */
    protected function getConfiguration(MappingDriver $driver): Configuration
    {
        $config = new Configuration();
        $config->setMetadataDriverImpl($driver);
        $config->setProxyDir(__DIR__ . '/../.lib/proxies');
        $config->setProxyNamespace('InterTree\Proxies');

        return $config;
    }

    /**
     * Create instance of driver.
     * @return MappingDriver
     */
    protected function getDriver(): MappingDriver
    {
        return new SimplifiedXmlDriver([
            __DIR__ . '/../config/doctrine/entities' => 'InterTree\Entities',
        ]);
    }
}