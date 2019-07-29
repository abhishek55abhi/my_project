<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="jquery.validate.min.js"></script>
        <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="script.js"></script>
        <title>Employee</title>
<?php include 'function.php'; ?>
    </head>
    <body>

        <div class="container">
            <span>
			<?php session_start();                    
                if(isset($_SESSION['value'])){                           
                    foreach ($_SESSION['value'] as $arr) {
                        echo $arr . "<br />";
                        unset($_SESSION['value']);
                    }
                }?>
            </span>
          
           
            <form action="<?php echo htmlspecialchars('function.php');?>" method="POST" enctype="multipart/form-data" id="acc_form" >
                
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Employee information</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                Name:<br>
                                <input type="text" name="name" value="<?php if(isset($_SESSION['data'])) { echo   $_SESSION['data']['name']; } ?>"  id="name" required="">
                                <br>
                                Email:<br>
                                <input type="email" name="email" value="<?php if(isset($_SESSION['data']['email'])) { echo   $_SESSION['data']['email']; } ?>"  id="email" required="">
                                <br><br>
                                <!--- <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Next</a>--->
                                <a class="btn btn-success next" id="first_block"  data-toggle="collapse" data-parent="#accordion" href="#collapse2" type = "submit">Next</a>


                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse">Company Information</a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">

                                Company Name:<br>
                                <input type="text" name="comp_name" id="comp_name" value="<?php if(isset($_SESSION['data']['comp_name'])) { echo   $_SESSION['data']['comp_name']; } ?>" required="" >

                                <br>
                                Address:<br>
                                <textarea name="address" id="address" required="" ><?php if(isset($_SESSION['data']['address'])) { echo   $_SESSION['data']['address']; } ?></textarea>

                                <br><br>
                                <a data-toggle="collapse" class="btn btn-primary" data-parent="#accordion" href="#collapse1">Pervious</a>
                                <a data-toggle="collapse" class="btn btn-success" data-parent="#accordion" id="second_block" href="#collapse3">Next</a>


                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse">Personal Information</a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">

                                Image:<br>
                                <input type="file" name="image" value="<?php if(isset($_SESSION['file_data']['image']['name'])) { echo   $_SESSION['file_data']['image']['name']; } ?>" id="image" accept="image/*">
                                <br>
                                signature:<br>
                                <input type="file" name="signature" value="<?php if(isset($_SESSION['file_data']['signature']['name'])) { echo   $_SESSION['file_data']['signature']['name']; } ?>" id="signature" accept="image/*" >
                                <br><br>
                                <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapse2">Pervious</a>
                                 <!--<a class="btn btn-success" data-toggle="collapse" data-parent="#accordion" id="third_block" name="submit">Submit</a> 
                                <input type="submit" name="submit" value="submit">-->
                              <!--<input type="submit" name="per_info" value="Submit" id="third_block" data-target="#confirm-submit">-->
                            </div>
                        </div>
                    </div>
                </div> 
                <?php 
                      session_destroy();
                      ?>
            </form>
        </div>
    </body>
</html>