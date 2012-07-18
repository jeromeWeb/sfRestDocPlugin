<?php

class sfRestDocPluginConfiguration extends sfPluginConfiguration
{
    
    public function configure()
    {
        // configuration file rest.yml
        if ($this->configuration instanceof sfApplicationConfiguration)
        {
//            require_once ($this->configuration->getConfigCache()->checkConfig('config/rest.yml'));
        }
    }
}