@extends('admin.master')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Product Table
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>sl No</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=0 @endphp
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->category_name}}</td>
                            <td>{{$product->brand_name}}</td>
                            <td>{{$product->product_description}}</td>
                            <td>{{$product->product_price}}</td>
                            <td><img src="{{asset($product->product_image)}}" alt="" style="height: 20%;width: 20%;"></td>
                            <td>{{$product->status==1?'Published':'Unpublished'}}</td>
                            <td>
                                @if($product->status==1)
                                    <a href="{{route('status',['id'=>$product->id])}}" class="btn btn-warning form-control" >Unpublish</a>
                                @else
                                    <a href="{{route('status',['id'=>$product->id])}}" class="btn btn-primary form-control" >Publish</a>
                                @endif
                                    <a href="{{route('edit',['id'=>$product->id])}}" class="btn btn-success form-control mt-1" >Edit</a>
                                    <span>
                                        <form action="{{route('delete')}}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" value="{{$product->id}}" name="product_id"  >
                                        <input type="submit" value="delete" class="btn btn-danger form-control mt-1"  onclick="return confirm('Are You Sure !!!')">
                                        </form>
                                    </span>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
