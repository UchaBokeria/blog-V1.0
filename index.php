<?php session_start();?>
<?php include_once "require.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vulventempel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.0.0/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='plugins/datePicker/build/css/bootstrap-datetimepicker.min.css'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="plugins/jQuery/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
    <script src="plugins/datePicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <!--  icons -->
    <?php echo $require_icons; ?>
    <!-- fonts-->
    <?php echo $require_fonts; ?>
    <!--  css -->
    <?php echo $require_css; ?>
    <!-- plugins-->
    <?php echo $require_plugins; ?>
</head>
<body>
    <?php require_once $root; ?>
</body>
    <?php echo $require_js; ?>
</html>