@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Kategori Düzenle</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Kategori Düzenle</h5>
                <form id="myForm" action="{{route('update.category')}}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf

                    <input type="hidden" name="id" value="{{$category->id}}">

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label">Kategori Adı</label>
                        <input type="text" class="form-control" name="category_name" id="input1" placeholder="First Name" value="{{$category->category_name}}">
                    </div>
                    <div class="col-md-6"></div>
                    <div class="form-group col-md-6">
                        <label for="input2" class="form-label">Kategori Görseli</label>
                        <input type="file" class="form-control" name="image" id="image" >
                    </div>
                    <div class="col-md-6">
                        <img id="showImage" src="{{(!empty($category->image)) ? url($category->image) : url('upload/no_image.jpg') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="80">
                    </div>

                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4">Kategori Güncelle</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>






@endsection
