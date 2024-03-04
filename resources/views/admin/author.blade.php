<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style>
        .div_center{
            text-align: center;
            margin:auto;
        }
        .auth_label{
            font-size:30px;
            font-weight:bold;
            padding: 30px;
            color:white;
        }
        .center{
          margin:auto;
          text-align: center;
          width: 50%;
          margin-top:50px;
          border:1px solid white;
        }
        th{
          background-color: #f2f2f2; /* Light gray background */
          padding: 10px;
        }
        tr{
          border:1px solid white;
          padding: auto;
        }
    </style>
  </head>
  <body>
    <header class="header">
    @include('admin.header')

    </header>
    <div class="d-flex align-items-stretch">
      @include('admin.side_bar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="div_center">
<div>
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{ session()->get('message') }}
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
    </div>
    @endif
</div>

<h1 class="auth_label">Add author</h1>

<form action="{{url('add_author')}}" method="post">
    @csrf
    @method('POST')
<label class="h6" for="">Author Name</label>
<input type="text" name="author_name" required>
<label class="h6" for="">Number of books</label>
<input type="text" name="num_books" required>

<input class="btn btn-primary ml-2" type="submit" value="Add author">
</form>

<div>
  <table class="center">
    <tr>
      <th>Author</th>
      <th>number of books</th>
      <th>Action</th>
    </tr>
    @foreach($data as $data)
    <tr>
      <td>{{$data->author_name}}</td>
      <td>{{$data->num_books}}</td>
      <td>
      <a href="{{url('author_edit', $data->id)}}" class="btn btn-info">Update</a>
    <a href="{{url('author_delete', $data->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this author?')">Delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>


</div>
</div>
</div>
</div>
      @include('admin.footer')

  </body>
</html>
