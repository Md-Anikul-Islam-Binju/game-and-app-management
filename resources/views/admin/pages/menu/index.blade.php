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
                        <li class="breadcrumb-item active">Menu!</li>
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

                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name En</th>
                        <th>Name Bn</th>
                        <th>Order No</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menu as $key=>$menuData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$menuData->name_en}}</td>
                            <td>{{$menuData->name_bn}}</td>
                            <td>{{$menuData->order_no}}</td>
                            <td>{{$menuData->status==1? 'Active':'Inactive'}}</td>
                            <td style="width: 100px;">
                                <div class="d-flex justify-content-end gap-1">
                                    @can('menu-edit')
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editNewModalId{{$menuData->id}}">Edit</button>
                                    @endcan
                                </div>
                            </td>
                            <!--Edit Modal -->
                            <div class="modal fade" id="editNewModalId{{$menuData->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editNewModalLabel{{$menuData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="addNewModalLabel{{$menuData->id}}">Edit</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('menu.update',$menuData->id)}}">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-2">
                                                            <label for="name_bn" class="form-label">Name Bn</label>
                                                            <input type="text" id="name_bn" name="name_bn" value="{{$menuData->name_bn}}"
                                                                   class="form-control" placeholder="Enter Name Bn" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-2">
                                                            <label for="name_en" class="form-label">Name En</label>
                                                            <input type="text" id="name_en" name="name_en" value="{{$menuData->name_en}}"
                                                                   class="form-control" placeholder="Enter Name En" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-2">
                                                            <label for="order_no" class="form-label">Order Number</label>
                                                            <input type="text" id="order_no" name="order_no" value="{{$menuData->order_no}}"
                                                                   class="form-control" placeholder="Enter Order Number" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Status</label>
                                                            <select name="status" class="form-select">
                                                                <option value="1" {{ $menuData->status === 1 ? 'selected' : '' }}>Active</option>
                                                                <option value="0" {{ $menuData->status === 0 ? 'selected' : '' }}>Inactive</option>
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

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
