@extends('admin.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Product</h3></div>
                    <div class="card-body">
                        <form action="{{ route('new-product') }}"method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your Product name" name="product_name" />
                                        <label for="inputFirstName">Product name</label>
                                    </div>
                                </div>
                                 </div>
                         <div class="row mb-3">
                             <div class="col-md-12">
                                 <div class="form-floating mb-3">
                                     <input class="form-control" id="inputCategory" type="text" placeholder="Category Name" name="category_name" />
                                     <label for="inputCategory">Category Name</label>
                                 </div>
                                 <div class="form-floating mb-3">
                                     <input class="form-control" id="inputCategory" type="text" placeholder="Brand Name" name="brand_name" />
                                     <label for="inputCategory">Brand Name</label>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="form-floating mb-3 mb-md-0">
                                     <textarea name="product_description" cols="30" rows="30" class="form-control" id="inputDescription" type="text" placeholder="Enter Description"></textarea>
                                 </div>
                             </div>
                         </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPrice" type="text" placeholder="Enter Price" name="product_price"/>
                                        <label for="inputPrice">Price</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPasswordConfirm" type="file" placeholder="Product Image" name="product_image" />
                                        <label for="inputPasswordConfirm">Product Image</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" value="Submit" class="btn btn-lg btn-primary"></div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
