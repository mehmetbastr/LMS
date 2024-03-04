@extends('frontend.dashboard.user_dashboard')
@section('user_dashboard')

<div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between mb-5">
    <div class="media media-card align-items-center">
        <div class="media-img media--img media-img-md rounded-full">
            <img class="rounded-full" src="{{(!empty($profileData->photo)) ? url('upload/user_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="Student thumbnail image">
        </div>
        <div class="media-body">
            <h2 class="section__title fs-30">Merhaba, {{$profileData->name}}</h2>
        </div><!-- end media-body -->
    </div><!-- end media -->
</div><!-- end breadcrumb-content -->
<div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
    <div class="setting-body col-lg-6">
        <h3 class="fs-17 font-weight-semi-bold pb-4">Şifremi Değiştir</h3>

        <form method="post" action="{{route('user.password.update')}}" enctype="multipart/form-data" class="row pt-40px">
            @csrf
            <div class="input-box col-lg-12">
                <label class="label-text">Eski Şifre</label>
                <div class="form-group">
                    <input class="form-control form--control @error('old_pasword') is-invalid @enderror" type="password" name="old_password" id="old_password" >
                    <span class="la la-user input-icon"></span>

                    @error('old_password')
                            <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div><!-- end input-box -->

            <div class="input-box col-lg-12">
                <label class="label-text">Yeni Şifre</label>
                <div class="form-group">
                    <input class="form-control form--control @error('new_pasword') is-invalid @enderror" type="password" name="new_password" id="new_password" >
                    <span class="la la-user input-icon"></span>

                    @error('new_password')
                            <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div><!-- end input-box -->

            <div class="input-box col-lg-12">
                <label class="label-text">Yeni Şifre Onay</label>
                <div class="form-group">
                    <input class="form-control form--control @error('new_pasword') is-invalid @enderror" type="password" name="new_password_confirmation" id="new_password_confirmation" >
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->

            <div class="input-box col-lg-12 py-2">
                <button class="btn theme-btn">Save Changes</button>
            </div><!-- end input-box -->
        </form>
    </div><!-- end setting-body -->
</div><!-- end tab-pane -->




@endsection
