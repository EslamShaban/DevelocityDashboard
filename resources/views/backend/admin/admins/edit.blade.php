@extends('layouts.master')

 @section('title')
   Edit Admin
 @endsection

 @section('style')

 @endsection


 @section('content')

 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ __('admin.admins') }} </h6>
        <div class="ml-auto">
            <a href="{{ route('admins.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> {{ __('admin.admins') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('admins.update' , $admin->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @method('PUT')
            @csrf


            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                           {{ __('admin.name') }}
                        </span>
                    </label>
                    <input type="text"  name="name" value="{{ old('name' , $admin->admin_name) }}" class="form-control form-control-solid" placeholder="Enter Name" >
                    @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                           {{ __('admin.email') }}
                        </span>
                    </label>
                    <input type="email"  name="email" value="{{ old('email' , $admin->email) }}" class="form-control form-control-solid" placeholder="Enter Email" >
                    @error('email') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                        {{ __('admin.password') }}
                        </span>
                    </label>
                    <input type="password"  name="password" class="form-control form-control-solid" placeholder="Enter password" >
                    @error('password') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>




            </div>




            <div class="row pt-4">

                <div class="col-6">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ __('admin.img') }}
                        </span>
                    </label>
                    <div >
                        <input type="file" name="img" class="form-control" >
                        <span class="form-text text-muted">Image with should be jpg , jpeg , png</span>
                        @error('img') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>

            </div>


            <div class="text-center pt-15">
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">{{ __('admin.submit') }}</span>
                    <span class="indicator-progress">Please wait...</span>
                </button>
            </div>

        </form>

    </div>

</div>



 @endsection



 @section('js')

 @endsection
