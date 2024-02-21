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
                        <li class="breadcrumb-item active">Notice!</li>
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
                    @can('notice-create')
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewModalId">Add New</button>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <td>S/N</td>
                        <th>Title En</th>
                        <th>Title Bn</th>
                        <th>Date</th>
                        <th>File</th>
                        <th>Details</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notice as $key=>$noticeData)
                        <tr>
                            <td>{{$key+1}}</td>

                            <td>
                                @if($noticeData->title_en != null)
                                {!! Str::limit($noticeData->title_en, 30) !!}
                                @else
                                N/A
                                @endif
                            </td>
                            <td>
                                @if($noticeData->title != null)
                                    {!! Str::limit($noticeData->title, 30) !!}
                                @else
                                    N/A
                                @endif

                            </td>
                            <td>{{$noticeData->published_date}}</td>
                            <td>{{$noticeData->pdf_file!=null? 'Yes':'No'}}</td>
                            <td>
                                @if($noticeData->descrip != null)
                                    {!! Str::limit($noticeData->descrip, 30) !!}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{$noticeData->status==1? 'Active':'Inactive'}}</td>
                            <td style="width: 100px;">
                                <div class="d-flex justify-content-end gap-1">
                                    @can('notice-edit')
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editNewModalId{{$noticeData->id}}">Edit</button>
                                    @endcan
                                    @can('notice-delete')
                                        <a href="{{route('notice.destroy',$noticeData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$noticeData->id}}">Delete</a>
                                    @endcan
                                </div>
                            </td>
                            <!--Edit Modal -->
                            <div class="modal fade" id="editNewModalId{{$noticeData->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editNewModalLabel{{$noticeData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="addNewModalLabel{{$noticeData->id}}">Edit</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('notice.update',$noticeData->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Title En</label>
                                                            <input type="text"  name="title_en" value="{{$noticeData->title_en}}"
                                                                   class="form-control" placeholder="Enter En Title" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Title Bn</label>
                                                            <input type="text" id="title" name="title"  value="{{$noticeData->title}}"
                                                                   class="form-control" placeholder="Enter Bn Title" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="date" class="form-label">Published Date</label>
                                                            <input type="date" id="published_date" name="published_date"  value="{{$noticeData->published_date}}"
                                                                   class="form-control" placeholder="Enter Published Date" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="example-fileinput" class="form-label">PDF File</label>
                                                            <input type="file" name="pdf_file" id="example-fileinput" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label> Details Bn</label>
                                                            <textarea class="form-control" id="content" name="descrip" placeholder="Enter the Description">{{$noticeData->descrip}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label> Details En</label>
                                                            <textarea class="form-control" id="content" name="descrip_en" placeholder="Enter the Description">{{$noticeData->descrip_en}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="date" class="form-label">Entry User</label>
                                                            <input type="text" id="entry_user" name="entry_user" value="{{$noticeData->entry_user}}"
                                                                   class="form-control" placeholder="Enter Entry User" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="example-fileinput" class="form-label">Entry Date</label>
                                                            <input type="text" name="entry_date" value="{{$noticeData->entry_date}}" id="example-fileinput" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Status</label>
                                                            <select name="status" class="form-select">
                                                                <option value="1" {{ $noticeData->status === 1 ? 'selected' : '' }}>Active</option>
                                                                <option value="0" {{ $noticeData->status === 0 ? 'selected' : '' }}>Inactive</option>
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
                            <div id="danger-header-modal{{$noticeData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$noticeData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabe{{$noticeData->id}}l">Delete</h4>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('notice.destroy',$noticeData->id)}}" class="btn btn-danger">Delete</a>
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
                    <form method="post" action="{{route('notice.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title En</label>
                                    <input type="text"  name="title_en"
                                           class="form-control" placeholder="Enter En Title" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title Bn</label>
                                    <input type="text" id="title" name="title"
                                           class="form-control" placeholder="Enter Bn Title" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="date" class="form-label">Published Date</label>
                                    <input type="date" id="published_date" name="published_date"
                                           class="form-control" placeholder="Enter Published Date" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-fileinput" class="form-label">PDF File</label>
                                    <input type="file" name="pdf_file" id="example-fileinput" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label> Details Bn</label>
                                    <textarea class="form-control" id="content" name="descrip" placeholder="Enter the Description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label> Details En</label>
                                    <textarea class="form-control" id="content" name="descrip_en" placeholder="Enter the Description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="date" class="form-label">Entry User</label>
                                    <input type="text" id="entry_user" name="entry_user"
                                           class="form-control" placeholder="Enter Entry User" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-fileinput" class="form-label">Entry Date</label>
                                    <input type="date" name="entry_date" id="example-fileinput" class="form-control">
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
