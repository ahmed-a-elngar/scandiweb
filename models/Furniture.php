<?php
class Furniture extends Product
{
    protected $type = 3;

    public function __construct(array $request = [])
    {
        parent::__construct($request);
        $this->measure = new Dimension($this->request);
    }
}
