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
                        <li class="breadcrumb-item active">Training!</li>
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
                    @can('training-create')
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewModalId">Add New</button>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Training Name En</th>
                        <th>Training Name Bn</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Duration</th>
                        <th>Image</th>
                        <th>Total Student</th>
                        <th>Venue</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trainings as $key=>$trainingData)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$trainingData->name}}</td>
                        <td>{{$trainingData->name_bn}}</td>
                        <td>{{$trainingData->start_date}}</td>
                        <td>{{$trainingData->end_date}}</td>
                        <td>{{$trainingData->duration}} Day/Month</td>
                        <td>
                            <img src="{{asset('images/training/'. $trainingData->image )}}" alt="Current Image" style="max-width: 50px;">
                        </td>
                        <td>{{$trainingData->total_student}}</td>
                        <td>
                            @if (!empty($trainingData->venues))
                                {{ implode(', ', $trainingData->venues) }}
                            @endif
                        </td>
                        <td>{{$trainingData->status==1? 'Active':'Inactive'}}</td>
                        <td style="width: 100px;">
                            <div class="d-flex justify-content-end gap-1">
                                @can('training-edit')
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editNewModalId{{$trainingData->id}}">Edit</button>
                                @endcan
                                @can('training-delete')
                                    <a href="{{route('training.destroy',$trainingData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$trainingData->id}}">Delete</a>
                                @endcan
                            </div>
                        </td>
                        <!--Edit Modal -->
                        <div class="modal fade" id="editNewModalId{{$trainingData->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editNewModalLabel{{$trainingData->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="addNewModalLabel{{$trainingData->id}}">Edit</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{route('training.update',$trainingData->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Training Name En</label>
                                                        <input type="text" id="name" name="name" value="{{$trainingData->name}}"
                                                               class="form-control" placeholder="Enter Training Name" required>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Training Name Bn</label>
                                                        <input type="text" id="name_bn" name="name_bn" value="{{$trainingData->name_bn}}"
                                                               class="form-control" placeholder="Enter Training Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Start Date</label>
                                                        <input type="date" id="start_date" name="start_date" value="{{$trainingData->start_date}}"
                                                               class="form-control" placeholder="Enter Start Date" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">End Date</label>
                                                        <input type="date" id="end_date" name="end_date" value="{{$trainingData->end_date}}"
                                                               class="form-control" placeholder="Enter End Date">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Duration</label>
                                                        <input type="text" id="duration" name="duration" value="{{$trainingData->duration}}"
                                                               class="form-control" placeholder="Enter Duration" required>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="total_venue" class="form-label">Total Venue</label>
                                                        <input type="number" id="total_venue" name="total_venue" value="{{$trainingData->total_venue}}"
                                                               class="form-control" placeholder="Enter Total Venue" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="example-fileinput" class="form-label">Image</label>
                                                        <input type="file" name="image" id="example-fileinput" class="form-control">
                                                        <img src="{{asset('images/training/'. $trainingData->image )}}" alt="Current Image" class="mt-2" style="max-width: 100px;">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="total_student" class="form-label">Total Student</label>
                                                        <input type="number" id="total_student" name="total_student" value="{{$trainingData->total_student}}"
                                                               class="form-control" placeholder="Enter Total Student">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="example-select" class="form-label">Status</label>
                                                        <select name="status" class="form-select">
                                                            <option value="1" {{ $trainingData->status === 1 ? 'selected' : '' }}>Active</option>
                                                            <option value="0" {{ $trainingData->status === 0 ? 'selected' : '' }}>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="example-textarea" class="form-label">Choose Venue</label>
                                                        <select name="venue_id[]" class="select2 form-control select2-multiple" data-toggle="select2"
                                                                multiple="multiple" data-placeholder="Select Category ...">
                                                            @foreach($venues as $venue)
                                                                <option value="{{ $venue->id }}" {{ in_array($venue->name, $trainingData->venues) ? 'selected' : '' }}>
                                                                    {{ $venue->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label> Details En</label>
                                                        <textarea class="form-control" name="details" rows="5" placeholder="Enter the Description">{{ strip_tags($trainingData->details) }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label> Details Bn</label>
                                                        <textarea class="form-control" name="details_bn" rows="5" placeholder="Enter the Description">{{ strip_tags($trainingData->details_bn) }}</textarea>
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
                        <div id="danger-header-modal{{$trainingData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$trainingData->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-danger">
                                        <h4 class="modal-title" id="danger-header-modalLabe{{$trainingData->id}}l">Delete</h4>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <a href="{{route('training.destroy',$trainingData->id)}}" class="btn btn-danger">Delete</a>
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
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addNewModalLabel">Add</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('training.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Training Name En</label>
                                    <input type="text" id="name" name="name" required
                                           class="form-control" placeholder="Enter Training Name" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Training Name Bn</label>
                                    <input type="text" id="name_bn" name="name_bn"
                                           class="form-control" placeholder="Enter Training Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Start Date</label>
                                    <input type="date" id="start_date" name="start_date"
                                           class="form-control" placeholder="Enter Start Date" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">End Date</label>
                                    <input type="date" id="end_date" name="end_date"
                                           class="form-control" placeholder="Enter End Date">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Duration</label>
                                    <input type="text" id="duration" name="duration"
                                           class="form-control" placeholder="Enter Duration" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="total_venue" class="form-label">Total Venue</label>
                                    <input type="number" id="total_venue" name="total_venue"
                                           class="form-control" placeholder="Enter Total Venue" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-fileinput" class="form-label">Image</label>
                                    <input type="file" name="image" id="example-fileinput" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="total_student" class="form-label">Total Student</label>
                                    <input type="number" id="total_student" name="total_student"
                                           class="form-control" placeholder="Enter Total Student">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="example-textarea" class="form-label">Choose Venue</label>
                                    <select name="venue_id[]" class="select2 form-control select2-multiple" data-toggle="select2"
                                            multiple="multiple" data-placeholder="Select Venue ...">
                                        @foreach($venues as $venueData)
                                            <option value="{{$venueData->id}}">{{$venueData->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label> Details </label>
                                    <textarea class="form-control" id="content" name="details" placeholder="Enter the Description"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label> Details Bn</label>
                                    <textarea class="form-control" name="details_bn" rows="5" placeholder="Enter the Description"></textarea>
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
