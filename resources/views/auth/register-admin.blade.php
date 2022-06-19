@extends('layouts.master')

 @section('title')
   تسجيل الدخول
 @endsection

 @section('style')

 @endsection



 @section('content')

 <div class="card shadow mb-4">



    <div class="card-body">

        <form action="{{ route('register.admin-company') }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @csrf



                    <div class="row">
                        <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">
                                    {{ trans('defult.arabic name') }}
                                </span>
                            </label>
                            <input type="text"  name="name" value="{{ old('name') }}" class="form-control form-control-solid" placeholder="Enter Company Arabic name" >
                            @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                        </div>

                        <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">
                                    {{ trans('defult.english name') }}
                                </span>
                            </label>
                            <input type="text"  name="name_en" value="{{ old('name_en') }}" class="form-control form-control-solid" placeholder="Enter Company English name" >
                            @error('name_en') <span class="text-danger">{{ $message }}</span>  @enderror

                        </div>


                    </div>

                    <div class="row">

                        <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">
                                  {{ trans('defult.admin name') }}
                                </span>
                            </label>
                            <input type="text"  name="admin_name" value="{{ old('admin_name') }}" class="form-control form-control-solid" placeholder="Enter Company admin name" >
                            @error('admin_name') <span class="text-danger">{{ $message }}</span>  @enderror
                        </div>

                        <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">
                                    {{ trans('defult.email') }}
                                </span>
                            </label>
                            <input type="email"  name="email" value="{{ old('email') }}" class="form-control form-control-solid" placeholder="Enter Company Admin Email" >
                            @error('email') <span class="text-danger">{{ $message }}</span>  @enderror
                        </div>

                        <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">
                                    {{ trans('defult.password') }}
                                </span>
                            </label>
                            <input type="password"  name="password" value="{{ old('password') }}" class="form-control form-control-solid" placeholder="Enter Company  password" >
                            @error('password') <span class="text-danger">{{ $message }}</span>  @enderror
                        </div>

                    </div>

                    <div class="row">
                            <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">
                                        {{ trans('defult.arabic desc') }}
                                    </span>
                                </label>
                                <textarea name="desc" class="form-control form-control-solid"  placeholder="Enter Company desc" rows="3">{{ old('desc') }}</textarea>
                                @error('desc') <span class="text-danger">{{ $message }}</span>  @enderror

                            </div>

                            <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">
                                        {{ trans('defult.English desc') }}
                                    </span>
                                </label>
                                <textarea name="desc_en" class="form-control form-control-solid"  placeholder="Enter Company desc" rows="3">{{ old('desc_en') }}</textarea>
                                @error('desc_en') <span class="text-danger">{{ $message }}</span>  @enderror

                            </div>
                    </div>

                    <div class="row">


                        <div class="col-4">
                            <div class="form-group">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">
                                        {{ trans('defult.category') }}
                                    </span>
                                </label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value=""> -- choose -- </option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                                @error('category_id') <span class="text-danger">{{ $message }}</span>  @enderror

                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">
                                        {{ trans('defult.sub category') }}
                                    </span>
                                </label>
                                <select name="subcategory_id" id="subcategory_id" class="form-control"> </select>
                                @error('subcategory_id') <span class="text-danger">{{ $message }}</span>  @enderror

                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">
                                        {{ trans('defult.city') }}
                                    </span>
                                </label>
                                <select name="city_id" class="form-control">
                                    <option value=""> -- choose -- </option>
                                    @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach

                                </select>
                                @error('city_id') <span class="text-danger">{{ $message }}</span>  @enderror

                            </div>
                        </div>
                    </div><br>

                    <div class="row">

                        <div class="col-6">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">
                                    {{ trans('defult.img') }}
                                </span>
                            </label>
                            <div >
                                <input type="file" name="cover" class="form-control" >
                                <span class="form-text text-muted">Image with should be jpg , jpeg , png</span>
                                @error('cover') <span class="text-danger">{{ $message }}</span>  @enderror

                            </div>
                        </div>

                        <div class="col-6">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">
                                    {{ trans('defult.icon') }}
                                </span>
                            </label>
                            <div >
                                <input type="file" name="icon" class="form-control" >
                                <span class="form-text text-muted">Image with should be jpg , jpeg , png</span>
                                @error('icon') <span class="text-danger">{{ $message }}</span>  @enderror

                            </div>
                        </div>



                        <div class="col-12">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">
                                    {{ trans('defult.searchInput') }}
                                </span>
                            </label>
                            <div >
                                <input type="text" name="icon" class="form-control" id="searchInput">
                            </div>
                        </div>
                    </div>






               <div class="row">
                <div id="map" style="height: 500px;width: 1000px;">
                    <input type="hidden" name="location" class="form-control" id="location">
                    <input type="hidden" name="lat" class="form-control" id="lat">
                    <input type="hidden" name="lng" class="form-control" id="lng">

               </div>








            <div class="text-center pt-15">
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">{{ trans('defult.submit') }}</span>
                    <span class="indicator-progress">Please wait...</span>
                </button>
            </div>


            </div>


        </form>

    </div>

</div>




 @endsection



 @section('js')


    {{-- get subcategory --}}
    <script>
        $(document).ready(function () {
            $('#category_id').on('change', function () {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ URL::to('subcategory-category') }}/" + category_id
                        , type: "GET"
                        , dataType: "json"
                        , success: function (data) {
                            $('#subcategory_id').empty();
                            $('#subcategory_id').append('<option selected disabled > -- choose --</option>');
                            $.each(data, function (key, value) {
                                $('#subcategory_id').append('<option value="' + key + '">' + value + '</option>');
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

   @include('backend.admin.companies.mab')



 @endsection
