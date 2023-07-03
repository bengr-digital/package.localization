<?php

namespace Bengr\Localization\Localizables;

use Illuminate\Filesystem\Filesystem;

abstract class Localizable
{
    protected string $path;

    protected string $directory_name;

    protected string $file_name;

    protected string $locale;

    protected array $cache = [];

    public function __construct($path, $locale)
    {
        $this->path = $path;
        $this->locale = str_replace('-', '_', $locale);

        if (!app(Filesystem::class)->exists($path)) {
            throw new \RuntimeException(sprintf('Unable to locate the country data directory at "%s"', $path));
        }
    }

    protected function load()
    {

        if (!isset($this->cache[$this->locale])) {
            $file = $this->path . '/' . $this->directory_name . '/' . $this->locale . '/' . $this->file_name . '.php';

            if (!app(Filesystem::class)->exists($file)) {
                throw new \RuntimeException(sprintf('Unable to load the %s data file "%s"', $this->file_name, $file));
            }

            $this->cache[$this->locale] = require $file;
        }

        return $this->sort($this->cache[$this->locale]);
    }

    protected function sort($data)
    {
        return array_change_key_case($data, CASE_UPPER);;
    }

    public function has($code)
    {
        return array_key_exists(strtoupper($code), $this->load());
    }

    public function get($code)
    {

        if (array_key_exists(strtoupper($code), $this->load())) {
            return $this->load()[strtoupper($code)];
        }
    }

    public function all()
    {
        return $this->load();
    }
}
