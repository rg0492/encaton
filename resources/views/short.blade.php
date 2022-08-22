<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />

</head>

<body>

   

<div class="container">
    <div class="card">
      <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger">
                <p>{{ Session::get('error') }}</p>
            </div>
        @endif
            <div>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No Of Visit</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{$noVisit}}</td>
                            </tr>
                    </tbody>
                </table>
            </div>
      </div>

    </div>

   

</div>

</body>

</html>