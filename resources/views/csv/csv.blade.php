<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Import CSV</title>
  </head>
  <body>
      <div class="container m-auto">
          <h1>Import CSV</h1>
          <form action="{{url('/excelUpload')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <div style="max-width: 20rem">
                <label for="csvFile">Import CSV to make QR</label>
                <input type="file" class="form-control-file border p-1" id="csvFile" name="csvFile" accept=".csv" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
          </form>

          
          <div class="table-section mt-5" style="max-width: 40rem">
            <table class="table border table-striped">
              <thead>
                <tr>
                  <th>File Name</th>
                  <th>Action</th>
                  <th>Geting</th>
                </tr>
              </thead>
              <tbody>

                @if ( count($data) < 0 )
                    <h4>No File found</h4>
                @else
                @foreach($data as $file)
                <tr>
                  <td>{{$file}}</td>
                  <td>
                    <a name="" id="" class="btn btn-primary" href="{{ url('makeqr', $file) }}" role="button">Make QR</a>
                  </td>

                  <td>
                    <a name="" id="" class="btn btn-secondary" href="{{ url('downloadZip', $file) }}" role="button">Download</a>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>

          </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>