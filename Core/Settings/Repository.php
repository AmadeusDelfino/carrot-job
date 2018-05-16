<?php

namespace CarrotCore\Settings;

use Illuminate\Config\Repository as ConfigBaseRepository;
use Symfony\Component\Finder\Finder;

class Repository extends ConfigBaseRepository
{
    protected $configPath;

    /**
     * Bag constructor.
     *
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        parent::__construct($items);
        $this->loadConfigurationFiles(__DIR__.'/../../configs');
    }

    /**
     * Get the configuration files for the selected environment.
     *
     * @param null|string $environment
     *
     * @return array
     */
    protected function getConfigurationFiles($environment = null)
    {
        $path = $this->configPath;

        if ($environment) {
            $path .= '/'.$environment;
        }

        if (! is_dir($path)) {
            return [];
        }

        $files = [];
        $phpFiles = Finder::create()->files()->name('*.php')->in($path)->depth(0);

        foreach ($phpFiles as $file) {
            $files[basename($file->getRealPath(), '.php')] = $file->getRealPath();
        }

        return $files;
    }

    /**
     * Load the configuration items from all of the files.
     *
     * @param string      $path
     * @param null|string $environment
     */
    private function loadConfigurationFiles($path, $environment = null)
    {
        $this->configPath = $path;

        foreach ($this->getConfigurationFiles() as $fileKey => $path) {
            $this->set($fileKey, require $path);
        }

        foreach ($this->getConfigurationFiles($environment) as $fileKey => $path) {
            $envConfig = require $path;

            foreach ($envConfig as $envKey => $value) {
                $this->set($fileKey.'.'.$envKey, $value);
            }
        }
    }
}
