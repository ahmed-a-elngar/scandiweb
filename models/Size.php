<?php

class Size extends MeasuringUnit
{
    protected $tableName = "products_size";
    protected $size;

    public function assignMeasurement(int $productId)
    {
        $this->create([
            'size' => $this->size,
            'product_id' => $productId
        ]);
    }

    public function setAttributes()
    {
        $this->size = floatval(htmlentities($this->request['size'] ?? 0));
        return $this;
    }
}
