<?php

declare(strict_types=1);

namespace App\Models;

use LightPHPF\Core\Application\DatabaseConnection;

final class User
{
    private DatabaseConnection $db;

    public function __construct(array $conf)
    {
        $this->db = DatabaseConnection::getInstance($conf);
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        $this->db->query("SELECT * FROM users");
        $this->db->execute();

        return $this->db->resultSet();
    }

    /**
     * @param  int|string $id
     * @return \stdClass
     */
    public function getUserById(int|string $id): \stdClass
    {
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();

        return $this->db->single();
    }
}
