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
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $i = 0;
                    foreach ($ViewallUsersRes['Data'] as $key => $value) {
                        $i++ ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $value->name; ?></td>
                            <td>
                            <?php echo $value->email; ?>
                            </td>
                            <td>
                                <a href="edit?userid=<?php echo $value->id  ?>"><span class="label label-success">Edit</span></a>
                                <a href="delete?userid=<?php echo $value->id  ?>"><span class="label label-danger">Delete</span></a>
                            </td>
                        </tr>

                    <?php  }

                    ?>

                </tbody>
            </table>
        </div>
        <div class="clearfix"> </div>
    </div>

    <div class="clearfix"> </div>
</div>
</div>