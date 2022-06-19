@extends('layouts.master')

 @section('title')
   Edit task
 @endsection

 @section('style')

 @endsection


 @section('content')


 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ __('admin.tasks') }} </h6>
        <div class="ml-auto">
            <a href="{{ route('tasks.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> {{ __('admin.tasks') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('tasks.update' , $task->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <input type="hidden" value="{{$task->id}}" id="task_id">
            <div class="row">
                                
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ __('admin.title') }}
                        </span>
                    </label>
                    <input type="text"  name="title" value="{{ $task->title }}" class="form-control form-control-solid" placeholder="Enter title" >
                    @error('title') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

            </div>

            <div class="row">

                <div class="col-4">
                    <div class="form-group">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                {{ __('admin.company') }}
                            </span>
                        </label>
                        <select name="company_id" id="company_id" class="form-control">
                            <option value="{{ $task->company_id }}">{{ $task->company->name }}</option>
                            <option value=""> -- choose -- </option>
                            @foreach($companies as $company)
                               <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach

                        </select>
                        @error('company_id') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                {{ __('admin.sections') }}
                            </span>
                        </label>
                        <select name="section_ids[]" id="section_ids" class="form-control" multiple>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}" @foreach($task->sections as $task_section) @if($section->id == $task_section->pivot->section_id) selected="selected" @endif @endforeach>{{ $section->name }}</option>
                            @endforeach
                        </select>
                        @error('section_ids') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                {{ __('admin.users') }}
                            </span>
                        </label>
                        <select name="user_ids[]" id="user_id" class="form-control" multiple>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}" @foreach($task->users as $task_user) @if($user->id == $task_user->pivot->user_id) selected="selected" @endif @endforeach>{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('user_ids') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                        {{ __('admin.task') }}
                        </span>
                    </label>
                    <textarea name="desc" class="form-control form-control-solid"  placeholder="Enter Service desc" rows="3">{{ old('desc' , $task->desc) }}</textarea>
                    @error('desc') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>
            </div>

            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                           {{ __('admin.start_date') }}
                        </span>
                    </label>
                    <input type="text"  name="start_date" value="{{ date('Y-m-d') }}"  class="form-control form-control-solid" placeholder="Enter name" >
                    @error('start_date') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                           {{ __('admin.end_date') }}
                        </span>
                    </label>
                    <input type="date"  name="end_date" value="{{ old('end_date' , $task->end_date) }}" class="form-control form-control-solid" placeholder="Enter name" >
                    @error('end_date') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

            </div><br>

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

  {{-- get jobs --}}
  <script>
    $(document).ready(function () {
        $('#company_id').on('change', function () {
            var company_id = $(this).val();
            if (company_id) {
                $.ajax({
                    url: "{{ URL::to('admin/task-sections') }}/" + company_id
                    , type: "GET"
                    , dataType: "json"
                    , success: function (data) {
                        $('#section_ids').empty();
                        $('#section_ids').append('<option selected disabled > -- choose --</option>');
                        $.each(data, function (key, value) {
                            $('#section_ids').append('<option value="' + key + '">' + value + '</option>');
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
        $('#section_ids').on('change', function () {
            var section_ids = $(this).val();
            //var task_id = $('#task_id').val();
            //var selected = '';
            if (section_ids) {
                $.ajax({
                    url: "{{ URL::to('admin/task-user') }}/" + section_ids
                    , type: "GET"
                    , dataType: "json"
                    , success: function (data) {
                        $('#user_id').empty();
                        $('#user_id').append('<option selected disabled > -- choose --</option>');
                        $.each(data, function (key, value) {
                        /*
                            $.ajax({
                                url: "{{ URL::to('admin/check-task-users') }}/" + task_id + '/'+ key
                                , type: "GET"
                                , dataType: "json"
                                , success: function (data) {

                                    $('#user_id').append('<option value="' + key + '" selected>' + value + '</option>');

                                    return;
                                },});
                                    */
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

 @endsection
