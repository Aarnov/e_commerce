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
<a href="{{url('/create')}}"><button>Create</button></a>
<table border="1">
    <tr>
        <th>Name</th>
        <th>DOB</th>
        <th>Address</th>
    </tr>


    @foreach($students as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->dob}}</td>
            <td>{{$student->address}}</td>
            <td><img src="{{asset($student->image)}}" height="100" width="100"></td>
            {{--            <td><img src=""{{asset($student->image)}}"/></td>--}}
            <td><a href="{{url('edit/'.$student->id)}}">edit</a></td>
            <td><a href="{{url('delete/'.$student->id)}}">delete</a></td>
        </tr>
    @endforeach
</table>
</body>
</html><?php
