<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($mahasiswa as $data)
        <h4>{{$data->nama}}</h4>
             <h4>Hobi :
               @foreach ($data ->hobi as $val)
                   <small>{{$val->hobi}}</small>
               @endforeach
        </h4>
        <h4>
            <li>
                Nama Wali : <strong>{{$data->wali->nama}}</strong>
            </li>
            <li>
                Dosen Pembimbing : <strong>{{$data->dosen->nama}}</strong>
            </li>
            </h4>
        <hr>
    @endforeach
</body>
</html>
