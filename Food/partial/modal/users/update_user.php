
<div class="modal fade" tabindex="-1" role="dialog" id="updateUser">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update user</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="javascript: void(0);" method="post" id="updateUserForm" class="form-validate is-alter">
                        <div class="form-group">
                            <label class="form-label" for="updateUsername">Username</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="updateUsername" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updateFname">First Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="updateFname" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updateLname">Last Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="updateLname" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updateEmail">Email</label>
                            <div class="form-control-wrap">
                                <input type="email" class="form-control" id="updateEmail" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updateIsActive">Status</label>
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select class="form-control" id="updateIsActive">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updateIsSuperuser">Super User</label>
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select class="form-control" id="updateIsSuperuser">
                                        <option value="0">Not Super User</option>
                                        <option value="1">Super User</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="myUpdateRole">
                            <label class="form-label" for="updateRole">Role</label>
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select class="form-control" id="updateRole">
                                        <option value=""></option>
                                        <?php
                                        if ($result = fetch_roles($dbh)) {
                                            foreach($result as $role) {
                                                ?>
                                                <option value="<?php echo $role['id']; ?>"><?php echo $role['role_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update user</button>
                        </div>
                    </form>
                    <div class="text-center pt-4 pb-3">
                        <p class="fw-bold text-danger" id="myUpdateResult" style="display: none;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>