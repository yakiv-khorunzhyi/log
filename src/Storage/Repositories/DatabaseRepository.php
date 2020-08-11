<?php

namespace Y\Storage\Repositories;

class DatabaseRepository implements IRepository
{
    /** @var \PDO */
    protected $pdo;

    /** @var string */
    protected $table;

    /**
     * DatabaseRepository constructor.
     *
     * @param $pdo
     * @param $table
     */
    public function __construct($pdo, $table)
    {
        $this->pdo = $pdo;
        $this->table = $table;
    }

    /**
     * @param array $data
     */
    public function save($data)
    {
        $this->pdo->query(
            $this->getQuery($data)
        );
    }

    /**
     * @param array $cols
     *
     * @return string
     */
    private function getQuery($cols)
    {
        $query = "INSERT INTO `{$this->table}`";
        $query .= '(`' . implode('`,`', array_keys($cols['data'])) . '`)';
        $query .= " VALUES('" . implode("','", array_values($cols['data'])) . "')";

        return $query;
    }
}