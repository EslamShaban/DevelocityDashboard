@extends('layouts.master')

 @section('title')
   Add company
 @endsection

 @section('style')

 @endsection


 @section('content')

 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ __('admin.companies') }} </h6>
        <div class="ml-auto">
            <a href="{{ route('companies.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> {{ __('admin.companies') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('companies.store') }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ __('admin.name') }}
                        </span>
                    </label>
                    <input type="text"  name="name" value="{{ old('name') }}" class="form-control form-control-solid" placeholder="Enter name" >
                    @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>


                </div>


            </div>

           <div class="row">
                <div class="col-md-12">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ __('admin.location') }}
                        </span>
                    </label>
                    <div >
                        <input type="text" name="icon" class="form-control" id="searchInput">
                    </div>
                </div>
           </div> <br>

            <div class="row">

                <input type="hidden" name="location" class="form-control" id="location">
                <input type="hidden" name="lat" class="form-control" id="lat">
                <input type="hidden" name="lng" class="form-control" id="lng">
                <div id="map" style="height: 500px;width: 1000px;">


            </div>






            <div class="text-center pt-15">
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...</span>
                </button>
            </div>

        </form>

    </div>

</div>



 @endsection



 @section('js')

 @include('backend.admin.companies.mab')

 @endsection
