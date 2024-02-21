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
                        <li class="breadcrumb-item active">Project Category Section!</li>
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
                    @can('project-category-create')
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewModalId">Add New</button>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Category Name En</th>
                        <th>Category Name Bn</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($projectCategory as $key=>$projectCategoryData)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$projectCategoryData->name}}</td>
                        <td>{{$projectCategoryData->name_bn}}</td>
                        <td>{{$projectCategoryData->status==1? 'Active':'Inactive'}}</td>
                        <td style="width: 100px;">
                            <div class="d-flex justify-content-end gap-1">
                                @can('project-category-edit')
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editNewModalId{{$projectCategoryData->id}}">Edit</button>
                                @endcan
                                @can('project-category-delete')
                                        <a href="{{route('project.category.destroy',$projectCategoryData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$projectCategoryData->id}}">Delete</a>
                                @endcan
                            </div>
                        </td>
                        <!--Edit Modal -->
                        <div class="modal fade" id="editNewModalId{{$projectCategoryData->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editNewModalLabel{{$projectCategoryData->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="addNewModalLabel{{$projectCategoryData->id}}">Edit</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{route('project.category.update',$projectCategoryData->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-2">
                                                        <label for="name" class="form-label">Category Name En</label>
                                                        <input type="text" id="name" name="name" value="{{$projectCategoryData->name}}"
                                                               class="form-control" placeholder="Enter Category Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-2">
                                                        <label for="name_bn" class="form-label">Category Name Bn</label>
                                                        <input type="text" id="name_bn" name="name_bn" value="{{$projectCategoryData->name_bn}}"
                                                               class="form-control" placeholder="Enter Category Name">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="example-select" class="form-label">Status</label>
                                                        <select name="status" class="form-select">
                                                            <option value="1" {{ $projectCategoryData->status === 1 ? 'selected' : '' }}>Active</option>
                                                            <option value="0" {{ $projectCategoryData->status === 0 ? 'selected' : '' }}>Inactive</option>
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
                        <div id="danger-header-modal{{$projectCategoryData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$projectCategoryData->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-danger">
                                        <h4 class="modal-title" id="danger-header-modalLabe{{$projectCategoryData->id}}l">Delete</h4>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <a href="{{route('project.category.destroy',$projectCategoryData->id)}}" class="btn btn-danger">Delete</a>
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
                    <form method="post" action="{{route('project.category.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="name" class="form-label"> Category Name En</label>
                                    <input type="text" id="name" name="name"
                                           class="form-control" placeholder="Enter Category Name" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="name_bn" class="form-label"> Category Name Bn</label>
                                    <input type="text" id="name_bn" name="name_bn"
                                           class="form-control" placeholder="Enter Category Name">
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
