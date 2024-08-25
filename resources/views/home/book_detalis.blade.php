<!DOCTYPE html>
<html lang="en">

  <head>
<base href="/public">
@include('home.css')

<style type="text/css">
.tabe_deg
{
    border: 1px solid white;
    margin: auto;
    text-align: center;
    margin-top: 100px;
}

th
{
    background-color: skyblue;
    color: white;
    font-weight: bold;
    font-size: 18px;
    padding: 10px;
}

td
{
    color: white;
    background-color: black;
    border: 1px solid white;
}

.book_img
{
    height: 120px;
    width: 80px;
    margin: auto;
}


</style>
<!--

TemplateMo 577 Liberty Market

https://templatemo.com/tm-577-liberty-market

-->
  </head>

<body>

@include('home.header')


<div class="currently-market">
 <div class="container">
    <div class="row">

    @if(session()->has('message'))

    <div style="margin-top: 100px;" class="alert alert-success">
          <button type="button" class="close" aria-hidden="true" data-bs-dismiss="alert">x</button>
    </div>
    @endif


    <table class="tabe_deg">
        <tr>
            <th>Book Name</th>
            <th>Author Name</th>
            <th>Book Image</th>
            <th>Author Image</th>
            
        </tr>
       
        <tr>
            <td>{{$data->title}}</td>
            <td>{{$data->author_name}}</td>
            <td>
                <img class="book_img" src="book/{{$data->book_img}}" alt="">
            </td>
            <td>
                <img class="book_img" src="author/{{$data->author_img}}" alt="">
            </td>
           
        </tr>
       
    </table>


    </div>
 </div>   
</div>



@include('home.footer')

  </body>
</html>