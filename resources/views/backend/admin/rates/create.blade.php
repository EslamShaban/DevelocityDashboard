@extends('layouts.master')

 @section('title')
   Add Rate
 @endsection

 @section('style')

 @endsection


 @section('content')


 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> Rates </h6>
        <div class="ml-auto">
            <a href="{{ route('rates.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> Rates </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('rates.store') }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" >
            @csrf

            <div class="row">

                <div class="col-3">
                    <div class="form-group">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                Company
                            </span>
                        </label>
                        <select name="company_id" id="company_id" class="form-control">
                            <option value=""> -- choose -- </option>
                            @foreach($companies as $company)
                               <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach

                        </select>
                        @error('company_id') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                Jobs
                            </span>
                        </label>
                        <select name="job_id" id="job_id" class="form-control">

                        </select>
                        @error('job_id') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                Users
                            </span>
                        </label>
                        <select name="user_id" id="user_id" class="form-control">

                        </select>
                        @error('user_id') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                Tasks
                            </span>
                        </label>
                        <select name="task_id" id="task_id" class="form-control">

                        </select>
                        @error('user_id') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>
            </div> <br>

            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                        Desc
                        </span>
                    </label>
                    <textarea name="desc" class="form-control form-control-solid"  placeholder="Enter Service desc" rows="3">{{ old('desc') }}</textarea>
                    @error('desc') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                Rate
                            </span>
                        </label>
                        <select name="rate" id="rate" class="form-control">
                            <option value=""> -- choose -- </option>
                             <option value="1">1</option>
                             <option value="2">2</option>
                             <option value="3">3</option>
                             <option value="4">4</option>
                             <option value="5">5</option>
                             <option value="6">6</option>
                             <option value="7">7</option>
                             <option value="8">8</option>
                             <option value="9">9</option>
                             <option value="10">10</option>

                        </select>
                        @error('rate') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>



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


  {{-- get jobs --}}
  <script>
    $(document).ready(function () {
        $('#company_id').on('change', function () {
            var company_id = $(this).val();
            if (company_id) {
                $.ajax({
                    url: "{{ URL::to('admin/task-jobs') }}/" + company_id
                    , type: "GET"
                    , dataType: "json"
                    , success: function (data) {
                        $('#job_id').empty();
                        $('#job_id').append('<option selected disabled > -- choose --</option>');
                        $.each(data, function (key, value) {
                            $('#job_id').append('<option value="' + key + '">' + value + '</option>');
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

 {{-- get users --}}
 <script>
    $(document).ready(function () {
        $('#job_id').on('change', function () {
            var job_id = $(this).val();
            if (job_id) {
                $.ajax({
                    url: "{{ URL::to('admin/task-user') }}/" + job_id
                    , type: "GET"
                    , dataType: "json"
                    , success: function (data) {
                        $('#user_id').empty();
                        $('#user_id').append('<option selected disabled > -- choose --</option>');
                        $.each(data, function (key, value) {
                            $('#user_id').append('<option value="' + key + '">' + value + '</option>');
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

 {{-- get tasks --}}
 <script>
    $(document).ready(function () {
        $('#user_id').on('change', function () {
            var user_id = $(this).val();
            if (user_id) {
                $.ajax({
                    url: "{{ URL::to('admin/get_user_tasks') }}/" + user_id
                    , type: "GET"
                    , dataType: "json"
                    , success: function (data) {
                        $('#task_id').empty();
                        $('#task_id').append('<option selected disabled > -- choose --</option>');
                        $.each(data, function (key, value) {
                            $('#task_id').append('<option value="' + key + '">' + value + '</option>');
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
