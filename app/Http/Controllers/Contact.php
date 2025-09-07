<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use LightPHPF\Core\Http\Controllers\BaseController;

final class Contact extends BaseController
{
    /**
     * contact page
     * @return void
     */
    public function index(): void
    {
        $template = $this->twig->load('pages/contact.twig');

        echo $template->render([
            'app_url' => $this->app_url,
            'app_name' => $this->app_name,
            'title' => 'Contact Us'
        ]);
    }
}
