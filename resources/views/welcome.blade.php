<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <title>Mpesa </title>
</head>
<body>

    <div class="container">
        <div class="row mt-5">
   <div class="col-sm-8 mx-auto">
   <div class="card">
 <div class="card-header">Obtain Access Token</div>
 <div class="card-body">
     <h4 id="acess_token"></h4>
     <button id="getAccessToken" class="btn btn-primary">Request Acess Token</button>
 </div>
   </div>
{{-- new card --}}
   <div class="card mt-5">
       <div class="card-header"> Register URLs</div>
       <div class="card-body">
           <button class="btn btn-primary">Register URL</button>
       </div>
   </div>
{{-- end of card --}}
   <div class="card mt-5">
    <div class="card-header"> Stimulate Transaction</div>
    <div class="card-body">
        <form action="">
            @csrf
      <div class="form-group">
  <label for="account">Ammount</label>
  <input type="text"name="account" class="form-control"  id="account">
      </div>
        </form>

      <div class="form-group">
  <label for="account">Account</label>
  <input type="text"name="account" class="form-control"  id="account">

      </div>
        </form>
        {{-- form --}}

        <br>
        <button class="btn btn-primary">Stimulate Payment</button>
    </div>
</div>
   </div>
        </div>
    </div>
    <script {{asset('js/app.js')}}></script>
    <script>
    //  document.getElementById('getAcessToken').addEventListener('click',(event) => {
    //      event.preventDefault();
    //      axios.post('get-token',{})
    //      .then((response) => {
    //        console.log(response.data)
    //      })
    //      .catch((error) => {
    //        console.log(error)
    //      })
    //  })

    document.getElementById('getAccessToken').addEventListener('click', (event) => {
        event.preventDefault();
        axios.post('/get-tokens')
        .then((response) => {
            console.log(response.data)
        })
        .catch((error) => {
            console.log(error)
        })

    })
    </script>
</body>
</html>
