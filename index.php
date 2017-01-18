<?php session_start(); ?>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>
        Add Form
    </title>
</head>
<body>
<div class="container">
    <h1>Add Form</h1>
    <div class="row col-md-6" >
        <?php
            if(isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>

        <form action="add.php" class="form" role="form" method="post">
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" class="form-control" name="first_name">
            </div>
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" class="form-control" name="last_name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="">Message</label>
                <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-info">Save</button>
            </div>

        </form>
    </div>
</div>
</body>
</html>