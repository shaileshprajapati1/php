<div id="page-wrapper">
    <div class="main-page">
        <?php
        // echo "<pre>";
        // print_r($EditProductRes['Data'][0]);
        // echo "</pre>";
        ?>

        <h1 class="text-center ">Update Product Form</h1>
        <form method="post" enctype="multipart/form-data">

            <div class="row mb-2">
                <div class="col-6 offset-3">

                    <label class="label-control" for="name">Title</label>
                    <input type="text" name="Title" value="<?php echo $EditProductRes['Data'][0]->Title;  ?>" id="Title" class="form-control" required>

                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6 offset-3">

                    <label class="label-control" for="Price">Price</label>
                    <input type="num" name="Price" value="<?php echo $EditProductRes['Data'][0]->Price;  ?>" id="Price" class="form-control" required>

                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6 offset-3">

                    <label class="label-control" for="CategoryID">CategoryID</label>
                    <select class="form-control" name="CategoryID" id="CategoryID">
                        <option value="checked">---Select Category---</option>
                        <option value="mobile" <?php if ($EditProductRes['Data'][0]->CategoryID == "mobile") {
                                                    echo "selected";
                                                } ?>>Mobile</option>
                        <option value="television" <?php if ($EditProductRes['Data'][0]->CategoryID == "television") {
                                                        echo "selected";
                                                    } ?>>Television</option>
                        <option value="audio" <?php if ($EditProductRes['Data'][0]->CategoryID == "audio") {
                                                    echo "selected";
                                                } ?>>Audio</option>
                    </select>

                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6 offset-3">
                    <label for="Images">Images</label>
                    <input type="file" name="Images" value="<?php echo $EditProductRes['Data'][0]->Images;  ?>" id="Images" class="form-control">
                    <img src="Uploads/<?php echo $EditProductRes['Data'][0]->Images;  ?>" width="100px" height="100px" alt="">
                    <input type="hidden" name="old_Images" id="old_Images" value="<?php echo $EditProductRes['Data'][0]->Images;  ?>">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-6 offset-5">

                    <input type="submit" value="Update Product" name="updateproduct" id="updateproduct" class="btn btn-success">
                    <!-- <input type="reset" value="Cancel" class="btn btn-danger"> -->

                </div>
            </div>
        </form>
    </div>
</div>