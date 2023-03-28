
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action ="{{action([\App\Http\Controllers\PagesController::class,'update_category'])}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$category->id}}">
    <label>Name</label>
    <input type="text" name="name" value="{{$category->name}}" required>

    <input type="submit">

</form>
</body>
</html>
