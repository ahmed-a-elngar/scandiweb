<?php
    require_once('models/Model.php');

    class Query extends Model
    {
        protected static $query;

        public static function execSelectQuery($statement)
        {
            self::execQuery($statement);
            self::$query->execute();
            return self::$query->fetchAll();
        }

        public static function execDeleteQuery($statement)
        {
            self::execQuery($statement);
            return self::$query->execute();
        }

        protected static function execQuery($statement)
        {
            self::$query = (new self)->connect()->prepare($statement);
        }
    }
