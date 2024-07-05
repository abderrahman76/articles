<!-- resources/views/categories/index.blade.php -->
<?php
use App\Http\Controllers\ArticlesController;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'><link rel="stylesheet" href="./style.css">

    <title>my categories</title>
    <style>
        html {
    height: 100%;
  }
  body {
    margin:0;
    padding:0;
    font-family: sans-serif;
    background: linear-gradient(#141e30, #243b55);
    background-attachment: fixed;
    overflow-x: hidden;
       
  }
  h1 {
    margin: 0 0 30px;
    padding: 0;
    color: #fff;
    text-align: center;
  }
  :root {
  --gradient: linear-gradient(to left top, #03e9f4 10%, #243b55 90%) !important;
}


.card {
  background: #222;
  border: 1px solid #03e9f4;
  color: rgba(250, 250, 250, 0.8);
  margin-bottom: 2rem;
}
  .card:hover{
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 5px #03e9f4,
              0 0 5px #03e9f4,
              0 0 5px #03e9f4;

}
.btn {
  border: 5px solid;
  border-image-slice: 1;
  background: var(--gradient) !important;
  -webkit-background-clip: text !important;
  -webkit-text-fill-color: transparent !important;
  border-image-source:  var(--gradient) !important; 
  text-decoration: none;
  transition: all .4s ease;
}

.btn:hover, .btn:focus {
      background: var(--gradient) !important;
  -webkit-background-clip: none !important;
  -webkit-text-fill-color: #fff !important;
  border: 5px solid #03e9f4 !important; 
  box-shadow: #222 1px 0 10px;
  text-decoration: underline;
}
    </style>

</head>
<body>
  @include('welcome')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>




               <center> <h1>categories</h1></center>
               <a href="{{ route('index') }}"><button class="btn">articles</button></a>



               <div class="row my-5">
                <div class="col-md-8">
                <div class="row">

                    <div class="card-deck" style="margin-left: 20%;">
               @foreach ($categories as $categorie)
               <?php
               
            
                             
               
               ?>
                  <div class="col-md-4 mx-auto">
                    <div class="card" style="width: 18rem;">
                <img src="https://media.discordapp.net/attachments/1006140828273610762/1062130029418520606/abdou_logo_of_art_page_on_Instagram_named_AK_ARTS_purple_and_bl_bcaf7e3f-898f-4a7c-a280-32100d1bc27d.png?width=562&height=562" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $categorie->title }}</h5>
                      <label for="">user</label>
                      <h6 class="card-subtitle mb-2 text-muted">{{ $categorie->user ?$categorie->user->name : null}}</h6>
                  <p class="card-text">{{Illuminate\Support\Str::limit($categorie->description, $limit = 100, $end = '...')}}</p>
                     <a href="{{ route('showcategorie', $categorie->id) }}" class="btn mr-2"><i class="fas fa-link"></i> read more</a>
                </div>
                </div>
                  </div> 
              <!-- partial -->
              @endforeach
                    </div>

            </div>
        </div>
    </div>

<div class="d-flex justify-content-center">
{{ $categories->links() }}
</div>


</body>
</html>
