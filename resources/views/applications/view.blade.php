<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <h1 class="text-bold w-50 mt-5 m-auto"> Veiw Application  </h1>
    <table class="table w-75 m-auto table-bordered mt-5">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">User Name</th>
            <th scope="col">Status</th>
            <th scope="col">Resume path</th>
           
      
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        
            <tr>
              
                <td>{{ $application->id }}</td>
                <td>{{ $application->user->name }}</td>
                <td>{{ $application->status }}</td>
                <td>{{ $application->resume_file_path }}</td>

                <td><a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Back</a></td>
                
                
               
            </tr>
        



    </tbody>
</table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>
