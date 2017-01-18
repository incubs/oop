<?php

include 'vendor/autoload.php';

$user = new User();
$users = $user->getAll();

?>
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
        <table class="table table-responsive table-bordered">
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Message</td>
            </tr>
            <?php foreach ($users as $user ){ ?>
            <tr>
                <td><?php echo $user->getName(); ?></td>
                <td><?php echo $user->getEmail();?></td>
                <td><?php echo $user->getMessage();?></td>
                <?php } ?>
            </tr>
        </table>
    </div>

</div>
</body>
</html>
