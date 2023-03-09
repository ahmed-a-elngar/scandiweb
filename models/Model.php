<?php
require_once('models/DB.php');

class Model extends DB
{

    protected $tableName;
    protected $selectedColumnsPrepared;
    protected $selectCondition;

    public function __construct()
    {
        $this->tableName ??= strtolower(self::class);
    }

    public function select(string ...$targetColumns)
    {
        $this->prepareSelectedColumns(...$targetColumns);
        return $this;
    }

    public function where(array $conditions)
    {
        $this->prepareSelectCondition($conditions);
        return $this;
    }

    public function createAndGetId(array $keyMapValues)
    {
        $this->create($keyMapValues);
        return $this->connect()->lastInsertId();
    }

    public function create(array $keyMapValues)
    {
        $keys =  implode(',', array_keys($keyMapValues));
        $values = "'" . implode("','", array_values($keyMapValues)) . "'";
        $statement = "INSERT INTO " . $this->tableName . " ($keys) VALUES ($values)";

        return $this->connect()->exec($statement);
    }

    protected function prepareSelectedColumns(string ...$targetColumns)
    {
        foreach ($targetColumns as $column) {

            if (strlen($this->selectedColumnsPrepared) > 0) {
                $this->selectedColumnsPrepared .= ", ";
            }

            $this->selectedColumnsPrepared .= $column;
        }
    }

    protected function prepareSelectCondition(array $conditions)
    {
        foreach ($conditions as $key => $value) {

            if (strlen($this->selectCondition) > 0) {
                $this->selectCondition .= " AND ";
            } else {
                $this->selectCondition .= " Where ";
            }

            $this->selectCondition .= $key . " = " . $value;
        }
    }
}
