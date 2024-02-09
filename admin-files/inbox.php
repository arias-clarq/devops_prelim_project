<?php include 'admin-includes/header.php'; ?>

<!-- Page content -->
<div class="main">

    <div class="container-fluid border my-4 p-3">
        <div class="container">
            <h1>Inbox</h1>
            <!-- inbox messages -->
            <div class="container">
                <?php
                if (isset($_SESSION['message'])) {
                    ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>
                            <?= $_SESSION['message'] ?>
                        </strong>
                    </div>
                    <?php
                }
                unset($_SESSION['message']);
                ?>
            </div>
            <div class="table-responsive-xxl">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sender</th>
                            <th>Email Address</th>
                            <th>Date and Time</th>
                            <th style="width:180px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $showMsg = "SELECT * FROM `tbl_inbox`";
                        $result = $conn->query("$showMsg");
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {
                            //show ouput here
                            ?>
                            <tr <?php if ($row['status'] == 1) {
                                echo "style='background-color: #ddd'";
                            } ?>>
                                <td>
                                    <?= $count ?>
                                </td>
                                <td><?php echo $row['sender'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td>
                                    <button class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                                        data-bs-target="#OpenInboxModal<?= $row['inboxID'] ?>">
                                        Open
                                    </button>
                                    <button class="btn btn-danger rounded-pill" data-bs-toggle="modal"
                                        data-bs-target="#DeleteInboxModal<?= $row['inboxID'] ?>">
                                        Delete
                                    </button>
                                    <?php include 'admin-includes/cms-openInbox-modal.php'; ?>
                                    <?php include 'admin-includes/deletes-modal/inbox.php'; ?>
                                </td>
                            </tr>
                            <?php $count++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php include 'admin-includes/footer.php'; ?>