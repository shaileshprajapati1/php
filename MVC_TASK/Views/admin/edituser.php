<div id="page-wrapper">
    <div class="main-page">

        <h1 class="text-center ">Register Form</h1>
        <form method="post">
            <?php

            // echo "<pre>";
            // print_r($UpdateRes['Data'][0]->name);
            // echo "</pre>";
            ?>
            <div class="row mb-2">
                <div class="col-6 offset-3">

                    <label class="label-control" for="name">Name</label>
                    <input type="text" name="name" value="<?php echo  $UpdateRes['Data'][0]->name; ?>" id="name" class="form-control" required>

                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6 offset-3">

                    <label class="label-control" for="email">Email</label>
                    <input type="email" name="email"value="<?php echo  $UpdateRes['Data'][0]->email; ?>" id="email" class="form-control" required>

                </div>
            </div>

            <div class="row mt-3">
                <div class="col-6 offset-5">

                    <input type="submit" value="Update" name="update" id="update" class="btn btn-success">


                </div>
            </div>
        </form>

    </div>


</div>