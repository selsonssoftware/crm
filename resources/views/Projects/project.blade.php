@extends('layout')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="content">

				<!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h2 class="mb-1">Projects</h2>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="https://smarthr.co.in/demo/html/template/index.html"><i class="ti ti-smart-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									Employee
								</li>
								<li class="breadcrumb-item active" aria-current="page">Projects</li>
							</ol>
						</nav>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
						<!-- <div class="me-2 mb-2">
							<div class="d-flex align-items-center border bg-white rounded p-1 me-2 icon-list">
								<a href="https://smarthr.co.in/demo/html/template/projects.html" class="btn btn-icon btn-sm active bg-primary text-white me-1"><i class="ti ti-list-tree"></i></a>
								<a href="https://smarthr.co.in/demo/html/template/projects-grid.html" class="btn btn-icon btn-sm"><i class="ti ti-layout-grid"></i></a>
							</div>
						</div>
						<div class="me-2 mb-2">
							<div class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
									<i class="ti ti-file-export me-1"></i>Export
								</a>
								<ul class="dropdown-menu  dropdown-menu-end p-3">
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
									</li>
								</ul>
							</div>
						</div> -->
						<div class="mb-2">
							<a href="#" data-bs-toggle="modal" data-bs-target="#add_project" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Project</a>
						</div>
						<div class="ms-2 head-icons">
							<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
								<i class="ti ti-chevrons-up"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Breadcrumb -->

				<!-- Project list -->
				<div class="card">
					<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
						<h5>Project List</h5>
						<div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
							<!-- <div class="dropdown me-3">
								<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
									Select Status
								</a>
								<ul class="dropdown-menu  dropdown-menu-end p-3">
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1">Active</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1">Inactive</a>
									</li>
								</ul>
							</div>
							<div class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
									Sort By : Last 7 Days
								</a>
								<ul class="dropdown-menu  dropdown-menu-end p-3">
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1">Recently Added</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1">Ascending</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1">Desending</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1">Last Month</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1">Last 7 Days</a>
									</li>
								</ul>
							</div> -->
						</div>
					</div>
					<div class="card-body p-0">
						<div class="custom-datatable-filter table-responsive">
							<table class="table datatable">
								<thead class="thead-light">
									<tr>
                                       
										<th>Project ID</th>
										<th>Project Name</th>
										<th>Client</th>
										<th>Contact_Name</th>
										<th>Logo</th>
										<th>Start Date</th>
										<th>End Date</th>
                                        <th>Priority</th>
                                        <th>Project VALUE</th>
                                        <th>Price Type</th>
                                        <th>Status</th>
                                        <th>Project_File</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($variable as $data)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$data->name}}</td>
										<td>{{$data->client_id}}</td>
										<td>{{$data->contact_name}}</td>
										<td>
    <img src="{{ asset('uploads/logo/' . $data->logo) }}" 
         alt="Logo" 
         style="width:50px; height:50px; object-fit:cover; border-radius:8px;">
</td>

										<td>{{$data->start_date}}</td>
										<td>{{$data->end_date}}</td>
										<td>
											@if($data->priority == 'High')
												<span class="badge bg-success">High</span>
											@elseif($data->priority == 'Medium')
												<span class="badge bg-warning text-dark">Medium</span>
											@elseif($data->priority == 'Low')
												<span class="badge bg-danger">Low</span>
											@else
												<span class="badge bg-secondary">N/A</span>
											@endif
										</td>

										<td>{{$data->project_value}}</td>
                                        <td>{{$data->price_type}}</td>
										<td>
											@if($data->status == 'Not Started')
												<span class="badge bg-danger">Not Started</span>
											@elseif($data->status == 'In Progress')
												<span class="badge bg-primary">In Progress</span>
											@elseif($data->status == 'On Hold')
												<span class="badge bg-warning text-dark">On Hold</span>
											@elseif($data->status == 'Completed')
												<span class="badge bg-success">Completed</span>
											@else
												<span class="badge bg-dark">N/A</span>
											@endif
										</td>

										<td>{{$data->project_file}}</td>
										<td>
											<div class="action-icon d-inline-flex">
												<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_project-{{$data->project_id}}"><i class="ti ti-edit"></i></a>
												<a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal{{$data->project_id}}"><i class="ti ti-trash"></i></a>
											</div>
										</td>
									</tr>




                                    <!-- Edit Project -->
									<div class="modal fade" id="edit_project-{{$data->project_id}}" role="dialog">
										<div class="modal-dialog modal-dialog-centered modal-lg">
											<div class="modal-content">
												<div class="modal-header header-border align-items-center justify-content-between">
													<div class="d-flex align-items-center">
														<h5 class="modal-title me-2">Edit Project </h5>
														<p class="text-dark">Project ID : PRO-0004</p>
													</div>
													<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
														<i class="ti ti-x"></i>
													</button>
												</div>
												<div class="add-info-fieldset ">
													<div class="contact-grids-tab p-3 pb-0">
														<ul class="nav nav-underline" id="myTab1" role="tablist">
															<li class="nav-item" role="presentation">
																<button class="nav-link active" id="basic-tab1" data-bs-toggle="tab" data-bs-target="#basic-info1" type="button" role="tab" aria-selected="true">Basic Information</button>
															</li>
															<!-- <li class="nav-item" role="presentation">
																<button class="nav-link" id="member-tab1" data-bs-toggle="tab" data-bs-target="#member1" type="button" role="tab" aria-selected="false">Members</button>
															</li> -->
														</ul>
													</div>
														<div class="tab-content" id="myTabContent1">
															<div class="tab-pane fade show active" id="basic-info1" role="tabpanel" aria-labelledby="basic-tab1" tabindex="0">
														<form action="/project_db" method="post"  enctype="multipart/form-data">
															@csrf
															<input type="hidden" id="project_id" name="project_id" value="{{$data->project_id}}">

															<div class="modal-body">
																<div class="row">
																	<div class="col-md-12">
																		<div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">                                                
																			<div class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded-circle border border-dashed me-2 flex-shrink-0 text-dark frames">
																				<img id="logo-preview-{{ $data->project_id }}" 
																					src="{{ $data->logo ? asset('uploads/logo/' . $data->logo) : '' }}" 
																					style="width:100%; height:100%; object-fit:cover; border-radius:50%; {{ $data->logo ? '' : 'display:none;' }}">

																				<!-- Default icon -->
																				<i id="logo-icon-{{ $data->project_id }}" 
																				class="ti ti-photo text-gray-2 fs-16"
																				style="{{ $data->logo ? 'display:none;' : '' }}">
																				</i>
																			</div>                                              
																			<div class="profile-upload">
																				<div class="mb-2">
																					<h6 class="mb-1">Upload Project Logo</h6>
																					<p class="fs-12">Image should be below 4 mb</p>
																				</div>
																				<div class="profile-uploader d-flex align-items-center">
																					<div class="drag-upload-btn btn btn-sm btn-primary me-2">
																						Upload
																						<!-- <input type="file" class="form-control image-sign" multiple="" name="logo" accept="image/*"> -->
																						<input type="file" 
																							class="form-control image-input" 
																							name="logo" 
																							data-id="{{ $data->project_id }}"
																							accept="image/*">

																					</div>
																					<a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
																				</div>
																				
																			</div>
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="mb-3">
																			<label class="form-label">Project Name</label>
																			<input type="text" class="form-control" name="name" value="{{$data->name}}">
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="row">

																			<!-- Client -->
																			<div class="col-md-6">
																				<div class="mb-3">
																					<label class="form-label">Client</label>
																					<select class="form-select" name="client_id" required>
																						<option value="">Select Client</option>

																						@foreach ($contacts as $contact)
																							<option value="{{ $contact->contact_id }}"
																								{{ $data->client_id == $contact->contact_id ? 'selected' : '' }}>
																								{{ $contact->name }}
																							</option>
																						@endforeach
																					</select>
																				</div>
																			</div>

																			<!-- Status -->
																			<div class="col-md-6">
																				<div class="mb-3">
																					<label class="form-label">Status</label>
																					<select class="form-select" name="status" value="{{$data->status}}">
    <option value="">Select</option>
    <option value="Not Started" {{ $data->status == 'Not Started' ? 'selected' : '' }}>Not Started</option>
    <option value="In Progress" {{ $data->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
    <option value="On Hold" {{ $data->status == 'On Hold' ? 'selected' : '' }}>On Hold</option>
    <option value="Completed" {{ $data->status == 'Completed' ? 'selected' : '' }}>Completed</option>
</select>

																				</div>
																			</div>

																		</div>
																	</div>

																	<div class="col-md-12">
																		<div class="row">
																			<div class="col-md-6">
																				<div class="mb-3">
																					<label class="form-label">Start Date</label>
																					<div class="input-icon-end position-relative">
																						<input type="date" class="form-control " placeholder="dd/mm/yyyy" name="start_date"  value="{{$data->start_date}}">
																						<!-- <span class="input-icon-addon datetimepicker">
																							<i class="ti ti-calendar text-gray-7"></i>
																						</span> -->
																					</div>
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="mb-3">
																					<label class="form-label">End Date</label>
																					<div class="input-icon-end position-relative">
																						<input type="date" class="form-control" placeholder="dd/mm/yyyy" name="end_date" value="{{$data->end_date}}">
																						<!-- <span class="input-icon-addon">
																							<i class="ti ti-calendar text-gray-7"></i>
																						</span> -->
																					</div>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="mb-3">
																					<label class="form-label">Priority</label>
																					<select class="select" name="priority">
    <option value="">Select</option>
    <option value="High" {{ $data->priority == 'High' ? 'selected' : '' }}>High</option>
    <option value="Medium" {{ $data->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
    <option value="Low" {{ $data->priority == 'Low' ? 'selected' : '' }}>Low</option>
</select>

																				</div>
																			</div>
																			
																			<div class="col-md-4">
																				<div class="mb-3">
																					<label class="form-label">Project Value</label>
																					<input type="text" class="form-control" name="project_value"  value="{{$data->project_value}}">
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="mb-3">
																					<label class="form-label">Price Type</label>
																					<input type="text" class="form-control" name="price_type"  value="{{$data->price_type}}">
																				</div>
																			</div>
																		</div>
																	</div>
																	<!-- <div class="col-md-12">
																		<div class="mb-3">
																			<label class="form-label">Description</label>
																			<input type="hidden" name="description" id="description-input">
																			<div class="summernote"></div>
																		</div>
																	</div> -->
																	<div class="col-md-12">
																		<div class="input-block mb-0">
																			<label class="form-label">Upload Files</label>
																			<input class="form-control" type="file" name="project_file"  value="{{$data->project_file}}">
																			
											@if(!empty($data->project_file))
												<div class="mt-2">
													<a href="{{ asset('uploads/files/' . $data->project_file) }}" target="_blank">
														Previously Uploaded: {{ $data->project_file }}
													</a>
												</div>
											@endif
																		</div>
																	</div>
																</div>								
															</div>
															<div class="modal-footer">
																<div class="d-flex align-items-center justify-content-end">
																	<button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
																	<button class="btn btn-primary" type="submit">Update</button>
																</div>
															</div>
														</form>
														</div>
														<div class="tab-pane fade" id="member1" role="tabpanel" aria-labelledby="member-tab1" tabindex="0">
														
													</div>
												</div>
											</div>
										</div>
										</div>
									</div>
									<!-- /Edit Project -->
									 <!-- Delete Modal -->
									<div class="modal fade" id="delete_modal{{$data->project_id}}">
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
														<a href="/delete_project?project_id={{$data->project_id}}" class="btn btn-danger">Yes, Delete</a>
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
				<!-- / Project list  -->

			</div>
			
<!-- Add Project -->
<div class="modal fade" id="add_project" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header header-border align-items-center justify-content-between">
				<div class="d-flex align-items-center">
					<h5 class="modal-title me-2">Add Project </h5>
					<p class="text-dark">Project ID : PRO-0004</p>
				</div>
				<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
					<i class="ti ti-x"></i>
				</button>
			</div>
			<div class="add-info-fieldset ">
				<div class="contact-grids-tab p-3 pb-0">
					<ul class="nav nav-underline" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="basic-tab" data-bs-toggle="tab" data-bs-target="#basic-info" type="button" role="tab" aria-selected="true">Basic Information</button>
						  </li>
						  <!-- <li class="nav-item" role="presentation">
							<button class="nav-link" id="member-tab" data-bs-toggle="tab" data-bs-target="#member" type="button" role="tab" aria-selected="false">Members</button>
						  </li> -->
					</ul>
				</div>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="basic-tab" tabindex="0">
					<form action="/store_project" method="post"  enctype="multipart/form-data">
                        @csrf
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">                                                
										<div class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded-circle border border-dashed me-2 flex-shrink-0 text-dark frames">
											<!-- <i class="ti ti-photo text-gray-2 fs-16"></i> -->
											 <img id="add-logo-preview" src="" 
         style="width:100%; height:100%; object-fit:cover; border-radius:50%; display:none;">
										</div>                                              
										<div class="profile-upload">
											<div class="mb-2">
												<h6 class="mb-1">Upload Project Logo</h6>
												<p class="fs-12">Image should be below 4 mb</p>
											</div>
											<div class="profile-uploader d-flex align-items-center">
												<div class="drag-upload-btn btn btn-sm btn-primary me-2">
													Upload
													<input type="file" class="form-control image-sign" multiple="" name="logo" accept="image/*">
												</div>
												<a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Project Name</label>
										<input type="text" class="form-control" name="name">
									</div>
								</div>
								<div class="col-md-12">
                                    <div class="row">

                                        <!-- Client -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Client</label>
                                                <select class="form-select" name="client_id">
													<option value="">Select Client</option>

													@foreach ($contacts as $contact)
														<option value="{{ $contact->contact_id }}"
															{{ $data->client_id == $contact->contact_id ? 'selected' : '' }}>
															{{ $contact->name }}
														</option>
													@endforeach
												</select>
                                            </div>
                                        </div>

                                        <!-- Status -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Status</label>
                                                <select class="form-select" name="status">
                                                    <option value="">Select</option>
                                                    <option value="not started">Not Started</option>
                                                    <option value="in progress">In Progress</option>
													<option value="on hold">On Hold</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

								<div class="col-md-12">
									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label class="form-label">Start Date</label>
												<div class="input-icon-end position-relative">
													<input type="date" class="form-control " placeholder="dd/mm/yyyy" name="start_date">
													<!-- <span class="input-icon-addon datetimepicker">
														<i class="ti ti-calendar text-gray-7"></i>
													</span> -->
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label class="form-label">End Date</label>
												<div class="input-icon-end position-relative">
													<input type="date" class="form-control" placeholder="dd/mm/yyyy" name="end_date">
													<!-- <span class="input-icon-addon">
														<i class="ti ti-calendar text-gray-7"></i>
													</span> -->
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="mb-3">
												<label class="form-label">Priority</label>
												<select class="select" name="priority">
													<option>Select</option>
													<option>High</option>
													<option>Medium</option>
													<option>Low</option>
												</select>
											</div>
										</div>
                                        
										<div class="col-md-4">
											<div class="mb-3">
												<label class="form-label">Project Value</label>
												<input type="text" class="form-control" name="project_value">
											</div>
										</div>
										<div class="col-md-4">
											<div class="mb-3">
												<label class="form-label">Price Type</label>
												<input type="text" class="form-control" name="price_type">
											</div>
										</div>
									</div>
								</div>
								<!-- <div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Description</label>
                                        <input type="hidden" name="description" id="description-input">
                                        <div class="summernote"></div>
									</div>
								</div> -->
								<div class="col-md-12">
									<div class="input-block mb-0">
										<label class="form-label">Upload Files</label>
										<input class="form-control" type="file" name="project_file">
									</div>
								</div>
							</div>								
						</div>
						<div class="modal-footer">
							<div class="d-flex align-items-center justify-content-end">
								<button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
								<button class="btn btn-primary" type="submit">Save</button>
							</div>
						</div>
					</form>
					</div>
					<div class="tab-pane fade" id="member" role="tabpanel" aria-labelledby="member-tab" tabindex="0">
					<form action="https://smarthr.co.in/demo/html/template/projects.html">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label me-2">Team Members</label>
										<input class="input-tags form-control" placeholder="Add new" type="text" data-role="tagsinput"  name="Label" value="Jerald,Andrew,Philip,Davis">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label me-2">Team Leader</label>
										<input class="input-tags form-control" placeholder="Add new" type="text" data-role="tagsinput"  name="Label" value="Hendry,James">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label me-2">Project Manager</label>
										<input class="input-tags form-control" placeholder="Add new" type="text" data-role="tagsinput"  name="Label" value="Dwight">
									</div>
								</div>
								<div class="col-md-12">
									<div>
										<label class="form-label">Tags</label>
										<input class="input-tags form-control" placeholder="Add new" type="text" data-role="tagsinput"  name="Label" value="Collab,Promotion,Rated">
									</div>
								</div>
								
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Status</label>
										<select class="select">
											<option>Select</option>
											<option>Active</option>
											<option>Inactive</option>
										</select>
									</div>
								</div>
							</div>								
						</div>
						<div class="modal-footer">
							<div class="d-flex align-items-center justify-content-end">
								<button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
								<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#success_modal">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
<!-- /Add Project -->



<!-- Add Project Success -->
<div class="modal fade" id="success_modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
			<div class="modal-body">
				<div class="text-center p-3">
					<span class="avatar avatar-lg avatar-rounded bg-success mb-3"><i class="ti ti-check fs-24"></i></span>
					<h5 class="mb-2">Project  Added Successfully</h5>
					<p class="mb-3">Stephan Peralt has been added with Client ID : <span class="text-primary">#pro - 0004</span>
					</p>
					<div>
						<div class="row g-2">
							<div class="col-6">
								<a href="https://smarthr.co.in/demo/html/template/projects.html" class="btn btn-dark w-100">Back to List</a>
							</div>
							<div class="col-6">
								<a href="https://smarthr.co.in/demo/html/template/project-details.html" class="btn btn-primary w-100">Detail Page</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Add Project Success -->




<!-- <script>
document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.querySelector(".image-sign");
    const frame = document.querySelector(".frames");

    fileInput.addEventListener("change", function (event) {
        const file = event.target.files[0];

        if (file) {
            // File size validation (4 MB limit)
            if (file.size > 4 * 1024 * 1024) {
                alert("Image must be less than 4 MB");
                fileInput.value = "";
                return;
            }

            // Remove existing icon inside frame
            frame.innerHTML = "";

            // Create image element for preview
            const img = document.createElement("img");
            img.style.width = "100%";
            img.style.height = "100%";
            img.style.objectFit = "cover";
            img.style.borderRadius = "50%";

            frame.appendChild(img);

            // Read file and display preview
            const reader = new FileReader();
            reader.onload = function (e) {
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
<script>
    const logoInput = document.getElementById('logo-input');
    const logoPreview = document.getElementById('logo-preview');
    const logoIcon = document.getElementById('logo-icon');
    const cancelBtn = document.getElementById('cancel-logo');

    // When user selects a new file
    logoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if(file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                logoPreview.src = e.target.result; // show new image
                if(logoIcon) logoIcon.style.display = 'none'; // hide default icon
            }
            reader.readAsDataURL(file);
        }
    });

    // Cancel button: reset to old image
    cancelBtn.addEventListener('click', function() {
        logoPreview.src = "{{ !empty($data->logo) ? asset('uploads/logo/' . $data->logo) : '' }}";
        if(logoIcon) logoIcon.style.display = '';
        logoInput.value = ''; // reset file input
    });
</script> -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const fileInput = document.querySelector('#add_project .image-sign');
    const previewImg = document.getElementById('add-logo-preview');
    const previewIcon = document.getElementById('add-logo-icon');

    fileInput.addEventListener('change', function (e) {
        const file = e.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (event) {
                previewImg.src = event.target.result;
                previewImg.style.display = "block";   // Show image preview
                previewIcon.style.display = "none";   // Hide default icon
            };

            reader.readAsDataURL(file);
        }
    });

});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".image-input").forEach(input => {

        input.addEventListener("change", function () {
            const file = this.files[0];
            const id = this.getAttribute("data-id");

            if (!file) return;

            const reader = new FileReader();

            reader.onload = function (e) {
                const previewImg = document.getElementById("logo-preview-" + id);
                const icon = document.getElementById("logo-icon-" + id);

                previewImg.src = e.target.result;
                previewImg.style.display = "block";
                icon.style.display = "none";
            };

            reader.readAsDataURL(file);
        });

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