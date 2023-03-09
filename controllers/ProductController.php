<?php

class ProductController
{
    const HEADER_LOCATION = "Location: ";

    public function __construct()
    {
        $this->pagesHeader();
    }

    public function index()
    {
        $this->getAllProducts();
    }

    public function create()
    {
        include_once("views/create/content.php");

        if (isset($_SESSION['error'])) {
            freeData();
        }
    }

    public function store()
    {
        try {
            storeFormData($_POST);

            if ($this->isSkuValid($_POST['sku'])) {
                $factory = new $_POST['type']($_POST);
                $result = $factory->createAndAssignMeasures();

                if ($result) {
                    freeFormData($_POST);

                    $_SESSION['success'] = "product successfully added";
                    header(self::HEADER_LOCATION . "./");
                } else {
                    header(self::HEADER_LOCATION . $_SERVER["HTTP_REFERER"]);
                }
            } else {
                $_SESSION['error'] = "this sku is reserved, please enter nother one";
                header(self::HEADER_LOCATION . $_SERVER["HTTP_REFERER"]);
            }
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();
            header(self::HEADER_LOCATION . $_SERVER["HTTP_REFERER"]);
        }
    }

    public function destroy()
    {
        try {
            foreach ($_POST['delete_product'] as $sku => $value) {
                $statement = "DELETE FROM products WHERE sku = $sku";
                Query::execDeleteQuery($statement);
            }
            $_SESSION['success'] = "successfully deleted";
            header("Location:./");
        } catch (\Throwable $th) {
            $_SESSION['error'] = "An error occured. please try again";
            header(self::HEADER_LOCATION . $_SERVER["HTTP_REFERER"]);
        }

    }

    protected function isSkuValid(string $sku)
    {
        $statement = "SELECT COUNT(*) AS duplicates_count FROM products WHERE sku = '$sku'";
        $result = Query::execSelectQuery($statement)[0]['duplicates_count'];
        return $result == 0;
    }

    protected function getAllProducts()
    {
        $statement = "
                SELECT
                    products.id, products.sku, products.name, products.price,
                    products_types.name AS type,
                    IF(products_size.id > 0, products_size.size, null) AS size,
                    IF(products_weight.id > 0, products_weight.weight, null) AS weight,
                    IF(products_dimensions.id > 0, products_dimensions.height, null) AS height,
                    IF(products_dimensions.id > 0, products_dimensions.width, null) AS width,
                    IF(products_dimensions.id > 0, products_dimensions.length, null) AS length
                FROM products
                LEFT JOIN products_types ON products.type_id = products_types.id
                LEFT JOIN products_size ON products_size.product_id = products.id
                LEFT JOIN products_weight ON products_weight.product_id = products.id
                LEFT JOIN products_dimensions ON products_dimensions.product_id = products.id
                ORDER BY products.id;
            ";
        $products = Query::execSelectQuery($statement);
        include_once("views/all/content.php");
    }

    protected function pagesHeader()
    {
        include_once("views/header.php");
    }

    protected function pagesFooter()
    {
        include_once(dirname(__FILE__, 2) . "/views/footer.php");
    }

    public function __destruct()
    {
        $this->pagesFooter();
    }
}
