@extends('layouts.master')

 @section('title')
  Requirements
 @endsection

 @section('style')

 @endsection


 @section('content')



 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ __('admin.requirements') }}</h6>

    </div>


    <div class="table-responsive">
        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="datatable">

            <thead>
               <tr class="fw-bolder text-muted">
                   <th class="w-25px">  </th>
                   <th class="min-w-150px">{{ __('admin.name') }}</th>
                   <th class="min-w-140px">{{ __('admin.price') }}</th>
                   <th class="min-w-130px">{{ __('admin.task') }}</th>
                   <th class="min-w-120px">{{ __('admin.user') }}</th>
                   <th class="min-w-120px">{{ __('admin.status') }}</th>
                   <th class="min-w-120px">{{ __('admin.change_status') }}</th>
                   <th class="min-w-110px">{{ __('admin.created_at') }}</th>

               </tr>
            </thead>
            <tbody>
                @foreach($requirements as $requirement)
                <tr>

                    <td></td>

                    <td>{{ $requirement->name }}</td>
                    <td>{{ $requirement->price }}</td>
                    <td>{{ $requirement->task->title }}</td>
                    <td>{{ $requirement->user->name }}</td>

                        @if ( $requirement->status == 'approve')
                            <td><span
                                    class="badge badge-pill badge-success">{{ $requirement->status }}</span>
                            </td>
                        @elseif ($requirement->status == 'rejected')

                            <td><span
                                class="badge badge-pill badge-danger">{{ $requirement->status }}</span>
                            </td>
                        @else
                            <td><span
                                class="badge badge-pill badge-warning">{{ $requirement->status }}</span>
                            </td>

                        @endif

                    <td>
                        <button type="button" class="btn btn-primary  btn-sm" title="تعديل" data-bs-toggle="modal"
                          data-bs-target="#Edit{{ $requirement->id }}"><i class="fa fa-edit"></i>
                        </button>
                        @include('backend.admin.requirements.edit')
                    </td>
                    <td>{{ $requirement->created_at }}</td>



                 </tr>

                @endforeach




            </tbody>


        </table>
    </div>


 </div>




 @endsection



 @section('js')

 @endsection
