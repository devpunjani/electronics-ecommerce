@extends('layout')

@section('title')
    Contact Us
@endsection

@section('contact')
    active
@endsection

@section('style-link')
<link rel="stylesheet" href="{{ asset('css/style1.css') }}">
@endsection

@section('content')
   <!-- Contact Us -->
   <div>
      <div class="brand_color">
         <div class="container">
            <div class="row">
                  <div class="col-md-12">
                     <div class="titlepage">
                        <h2>Contact Us</h2>
                     </div>
                  </div>
            </div>
         </div>
      </div>

      <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="main_form" action="{{ route('contactAttempt') }}" method="post">
                        @csrf
                        <div class="row">
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                              <input class="form-control" placeholder="Name" type="text" name="name">
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                              <input class="form-control" placeholder="Email" type="email" name="email">
                           </div>
                           <div class=" col-md-12">
                              <input class="form-control" placeholder="Phone" type="text" name="phone">
                           </div>
                           <div class="col-md-12">
                              <textarea class="textarea" placeholder="Message" name="message"></textarea>
                           </div>
                           <div class=" col-md-12">
                              <input type="submit" class="send" style="border: 0px; border-radius: 40px;font-size: x-large;">
                           </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
   </div>
@endsection
