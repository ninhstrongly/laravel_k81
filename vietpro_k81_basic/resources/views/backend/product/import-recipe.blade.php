<!DOCTYPE html>
<html>
<head>
   <title>Laravel Excel</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">
   <div class="card mt-4">
       <div class="card-header">
           Import File Excel
       </div>
       <div class="card-body">
           {!! Form::open(['method' => 'POST', 'url' => 'import', 'files' => true]) !!}
               {!! Form::file('file')  !!}
               <a class="btn btn-info" href="{{ url('export') }}"> 
                Export File</a>
               {!!  Form::submit('Import File') !!}
           {!! Form::close() !!}
       </div>
   </div>
</div>
   
</body>
</html>