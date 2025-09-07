<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
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

        dump($this->model(User::class)->getUsers());
        dump($this->model(User::class)->getUserById(1));

        echo $template->render([
            'app_url' => $this->appUrl,
            'app_name' => $this->appName,
            'title' => 'Home Page',
        ]);
    }
}
