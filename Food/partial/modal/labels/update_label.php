
<div class="modal fade" tabindex="-1" role="dialog" id="updateLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update food</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="javascript: void(0);" method="post" id="updateLabelForm" class="form-validate is-alter">
                        <div class="form-group">
                            <label class="form-label" for="updateCategoryName">Category</label>
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select class="form-control" id="updateCategoryName">
                                        <option value=""></option>
                                        <?php
                                        if ($result = fetch_categories($dbh)) {
                                            foreach($result as $category) {
                                                ?>
                                                <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="updateLabelName">Label Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="updateLabelName" placeholder="Label Name" required>
                            </div>
                        </div>
                        <div class="quill-minimaltwo">
                            <h3>This is a heading 3</h3>
                            <br>
                            <p>Hello World!</p>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Picture</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" class="form-file-input" id="updatecustomFile">
                                    <label class="form-file-label" for="updatecustomFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update food</button>
                        </div>
                    </form>
                    <div class="text-center pt-4 pb-3">
                        <p class="fw-bold text-danger" id="myUpdateResult" style="display: none;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>