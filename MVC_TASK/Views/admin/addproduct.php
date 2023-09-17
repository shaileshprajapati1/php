<div id="page-wrapper">
    <div class="main-page">

        <h1 class="text-center ">Add Product Form</h1>
        <form method="post" enctype="multipart/form-data">

            <div class="row mb-2">
                <div class="col-6 offset-3">

                    <label class="label-control" for="name">Title</label>
                    <input type="text" name="Title" id="Title" class="form-control" required>

                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6 offset-3">

                    <label class="label-control" for="Price">Price</label>
                    <input type="num" name="Price" id="Price" class="form-control" required>

                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6 offset-3">

                    <label class="label-control" for="CategoryID">CategoryID</label>
                    <select class="form-control" name="CategoryID" id="CategoryID">
                        <option value="checked">---Select Category---</option>
                        <option value="mobile">Mobile</option>
                        <option value="television">Television</option>
                        <option value="audio">Audio</option>
                    </select>

                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6 offset-3">
                    <label for="Images">Images</label>
                    <input type="file" name="Images" id="Images" class="form-control">

                </div>
            </div>

            <div class="row mt-3">
                <div class="col-6 offset-5">

                    <input type="submit" value="Add Product" name="addproduct" id="addproduct" class="btn btn-success">
                    <input type="reset" value="Cancel" class="btn btn-danger">

                </div>
            </div>
        </form>
    </div>
</div>