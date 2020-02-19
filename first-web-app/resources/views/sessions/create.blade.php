@extends('layouts.layout')

@section('content')

<div class="col-sm-8">

    <h1>Sign In</h1>
    <form action="/login" method="post" onsubmit="return validateLogin()" id="loginForm">
        {{ csrf_field() }}
        {{-- @csrf --}}
         <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" class="form-control" name="email" id="email" required>
            <span id="emailError"></span>
        </div>

{{--         <div class="form-group">--}}
{{--            <label for="username">Username</label>--}}
{{--            <input type="text" class="form-control" name="username" id="username" required>--}}
{{--             <span id="usernameError"></span>--}}
{{--        </div>--}}

        <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" class="form-control" name="password" id="password" required>
            <span id="passwordError"></span>
        </div>

        <div class="form-group">
            {{-- <button type="submit" class="btn btn-primary" id="submit">Submit</button> --}}
            <button type="submit" class="btn btn-primary" id="login">Login</button>
        </div>
    </form>

    @include('layouts.errors')
</div>

<script>
    //$(document).ready(function(){
        function validateLogin(){
            //console.log(email);
			var email = $("#email").val();
            var password= $("#password").val();
            var username = $("#username").val();
			var loginFlag = 0;
//            alert("hi");


			/*if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))){
				$("#emailError").text("Please provide a valid email address");
				loginFlag = 1;
            }*/

			//alert("hi2");

			if(!(/^\w{1,30}$/.test(username))){
                $("#usernameError").text("Please provide a valid username");
                loginFlag = 1;
            }

			if(!(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#\$%\^&\*]).{8,22}$/.test(password))){
				$("#passwordError").text("Please provide the password according to specified criteria");
				loginFlag = 1;
            }
            
            if(loginFlag == 1){
                return false;
            }else{
                return true;
            }

        }
    //});


    $(document).ready(function() {
//        $("#email").focus(function () {
//            $("#emailError").text("");
//        });

        $("#username").focus(function () {
            $("#usernameError").text("");
        });

        $("#password").focus(function () {
            $("#passwordError").text("");
        });
    });
    
</script>
@endsection