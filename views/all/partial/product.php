<div class="col-3 mb-2">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <input type="checkbox" class="delete-checkbox" name="delete_product['<?php echo $product['sku'];?>']">
            </h5>
            <p class="card-text text-center"><?php echo $product['sku']; ?></p>
            <p class="card-text text-center"><?php echo $product['name']; ?></p>
            <p class="card-text text-center"> <?php echo number_format($product['price'], 2); ?> $</p>
            <?php include('views/all/partial/measurement/'. $product['type'] .'.php') ?>
        </div>
    </div>
</div>
