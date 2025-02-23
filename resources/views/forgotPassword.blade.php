<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
    .form-gap {
        padding-top: 100px;
    }
    </style>
</head>
<body>
    @include('layout.message')
    @include('sweetalert::alert')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <div class="form-gap"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>You Can Reset Your Password Here.</p>
                                    <div class="panel-body">
                                        <form method="post" action="{{ route('forgotPasswordAttempt') }}" id="register-form" role="form" class="form" >
                                        @csrf
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                    <input type="email" name="email" id="email" placeholder="Email Address" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                            </div>
                                        </form>
                                        <a href="{{ route('loginPage') }}"><button class="btn btn-lg btn-danger btn-block">Cancel</button></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
	        </div>
        </div>
    </div>
</body>
</html>
