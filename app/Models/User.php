<?php

declare(strict_types=1);

namespace App\Models;

use LightPHPF\Core\Application\DatabaseConnection;

final class User
{
    private DatabaseConnection $db;

    public function __construct(array $conf)
    {
        $this->db = new DatabaseConnection($conf);
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        $this->db->query("SELECT * FROM users");
        $result = $this->db->resultSet();

        return $result;
    }
}
