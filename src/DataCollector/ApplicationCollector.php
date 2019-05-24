<?php

/**
 * Application widget to show application and phalcon version and environment
 *
 * @copyright   Copyright (c) E-Borealis
 * @created	2017-08-18 pedro.camacho
 * @version	$Id: ApplicationCollector.php 0.1.0 2017-08-18 pedro.camacho $
 */

namespace Snowair\Debugbar\DataCollector;

use DebugBar\DataCollector\DataCollector;
use DebugBar\DataCollector\Renderable;

class ApplicationCollector extends DataCollector implements Renderable
{
    /**
     * {@inheritdoc}
     */
    public function collect()
    {
        return array(
            "phversion"     => \Phalcon\Version::get(),
            "version"       => APP_VERSION,
            "environment"   => APPLICATION_ENV." (".gethostname().")"
        );
        
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function getWidgets()
    {
        return array(
            "version" => [
                "icon" => "bitbucket",
                "tooltip" => "Application Version",
                "map" => "application.version",
                "default" => ""
            ],
            "phversion" => [
                "icon" => "github",
                "tooltip" => "Phalcon Version",
                "map" => "application.phversion",
                "default" => ""
            ],
            "environment" => [
                "icon" => "desktop",
                "tooltip" => "Environment",
                "map" => "application.environment",
                "default" => ""
            ]
        );
    }
}