<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use LightPHPF\Core\Http\Controllers\BaseController;

final class Reset extends BaseController
{
    /**
     * reset password page
     * @return void
     */
    public function index(): void
    {
        $template = $this->twig->load('auth/forget-password.twig');

        echo $template->render([
            'app_url' => $this->appUrl,
            'app_name' => $this->appName,
            'title' => 'Forget Password'
        ]);
    }
}
