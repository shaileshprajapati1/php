<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Sub Menu List</h4>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>menu_name</th>
                        <th>submenu_name</th>
                        <th>submenu_url</th>
                        <th>submenu_order</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    // $AddsubMenuViewRes['Data']
                    foreach ($AddsubMenuViewRes['Data']  as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value->submenu_id; ?></td>
                            <td><?php echo $value->menu_name; ?></td>
                            <td><?php echo $value->submenu_name; ?></td>
                            <td><?php echo $value->submenu_url; ?></td>
                            <td><?php echo $value->submenu_order; ?></td>
                        </tr>
                    <?php   }
                    ?>

                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h4>Sub Menu Add</h4>
            <hr>
            <?php
            // echo "<pre>";
            // print_r($AddsubMenuViewRes['Data']);
            // echo "</pre>";
            ?>
            <form method="post">
                <div class="form-group mb-2">
                    <select class="form-control" name="menu_id" id="menu_id">
                        <option value="">Select Menu</option>
                        <?php
                        foreach ($adddropdawon['Data'] as $key => $value) { ?>
                            <option value="<?php echo $value->menu_id;  ?>"><?php echo $value->menu_name;  ?></option>

                        <?php  }
                        ?>

                    </select>
                </div>
                <div class="form-group mb-2">
                    <input type="text" name="submenu_name" placeholder="Sub Menu Name" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <input type="text" name="submenu_url" placeholder="Sub Menu url" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <select class="form-control" name="submenu_display" id="submenu_display">
                        <option value="checked">Sub Menu Display</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>

                    </select>
                    <div class="form-group mb-2 mt-2">
                        <select class="form-control" name="submenu_order" id="submenu_order">
                            <option value="checked">Sub Menu Order</option>
                            <?php
                            for ($i = 0; $i <= 10; $i++) { ?>

                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php }
                            ?>


                        </select>
                        <div class="form-group mt-3">
                            <input type="submit" class="btn btn-success" value="Add Sub Menu" name="addsubmenu" id="addsubmenu">
                        </div>
            </form>
        </div>
    </div>
</div>