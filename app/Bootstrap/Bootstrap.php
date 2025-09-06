<?php

declare(strict_types=1);

namespace App\Bootstrap;

use Twig\Environment;
use App\Core\Application;
use App\Http\Controllers\BaseController;

/**
 * @details Bootstraps the application: initializes core app and base controller.
 */
final class Bootstrap
{
    public Application $application;
    public BaseController $baseController;

    public function __construct(array $config, Environment $twig)
    {
        $this->application = new Application($config, $twig);
        $this->baseController = new BaseController($config, $twig);
    }

    /**
     * @return \App\Core\Application
     */
    public function getApplication(): Application
    {
        return $this->application;
    }

    /**
     * @return \App\Http\Controllers\BaseController
     */
    public function getBaseController(): BaseController
    {
        return $this->baseController;
    }
}
