@extends('layouts.master')

 @section('title')
  {{ __('admin.complaints') }}
 @endsection

 @section('style')

 @endsection


 @section('content')



 <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ __('admin.complaints') }} </h6>

    </div>



    <div class="card-body table-responsive">
        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="datatable">

            <thead>
               <tr class="fw-bolder text-muted">
                   <th class="w-25px">  </th>
                   <th class="min-w-150px">{{ __('admin.message')}}</th>
                   <th class="min-w-140px">{{ __('admin.user') }}</th>
                    <th class="min-w-150px">{{ __('admin.complaint_type') }}</th>
                   <th class="min-w-140px">{{ __('admin.created_at') }}</th>

               </tr>
            </thead>
            <tbody>
                @foreach($complaints as $complaint)
                <tr>

                    <td></td>
                    <td>

                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#SeeMore{{ $complaint->id }}">{{ __('admin.read_more') }}</button>
                            @include('backend.admin.complaints.seemore')


                    </td>


                    <td>{{ $complaint->users->name }}</td>
                    <td>
                        @if ($complaint->type == 'general')
                            <h5><span class="badge badge-info" >General Complaint</span><h5>
                        @else
                          <a href="{{ route('task-details', $complaint->task_id) }}"><span class="badge badge-primary" >Task Complaint</span></a>
                        @endif
                    </td>
                    <td>{{ $complaint->created_at }}</td>



                 </tr>

                @endforeach




            </tbody>


        </table>
    </div>


 </div>


 @endsection



 @section('js')

   <script>
       function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
       }
   </script>

 @endsection
