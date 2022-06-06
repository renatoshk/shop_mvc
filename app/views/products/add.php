<?php require APPROOT . '/views/includes/header.php' ?>
        <form class="d-block" action="<?php echo URLROOT; ?>/products/store" method="POST" id="product_form">
            <div class="pt-5 d-flex align-items-center justify-content-between">
                <h1>Product Add</h1>
                <div class="float-right" role="group" aria-label="Basic example">
                    <button type="submit" class="btn btn-success mr-2" id="save-product-button" value="<?php echo APIURLROOT; ?>">Save</button>
                    <a class="btn btn-danger" href="<?php echo LINKROOT."products/index"?>" role="button">Cancel</a>
                </div>
            </div>
            <hr>
            <div class="product-details row mt-5">
                <div class="col-dm-6 col-sm-6">
                    <div class="form-group d-flex align-items-center">
                        <label for="sku">SKU</label>
                        <input type="text" class="form-control ml-3" id="sku" aria-describedby="sku" name="sku" required>
                    </div>
                    <label id="sku-error" class="error" for="sku"></label>
                    <div class="form-group d-flex align-items-center">
                        <label for="name">Name</label>
                        <input type="text" class="form-control ml-3" id="name" name="name" required>
                    </div>
                    <label id="name-error" class="error" for="name"></label>
                    <div class="form-group d-flex align-items-center">
                        <label for="price">Price($)</label>
                        <input type="number" class="form-control ml-3" id="price" name="price" step="any" required>
                    </div>
                    <label id="price-error" class="error" for="price"></label>
                    <div class="form-group d-flex align-items-center">
                        <label for="price">Type Switcher</label>
                        <select class="form-control" id="productType" onchange="loadAttributes('#productType','<?php echo APIURLROOT; ?>')" name="product_type_id" required>
                            <?php if(isset($data['product_types'])): ?>
                                <option value="">Choose Type</option>
                                <?php foreach($data['product_types'] as $productType): ?>
                                    <option id="<?php echo $productType->getProductTypeName() ?>" value="<?php echo $productType->getProductTypeId() ?>"><?php echo $productType->getProductTypeName() ?></option>
                                 <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <label id="productType-error" class="error" for="productType"></label>
                    <div class="js-append-attributes">

                    </div>
                </div>
            </div>
        </form>
<?php require APPROOT . '/views/includes/footer.php' ?>