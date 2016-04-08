<?php
namespace faryshta\excercise;

use Pdo;

class Connection
{
    public function createPDO(
        string $database,
        string $user,
        string $password
    ): Pdo {
        return new Pdo(
            'mysql:host=127.0.0.1;dbname=' . $database,
            $user,
                $password
        );
    }
}
