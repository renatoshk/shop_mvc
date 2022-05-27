<?php require APPROOT . '/views/includes/header.php' ?>
    <div class="container">
        <form class="d-block" action="<?php echo URLROOT; ?>/products/store" method="POST">
            <div class="pt-5 d-flex align-items-center justify-content-between">
                <h1>Product Add</h1>
                <div class="float-right" role="group" aria-label="Basic example">
                    <button type="submit" class="btn btn-success mr-2">Save</button>
                    <a class="btn btn-danger" href="<?php echo LINKROOT."products/index"?>" role="button">Cancel</a>
                </div>
            </div>
            <hr>
            <div class="product-details row mt-5">
                <div class="col-dm-6 col-sm-6">
                    <div class="form-group d-flex align-items-center">
                        <label for="sku">SKU</label>
                        <input type="text" class="form-control ml-3" id="sku" aria-describedby="sku" name="sku">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="name">Name</label>
                        <input type="text" class="form-control ml-3" id="name" name="name">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="price">Price($)</label>
                        <input type="number" class="form-control ml-3" id="price" name="price" step="any">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <label for="price">Type Switcher</label>
                        <select class="form-control" id="productType" onchange="loadAttributes('#productType','<?php echo APIURLROOT; ?>')" name="product_type_id">
                            <?php if(isset($data['product_types'])): ?>
                                <option value="">Choose Type</option>
                                <?php foreach($data['product_types'] as $productType): ?>
                                    <option value="<?php echo $productType->getProductTypeId() ?>"><?php echo $productType->getProductTypeName() ?></option>
                                 <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="js-append-attributes">

                    </div>
                </div>
            </div>
        </form>
    </div>
<?php require APPROOT . '/views/includes/footer.php' ?>