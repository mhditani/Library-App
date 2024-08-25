<!DOCTYPE html>
<html lang="en">

  <head>

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
            <th>Book status</th>
            <th>Image</th>
            <th>Cancel Request</th>
        </tr>
        @foreach($data as $data)
        <tr>
            <td>{{$data->book->title}}</td>
            <td>{{$data->book->author_name}}</td>
            <td>{{$data->status}}</td>
            <td>
                <img class="book_img" src="book/{{$data->book->book_img}}" alt="">
            </td>
            <td>
                @if($data->status == 'Pending')
                <a class="btn btn-danger" href="{{url('cancel_req',$data->id)}}">Cancel</a>
                @else
                <p style="color: white; font-weight: bold;">Not Allowed</p>
                @endif
            </td>
        </tr>
        @endforeach
    </table>


    </div>
 </div>   
</div>



@include('home.footer')

  </body>
</html>