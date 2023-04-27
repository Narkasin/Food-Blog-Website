
<div class="modal fade" tabindex="-1" role="dialog" id="addUser">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add user</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="javascript: void(0);" method="post" id="addUserForm" class="form-validate is-alter">
                        <div class="form-group">
                            <label class="form-label" for="username">Username</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="username" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="fname">First Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="fname" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="lname">Last Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="lname" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <div class="form-control-wrap">
                                <input type="email" class="form-control" id="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control" id="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="isSuperuser">Super User</label>
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select class="form-control" id="isSuperuser">
                                        <option value="0">Not Super User</option>
                                        <option value="1">Super User</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="myRole">
                            <label class="form-label" for="role">Role</label>
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select class="form-control" id="role">
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
                            <button type="submit" class="btn btn-lg btn-primary">Add user</button>
                        </div>
                    </form>
                    <div class="text-center pt-4 pb-3">
                        <p class="fw-bold text-danger" id="myResult" style="display: none;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>