<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use LightPHPF\Core\Http\Controllers\BaseController;

final class Home extends BaseController
{
    /**
     * home page
     * @return void
     */
    public function index(): void
    {
        $template = $this->twig->load('index.twig');

        echo $template->render([
            'app_url' => $this->app_url,
            'app_name' => $this->app_name,
            'title' => 'Home Page',
        ]);
    }
}
