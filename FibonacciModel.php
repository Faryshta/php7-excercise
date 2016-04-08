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
    }

    public function getSecondBiggest(): int
    {
    }

    public function save(int $number): bool
    {
    }

    public function sumEven(int $limit): int
    {
    }
}
