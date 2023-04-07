
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="./assetku/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    @if(session('message'))
                                    <div class="alert alert-success">
                                        {{session('message')}}
                                    </div>
                                    @endif
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="{{ route("do.register") }}" method="POST">
                                        @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input  class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="nameHelp" type="text"  />
                                                        <label for="name">Name</label>
                                                        @error('name')
                                                        <div id="nameHelp" class="form-text">{{ $message }}</div>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control @error('user_name') is-invalid @enderror" name="user_name" id="user_name" aria-describedby="user_nameHelp" type="text" />
                                                        <label for="user_name">User Name</label>
                                                        @error('user_name')
                                                        <div id="user_nameHelp" class="form-text">{{ $message }}</div>
                                                    @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="email" aria-describedby="emailhelp" />
                                                <label for="email">Email address</label>
                                                @error('emailhelp')
                                                        <div id="email" class="form-text">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control @error('password') is-invalid @enderror" name="password" id="password" type="password"  />
                                                        <label for="password">Password</label>
                                                        @error('password')
                                                        <div id="password" class="form-text">{{ $message }}</div>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" type="password"/>
                                                        <label for="password_confirmation">Confirm Password</label>
                                                        @error('password_confirmation')
                                                        <div id="password_confirmation" class="form-text">{{ $message }}</div>
                                                    @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary w-100">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.html">Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Sholeh-Budi-Utomo</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./assetku/js/scripts.js"></script>
    </body>
</html>
