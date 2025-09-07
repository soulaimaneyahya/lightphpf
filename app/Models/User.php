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
        $stmt = $this->db->getPdo()->query("SELECT * FROM users");

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param  int|string $id
     * @return array
     */
    public function getUserById(int|string $id): array
    {
        $stmt = $this->db->getPdo()->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([
            'id' => $id,
        ]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
