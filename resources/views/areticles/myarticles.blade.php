<!-- resources/views/articles/index.blade.php -->
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

    <title>my articles</title>
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
.text-button {
    background-color: transparent;
    border: none;
    color: inherit;
    cursor: pointer;
    font-family: inherit;
    font-size: inherit;
    text-decoration: underline;
}

    </style>

</head>
<body>
  @include('welcome')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>




               <center> <h1>Articles</h1></center>
               <a href="{{ route('article.create') }}" style="float: right; margin-right:100px"><button class="btn">add</button></a>



               <div class="row my-5">
                <div class="col-md-8">
                <div class="row">

                    <div class="card-deck" style="margin-left: 20%;">
               @foreach ($articles as $article)
               <?php
               
              //  dd( $article->categorie);
                             
               
               ?>
                  <div class="col-md-4 mx-auto">
                    <div class="card" style="width: 18rem;">
                <img src="https://media.discordapp.net/attachments/1006140828273610762/1062377213384736778/abdou_time_travel_b167238d-981c-47a1-a0fa-f187365c1506.png?width=562&height=562" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $article->title }}</h5>
                  <label for="">categorie</label>
                      <h6 class="card-subtitle mb-2 text-muted">{{ $article->categorie ?$article->categorie->title : 'no categorie'}}</h6>
                      <label for="">user</label>
                      <h6 class="card-subtitle mb-2 text-muted">{{ $article->user ?$article->user->name : null}}</h6>
                  <p class="card-text">{{Illuminate\Support\Str::limit($article->description, $limit = 100, $end = '...')}}</p>
                     <a href="/article/{{ $article->id }}" class="btn mr-2"><i class="fas fa-link"></i> read more</a>
                     <a href="{{  route('article.edit', ['id' => $article->id ])}}" class="btn mr-2"><i class="fas fa-edit"></i> edite</a>
                     <form id="{{ $article->id }}" action="{{ route('article.delete') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="number" name="id" value="{{ $article->id }}" hidden>
                    </form>
                    <a class="btn" >
                    <i class="fas fa-trash-alt"></i>
                    <input  type="submit" value="delete" class="text-button"
                    onclick="event.preventDefault();
                    if(confirm('are you sure you want to delete this article'))
                    document.getElementById({{ $article->id }}).submit();"
                    ></a>
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
{{ $articles->links() }}
</div>


</body>
</html>
