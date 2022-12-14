<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past papers</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_resources.css' ?> ">
</head>

<body>
    <?php include_once "components/alerts/rc_delete_alert.php"?>

    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_2.php" ?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL . 'rcSubjects' ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL . 'rcProfile' ?>">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1><?php echo "Grade ".$_SESSION['gname']." - ".ucfirst($_SESSION['sname']) ?></h1>
                    <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / past papers</h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h1>PAST PAPERS</h1>
                        <a href="">
                            <div class="rc-add-btn">
                                Add Pastpaper
                            </div>
                        </a>
                    </div>

                    <div class="rc-resource-table">
                        <div class="rc-pp-row rc-table-title">
                            <div class="rc-resource-col">Pastpaper</div>
                            <div class="rc-resource-col">year</div>
                            <div class="rc-resource-col">Part</div>
                            <div></div>
                        </div>
                        <?php
                            if(!empty($data)){
                                foreach ($data as $row) {
                                    echo "<div class='rc-pp-row'>
                                                <div class='rc-resource-col'>".$row['name']."</div>
                                                <div class='rc-resource-col'>".$row['year']."</div>
                                                <div class='rc-resource-col'>".$row['part']."</div>                       
                                                <div class='rc-quiz-row-btns'>
                                                    <button onclick='delConfirm(".$row['id'].",3)'>
                                                        <img src='".BASEURL."assets/icons/icon_delete.png' alt=''>
                                                    </button>
                                                    <button>
                                                        <img src='".BASEURL."assets/icons/icon_edit.png' alt=''>
                                                    </button>
                                                </div>
                                            </div>";
                                }
                            }
                        ?>
                    </div>
                </div>
        </div>
    </section>
</body>
<script src="<?php echo BASEURL . '/public/javascripts/rc_alert_control.js' ?>"></script>
</html>