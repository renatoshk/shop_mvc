<?php require APPROOT . '/views/includes/header.php' ?>
   <div class="container">
       <div class="row pt-5 d-flex align-items-center justify-content-between">
           <h1>Product List</h1>
           <div class="float-right" role="group" aria-label="Basic example">
               <a class="btn btn-primary mr-2" href="<?php echo LINKROOT."products/create"?>" role="button">ADD</a>
               <button type="button" class="btn btn-danger" id="delete-product-button" value="<?php echo APIURLROOT; ?>/products/bulkDestroy">MASS DELETE</button>
           </div>
       </div>
   </div>
    <hr class="my-3">
    <div class="row mt-5 mb-5">
        <?php if(isset($data['products'])): ?>
            <?php foreach($data['products'] as $product): ?>
                <div class="col-sm-6 col-md-3 col-lg-3 mt-4" id="product_id_<?= $product->getProductId(); ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-check d-inline">
                                <input class="delete-checkbox form-check-input" type="checkbox" value="<?php echo $product->getProductId(); ?>" id="product_id">
                            </div>
                            <h5 class="card-title text-center"><?php echo $product->getSku(); ?></h5>
                            <h5 class="card-title text-center"><?php echo $product->getName(); ?></h5>
                            <p class="card-text text-center"><?php echo $product->getProductTypeName(); ?></p>
                            <p class="card-text text-center"><?php echo $product->getPrice();?>  <?php echo $product->getCurrencySymbol();  ?></p>
                            <?php if($product->getProductTypeName()=='Furniture'): ?>
                                <p class="text-center">
                                    Dimension:
                                    <?php $dimension=''; ?>
                                        <?php foreach ($product->getAttributes()[$product->getProductTypeId()] as $attribute): ?>
                                            <?php $dimension.='x'.$attribute->getProductAttributeValue()->getValue(); ?>
                                        <?php endforeach; ?>
                                    <?php echo ltrim($dimension, 'x'); ?>
                                </p>
                            <?php else: ?>
                                <p class=" text-center">
                                    <?php foreach ($product->getAttributes()[$product->getProductTypeId()] as $attribute): ?>
                                        <?php echo $attribute->getName(); ?>: <?php echo $attribute->getProductAttributeValue()->getValue(); ?>  <?php echo $attribute->getUnit(); ?>
                                    <?php endforeach; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
             <?php  endforeach; ?>
        <?php  endif; ?>
    </div>
<?php require APPROOT . '/views/includes/footer.php' ?>