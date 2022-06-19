@extends('layouts.master')

 @section('title')
   Tasks
 @endsection

 @section('style')

 @endsection


 @section('content')

 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> </h6>
        <div class="ml-auto">
            <a href="{{ route('tasks.create', ['userId'=>Request::get('userId')]) }}" class="btn btn-primary">
               <span><i class="fa fa-plus"></i></span>
               <span> {{ __('admin.add_task') }} </span>
           </a>
                       
           <a href="{{ route('tasks.uploadcsv') }}" class="btn btn-primary">
               <span><i class="fa fa-plus"></i></span>
               <span> {{ __('admin.import_tasks') }} </span>
           </a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="datatable">

            <thead>
               <tr class="fw-bolder text-muted">
                   <th class="w-25px">  </th>
                   <th class="min-w-150px">{{ __('admin.task') }}</th>
                    <th class="min-w-150px">{{ __('admin.title') }}</th>
                   <th class="min-w-130px">{{ __('admin.company') }}</th>
                   <th class="min-w-120px">{{ __('admin.section') }}</th>
                   <th class="min-w-110px">{{ __('admin.user') }}</th>
                    <th class="min-w-110px">{{ __('admin.rate') }}</th>
                   <th class="min-w-100px">{{ __('admin.start_date') }}</th>
                   <th class="min-w-100px">{{ __('admin.end_date') }}</th>
                   <th class="min-w-100px">{{ __('admin.status') }}</th>
                   <th class="min-w-90px" style="width:30px ;"> {{ __('admin.action') }}</th>

               </tr>
            </thead>
            <tbody>
                @php
                   $i=1;
                @endphp
                @foreach($tasks as $task)
                <tr>

                    <td></td>
                    
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#SeeMore{{ $task->id }}">{{ __('admin.read_more') }}</button>
                        @include('backend.admin.tasks.seemore')
                    </td>
                    <td>{{ $task->title }}</td>

                    <td>{{ $task->company->name }}</td>
                    <td>
                        @foreach ($task->sections as $section)
                          <h5><span class="badge badge-info" >{{ $section->name}}</span><h5>
                        @endforeach
                    </td>
                    <td>
                      @foreach ($task->users as $task_user)
                          <h5><span class="badge badge-info" >{{ $task_user->name}}</span><h5>
                      @endforeach
                    </td>
                    <td>                      
                        @foreach ($task->users as $task_user)
                          <h5><span class="badge badge-info" >{{ $task_user->pivot->rate}}</span><h5>
                       @endforeach
                    </td>
                    <td>{{ $task->start_date }}</td>
                    <td>{{ $task->end_date }}</td>

                        @if ( $task->status == 'complete')
                        <td><span class="badge badge-pill badge-success">{{ $task->status }}</span>
                        </td>
                       
                        @else
                            <td><span
                                    class="badge badge-pill badge-warning">{{ $task->status }}</span>
                            </td>
                        @endif

                    <td>
                        <div class="btn-group">
                                                        
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#edit_task_rate_{{$i}}" title="rate the task">
                               <i class="fa fa-star"></i>
                            </a>

                            <a href="{{ route('tasks.edit' , $task->id) }}" class="btn btn-primary">
                               <i class="fa fa-edit"></i>
                            </a>

                          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete{{ $task->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                           @include('backend.admin.tasks.delete')
                        </div>

                    </td>

                 </tr>

                         
                <div class="modal fade" id="edit_task_rate_{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">{{ __('admin.rate_task') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('task.rate', $task->id)}}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework">

                            @csrf

                            <div class="modal-body">
                                @foreach($task->users as $task_user)
                                    <h3>{{$task_user->name}}</h3>
                                    <div class="row">
                                        <input type="hidden" name="rate_task[user_id][]" value="{{$task_user->pivot->user_id}}">
                                        <div class="form-group">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                <span class="required">
                                                {{ __('admin.desc') }}
                                                </span>
                                            </label>
                                            <textarea name="rate_task[desc][]" class="form-control form-control-solid"  placeholder="Enter Rate desc" rows="3">{{$task_user->pivot->desc}}</textarea>

                                        </div>

                                        <div class="form-group">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                <span class="required">
                                                    {{ __('admin.rate') }}
                                                </span>
                                            </label>
                                            <input type="number" class="form-control form-control-solid" name="rate_task[rate][]" value="{{$task_user->pivot->rate}}" max="10.0"  step=".1">
                                            <span class="form-text text-muted">Rate should be from 0.0 to 10.0</span>

                                        </div>


                                    </div>
                                @endforeach

                            </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">{{ __('admin.submit') }}</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                @php
                    $i++
                @endphp
                @endforeach




            </tbody>


        </table>
    </div>


 </div>




 @endsection

 @section('js')

 @endsection
