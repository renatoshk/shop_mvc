<?php require APPROOT . '/views/includes/header.php' ?>
    <div class="container">
        <form class="d-block">
        <div class="pt-5 d-flex align-items-center justify-content-between">
            <h1>Product Add</h1>
            <div class="float-right" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-success mr-2">Save</button>
                <a class="btn btn-danger" href="<?php echo LINKROOT."products/index"?>" role="button">Cancel</a>
            </div>
        </div>
            <hr>
        <div class="product-details row mt-5">
            <div class="col-dm-6 col-sm-6">
                <div class="form-group d-flex align-items-center">
                    <label for="sku">SKU</label>
                    <input type="text" class="form-control ml-3" id="sku" aria-describedby="sku">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label for="name">Name</label>
                    <input type="text" class="form-control ml-3" id="name">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label for="price">Price</label>
                    <input type="text" class="form-control ml-3" id="price">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label for="price">Type Switcher</label>
                    <select class="form-control">
                        <option>Large select</option>
                    </select>
                </div>
            </div>
        </div>
            <div class="row card-detail-form">
                <div class="col-sm-6 col-md-6 col-lg-6 mt-4">
                    <div class="card">
                        <div class="card-body">
                           <table class="responsive w-100 mt-5 mb-5">
                               <tbody class="w-100">
                                   <tr>
                                       <td>Height</td>
                                       <td class="d-flex w-100 mb-3">
                                           <input type="text" class="form-control ml-3" id="height">
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>Width</td>
                                       <td class="d-flex w-100 mb-3">
                                           <input type="text" class="form-control ml-3" id="width">
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>Lenght</td>
                                       <td class="d-flex w-100 mb-3">
                                           <input type="text" class="form-control ml-3" id="length">
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                            <p class="desc-product"> In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. </p>
                        </div>
                    </div>
                </div></div>
        </form>
    </div>
<?php require APPROOT . '/views/includes/footer.php' ?>