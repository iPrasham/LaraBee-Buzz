@extends('layouts.layout')

@section('content')
    
    <div class="col-sm-8">

        <h1>Register</h1>
        <form action="/register" method="POST" onsubmit="return validateRegister()">
            
            {{ csrf_field() }}

            <div class="form-group">
              <label for="name">Name: </label>
              <input type="text" class="form-control" name="name" id="name" required>
                <span id="nameError"></span>
            </div>

{{--            <div class="form-group">--}}
{{--              <label for="name">Username: </label>--}}
{{--              <input type="text" class="form-control" name="username" id="username" required>--}}
{{--                <span id="usernameError"></span>--}}
{{--            </div>--}}

            <div class="form-group">
              <label for="email">Email: </label>
              <input type="email" class="form-control" name="email" id="email" required>
                <span id="emailError"></span>
            </div>

            <div class="form-group">
              <label for="password">Password: </label>
              <input type="password" class="form-control" name="password" id="password" required>
                <span id="passwordError"></span>
            </div>

            <div class="form-group">
              <label for="password_confirmation">Confirm Password: </label>
              <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                <span id="passwordConfirmError"></span>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="register">Submit</button>
            </div>
            
            @include('layouts.errors')

        </form>

    </div>

     <script>
          function validateRegister(){

              var name= $("#name").val();
              var email = $("#email").val();
              var password= $("#password").val();
              var password_confirmation = $("#password_confirmation").val();
              var username = $("#username").val();

              var registerFlag = 0;

                if(!(/^[A-Z]{1}[a-zA-Z\s]{1,50}$/.test(name))){
                  $("#nameError").text("Please provide a valid name");
                  registerFlag = 1;
                }

                if(!(/^\w{1,30}$/.test(username))){
                  $("#usernameError").text("Please provide a valid username");
                  registerFlag = 1;
                }

                if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))){
                  $("#emailError").text("Please provide a valid email address");
                  registerFlag = 1;
                }

                if(!(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#\$%\^&\*]).{8,22}$/.test(password))){
                  $("#passwordError").text("Please provide the password according to specified criteria");
                  registerFlag = 1;
                }

                if(password != password_confirmation){
                    $("#passwordConfirmError").text("Passwords mismatch");
                }

              if(registerFlag == 1){
                  return false;
              }else{
                  return true;
              }
          }


          $(document).ready(function () {
              $("#name").focus(function () {
                  $("#nameError").text("");
              });

              $("#username").focus(function () {
                  $("#usernameError").text("");
              });

              $("#email").focus(function () {
                  $("#emailError").text("");
              });

              $("#password").focus(function () {
                  $("#passwordError").text("");
              });

              $("#password_confirmation").focus(function () {
                  $("#passwordConfirmError").text("");
              });
          });

    </script>



@endsection