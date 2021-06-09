<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="/cms/css/bootstrap.min.css" rel="stylesheet">

    <link href="/cms/css/blog-home.css" rel="stylesheet">

</head>

<body>


    <div class="container">

        <div class="form-gap"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">


                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>You can reset your password here.</p>
                                <div class="panel-body">




                                    <form id="register-form" role="form" autocomplete="off" class="form" action="ee_reset_mail.php" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="email" placeholder="email address" class="form-control" type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="forgot" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit" style="background-color: green ;">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                    </form>

                                </div><!-- Body-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <hr>


    </div> <!-- /.container -->