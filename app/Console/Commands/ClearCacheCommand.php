<?php

declare(strict_types=1);

namespace App\Console\Commands;

/**
 * @details clear cached files, subdirectories views
 */
final class ClearCacheCommand
{
    private $cacheDir;

    public function __construct()
    {
        // Get the location of the cache directory
        $this->cacheDir = dirname(dirname(__FILE__)) . '/Bootstrap/Cache';
    }

    /**
     * Execute CLI
     *
     * @return void
     * @throws \Throwable
     */
    public function handle(): void
    {
        try {
            exec('sudo chown -R $(whoami) .');

            $this->clearCache($this->cacheDir);
            $this->createGitFile($this->cacheDir);

            dump("✅ Cache Cleared Successfully\n");
        } catch (\Throwable $th) {
            dump('❌ Something went wrong...');
        }
    }

    /**
     * Delete the contents of the cache directory
     *
     * @param  string $cacheDir
     * @return void
     */
    protected function clearCache(string $cacheDir): void
    {
        foreach (glob($cacheDir . '/*') as $file) {
            if (is_dir($file)) {
                $this->clearCache($file);
                rmdir($file);
            } else {
                unlink($file);
            }
        }
    }

    /**
     * create .gitignore file
     *
     * @param  string $cacheDir
     * @return void
     */
    protected function createGitFile(string $cacheDir): void
    {
        $txt = "*\n!.gitignore";
        file_put_contents("{$cacheDir}/.gitignore", $txt);
    }
}
