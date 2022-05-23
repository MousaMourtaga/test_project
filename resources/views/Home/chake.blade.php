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
<table width="100%" border="1">
    <tr>
        <td>Name</td>
        <td>id_number</td>
        <td>phone</td>
        <td>email</td>
        <td>gender</td>
        <td>age</td>
    </tr>
    @foreach($Classes as $cla)
        <td>{{$cla->name}}</td>
        <td>{{$cla->id_number}}</td>
        <td>{{$cla->phone}}</td>
        <td>{{$cla->email}}</td>
        <td>{{$cla->gender}}</td>
        <td>{{$cla->age}}</td>
    @endforeach
</table>
</body>
</html>
