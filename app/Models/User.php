<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\DatabaseConnection;

final class User
{
    private $db;

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
