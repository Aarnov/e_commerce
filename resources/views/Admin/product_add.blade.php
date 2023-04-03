<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/slick.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/slick-theme.css')}}"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/nouislider.min.css')}}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<body>
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">

                <li><a href="{{url('/login')}}"><i class="fa fa-user-o"></i> My Account</a></li>
            </ul>
        </div>
    </div>
</header>

<form action ="{{action([\App\Http\Controllers\PagesController::class,'storage_product'])}}" method="post" enctype="multipart/form-data">
    @csrf
    <label>Name</label>
    <input type="text" name="name" required>



    <label>Category</label>

    <select name="category" id="category">
        @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach

    </select>

    <label>Description</label>
    <input type="text" name="description" required>
    <label>Price</label>
    <input type="text" name="price" required>
    <label> Image </label>
    <input type="file" name="image" >
    <input type="submit">

</form>
<table border="1">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Category</td>
        <td>Price</td>
        <td>Description</td>
        <td>Image</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>


    @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->category}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->description}}</td>
            <td><img src="{{asset($product->image)}}" height="100" width="100"></td>

            <td><a href="{{url('edit_product/'.$product->id)}}">edit</a></td>
            <td><a href="{{url('delete_product/'.$product->id)}}">delete</a></td>
        </tr>
    @endforeach
</table>

</body>
</html>
