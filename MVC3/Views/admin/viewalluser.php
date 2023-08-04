<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">
        <div class="row-one">
            <!-- <div class="col-md-4 widget"> -->
            <div class="tables">
                <h3 class="title1">Tables</h3>
                <div class="panel-body widget-shadow">
                    <h4>View All User:</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Fullname</th>
                                <!-- <th>Username</th> -->
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // echo "<pre>";
                            // print_r($viewallusers['Data']);
                            // echo "</pre>";
                            $i = 0;
                            foreach ($viewallusers['Data'] as $key => $value) {
                                $i++ ?>
                                <tr>
                                    <td> <?php echo $i ?></td>
                                    <td> <?php echo $value->fullname; ?></td>
                                    <!-- <td> <?php echo $value->username; ?></td> -->
                                    <td> <?php echo $value->email; ?></td>
                                    <td> <?php echo $value->phone; ?></td>
                                    <td> <?php echo $value->gender; ?></td>
                                    <td>
                                        <?php if ($value->role_id == 2) { ?>
                                            <button class="btn btn-success"> <a href="edituser?userid=<?php echo $value->id; ?>">Edit</a></button>
                                            <button class="btn btn-danger"> <a href="deleteuser?userid=<?php echo $value->id; ?>">Delete</a></button>

                                        <?php  }

                                        ?>
                                    </td>

                                </tr>

                            <?php  }

                            ?>



                        </tbody>
                    </table>


                </div>