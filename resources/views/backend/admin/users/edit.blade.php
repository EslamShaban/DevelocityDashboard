@extends('layouts.master')

 @section('title')
  Edit User
 @endsection

 @section('style')

 @endsection


 @section('content')


 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ __('admin.users') }} </h6>
        <div class="ml-auto">
            <a href="{{ route('users.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> {{ __('admin.users') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('users.update' , $user->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ __('admin.name') }}
                        </span>
                    </label>
                    <input type="text"  name="name" value="{{ old('name' , $user->name) }}" class="form-control form-control-solid" placeholder="Enter name" >
                    @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                           {{ __('admin.email') }}
                        </span>
                    </label>
                    <input type="email"  name="email" value="{{ old('email' , $user->email) }}" class="form-control form-control-solid" placeholder="Enter Email" >
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





            <div class="row">

                <div class="col-6">
                    <div class="form-group">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                {{ __('admin.company') }}
                            </span>
                        </label>
                        <select name="company_id" id="company_id" class="form-control">
                            <option value="{{ $user->company_id }}">{{ $user->company->name }}</option>
                            <option value=""> -- choose -- </option>
                            @foreach($companies as $company)
                               <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach

                        </select>
                        @error('company_id') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                {{ __('admin.section') }}
                            </span>
                        </label>
                        <select name="section_id" id="section_id" class="form-control">
                            @foreach($sections as $section)
                                <option value="{{ $section->id }}" @if ($user->section_id == $section->id) selected="selected" @endif>{{ $section->name }}</option>
                            @endforeach
                        </select>
                        @error('section_id') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ __('admin.job_title') }}
                        </span>
                    </label>
                    <input type="text"  name="job_title" value="{{ $user->job_title }}" class="form-control form-control-solid" placeholder="Enter job title" >
                    @error('job_title') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                         {{ __('admin.job_desc') }}
                        </span>
                    </label>
                    <textarea name="job_desc" class="form-control form-control-solid"  placeholder="Enter Job desc" rows="3">{{ $user->job_desc }}</textarea>
                    @error('job_desc') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>


            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                {{ __('admin.kpis') }}
                            </span>
                        </label>
                        <div class="bs-example">
                            <input type="text" name="kpis" id="#inputTag" data-role="tagsinput" value="{{$user->kpis}}">
                        </div>
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

      {{-- get Subject --}}
    <script>
        $(document).ready(function () {
            $('#company_id').on('change', function () {
                var company_id = $(this).val();
                if (company_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/user-section') }}/" + company_id
                        , type: "GET"
                        , dataType: "json"
                        , success: function (data) {
                            $('#section_id').empty();
                            $('#section_id').append('<option selected disabled > -- choose --</option>');
                            $.each(data, function (key, value) {
                                $('#section_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                        ,
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

 @endsection
