<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">


        <!-- <div class="clearfix"> </div> -->

        <div class="row">

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
                    $i = 0;
                    foreach ($allproductRes['Data'] as $key => $value) {
                        $i++; ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value->Title; ?></td>
                            <td><?php echo $value->Price; ?></td>
                            <td><?php echo $value->CategoryID; ?></td>
                            <td><?php echo $value->Images; ?></td>
                            <td><?php echo $value->id; ?></td>
                        </tr>
                    <?php }

                    ?>






                </tbody>
            </table>
        </div>
        <div class="clearfix"> </div>
    </div>

    <div class="clearfix"> </div>
</div>
</div>