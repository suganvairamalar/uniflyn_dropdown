<!DOCTYPE html>
<html>
<head>
    <title>Import/Export Excel to database</title>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
</head>
 
<body>
    
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Import Excel to database
        </div>
            
        <div class="card-body">
            <form action="{{ url('city_import_excel') }}" method="POST" name="cityimportform" enctype="multipart/form-data">
                @csrf
                <input type="file" name="city_import_file" class="form-control">
                <br>
                <button class="btn btn-success">Import File</button>
                <a class="btn btn-info" href="{{ url('city_export_excel') }}"> 
                 Export File</a>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">City Data</h3>
            </div>
            
           
            <div class="panel-body">
               <div class="table-responsive">
                @if(!empty($cities))
                  <table class="table table-bordered table-striped">
                     <tr>
                        <th>City Name</th>
                        <th>State Id</th>
                        
                        
                     </tr>
                     @foreach($cities as $c)
                     <tr>
                        <td>{{ $c->city_name }}</td>
                        <td>{{ $c->state_id }}</td>
                        
                     </tr>
                     @endforeach
                  </table>
                  @else
                  <div class="alert alert-alert">Start Adding to the Database.</div>
                  @endif
                 {!! $cities->links() !!}
               </div>
            </div>
         </div>
    
 
</div>
    
</body>
</html>