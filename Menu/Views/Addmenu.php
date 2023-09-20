<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Menu List</h4>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Menu Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // echo "<pre>";
                    // print_r($MenuViewRes['Data']);
                    // echo "</pre>";
                  
                    foreach ($MenuViewRes['Data'] as $key => $value) { ; ?>
                       <tr>
                        <td><?php echo $value->menu_id ;  ?></td>
                        <td><?php echo $value->menu_name;  ?></td>
                       </tr>
                   <?php }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h4>Menu Add</h4>
            <hr>
            <form  method="post">
                <div class="form-group">
                    <input type="text" name="menu_name" placeholder="Menu Name" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-success" value="Add Menu" name="addmenu" id="addmenu">
                </div>
            </form>
        </div>
    </div>
</div>