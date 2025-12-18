@extends('layout')
@section('content')


	<div class="content">

				<!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h2 class="mb-1">Employee Salary</h2>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="https://smarthr.co.in/demo/html/template/index.html"><i class="ti ti-smart-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									HR
								</li>
								<li class="breadcrumb-item active" aria-current="page">Employee Salary</li>
							</ol>
						</nav>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
						
						<!-- <div class="me-2 mb-2">
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
						</div>
						 -->
                        <div class="mb-2">
							<a href="#" data-bs-toggle="modal" data-bs-target="#new-employee-salary" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Salary</a>
						</div>
						<div class="head-icons ms-2">
							<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
								<i class="ti ti-chevrons-up"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Breadcrumb -->

			

				<div class="card">
					<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
						<h5>Employee Salary List</h5>
						<!-- <div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
							<div class="me-3">
								<div class="input-icon-end position-relative">
									<input type="text" class="form-control date-range bookingrange" placeholder="dd/mm/yyyy - dd/mm/yyyy">
									<span class="input-icon-addon">
										<i class="ti ti-chevron-down"></i>
									</span>
								</div>
							</div>
                            <div class="dropdown me-3">
								<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
									Designation
								</a>
								<ul class="dropdown-menu  dropdown-menu-end p-3">
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1">Finance</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1">Developer</a>
									</li>
                                    <li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1">Executive</a>
									</li>
                                    <li>
										<a href="javascript:void(0);" class="dropdown-item rounded-1">Manager</a>
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
							</div>
						</div> -->
					</div>
					<div class="card-body p-0">
						<div class="custom-datatable-filter table-responsive">
							<table class="table datatable">
								<thead class="thead-light">
									<tr>
										<th class="no-sort">
											<div class="form-check form-check-md">
												<input class="form-check-input" type="checkbox" id="select-all">
											</div>
										</th>
										<th>Emp ID</th>
                                        <th>Employee Name</th>
										<th>TDS</th>
										<th>ESI</th>
										<th>PF</th>
                                        <th>Net Salary</th>
                                        <th>Basic Salary</th>
                                        <th>DA</th>
                                        <th>HRA</th>
                                        <th>Conveyance</th>
                                        <th>Allowance</th>
                                        <th>Medical Allowance</th>
                                        <th>Others</th>
                                        <th>Payslip</th>
                                        <th>status</th>
                                        
									</tr>
								</thead>
								<tbody>
                                    @foreach($variable as $data)
                                    <tr>
										<td>
											<div class="form-check form-check-md">
												<input class="form-check-input" type="checkbox">
											</div>
										</td>
                                        <td>{{$data->emp_id}}</td>
										<td>
											<div class="d-flex align-items-center file-name-icon">
												<a href="#" class="avatar avatar-md ">
													<img src="{{ asset('uploads/logo/' . $data->logo) }}" alt="Logo" style="width:50px; height:50px; object-fit:cover; border-radius:8px;">
												</a>
												<div class="ms-2">
													<h6 class="fw-medium"><a href="#">{{$data->first_name}} {{$data->last_name}}</a></h6>
                                                    <span class="d-block mt-1">{{$data->title}}</span>
												</div>
											</div>
										</td>
										<td>RS. {{$data->tds}}</td>
                                        <td>RS. {{$data->esi}}</td>
                                        <td>RS. {{$data->pf}}</td>
                                        <td>RS. {{$data->net_salary}}</td>
                                        <td>RS. {{$data->basic_salary}}</td>
                                        <td>RS. {{$data->da}}</td>
                                        <td>RS. {{$data->hra}}</td>
                                        <td>RS. {{$data->conveyance}}</td>
                                        <td>RS. {{$data->allowance}}</td>
                                        <td>RS. {{$data->medical_allowance}}</td>
                                        <td>RS. {{$data->others}}</td>
                                       
                                        <td><span class="badge badge-secondary badge-md"><a href="{{route('payslip.data', $data->payroll_id)}}">Generate Slip</a></span></td>
                                        <td>
											<div class="action-icon d-inline-flex">
											<a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit-employee-salary-{{$data->payroll_id}}"><i class="ti ti-edit"></i></a>
												<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal{{$data->payroll_id}}"><i class="ti ti-trash"></i></a>
											</div>
										</td>
                                    </tr>


                                         <!-- Edit Termination -->
                                        <div class="modal fade" id="edit-employee-salary-{{$data->payroll_id}}">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Employee Salary</h4>
                                                        <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ti ti-x"></i>
                                                        </button>
                                                    </div>
                                                   <form action="/db_employee_salary" method="post">
                                                    @csrf
                                                    <input type="hidden" id="payroll_id" name="payroll_id" value="{{$data->payroll_id}}">
                                                    <div class="modal-body pb-0">
                                                        <div class="row">                               
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Employee Name</label>

                                                                    <select class="select" name="employee_id">
                                                                        <option value="">Select</option>

                                                                        @foreach ($employee as $emp)
                                                                            <option value="{{ $emp->employee_id }}"
                                                                                {{ $data->employee_id == $emp->employee_id ? 'selected' : '' }}>
                                                                                {{ $emp->first_name }} {{ $emp->last_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>									
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">Net Salary </label>
                                                                <input type="text" class="form-control" name="net_salary"value="{{$data->net_salary}}">								
                                                            </div>
                                                        </div>
                                                        <div class="row earning-row">
                                                            <div class="d-flex justify-content-between mb-3">
                                                                <label class="form-label">Earnings</label>
                                                                <!-- <a href="#" class="add-earnings text-primary mb-2"><i class="ti ti-plus me-2"></i>Add New</a> -->
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Basic Salary</label>
                                                                    <input type="text" class="form-control" name="basic_salary" value="{{$data->basic_salary}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">DA(40%)</label>
                                                                    <input type="text" class="form-control" name="da" value="{{$data->da}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">HRA(15%)</label>
                                                                    <input type="text" class="form-control" name="hra" value="{{$data->hra}}">                               
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Conveyance</label>
                                                                    <input type="text" class="form-control" name="conveyance" value="{{$data->conveyance}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Allowance</label>
                                                                    <input type="text" class="form-control" name="allowance" value="{{$data->allowance}}">                                       
                                                                </div>									
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Medical Allowance</label>
                                                                    <input type="text" class="form-control" name="medical_allowance" value="{{$data->medical_allowance}}">                                       
                                                                </div>									
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Others</label>
                                                                    <input type="text" class="form-control" name="others" value="{{$data->others}}">                                       
                                                                </div>						
                                                            </div>
                                                        </div>
                                                        <div class="row deduction-row">
                                                            <div class="d-flex justify-content-between mb-3">
                                                                <label class="form-label">Deductions</label>
                                                                <!-- <a href="#" class="add-deduction text-primary mb-2"><i class="ti ti-plus me-2"></i>Add New</a> -->
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">TDS</label>
                                                                    <input type="text" class="form-control" name="tds" value="{{$data->tds}}">                                       
                                                                </div>									
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">ESI</label>
                                                                    <input type="text" class="form-control" name="esi" value="{{$data->esi}}">
                                                                    
                                                                </div>									
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label">PF</label>
                                                                    <input type="text" class="form-control" name="pf" value="{{$data->pf}}">                                       
                                                                </div>									
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Add Employee Salary</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Edit Termination -->




                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="delete_modal{{$data->payroll_id}}">
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
                                                            <a href="/delete_employee_salary?payroll_id={{$data->payroll_id}}" class="btn btn-danger">Yes, Delete</a>
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

			</div>




             <!-- Add Termination -->
         <div class="modal fade" id="new-employee-salary">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Employee Salary</h4>
                        <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ti ti-x"></i>
                        </button>
                    </div>
                    <form action="/store_employee_salary" method="post">
                        @csrf
                        <div class="modal-body pb-0">
                            <div class="row">                               
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Employee Name </label>
                                        <select class="select" name="employee_id">
                                            <option>Select</option>
                                            @foreach ($employee as $emp)
                            <option value="{{ $emp->employee_id }}"
                                {{ request('employee_id') == $emp->employee_id ? 'selected' : '' }}>
                                {{ $emp->first_name }} {{ $emp->last_name }}
                            </option>
                        @endforeach
                                        </select>
                                    </div>									
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Net Salary </label>
                                    <input type="text" class="form-control" name="net_salary">								
                                </div>
							</div>
							<div class="row earning-row">
								<div class="d-flex justify-content-between mb-3">
                                    <label class="form-label">Earnings</label>
                                    <!-- <a href="#" class="add-earnings text-primary mb-2"><i class="ti ti-plus me-2"></i>Add New</a> -->
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
										<label class="form-label">Basic Salary</label>
										<input type="text" class="form-control" name="basic_salary">
									</div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
										<label class="form-label">DA(40%)</label>
										<input type="text" class="form-control" name="da">
									</div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
										<label class="form-label">HRA(15%)</label>
										<input type="text" class="form-control" name="hra">                               
									</div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
										<label class="form-label">Conveyance</label>
										<input type="text" class="form-control" name="conveyance">
									</div>
                                </div>
								<div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Allowance</label>
                                        <input type="text" class="form-control" name="allowance">                                       
                                    </div>									
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Medical Allowance</label>
                                        <input type="text" class="form-control" name="medical_allowance">                                       
                                    </div>									
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Others</label>
                                        <input type="text" class="form-control" name="others">                                       
                                    </div>						
                                </div>
							</div>
                            <div class="row deduction-row">
                                <div class="d-flex justify-content-between mb-3">
                                    <label class="form-label">Deductions</label>
                                    <!-- <a href="#" class="add-deduction text-primary mb-2"><i class="ti ti-plus me-2"></i>Add New</a> -->
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">TDS</label>
                                        <input type="text" class="form-control" name="tds">                                       
                                    </div>									
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">ESI</label>
                                        <input type="text" class="form-control" name="esi">
                                        
                                    </div>									
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">PF</label>
                                        <input type="text" class="form-control" name="pf">                                       
                                    </div>									
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Employee Salary</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    	<!-- /Add Termination -->

      

		

@if(session('success'))
        <!-- Add position classes -->
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999; max-width: 100%;">
            <div id="successToast" class="toast colored-toast bg-success-transparent" role="alert" aria-live="assertive"
                aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                <div class="toast-header bg-success text-fixed-white">
                    <strong class="me-auto">Success</strong>
                    <button type="button" class="btn-close btn-light" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>

        <script>
            // Simple and direct approach
            document.addEventListener('DOMContentLoaded', function () {
                const toastElement = document.getElementById('successToast');
                if (toastElement) {
                    const toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }
            });
        </script>
    @endif



@endsection