@extends("layouts.app")
@section("content")
    <div class="container">

       @if ($errors->any())
           <div class="alert alert-warning">
                <ul>
                    <ol>
                        @foreach ($errors->all() as $error )
                           <li>{{$error}}</li> 
                        @endforeach
                    </ol>
                </ul>
           </div>
       @endif

        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="article_image">Choose image from storage</label>
                <input type="file" name="image" id="article_image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="title"> Product Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="body">Price</label>
               <input type="number" name="price" class="form-control">
            </div>
            <div class="mb-3">
                <label>Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{$category['id']}}">
                             {{$category['name']}}
                        </option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Order" class="btn btn-primary">
            <input type="submit" value="Cancel" class="btn btn-outline-primary">
        </form>
    </div>
@endsection