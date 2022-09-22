<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body class="mb-5">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container ">
            <div>
          <p>Workspace <br> Infotech </p>
          </div>
          <div class="d-flex justify-content-center">
          <a class="nav-link btn btn-outline-success" href="{{route('logout')}}">LogOut</a>
     
          </div>
        </div>
    </nav>
<br>
@if(Session::has('error'))
<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
   {{session::get('error')}}
  </div>
</div>

@endif
<br>
<h1 class="text-center text-dark">Welcome {{Auth::guard('admin')->user()->name}}</h1>

<br>
<br>
    <table class="table table-hover">
 
<tr class="table-dark  " >

   <th class="text-white text-uppercase fw-bold">Admin id</th>
   <th class="text-white text-uppercase fw-bold">Name</th>
   <th class="text-white text-uppercase fw-bold">Email</th>
 
</tr>


<tr class=" table-success ">
            <td>{{Auth::guard('admin')->user()->id}}</td>
      
            <td>{{Auth::guard('admin')->user()->name}}</td>
      
            <td>{{Auth::guard('admin')->user()->email}}</td>
           
        </tr>
     
   

        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
       <center>

</center> 
</body>
</html>