<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">

        <a class="btn btn-primary" href="addproduct">Add Product</a>
        <!-- <div class="clearfix"> </div> -->

        <div class= "row">

            <!-- <div class="col-md-12 stats-info stats-last widget-shadow"> -->
            <table class="table stats-table ">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>CategoryID</th>
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // echo "<pre>";
                    // print_r($allproductRes['Data']);
                    // echo "</pre>";
                    if (!empty($allproductRes['Data'])) {
                        $i = 0;
                        foreach ($allproductRes['Data'] as $key => $value) {
                            $i++; ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value->Title; ?></td>
                                <td><?php echo $value->Price; ?></td>
                                <td><?php echo $value->CategoryID; ?></td>
                                <td>
                                    <img src="Uploads/<?php echo $value->Images; ?>" width="100px" height="100px" alt="">
                                    
                                </td>
                                <td>

                                    <a class="btn btn-success" href="editproduct?productid=<?php echo $value->id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a class="btn btn-danger" href="deleteproduct?productcategoryid=<?php echo $value->CategoryID; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                </td>
                            </tr>
                        <?php }

                        ?>
                    <?php  } else { ?>
                        <tr>
                            <td class="text-center" colspan="6">
                                <h3>Product Not Avilable</h3>
                            </td>
                        </tr>
                    <?php    } ?>







                </tbody>
            </table>
        </div>
        <div class="clearfix"> </div>
    </div>

    <div class="clearfix"> </div>
</div>
</div>