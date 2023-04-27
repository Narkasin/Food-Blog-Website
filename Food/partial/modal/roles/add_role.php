
<div class="modal fade" tabindex="-1" role="dialog" id="addRole">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add role</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="javascript: void(0);" method="post" id="addRoleForm" class="form-validate is-alter">
                        <div class="form-group">
                            <label class="form-label" for="roleName">Role Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="roleName" placeholder="Role Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Add role</button>
                        </div>
                    </form>
                    <div class="text-center pt-4 pb-3">
                        <p class="fw-bold text-danger" id="myResult" style="display: none;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>