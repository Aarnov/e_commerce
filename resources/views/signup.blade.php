

<!doctype html>
<html lang="en">
<head><title>signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<style>


</style>
</head>
<body>
<div class="container-fluid vh=100">
    <div class="row justify-content-center vh-100">
        <div class="card w-25 my-auto shadow">
            <div class="card-header text-center bg-primary text-white w-1000">
                <h2>Register Form</h2>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="{{action([\App\Http\Controllers\PagesController::class,'signupForm'])}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email"  name="email" class="form-control" id="email" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"  name="password" class="form-control" id="password" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password"  name="confirm_password" class="form-control" id="confirm_password"
                               placeholder=""></br>
                    </div>
                    <button type="submit" class="btn btn-secondary w-100">Sign Up</button>
                </form>
            <div class="card-footer text-center">
                <small>Already signed up?<a href="{{url('/')}}">Click here</a></small>
            </div>
                <div class="card-footer text-center">
                    <small>&copy;Aarnov Adhikari</small>
                </div>
            </div>
        </div>
    </div>


</div>
</body>
</html>
