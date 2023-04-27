
<div class="modal fade" tabindex="-1" role="dialog" id="updatePermissions">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update permissions</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="javascript: void(0);" method="post" id="updatePermissionsForm" class="form-validate is-alter">
                        <div class="form-group">
                                    <div class="card card-bordered card-preview">
                                        <div class="card-inner">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                                    <label class="custom-control-label" for="customCheck2"></label>
                                                                </div>
                                                            </th>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Permission Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="myPermissionsContent">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update permissions</button>
                        </div>
                    </form>
                    <div class="text-center pt-4 pb-3">
                        <p class="fw-bold text-danger" id="myUpdatePermissionsResult" style="display: none;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>