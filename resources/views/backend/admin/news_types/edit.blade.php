@extends('layouts.master')

 @section('title')
    {{ __('admin.edit_news_type') }}
 @endsection

 @section('style')

 @endsection


 @section('content')

 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ __('admin.news_types') }} </h6>
        <div class="ml-auto">
            <a href="{{ route('news_types.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> {{ __('admin.news') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('news_types.update' , $news_type->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework">
            @method('PUT')
            @csrf


            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                           {{ __('admin.title') }}
                        </span>
                    </label>
                    <input type="text"  name="title" value="{{ old('title' , $news_type->title) }}" class="form-control form-control-solid" placeholder="Enter Title" >
                    @error('title') <span class="text-danger">{{ $message }}</span>  @enderror
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
