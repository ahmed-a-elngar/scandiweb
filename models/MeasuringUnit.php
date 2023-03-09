<?php

    require_once('models/Model.php');

    abstract class MeasuringUnit extends Model
    {
        protected $request;

        public function __construct(array $request = [])
        {
            $this->request = $request;
            $this->setAttributes();
        }

        abstract public function setAttributes();
        abstract public function assignMeasurement(int $productId);
    }
