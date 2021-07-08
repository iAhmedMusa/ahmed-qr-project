<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Fetch API Development</title>
</head>

<body>
  <div class="container">

    <div id="resutl"></div>

    <div id="inputCase" class="mt-5 md-6">
      <form action="" method="post">
        @csrf
        <div class="form-group">
          <div class="row">
            <div class="col">
              <label for="fname">Your First Name</label>
              <input type="text" class="form-control" name="fname" id="fname" aria-describedby="helpId" placeholder="" required>
              <small id="helpId" class="form-text text-muted">Give your name for helping fetch API development</small>
            </div>

            <div class="col">
              <label for="lname">Your Last Name</label>
              <input type="text" class="form-control" name="lname" id="lname" aria-describedby="helpId" placeholder="" required>
              <small id="helpId" class="form-text text-muted">Give your name for helping fetch API development</small>
            </div>
          </div>
          <button type="button" id="send" class="btn-block btn-primary">Submit</button>
        </div>
      </form>
    </div>


  </div>

  <script>
    // fetch('/fetchapi')
        //     .then(res => res.json())
        //     .then(data => {
        //       console.log(data)
        //       document.getElementById('resutl').innerHTML = `
        //       <h5>Name: Mr. ${data.fName} ${data.lName}</h5>
        //       <h5>Age: ${data.age}</h5>
        //       <h5>Phone: ${data.phone}</h5>
        //       <h5>Flate#${data.address.flate}, House#${data.address.house}, Road#${data.address.road}, Block#${data.address.block}</h5>
              

        //       `
        //     })

        document.querySelector('#send').addEventListener('click', function() {
    let first_name = document.getElementById('fname').value;
    let last_name = document.getElementById('lname').value;
    const csrf_token = document.head.querySelector('meta[name="csrf-token"]').content;
    // const token = document.head.querySelector('input[name="_token"]').value;
    console.log(first_name + ' ' + last_name + ' Token: ' + csrf_token)

    let people = {
        id: 5,
        first_name: first_name,
        last_name: last_name
    }
    fetch('/fetchapi', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-TOKEN": csrf_token
            },
            body: JSON.stringify(people),
        })
        .then(res => res.json())
        .then(data => console.log(data))
        .catch(e => console.log('has error: ' + e))
})
  </script>
</body>

</html>