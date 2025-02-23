<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
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
                                <h2 class="text-center">Reset Password</h2>
                                <p>Reset Your Password Here</p>
                                    <div class="panel-body">
                                        <form method="post" action="{{ route('resetpasswordAttempt') }}" id="register-form" role="form" class="form" >
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                                                    <input type="password" name="password" id="email" placeholder="Enter Password" class="form-control" required>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                                                    <input type="password" name="password_confirmation" id="email" placeholder="Confirm Password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Submit" type="submit">
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

