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
