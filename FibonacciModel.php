<?php
namespace faryshta\excercise;

use Pdo;

class FibonacciModel
{
    private $db;
    public function __construct(Pdo $db)
    {
        $this->db = $db;
    }

    public function getBiggest(): int
    {
        $statement = $this->db
            ->prepare('select max(number) from fibonacci');
        $statement->execute();

        return $statement->fetchColumn();
    }

    public function getSecondBiggest(): int
    {
        $statement = $this->db
            ->prepare('select max(number) from fibonacci where number < (select max(number) from fibonacci)');
        $statement->execute();

        return $statement->fetchColumn();
    }

    public function save(int $number): bool
    {
        return $this->db
            ->prepare('insert into fibonacci (number) values (:number)')
            ->execute([':number' => $number]) ;
    }

    public function sumEven(int $limit): int
    {
        $statement = $this->db->prepare(
            'select sum(number) as suma from fibonacci where number %2 = 0 and number < :limit'
        );
        $statement->execute([':limit' => $limit]);
        return $statement->fetchColumn();
    }
}
