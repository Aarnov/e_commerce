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
<form action="{{action([\App\Http\Controllers\PagesController::class,'storage_categories'])}}" method="post">
    @csrf
    <label>Name</label>
    <input type="text" name="xyz" required>
    <button type="submit">Create</button>
</form>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>


    @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>

            <td><a href="{{url('edit_category/'.$category->id)}}">edit</a></td>
            <td><a href="{{url('delete_category/'.$category->id)}}">delete</a></td>
        </tr>
    @endforeach
</table>
</body>
</html><?php
