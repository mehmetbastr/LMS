@extends('admin.admin_dashboard')
@section('admin')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tüm Alt Kategoriler</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{route('add.subcategory')}}" class="btn btn-primary p3-2">Alt Kategori Ekle</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Kategori Id</th>
                                <th>Alt Kategori Adı</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategory as $key=> $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item['category']['category_name']}}</td>
                                <td>{{$item->subcategory_name}}</td>
                                <td>
                                    <a href="{{route('edit.category', $item->id)}}" class="btn btn-info p3-2">Düzenle</a>
                                    <a href="{{route('delete.category', $item->id)}}" class="btn btn-danger p3-2" id="delete">Alt Kategori Sil</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>









@endsection
