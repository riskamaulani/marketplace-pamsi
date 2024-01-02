@extends('layouts.auth-layout', [
    'title' => 'Login',
])

@section('content')
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="" />
                            </a>
                        </div>
                        <!-- End Logo -->

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-1">
                                    <div class="text-center pb-1">
                                        <img src="assets/img/pamsi.jpeg" alt="pamsi" height="50rem" width="auto">
                                    </div>
                                    <h5 class="card-title text-center pa-0 fs-4 ">
                                        Login
                                    </h5>
                                </div>

                                <form action="{{ route('login') }}" method="POST" class="row g-3 needs-validation"
                                    novalidate>
                                    @csrf

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" name="username" class="form-control" id="yourUsername"
                                                required />
                                            <div class="invalid-feedback">
                                                Please enter your username.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword"
                                            required />
                                        <div class="invalid-feedback">
                                            Please enter your password!
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true"
                                                id="rememberMe" />
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">
                                            Login
                                        </button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">
                                            Don't have account?
                                            <a href="{{ route('registerpage') }}">Create an account</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection()
