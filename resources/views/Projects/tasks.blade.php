@extends('layout')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <div class="content mt-5">

                <!-- Breadcrumb -->
                <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
                    <div class="my-auto mb-2">
                        <h2 class="mb-1">Tasks</h2>
                        
                    </div>
                    <div class="my-xl-auto right-content d-flex">
                        <div class="mb-2">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#add_task" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Task</a>
                        </div>
                        <div class="head-icons ms-2 mb-0">
                            <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
                                <i class="ti ti-chevrons-up"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Breadcrumb -->
               <div class="card p-3 mb-4">
    <form method="GET" action="/show_tasks">

        <div class="row">

            <!-- Project Dropdown -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Project Name</label>
                    <select class="form-select" name="project_id" required>
                        <option value="">Select Project</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->project_id }}"
                                {{ request('project_id') == $project->project_id ? 'selected' : '' }}>
                                {{ $project->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Search Button -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label d-block">&nbsp;</label>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="ti ti-search me-2"></i> Search
                    </button>
                </div>
            </div>

        </div>

    </form>
</div>


{{-- ========================= --}}
{{-- SHOW PROJECT DETAILS --}}
{{-- ========================= --}}

@if(count($tasks) > 0)
<div class="list-group list-group-flush mb-4">

    @foreach($tasks as $task)
    <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
        <div class="row align-items-center row-gap-3">

            <!-- LEFT SIDE: task title + date -->
            <div class="col-lg-6 col-md-7">
                <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                    <span class="me-2 d-flex align-items-center">
                        <i class="ti ti-grid-dots text-dark"></i>
                    </span>

                    <div class="form-check form-check-md me-2">
                        <input class="form-check-input" type="checkbox">
                    </div>

                    <span class="me-2 d-flex align-items-center rating-select">
                        <i class="ti ti-star"></i>
                    </span>

                    <div class="strike-info">
                        <h4 class="fs-14 text-truncate">
                            {{ $task->title }}
                        </h4>
                    </div>

                    <span class="badge bg-transparent-dark text-dark rounded-pill ms-2">
                        <i class="ti ti-calendar me-1"></i>{{ $task->due_date }}
                    </span>
                </div>
            </div>

            <!-- RIGHT SIDE: badges + dropdown -->
            <div class="col-lg-6 col-md-5">
                <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">

                    <span class="badge badge-skyblue me-3">
                        Assigned: {{ $task->first_name }}
                    </span>

                    @php
                        $colors = [
                            'Not Started' => 'danger',
                            'In Progress' => 'warning',
                            'On Hold' => 'primary',
                            'Completed' => 'success',
                        ];
                    @endphp

                    <span class="badge bg-soft-{{ $colors[$task->status] ?? '' }} d-inline-flex align-items-center me-3">
                        <i class="fas fa-circle text-{{ $colors[$task->status] ?? '' }} fs-6 me-1"></i>
                        {{ $task->status }}
                    </span>


                    <div class="d-flex align-items-center">
                        <div class="avatar-list-stacked avatar-group-sm">
                            <span class="avatar avatar-rounded">
                               <img class="border border-white" src="{{ asset('uploads/logo/' . $task->logo) }}">

                            </span>
                        </div>

                        <div class="dropdown ms-2">
                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                <li>
                                    <a  href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task-{{$task->task_id}}">
                                        <i class="ti ti-edit me-2"></i>Edit
                                    </a>
                                </li>
                                <li>
                                    <ahref="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal{{$task->task_id}}">
                                        <i class="ti ti-trash me-2"></i>Delete
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="#" class="dropdown-item rounded-1">
                                        <i class="ti ti-eye me-2"></i>View
                                    </a>
                                </li> -->
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>






     <!-- Edit Task -->
        <div class="modal fade" id="edit_task-{{$task->task_id}}">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Task  </h4>
                        <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ti ti-x"></i>
                        </button>
                    </div>
                    <form action="/task_db" method="post">
                        @csrf
                        <input type="hidden" name="task_id" value="{{ $task->task_id }}">
                        <div class="modal-body">
                            <div class="row">
                                <!-- <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control"  name="title" value="{{$task->title}}">
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Due Date</label>
                                        <div class="input-icon-end position-relative">
                                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="due_date" value="{{$task->due_date}}">
                                            
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-md-6">                            
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="select" name="status" value="{{$task->status}}">
                                           <option value="">Select</option>
                                            <option value="Not Started" {{ $task->status == 'Not Started' ? 'selected' : '' }}>Not Started</option>
                                            <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="On Hold" {{ $task->status == 'On Hold' ? 'selected' : '' }}>On Hold</option>
                                            <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Description</label>
                                       <textarea name="description" id="description-{{ $task->task_id }}" class="form-control summernote-task" rows="5">
                                            {{ $task->description }}
                                        </textarea>
                                    </div>
                                </div>
                             </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Edit Task -->
         <!-- Delete Modal -->
        <div class="modal fade" id="delete_modal{{$task->task_id}}">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
							<i class="ti ti-trash-x fs-36"></i>
						</span>
                        <h4 class="mb-1">Confirm Delete</h4>
                        <p class="mb-3">You want to delete all the marked items, this cant be undone once you delete.</p>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:void(0);" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</a>
                            <a href="/delete_task?task_id={{$task->task_id}}" class="btn btn-danger">Yes, Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Modal -->
    @endforeach

</div>

@else
<div class="alert alert-info">No tasks found for this project.</div>
@endif

</div>


               

              <!-- Add Task -->
        <div class="modal fade" id="add_task">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Task  </h4>
                        <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ti ti-x"></i>
                        </button>
                    </div>
                    <form action="/store_tasks" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Due Date</label>
                                        <div class="input-icon-end position-relative">
                                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="due_date">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Project</label>
                                        <select class="select" name="project_id">
                                            <option>Select</option>
                                          @foreach ($projects as $project)
                                                <option value="{{ $project->project_id }}">
                                                    {{ $project->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Employee</label>
                                        <select class="select" name="employee_name">
                                            <option>Select</option>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->employee_id }}">
                                                    {{ $employee->first_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Priority</label>
                                        <select class="select" name="priority">
                                            <option>Select</option>
                                            <option>Medium</option>
                                            <option>High</option>
                                            <option>Low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="select" name="status">
                                            <option>Select</option>
                                            <option selected>Inprogress</option>
                                            <option>Completed</option>
                                            <option>Pending</option>
                                            <option>Not Started</option>
                                            <option>On hold</option>
                                        </select>
                                    </div>
                                </div>
                               <div class="col-lg-12">
                                    
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                                    </div>
        
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Upload Attachment</label>
                                    <div class="bg-light rounded p-2">
                                        <div class="profile-uploader border-bottom mb-2 pb-2">
                                            <div class="drag-upload-btn btn btn-sm btn-white border px-3">
                                                Select File
                                                <input type="file" class="form-control image-sign" name="task_file" id="task_file">
                                                <p id="showFileName" class="mt-2 text-primary fw-bold"></p>

                                            </div>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add New Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Add Task -->

       

         





 <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', { versionCheck: false });
</script>  
<script>
document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("task_file");
    const showName = document.getElementById("showFileName");

    input.addEventListener("change", function () {
        if (this.files && this.files.length > 0) {
            showName.textContent = this.files[0].name;
        } else {
            showName.textContent = "No file selected";
        }
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    // When any "edit_task-*" modal is opened
    $(document).on('shown.bs.modal', function (event) {

        let modal = $(event.target); // opened modal
        let editor = modal.find('.summernote-task'); // find textarea

        if (editor.length && !editor.hasClass("note-editor-loaded")) {

            editor.summernote({
                height: 150,
                tabsize: 2
            });

            editor.addClass("note-editor-loaded"); // prevent re-loading editor
        }
    });

});
</script>

<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1800
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 1800
        });
    @endif
</script>
@endsection