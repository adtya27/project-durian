@extends('template.global')

@section('content')
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
                <div class="card-body px-5 py-5">
                    <h3 class="card-title text-start mb-3">Login</h3>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control p_input">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control p_input">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                        </div>
                        <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection