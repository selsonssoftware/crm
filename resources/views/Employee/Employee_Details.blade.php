@extends('layout')
@section('content')
<style>
	.remove-image-btn {
    position: absolute;
    top: -8px;
    right: -8px;
    background: red;
    color: white;
    width: 22px;
    height: 22px;
    text-align: center;
    border-radius: 50%;
    font-size: 16px;
    cursor: pointer;
    line-height: 20px;
    border: 2px solid white;
}
.remove-image-btn {
    position: absolute;
    top: -8px;
    right: -8px;
    background: red;
    color: white;
    width: 22px;
    height: 22px;
    text-align: center;
    border-radius: 50%;
    font-size: 16px;
    cursor: pointer;
    line-height: 20px;
    border: 2px solid white;
}


</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="content">

				<!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h2 class="mb-1">Employee</h2>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="assets/demo/html/template/index.html"><i class="ti ti-smart-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									Employee
								</li>
								<li class="breadcrumb-item active" aria-current="page">Employee List</li>
							</ol>
						</nav>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
						
						<div class="mb-2">
							<a href="#" data-bs-toggle="modal" data-bs-target="#add_users" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Employee</a>
						</div>
						<div class="head-icons ms-2">
							<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
								<i class="ti ti-chevrons-up"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Breadcrumb -->
                <div class="row">

					<!-- Total Plans -->
					<div class="col-lg-3 col-md-6 d-flex">
						<div class="card flex-fill">
							<div class="card-body d-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center overflow-hidden">
									<div>
										<span class="avatar avatar-lg bg-dark rounded-circle"><i class="ti ti-users"></i></span>
									</div>
									<div class="ms-2 overflow-hidden">
										<p class="fs-12 fw-medium mb-1 text-truncate">Total Employee</p>
										<h4>1007</h4>
									</div>
								</div>
								<div>                                    
									<span class="badge badge-soft-purple badge-sm fw-normal">
										<i class="ti ti-arrow-wave-right-down"></i>
										+19.01%
									</span>
                                </div>
							</div>
						</div>
					</div>
					<!-- /Total Plans -->

					<!-- Total Plans -->
					<div class="col-lg-3 col-md-6 d-flex">
						<div class="card flex-fill">
							<div class="card-body d-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center overflow-hidden">
									<div>
										<span class="avatar avatar-lg bg-success rounded-circle"><i class="ti ti-user-share"></i></span>
									</div>
									<div class="ms-2 overflow-hidden">
										<p class="fs-12 fw-medium mb-1 text-truncate">Active</p>
										<h4>1007</h4>
									</div>
								</div>
								<div>                                    
									<span class="badge badge-soft-primary badge-sm fw-normal">
										<i class="ti ti-arrow-wave-right-down"></i>
										+19.01%
									</span>
                                </div>
							</div>
						</div>
					</div>
					<!-- /Total Plans -->

					<!-- Inactive Plans -->
					<div class="col-lg-3 col-md-6 d-flex">
						<div class="card flex-fill">
							<div class="card-body d-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center overflow-hidden">
									<div>
										<span class="avatar avatar-lg bg-danger rounded-circle"><i class="ti ti-user-pause"></i></span>
									</div>
									<div class="ms-2 overflow-hidden">
										<p class="fs-12 fw-medium mb-1 text-truncate">InActive</p>
										<h4>1007</h4>
									</div>
								</div>
								<div>                                    
									<span class="badge badge-soft-dark badge-sm fw-normal">
										<i class="ti ti-arrow-wave-right-down"></i>
										+19.01%
									</span>
                                </div>
							</div>
						</div>
					</div>
					<!-- /Inactive Companies -->

					<!-- No of Plans  -->
					<div class="col-lg-3 col-md-6 d-flex">
						<div class="card flex-fill">
							<div class="card-body d-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center overflow-hidden">
									<div>
										<span class="avatar avatar-lg bg-info rounded-circle"><i class="ti ti-user-plus"></i></span>
									</div>
									<div class="ms-2 overflow-hidden">
										<p class="fs-12 fw-medium mb-1 text-truncate">New Joiners</p>
										<h4>67</h4>
									</div>
								</div>
								<div>                                    
									<span class="badge badge-soft-secondary badge-sm fw-normal">
										<i class="ti ti-arrow-wave-right-down"></i>
										+19.01%
									</span>
                                </div>
							</div>
						</div>
					</div>
					<!-- /No of Plans -->

				</div>
				<!-- Performance Indicator list -->
				<div class="card">
					<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
						<h5>Employees List</h5>
						<div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
							<div class="dropdown me-3">
								<a href="javascript:void(0);"
								class="dropdown-toggle btn btn-white d-inline-flex align-items-center"
								data-bs-toggle="dropdown">
									Role
								</a>

								<ul class="dropdown-menu dropdown-menu-end p-3">
									<li>
										<a href="{{ url('/employee_list') }}"
										class="dropdown-item rounded-1">
											All
										</a>
									</li>

									@foreach($designation as $desig)
										<li>
											<a href="{{ url('/employee_list?designation_id='.$desig->designation_id) }}"
											class="dropdown-item rounded-1">
												{{ $desig->title }}
											</a>
										</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body p-0">
						<div class="custom-datatable-filter table-responsive">
							<table class="table datatable">
								<thead class="thead-light">
									<tr>
										<th>SR.NO</th>
										<th>First_Name</th>
										<th>Last_Name</th>
										<th>Email</th>
										<th>Phone_Number</th>
										<th>Date Of Birth</th>
										<th>Date Of Joining</th>
										<th>Employee_Image</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($variable as $data)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$data->first_name}}</td>
										<td>{{$data->last_name}}</td>
										<td>{{$data->email}}</td>
										<td>{{$data->phone}}</td>
										<td>{{$data->dob}}</td>
										<td>{{$data->date_joined}}</td>
										<th><img class="border border-white" src="{{ asset('uploads/logo/' . $data->logo) }}"
										style="width:100px;height:70px"></th>
										<td>
											@if($data->status == 'Active')
												<span class="badge bg-success">Active</span>
											@else
												<span class="badge bg-danger">Inactive</span>
											@endif
										</td>

										<td>
											<div class="action-icon d-inline-flex">
												<!-- <a href="#" class="me-2"><i class="ti ti-shield"></i></a> -->
												<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_user-{{$data->employee_id}}"><i class="ti ti-edit"></i></a>
											<a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal{{$data->employee_id}}"><i class="ti ti-trash"></i></a>
											</div>
										</td>
									</tr>
									<!--MODEL--->
									<div class="modal fade" id="edit_user-{{$data->employee_id}}">
										<div class="modal-dialog modal-dialog-centered modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">Edit Employee</h4>
													<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
														<i class="ti ti-x"></i>
													</button>
												</div>
												
												<form action="/employee_db" method="post" enctype="multipart/form-data">
													@csrf
													<input type="hidden" id="employee_id" name="employee_id" value="{{$data->employee_id}}">

													<div class="modal-body pb-0">
														<div class="row">
															<div class="col-md-6">
																<div class="mb-3">
																	<label class="form-label">First  Name</label>
																	<input type="text" class="form-control" value="{{$data->first_name}}" name="last_name">
																</div>	
															</div>
															<div class="col-md-6">
																<div class="mb-3">
																	<label class="form-label">Last Name</label>
																	<input type="text" class="form-control" value="{{$data->last_name}}" name="first_name">
																</div>	
															</div>
															<div class="col-md-6">
																<div class="mb-3">
																	<label class="form-label">Joined Date</label>
																	<input type="date" class="form-control" name="date_joined" value="{{$data->date_joined}}">
																</div>	
															</div>
															<div class="col-md-6">
																<div class="mb-3">
																	<label class="form-label">Email</label>
																	<input type="text" class="form-control" value="{{$data->email}}" name="email">
																</div>	
															</div>
															
															<div class="col-md-6">
																<div class="mb-3">
																	<label class="form-label">Phone</label>
																	<input type="text" class="form-control" value="{{$data->phone}}" name="phone">
																</div>	
															</div>
															<div class="col-md-6">
																<div class="mb-3">
																	<label class="form-label">Status</label>
																	<select class="select" name="status">
																		<option value="">Select</option>
																		<option value="Active" {{ $data->status == 'Active' ? 'selected' : '' }}>Active</option>
																		<option value="Inactive" {{ $data->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
																	</select>
																</div>	
															</div>
                                                            <div class="col-md-6">
																<div class="mb-3">
																	<label class="form-label">Department</label>
																		<select name="department_id"
																				class="select"
																				id="department-{{$data->employee_id}}"
																				onchange="loadDesignations({{$data->employee_id}})">

																			<option value="">Select</option>

																			@foreach($department->unique('department_id') as $dept)
																				<option value="{{ $dept->department_id }}"
																					{{ $dept->department_id == $data->department_id ? 'selected' : '' }}>
																					{{ $dept->name }}
																				</option>
																			@endforeach
																		</select>
																	</div>	
																</div>
																<div class="col-md-6">
																	<div class="mb-3">
																		<label class="form-label">Designation</label>
																		<select name="designation_id"
																				class="select"
																				id="designation-{{$data->employee_id}}">
																			<option value="">Select</option>
																		</select>

																	</div>	
																</div>
																<div class="col-md-6">
																	<label class="form-label">Profile Image</label>

																	<div class="position-relative d-inline-block">

																		<!-- Preview Image -->
																		<img id="previewImage-{{$data->employee_id}}"
																			src="{{ $data->logo ? '/uploads/logo/'.$data->logo : '/default-avatar.png' }}"
																			class="border rounded"
																			style="width: 120px; height: 120px; object-fit: cover;">

																		<!-- Remove Icon -->
																		<span class="remove-image-btn"
																			id="removeImageBtn-{{$data->employee_id}}"
																			style="{{ $data->logo ? '' : 'display:none;' }};
																			position:absolute; top: -5px; right:-5px; 
																			background:#ff0000; color:#fff; padding:4px 6px; 
																			border-radius:50%; cursor:pointer;">
																			&times;
																		</span>
																	</div>

																	<!-- Upload New Image -->
																	<input type="file"
																		class="form-control mt-2"
																		name="logo"
																		id="logoInput-{{$data->employee_id}}"
																		accept="image/*">

																	<!-- Hidden field for remove -->
																	<input type="hidden" name="remove_logo" id="removeLogoField-{{$data->employee_id}}" value="0">
																</div>
															</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
														<button type="submit" class="btn btn-primary">Update User</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<!-- Delete Modal -->
									<div class="modal fade" id="delete_modal{{$data->employee_id}}">
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
														<a href="/delete_employee?employee_id={{$data->employee_id}}" class="btn btn-danger">Yes, Delete</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /Delete Modal -->



									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /Performance Indicator list -->




				<!-- Add Users -->
		<div class="modal fade" id="add_users">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Employee</h4>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					
					<form action="/user_information" method="post" enctype="multipart/form-data">
						@csrf
						<div class="modal-body pb-0">
							<div class="row">
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label"></label>
										<input type="text" class="form-control" name="first_name">
									</div>	
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Last Name</label>
										<input type="text" class="form-control" name="last_name">
									</div>	
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Joined Date</label>
										<input type="date" class="form-control" name="date_joined">
									</div>	
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Email</label>
										<input type="text" class="form-control" name="email">
									</div>	
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">DOB</label>
										<input type="date" class="form-control" name="dob">
									</div>	
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Phone</label>
										<input type="text" class="form-control" name="phone">
									</div>	
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Status</label>
										<select class="select" name="status">
											<option>Select</option>
											<option>Active</option>
											<option>Inactive</option>
										</select>
									</div>	
								</div>
                                
								<div class="col-md-12">
									<label class="form-label">Profile Image</label>

									<div class="position-relative d-inline-block">
										<!-- Preview Box -->
										<img id="previewImage" 
											src="/default-avatar.png" 
											class="border rounded" 
											style="width: 120px; height: 120px; object-fit: cover;">

										<!-- Remove Icon -->
										<span id="removeImageBtn" 
											class="remove-image-btn" 
											style="display: none;">
											&times;
										</span>
									</div>

									<!-- File Input -->
									<input type="file" class="form-control mt-2" name="logo" id="logoInput" accept="image/*">
								</div>

								
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Add User</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Add Users -->

		<!-- Edit  Users -->
		
		<!-- /Edit  Users -->



			</div>

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
<script>
document.getElementById("logoInput").addEventListener("change", function(event) {
    let img = document.getElementById("previewImage");
    let removeBtn = document.getElementById("removeImageBtn");

    const file = event.target.files[0];
    if (file) {
        img.src = URL.createObjectURL(file);
        removeBtn.style.display = "block";
    }
});

// Remove Image
document.getElementById("removeImageBtn").addEventListener("click", function() {
    let img = document.getElementById("previewImage");
    let input = document.getElementById("logoInput");

    img.src = "/default-avatar.png";  
    input.value = ""; // clear file input
    this.style.display = "none";
});




document.querySelectorAll('[id^="logoInput"]').forEach(input => {
    input.addEventListener('change', function() {
        let id = this.id.split('-')[1];
        let preview = document.getElementById('previewImage-' + id);
        let removeBtn = document.getElementById('removeImageBtn-' + id);
        let file = this.files[0];

        preview.src = URL.createObjectURL(file);
        removeBtn.style.display = "block";
        document.getElementById('removeLogoField-' + id).value = 0;
    });
});

document.querySelectorAll('[id^="removeImageBtn"]').forEach(btn => {
    btn.addEventListener('click', function() {
        let id = this.id.split('-')[1];
        let preview = document.getElementById('previewImage-' + id);

        preview.src = "/default-avatar.png";
        this.style.display = "none";
        document.getElementById('removeLogoField-' + id).value = 1;
    });
});

</script>
<!--  -->
<script>
const departmentData = @json($department);
</script>
<script>
function loadDesignations(employeeId) {

    let deptSelect = document.getElementById('department-' + employeeId);
    let desigSelect = document.getElementById('designation-' + employeeId);

    if (!deptSelect || !desigSelect) return;

    let deptId = deptSelect.value;

    desigSelect.innerHTML = '<option value="">Select</option>';

    departmentData.forEach(item => {
        if (item.department_id == deptId) {

            let option = document.createElement('option');
            option.value = item.designation_id;
            option.text  = item.title;

            // Auto-select saved designation (EDIT MODE)
            if (item.designation_id == "{{ $data->designation_id ?? '' }}") {
                option.selected = true;
            }

            desigSelect.appendChild(option);
        }
    });
}



document.addEventListener('shown.bs.modal', function (event) {
    let modal = event.target;

    if (modal.id.startsWith('edit_user-')) {
        let empId = modal.id.split('-')[1];
        loadDesignations(empId);
    }
});
</script>


@endsection