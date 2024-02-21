@extends('admin.app')
@section('admin_content')
    {{-- CKEditor CDN --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SDMGA</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Resource</a></li>
                        <li class="breadcrumb-item active">Counter!</li>
                    </ol>
                </div>
                <h4 class="page-title">Resource!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    <!-- Large modal -->
                    @can('counter-create')
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewModalId">Add New</button>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Counter Name En</th>
                        <th>Counter Name Bn</th>
                        <th>Counter No</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($counter as $key=>$counterData)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$counterData->counter_name}}</td>
                        <td>{{$counterData->counter_name_bn}}</td>
                        <td>{{$counterData->counter_no}}</td>
                        <td>{{$counterData->status==1? 'Active':'Inactive'}}</td>
                        <td style="width: 100px;">
                            <div class="d-flex justify-content-end gap-1">
                                @can('counter-edit')
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editNewModalId{{$counterData->id}}">Edit</button>
                                @endcan
                                @can('counter-delete')
                                <a href="{{route('counter.destroy',$counterData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$counterData->id}}">Delete</a>
                                @endcan
                            </div>
                        </td>
                        <!--Edit Modal -->
                        <div class="modal fade" id="editNewModalId{{$counterData->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editNewModalLabel{{$counterData->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="addNewModalLabel{{$counterData->id}}">Edit</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{route('counter.update',$counterData->id)}}">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-2">
                                                        <label for="counter_name" class="form-label">Counter Name En</label>
                                                        <input type="text" id="counter_name" name="counter_name" value="{{$counterData->counter_name}}"
                                                               class="form-control" placeholder="Enter Counter Name" required>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-2">
                                                        <label for="counter_name_bn" class="form-label">Counter Name Bn</label>
                                                        <input type="text" id="counter_name_bn" name="counter_name_bn" value="{{$counterData->counter_name_bn}}"
                                                               class="form-control" placeholder="Enter Counter Name">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-2">
                                                        <label for="counter_no" class="form-label">Counter Number</label>
                                                        <input type="text" id="counter_no" name="counter_no" value="{{$counterData->counter_no}}"
                                                               class="form-control" placeholder="Enter Counter Number" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="example-select" class="form-label">Status</label>
                                                        <select name="status" class="form-select">
                                                            <option value="1" {{ $counterData->status === 1 ? 'selected' : '' }}>Active</option>
                                                            <option value="0" {{ $counterData->status === 0 ? 'selected' : '' }}>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-primary" type="submit">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Modal -->
                        <div id="danger-header-modal{{$counterData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$counterData->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-danger">
                                        <h4 class="modal-title" id="danger-header-modalLabe{{$counterData->id}}l">Delete</h4>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <a href="{{route('counter.destroy',$counterData->id)}}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Add Modal -->
    <div class="modal fade" id="addNewModalId" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addNewModalLabel">Add</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('counter.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="counter_name" class="form-label">Counter Name En</label>
                                    <input type="text" id="counter_name" name="counter_name"
                                           class="form-control" placeholder="Enter Counter Name" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="counter_name" class="form-label">Counter Name Bn</label>
                                    <input type="text" id="counter_name_bn" name="counter_name_bn"
                                           class="form-control" placeholder="Enter Counter Name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="title" class="form-label">Counter Number</label>
                                    <input type="text" id="title" name="counter_no"
                                           class="form-control" placeholder="Enter Counter Number" required>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
