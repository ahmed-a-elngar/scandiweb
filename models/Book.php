<?php
class Book extends Product
{
    protected $type = 2;

    public function __construct(array $request = [])
    {
        parent::__construct($request);
        $this->measure = new Weight($this->request);
    }
}
