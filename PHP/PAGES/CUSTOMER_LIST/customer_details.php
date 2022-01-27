<div class="modal fade" id="customerdetails<?php echo $list['pk_id_users'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="customerdetailsLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerdetailsLabel">Customer details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 pb-2">
                            <label class="form-label fw-bold">Name</label>
                        </div>
                        <div class="col-8">
                            <label class="form-label"><?php echo $list['full_name'] ?></label>
                        </div>

                        <div class="col-4 pb-2">
                            <label class="form-label fw-bold">Gender</label>
                        </div>
                        <div class="col-8">
                            <label class="form-label"><?php echo $list['gender'] ?></label>
                        </div>

                        <div class="col-4 pb-2">
                            <label class="form-label fw-bold">Phone Number</label>
                        </div>
                        <div class="col-8">
                            <label class="form-label"><?php echo $list['phone_number'] ?></label>
                        </div>

                        <div class="col-4 pb-2">
                            <label class="form-label fw-bold">Address</label>
                        </div>
                        <div class="col-8">
                            <label class="form-label"><?php echo $list['address'] ?></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <h5 class="me-auto fw-bold">Transaction amount : 3</h5>
                </div>
            </form>
        </div>
    </div>
</div>