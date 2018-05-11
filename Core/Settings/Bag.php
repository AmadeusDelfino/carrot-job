<?php

namespace CarrotCore\Settings;

use CarrotCore\Factories\Bus;
use Illuminate\Config\Repository;
use Symfony\Component\Finder\Finder;

class Bag extends Repository
{
    protected $configPath;

    public function __construct(array $items = [])
    {
        parent::__construct($items);
        $paths = Bus::make('path');
        $this->loadConfigurationFiles($paths->configs);
    }

    /**
     * Load the configuration items from all of the files.
     *
     * @param string $path
     * @param string|null $environment
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

    /**
     * Get the configuration files for the selected environment
     *
     * @param string|null $environment
     *
     * @return array
     */
    protected function getConfigurationFiles($environment = null)
    {
        $path = $this->configPath;

        if ($environment) {
            $path .= '/' . $environment;
        }

        if (!is_dir($path)) {
            return [];
        }

        $files = [];
        $phpFiles = Finder::create()->files()->name('*.php')->in($path)->depth(0);

        foreach ($phpFiles as $file) {
            $files[basename($file->getRealPath(), '.php')] = $file->getRealPath();
        }

        return $files;
    }
}