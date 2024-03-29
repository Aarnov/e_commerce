




    <!doctype html>
<html lang="en">
<head><title>Log in</title>
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
                <h2>Log in Form</h2>
            </div>
            <div class="card-body">
                <form action="{{action([\App\Http\Controllers\PagesController::class,'loginForm'])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"  name="password" class="form-control" id="password" placeholder="">
                    </div>
                    </br>
                    <button type="submit" class="btn btn-secondary w-100">Log in</button>
                </form>
                <div class="card-footer text-center">
                    <small>Dont have an account yet?<A href="{{url('/signup')}}">Click here</A> </small>
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
