@extends('admin.app')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SDMGA</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">File Management</a></li>
                        <li class="breadcrumb-item active">Project File Store!</li>
                    </ol>
                </div>
                <h4 class="page-title">File Management!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    @can('project-file-create')
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewModalId">Add New</button>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Project Title</th>
                        <th>Category</th>
                        <th>SRS</th>
                        <th>SQL</th>
                        <th>Document</th>
                        <th>Source Code</th>
                        <th>APK</th>
                        <th>API</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($projectFile as $key=>$projectFileData)
                        <tr>
                            <td>
                                {{$key+1}}
                            </td>
                            <td>{{$projectFileData->title}}</td>
                            <td>{{$projectFileData->category->name}}</td>
                            <td>
                                @if($projectFileData->srs!=null)
                                    <span class="badge bg-primary">Yes</span>
                                @else
                                    <span class="badge bg-danger">No</span>
                                @endif
                            </td>
                            <td>
                                @if($projectFileData->sql!=null)
                                    <span class="badge bg-primary">Yes</span>
                                @else
                                    <span class="badge bg-danger">No</span>
                                @endif
                            </td>
                            <td>
                                @if($projectFileData->document!=null)
                                    <span class="badge bg-primary">Yes</span>
                                @else
                                    <span class="badge bg-danger">No</span>
                                @endif
                            </td>
                            <td>
                                @if($projectFileData->source_code_zip!=null)
                                    <span class="badge bg-primary">Yes</span>
                                @else
                                    <span class="badge bg-danger">No</span>
                                @endif
                            </td>
                            <td>
                                @if($projectFileData->apk_file!=null)
                                    <span class="badge bg-primary">Yes</span>
                                @else
                                    <span class="badge bg-danger">No</span>
                                @endif
                            </td>
                            <td>
                                @if($projectFileData->api_file!=null)
                                    <span class="badge bg-primary">Yes</span>
                                @else
                                    <span class="badge bg-danger">No</span>
                                @endif
                            </td>
                            <td style="width: 100px;">
                                <div class="d-flex justify-content-end gap-1">
                                    @can('project-file-delete')
                                        <a href="{{route('project.file.destroy',$projectFileData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$projectFileData->id}}">Delete</a>
                                    @endcan
                                </div>
                            </td>
                            <!-- Delete Modal -->
                            <div id="danger-header-modal{{$projectFileData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$projectFileData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabe{{$projectFileData->id}}l">Delete</h4>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('project.file.destroy',$projectFileData->id)}}" class="btn btn-danger">Delete</a>
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
    <!-- Add Modal -->
    <div class="modal fade" id="addNewModalId" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addNewModalLabel">Add</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('project.file.store') }}" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Project File Category</label>
                                    <select name="category_id" class="form-select" id="categorySelect">
                                        <option selected>Select Category</option>
                                        @foreach($projectCategoryFiles as $projectCategoryFilesData)
                                        <option value="{{$projectCategoryFilesData->id}}">{{$projectCategoryFilesData->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Project Title</label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter Project Title" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3" id="srsField">
                                    <label for="example-fileinput" class="form-label">SRS File</label>
                                    <input type="file" name="srs"  class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3" id="sqlField">
                                    <label for="example-fileinput" class="form-label">SQL File</label>
                                    <input type="file" name="sql"  class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-fileinput" class="form-label">Project Documentation</label>
                                    <input type="file" name="document" id="documentField" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-fileinput" class="form-label">Source Code Zip File</label>
                                    <input type="file" name="source_code_zip" id="sourceCodeZipField" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3" id="apkField">
                                    <label for="example-fileinput" class="form-label">APK File</label>
                                    <input type="file" name="apk_file"  class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3" id="apiField">
                                    <label for="example-fileinput" class="form-label">API File</label>
                                    <input type="file" name="api_file"  class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label>Project Scene Sort Images</label>
                                    <div id="dropzoneWrapper">
                                        <i class="h1 text-muted ri-upload-cloud-2-line"></i><br>
                                        <span>Drag and drop images</span>
                                        <input type="file" name="scene_short[]" id="image-input" multiple accept="image/*" style="display: none;">
                                    </div>
                                    <div id="image-preview-container"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label> Have Any Short Note </label>
                                    <textarea class="form-control" id="content" name="note" placeholder="Enter Have Any Short Note"></textarea>
                                </div>
                            </div>
                        </div>

                        <h4>More Information</h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-fileinput" class="form-label">EOI File</label>
                                    <input type="file" name="eoi_file" id="documentField" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-fileinput" class="form-label">RFP File</label>
                                    <input type="file" name="rfp_file" id="sourceCodeZipField" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                        <label for="example-fileinput" class="form-label">Contract Sign File</label>
                                    <input type="file" name="contract_sign_file" id="documentField" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="example-fileinput" class="form-label">Release File</label>
                                    <input type="file" name="release_file" id="sourceCodeZipField" class="form-control">
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var categorySelect = document.getElementById('categorySelect');
            var srsField = document.getElementById('srsField');
            var sqlField = document.getElementById('sqlField');
            var apkField = document.getElementById('apkField');
            var apiField = document.getElementById('apiField');
            var documentField = document.getElementById('documentField');
            var sourceCodeZipField = document.getElementById('sourceCodeZipField');

            categorySelect.addEventListener('change', function () {
                var selectedCategory = categorySelect.value;

                // Reset visibility of all fields
                srsField.style.display = 'none';
                sqlField.style.display = 'none';
                apkField.style.display = 'none';
                apiField.style.display = 'none';
                documentField.style.display = 'none';
                sourceCodeZipField.style.display = 'none';

                // Show fields based on the selected category
                if (selectedCategory === '1') {
                    // Mobile App selected
                    apkField.style.display = 'block';
                    apiField.style.display = 'block';
                } else if (selectedCategory === '2') {
                    // Web Application selected
                    srsField.style.display = 'block';
                    sqlField.style.display = 'block';
                }

                // Show common fields for both categories
                documentField.style.display = 'block';
                sourceCodeZipField.style.display = 'block';
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropzoneWrapper = document.getElementById('dropzoneWrapper');
            const imageInput = document.getElementById('image-input');
            const previewContainer = document.getElementById('image-preview-container');

            dropzoneWrapper.addEventListener('click', () => imageInput.click());
            dropzoneWrapper.addEventListener('dragover', handleDragOver);
            dropzoneWrapper.addEventListener('dragleave', handleDragLeave);
            dropzoneWrapper.addEventListener('drop', handleDrop);
            imageInput.addEventListener('change', handleImageUpload);

            function handleDragOver(event) {
                event.preventDefault();
                dropzoneWrapper.style.border = '2px dashed #999';
            }

            function handleDragLeave() {
                dropzoneWrapper.style.border = '2px dashed #ddd';
            }

            function handleDrop(event) {
                event.preventDefault();
                dropzoneWrapper.style.border = '2px dashed #ddd';
                handleImageUpload(event);
            }

            function handleImageUpload(event) {
                const files = event.target.files || event.dataTransfer.files;

                for (const file of files) {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const imageUrl = e.target.result;
                            createImagePreview(imageUrl, file);
                        };

                        reader.readAsDataURL(file);
                    }
                }
            }

            function createImagePreview(imageUrl, file) {
                const imagePreview = document.createElement('div');
                imagePreview.classList.add('image-preview');

                const imgElement = document.createElement('img');
                imgElement.src = imageUrl;
                imgElement.alt = file.name;
                imgElement.classList.add('img-preview');

                const removeButton = document.createElement('div');
                removeButton.classList.add('remove-preview');
                removeButton.innerHTML = '<i class=" ri-close-line"></i>';

                removeButton.addEventListener('click', function() {
                    imagePreview.remove();
                });

                imagePreview.appendChild(imgElement);
                imagePreview.appendChild(removeButton);
                previewContainer.appendChild(imagePreview);
            }
        });
    </script>
@endsection
