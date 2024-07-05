<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <title>categories</title>

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
    color: whitesmoke;
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
  .table table-dark table-striped-columns{
    background-color: rgba(4, 147, 160, 0.644);
    border-radius:15px; 
  }
  thead{
    border-radius:15px; 
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
td button  {
    display: inline-block;
    vertical-align: middle;
} 





.table-container{  
    padding: 0px auto 10%;
    margin: 40px auto 0% ;
    padding-top: 3cm;
    width:80%;
   
}
.title{
    text-align: center;
    text-transform: uppercase;
}
.heading{
    font-size: 40px;
    text-align: center;
    color: #ffffff;
    margin-bottom: 40px;
}
.table{
    width: 80%;
    border-collapse: collapse;
    border-radius: 15px  15px 15px 15px ;
    overflow: hidden;
    box-shadow: 0 0 15px #03e9f4,
              0 0 15px #03e9f4,
              0 0 15px #03e9f4,
              0 0 15px #03e9f4;
}
.table thead{
    background-color:#36304a ;
    margin-block: 26px;
}
.table thead tr th{
    font-size: 20px;
    font-weight:600;
    letter-spacing: 0.35px;
    color: rgb(216, 215, 215);
    opacity: 1;
    padding: 12px;
    vertical-align: top;
    
   
}

tr:nth-child(odd){
  background-color: #5f6f8b;
}
.table tr td{
    font-size: 20px;
    font-weight: bold;
    letter-spacing: 0.35px;
    font-weight: normal;
    color: rgb(216, 215, 215);
    background-color: #0b131ca0;
    padding: 15px 14px;
    text-align: center;
       
}

  
    
  .content1{
    position: relative;
    margin: 130px auto;
    text-align: center;
    padding: 0 20px;
  }
  .content1 .text{
    font-size: 2.5rem;
    font-weight: 600;
    color: #202020;
  }
  




</style>

</head>




<body>
  @include('welcome')

   <center> <h1>categories</h1></center>
   <a href="/categotieAdd" class="btn" style="float: right; margin-right:100px">add</a>
   
    <table class="table" style="margin-top: 140px; margin-left:10%; text-align: center;">
      <thead>
          <tr>
              <th>title</th>
              <th>description</th>
              <th>user</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
        
      </tbody>
  
      @foreach ($categories as $categorie )
            
      <tr>
        <td>{{ $categorie->title }}</td>
        <td>{{ $categorie->description }}</td>
        <td>{{ $categorie->user->name }}</td>
        <td>
          <a href="/categorieEdite/{{$categorie->id}}" class="btn fas fa-edite">edit</a>
          <form id="{{ $categorie->id }}" action="{{ route('categorie.delete') }}" method="post">
            @csrf
            @method('DELETE')
            <input type="number" name="id" value="{{ $categorie->id }}" hidden>
        </form>
        <button class="btn  align-middle" type="submit"
        onclick="event.preventDefault();
        if(confirm('are you sure you want to delete this category'))
        document.getElementById({{ $categorie->id }}).submit();"
        >
          delete
        </button>
        </td>
      </tr> 
      @endforeach
   
    </table>
</div>
</body>
         
  

</html>