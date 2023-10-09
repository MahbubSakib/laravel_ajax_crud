<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="POST" id="updateProductForm">
            @csrf

            <input type="hidden" name="" id="update_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="errMsgContainer mb-3">
                    </div>
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" name="update_name" id="update_name" placeholder="Name">
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Product Price</label>
                        <input type="text" class="form-control" name="update_price" id="update_price" placeholder="Price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_product">Edit Product</button>
                </div>
            </div>
        </form>
    </div>
</div>
