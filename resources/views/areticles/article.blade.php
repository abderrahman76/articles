<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'><link rel="stylesheet" href="./style.css">

    <title>article</title>
 <style>/* Styles for the <article> element */
       html {
    height: 100%;
  }
  body {
    margin:0;
    color: #f7f7f7;
    padding:0;
    font-family: sans-serif;
    background: linear-gradient(#141e30, #243b55);
    background-attachment: fixed;
    overflow-x: hidden;
       
  }
  .centered-div {
    position:absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(34, 59, 101, 0.733); /* White with 90% opacity */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 15px #03e9f4,
              0 0 15px #03e9f4,
              0 0 15px #03e9f4,
              0 0 15px #03e9f4;
  }
  
label {
    display: block;
    margin-top: 20px;
}

p {
    margin-top: 20px;
    padding: 10px;
    font-size: 18px;
    border: 2px solid #ccc;
    border-radius: 5px;
    background-color: #f7f7f700;
}

.btn {
  color: #ccc;
  text-decoration: none;
  border: 5px solid;
  border-image-slice: 1;
  background: var(--gradient) !important;
  -webkit-background-clip: text !important;
  -webkit-text-fill-color:  #ccc!important;
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
@include('welcome')
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <div class="centered-div">
    <article>
        <label for="">title</label>
        <h2>{{ $article->title }}</h2>
        <label for="">description</label>
        <p>{{ $article->description }}</p>
        <label for="">categorie</label>
        <h5>{{ $article->categorie->title }}</h5>
        <label for="">user</label>
        <h4>{{ $article->user->name }}</h4>
        <a href="/articles" class="btn">go back</a>
    </article>
</div>
</html>