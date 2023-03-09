<?php

    class DB {
        private $pdo;

        protected function connect()
        {
            if (! $this->pdo) {
                $dsn = "mysql:host=" . env("HOST") . ";dbname=" . env("DB_NAME");
                $this->pdo = new PDO($dsn, env("USER_NAME"), env("PASSWORD"));
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $this->pdo;
            }
            return $this->pdo;
        }

    }