<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"/>
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"/>
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
    rel="stylesheet"/>
</head>
<body style="background-image: url('images/registerbg.jpg') ;background-color: #cccccc;">
    <section class="vh-100">
        <div class="container h-100" >
          <div class="row d-flex justify-content-center align-items-center h-100" >
            <div class="col-lg-12 col-xl-11" >
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-3" >
                  <div class="row justify-content-center" >
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1" style="padding-left: 60px;" >

                      <p class="text-center h2 fw mb-5 mx-1 mx-md-4 mt-4">Register</p>

                  <form class="mx-1 mx-md-4" method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" id="form3Example1c" name="name" class="form-control" value="{{ old('name') }}" />
                            <label class="form-label" for="form3Example1c">Name</label>
                          </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="number" id="form3Example1c" name="phone" class="form-control" value="{{ old('phone') }}"/>
                            <label class="form-label" for="form3Example1c">Phone Number</label>
                          </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                              <input type="text" id="form3Example1c" name="email" class="form-control" value="{{ old('email') }}"/>
                              <label class="form-label" for="form3Example1c" id="labelEmail">Email ID</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-location fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                              <textarea placeholder="Address" name="address" id="form3Example1c" class="form-control" value="{{ old('address')}}" style="width:330px;"></textarea>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" id="form3Example4c" name="password" class="form-control" />
                            <label class="form-label" for="form3Example4c">Password</label>
                          </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" id="form3Example4cd" class="form-control" name="password_confirmation" />
                            <label class="form-label" for="form3Example4cd">Confirm Password</label>
                          </div>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>

                    </div>

                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2" style="padding-left: 275px;">
                      <div>
                        <h5 style="padding-left: 40px;padding-bottom:10px;"> Upload Profile Photo</h5>
                        <div class="d-flex justify-content-right mb-4">
                            <img src="{{asset('images\registerimage.jpg')}}" id="photo" class="rounded-circle" alt="Photo" style="width: 230px;height: 200px;object-fit:fill;"/>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-primary btn-rounded">
                                <label class="form-label text-white m-1" for="customFile2">Choose Photo</label>
                                <input type="file" class="form-control d-none" id="customFile2" onchange="loadPhoto(event)" name="photourl"/>
                            </div>
                        </div>

                      </div>
                      </div>
                    </div>
                  </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>

    <script>
    var loadPhoto = function(event) {
        var image = document.getElementById('photo');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    </script>

</body>
</html>






