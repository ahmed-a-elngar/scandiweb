<?php

    require_once('models/MeasuringUnit.php');

    class Dimension extends MeasuringUnit
    {
        protected $tableName = "products_dimensions";
        protected $height;
        protected $width;
        protected $length;

        public function assignMeasurement(int $productId)
        {
            (new Dimension())->create([
                'height' => $this->height,
                'width' => $this->width,
                'length' => $this->length,
                'product_id' => $productId
            ]);
        }

        public function setAttributes()
        {
            $this->height = floatval(htmlentities($this->request['height'] ?? 0));
            $this->width = floatval(htmlentities($this->request['width'] ?? 0));
            $this->length = floatval(htmlentities($this->request['length'] ?? 0));
            return $this;
        }

    }
