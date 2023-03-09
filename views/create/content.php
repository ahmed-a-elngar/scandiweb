<?php
include_once("views/create/header.php");
?>
<div class="container col-md-6 col-sm-12 mt-4">

    <form id="product_form" class="form-inline" method="POST" action="store">

        <div class="mb-3 row">
            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="ex: ELC1001" name="sku" id="sku" value="<?php echo old('sku'); ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="ex: Pes" name="name" id="name" value="<?php echo old('name'); ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
            <div class="col-sm-10">
                <input type="number" step="0.0001" class="form-control" placeholder="ex: 15" name="price" id="price" value="<?php echo old('price'); ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="productType" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="type" id="productType">
                    <option value="0" selected>select product type</option>
                    <option data-info="Please provide size in MB format" data-container="dvdCon" value="Dvd" id="DVD" <?php echo old('type') == 'Dvd' ? 'selected' : ''; ?>>DVD</option>
                    <option data-info="Please provide weight in KG format" data-container="bookCon" value="Book" id="Book" <?php echo old('type') == 'Book' ? 'selected' : ''; ?>>Book</option>
                    <option data-info="Please provide dimensions in HxWxL format" data-container="furnitureCon" value="Furniture" id="Furniture" <?php echo old('type') == 'Furniture' ? 'selected' : ''; ?>>Furniture</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row <?php echo old('type') != 'Dvd' ? 'hidden' : ""; ?> measurements dvdCon">
            <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>
            <div class="col-sm-10">
                <input type="number" step="0.0001" class="form-control" placeholder="ex: 5" name="size" id="size" value="<?php echo old('size'); ?>">
            </div>
        </div>

        <div class="mb-3 row  <?php echo old('type') != 'Book' ? 'hidden' : ""; ?>  measurements bookCon">
            <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label>
            <div class="col-sm-10">
                <input type="number" step="0.0001" class="form-control" placeholder="ex: 5" name="weight" id="weight" value="<?php echo old('weight'); ?>">
            </div>
        </div>

        <div class="mb-3 row  <?php echo old('type') != 'Furniture' ? 'hidden' : ""; ?>  measurements furnitureCon">
            <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>
            <div class="col-sm-10">
                <input type="number" step="0.0001" class="form-control" placeholder="ex: 5" name="height" id="height" value="<?php echo old('height'); ?>">
            </div>
        </div>

        <div class="mb-3 row  <?php echo old('type') != 'Furniture' ? 'hidden' : ""; ?>  measurements furnitureCon">
            <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>
            <div class="col-sm-10">
                <input type="number" step="0.0001" class="form-control" placeholder="ex: 5" name="width" id="width" value="<?php echo old('width'); ?>">
            </div>
        </div>

        <div class="mb-3 row  <?php echo old('type') != 'Furniture' ? 'hidden' : ""; ?>  measurements furnitureCon">
            <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>
            <div class="col-sm-10">
                <input type="number" step="0.0001" class="form-control" placeholder="ex: 5" name="length" id="length" value="<?php echo old('length'); ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="length" class="col-sm-2 col-form-label text-white"> info </label>
            <div class="col-sm-10 text-info">
                <p id="info"> </p>
            </div>
        </div>

    </form>
</div>