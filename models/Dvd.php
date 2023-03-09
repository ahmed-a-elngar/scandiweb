<?php
    require_once('models/Product.php');
    require_once('models/Size.php');

    class Dvd extends Product
    {
        protected $type = 1;

        public function __construct(array $request = [])
        {
            parent::__construct($request);
            $this->measure = new Size($this->request);
        }

    }
    