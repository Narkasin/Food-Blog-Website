
<div class="modal fade" tabindex="-1" role="dialog" id="addExtension">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add extension</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="javascript: void(0);" method="post" id="addExtensionForm" class="form-validate is-alter">
                        <div class="form-group">
                            <label class="form-label" for="extensionName">Extension Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="extensionName" placeholder="Extension Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Add extension</button>
                        </div>
                    </form>
                    <div class="text-center pt-4 pb-3">
                        <p class="fw-bold text-danger" id="myResult" style="display: none;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>