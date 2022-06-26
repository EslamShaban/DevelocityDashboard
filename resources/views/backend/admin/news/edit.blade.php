@extends('layouts.master')

 @section('title')
    {{ __('admin.edit_news') }}
 @endsection

 @section('style')

 @endsection


 @section('content')

 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ __('admin.news') }} </h6>
        <div class="ml-auto">
            <a href="{{ route('news.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> {{ __('admin.news') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('news.update' , $news->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @method('PUT')
            @csrf


            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                           {{ __('admin.title') }}
                        </span>
                    </label>
                    <input type="text"  name="title" value="{{ old('title' , $news->title) }}" class="form-control form-control-solid" placeholder="Enter Title" >
                    @error('title') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                        {{ __('admin.desc') }}
                        </span>
                    </label>
                    <textarea name="desc" class="form-control form-control-solid"  placeholder="Enter Service desc" rows="3">{{ old('desc' , $news->desc) }}</textarea>
                    @error('desc') <span class="text-danger">{{ $message }}</span>  @enderror

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
            <div class="row pt-4">

                <div class="col-6">
                    <div class="form-group">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                 {{ __('admin.companies') }} 
                            </span>
                        </label>
                        <select name="company_id" id="company_id" class="form-control">
                            <option value=""> -- choose -- </option>
                            @foreach($companies as $company)
                               <option value="{{ $company->id }}" @if($news->company_id == $company->id) {{ 'selected' }}@endif>{{ $company->name }}</option>
                            @endforeach

                        </select>
                        @error('company_id') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                 {{ __('admin.news_types') }} 
                            </span>
                        </label>
                        <select name="news_types_id" id="news_types_id" class="form-control">
                            <option value=""> -- choose -- </option>
                            @foreach($news_types as $news_type)
                               <option value="{{ $news_type->id }}" @if($news->news_types_id == $news_type->id) {{ 'selected' }}@endif>{{ $news_type->title }}</option>
                            @endforeach

                        </select>
                        @error('news_types_id') <span class="text-danger">{{ $message }}</span>  @enderror

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
