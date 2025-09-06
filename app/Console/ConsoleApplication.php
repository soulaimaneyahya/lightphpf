<?php

declare(strict_types=1);

namespace App\Console;

/**
 * @details Register and run console commands
 */
final class ConsoleApplication
{
    /**
     * @var array<string, string>
     */
    protected array $commands = [];

    public function __construct()
    {
        $this->registerCommands();
    }

    public function registerCommands(): void
    {
        $this->commands = [
            'clear:cache' => \App\Console\Commands\ClearCacheCommand::class,
        ];
    }

    public function run(): void
    {
        global $argv;

        $commandName = $argv[1] ?? null;

        if (!$commandName || !isset($this->commands[$commandName])) {
            $this->listCommands();
            exit(1);
        }

        $command = new $this->commands[$commandName]();
        $command->handle();
    }

    public function listCommands(): void
    {
        $commands = array_keys($this->commands);
        sort($commands);

        printf("+----------------------------+\n");
        printf("| %-25s |\n", "Available Commands:");
        printf("+----------------------------+\n");

        foreach ($commands as $cmd) {
            printf("| %-25s |\n", $cmd);
        }

        printf("+----------------------------+\n");
    }
}
