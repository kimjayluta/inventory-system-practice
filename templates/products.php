<!-- Products Modal -->
<div class="modal fade" id="products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Manage Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="product-form" onsubmit="return false;">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="added_date">Date: </label>
              <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d");?>" readonly/>
            </div>
            <div class="form-group col-md-6">
              <label for="product-name">Product*</label>
              <input type="text" class="form-control" name="product-name" id="product-name" placeholder="Enter here..." required/>
            </div>
          </div>
          <div class="form-group">
            <label for="select-category">Category*</label>
            <select class="form-control" name="select-category" id="select-category" required>

            </select>
          </div>
          <div class="form-group">
            <label for="inputAddress2">Brands*</label>
            <select class="form-control" name="select-category" id="select-brands" required>

            </select>
          </div>
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="product-price">Price* </label>
              <input type="text" class="form-control" name="product-price" id="product-price" required />
            </div>
            <div class="form-group col-md-4">
            <label for="product-qty">Quantity* </label>
              <input type="number" class="form-control" name="product-qty" id="product-qty" required />
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="add-product">Add Product</button>
      </div>
    </div>
  </div>
</div>