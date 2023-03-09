<?php
abstract class Product extends Model
{
    protected $tableName = "products";
    protected $request;
    protected $name;
    protected $sku;
    protected $price;
    /**
     * assign different for every new child class
     */
    protected $type;
    protected $measure;
    /**
     * id of created product
     */
    protected $id;

    public function __construct(array $request = [])
    {
        $this->request = $request;
        $this->setSku($request['sku']);
        $this->setName($request['name']);
        $this->setPrice($request['price']);
    }

    public function setSku(string $sku)
    {
        $this->sku = htmlentities($sku);
    }

    public function setName(string $name)
    {
        $this->name = htmlentities($name);
    }

    public function setPrice(float $price)
    {
        $this->price = $price ?? 0;
    }

    public function createAndAssignMeasures()
    {
        try {

            $this->connect()->beginTransaction();

            $this->id = $this->createAndGetId([
                'sku' => $this->sku,
                'name' => $this->name,
                'price' => $this->price,
                'type_id' => $this->type
            ]);

            $this->setMeasurements();

            $this->connect()->commit();
        } catch (\Throwable $th) {
            $_SESSION['error'] = "An error occured. please try again";
            $this->connect()->rollBack();
            return false;
        }
        return true;
    }

    protected function setMeasurements()
    {
        $this->measure->setAttributes()
            ->assignMeasurement($this->id);
    }
}
