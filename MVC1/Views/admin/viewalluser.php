<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="admindashboard">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        Users

                    </a>
                    <ul class="dropdown-toggle" class="dropdown-menu extended notification">
                        <li>
                            <a href="adduser"><i class="fa fa-user-plus" aria-hidden="true"></i>Add User</a>
                            <a href="viewalluser"><i class="fa fa-user" aria-hidden="true"></i>View All Users</a>
                        </li>
                    </ul>
                </li>

                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">

    <section class="wrapper">
    <button type="button" class="btn btn-Scondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <a href="adduser" class="text-dark" >Add User</a>  
            </button>

        <!-- //market-->
        <div class="row">

            
        </div>
        <div class="panel-body">
            <div class="col-md-12 w3ls-graph">
                <!--agileinfo-grap-->
                <div class="stats-last-agile">
                    <table class="table stats-table ">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>USERNAME</th>
                                <th>FULLNAME</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                                <th>DOB</th>
                                <th>GENDER</th>
                                <th>HOBBY</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // echo "<pre>";
                            // print_r($Alluser);
                            // echo "</pre>";
                            $i = 0;
                            foreach ($Alluser['data'] as $key => $value) {
                                $i++ ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value->username; ?></td>
                                    <td><?php echo $value->fullname; ?></td>
                                    <td><?php echo $value->email; ?></td>
                                    <td><?php echo $value->phone; ?></td>
                                    <td><?php echo $value->dob; ?></td>
                                    <td><?php echo $value->gender; ?></td>
                                    <td><?php echo $value->hobby; ?></td>
                                    <td>
                                        <!-- <?php echo $value->id; ?> -->
                                        <a href="edituser?userid=<?php echo $value->id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="deleteuser?userid=<?php echo $value->id; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>

                                    </td>
                                </tr>
                            <?php  }

                            ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
        </div>


        </div>
        <div class="clearfix"> </div>
        </div>
    </section>
    