 <!-- Side navigation -->
 <div class="sidenav text-center">
     <?php
        include_once "../config/dbcon.php";
        $sql = "SELECT * FROM `tbl_logo` WHERE `logoid` = 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch the logo data
            $row = $result->fetch_assoc();
        ?>
         <a class="" href="#">
             <img src=".././uploads/<?php echo $row["Logo"]; ?>" alt="" height="60">
         </a>
     <?php  } ?>
     <hr class="hr-custom">
     <a href="users_mgt.php" data-bs-toggle="tooltip" data-bs-placement="right" title="Users Management"><i class="fa-solid fa-users"></i></a>
     <a href="cms.php" data-bs-toggle="tooltip" data-bs-placement="right" title="Content Management"><i class="fas fa-grip-horizontal text-primary"></i></a>
     <a href="enrollmentSystem.php" data-bs-toggle="tooltip" data-bs-placement="right" title="Digital Enrollment"><i class="fa-solid fa-file text-success"></i></a>
     <a href="class.php" data-bs-toggle="tooltip" data-bs-placement="right" title="Classroom"><i class="fas fa-chalkboard-teacher text-info"></i></a>
     <a href="inbox.php" data-bs-toggle="tooltip" data-bs-placement="right" title="Inbox"><i class="fa-solid fa-envelope text-warning"></i></a>

     <a class="bottom-icon" href="#" data-bs-toggle="modal" data-bs-target="#LogoutModal"><i class="fa-solid fa-right-from-bracket text-danger"></i></a>

 </div>

 <!-- Modal in logout-->
 <div class="modal fade text-start" id="LogoutModal" tabindex="-1" aria-labelledby="LogoutModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-body text-center py-5">
                 <h5>Are you sure to logout?</h5>
                 <a type="button" href="../index.php" class="btn btn-success rounded-pill">Yes</a>
                 <button type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal" aria-label="Close">No</button>
             </div>
         </div>
     </div>
 </div>