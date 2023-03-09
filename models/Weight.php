<?php

    require_once('models/MeasuringUnit.php');

    class Weight extends MeasuringUnit
    {
        protected $tableName = "products_weight";
        protected $weight;

        public function assignMeasurement(int $productId)
        {
            (new Weight())->create([
                'weight' => $this->weight,
                'product_id' => $productId
            ]);
        }

        public function setAttributes()
        {
            $this->weight = floatval(htmlentities($this->request['weight'] ?? 0));
            return $this;
        }

    }
