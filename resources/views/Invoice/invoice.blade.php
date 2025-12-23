@extends('layout')
@section('content')

   <div class="content">

				<!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h2 class="mb-1">Invoices</h2>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="https://smarthr.co.in/demo/html/template/index.html"><i class="ti ti-smart-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									Application
								</li>
								<li class="breadcrumb-item active" aria-current="page">Invoices</li>
							</ol>
						</nav>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
						<!-- <div class="me-2 mb-2">
							<div class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
									<i class="ti ti-file-export me-2"></i>Export
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
							<a href="/add_invoice" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Invoice</a>
						</div>
						<div class="ms-2 head-icons">
							<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
								<i class="ti ti-chevrons-up"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Breadcrumb -->

				<!-- Invoice Data -->
				<div class="row">
					<div class="col-xl-3 col-sm-6">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center overflow-hidden mb-2">
									<div>
										<p class="fs-12 fw-normal mb-1 text-truncate">Total Invoice</p>
										<h5>$3,237.94</h5>
									</div>
								</div>
								<div class="attendance-report-bar mb-2">
									<div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px;">
										<div class="progress-bar bg-pink" style="width: 85%"></div>
									  </div>
								</div>
								<div>
									<p class="fs-12 fw-normal d-flex align-items-center text-truncate"><span class="text-success fs-12 d-flex align-items-center me-1"><i class="ti ti-arrow-wave-right-up me-1"></i>+32.40%</span>from last month</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center overflow-hidden mb-2">
									<div>
										<p class="fs-12 fw-normal mb-1 text-truncate">Outstanding</p>
										<h5>$3,237.94</h5>
									</div>
								</div>
								<div class="attendance-report-bar mb-2">
									<div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px;">
										<div class="progress-bar bg-purple" style="width: 50%"></div>
									  </div>
								</div>
								<div>
									<p class="fs-12 fw-normal d-flex align-items-center text-truncate"><span class="text-danger fs-12 d-flex align-items-center me-1"><i class="ti ti-arrow-wave-right-up me-1"></i>-4.40%</span>from last month</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center overflow-hidden mb-2">
									<div>
										<p class="fs-12 fw-normal mb-1 text-truncate">Draft</p>
										<h5>$3,237.94</h5>
									</div>
								</div>
								<div class="attendance-report-bar mb-2">
									<div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px;">
										<div class="progress-bar bg-warning" style="width: 30%"></div>
									  </div>
								</div>
								<div>
									<p class="fs-12 fw-normal d-flex align-items-center text-truncate"><span class="text-success fs-12 d-flex align-items-center me-1"><i class="ti ti-arrow-wave-right-up me-1"></i>12%</span>from last month</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center overflow-hidden mb-2">
									<div>
										<p class="fs-12 fw-normal mb-1 text-truncate">Total Overdue</p>
										<h5>$3,237.94</h5>
									</div>
								</div>
								<div class="attendance-report-bar mb-2">
									<div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px;">
										<div class="progress-bar bg-danger" style="width: 20%"></div>
									  </div>
								</div>
								<div>
									<p class="fs-12 fw-normal d-flex align-items-center text-truncate"><span class="text-danger fs-12 d-flex align-items-center me-1"><i class="ti ti-arrow-wave-right-up me-1"></i>-15.40%</span>from last month</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Invoice Data -->

				<!-- Invoice DataTable -->
                <div class="row">
					<div class="col-sm-12">
						<div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                <h5 class="d-flex align-items-center">Invoices<span class="badge badge-dark-transparent ms-2">2000 Invoices</span></h5>
                                <!-- <div class="d-flex align-items-center flex-wrap row-gap-3">
                                    
                                    <div class="input-icon position-relative w-120 me-2">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control datetimepicker" placeholder="Created Date">
                                    </div>
                                    <div class="input-icon position-relative w-120 me-2">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control datetimepicker" placeholder="Due Date">
                                    </div>
                                    <div class="dropdown me-2">
                                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                            Select Status
                                        </a>
                                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Paid</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Overdue</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Pending</a>
                                            </li>
                                            <li>	
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Draft</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center fs-12" data-bs-toggle="dropdown">
                                            <span class="fs-12 d-inline-flex me-1">Sort By : </span>
                                            Last 7 Days
                                        </a>
                                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Last 7 Days</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Created Date</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Due Date</a>
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
												<th>Invoice Number</th>
												<th>Name</th>
												<th>Due DATE</th>
												<th>Total Amount</th>
												<th>Reference Number</th>
												<th>Invoice Date</th>
                                                <!-- <th>Status</th> -->
                                                <th>Action</th>
											</tr>
										</thead>
										<tbody>
                                           @foreach($invoices as $data)
											<tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>                                        
                                                </td>
												<td>
                                                    <a href="#" class="tb-data">{{$data->invoice_number}}</a>
                                                </td>
												<td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="#" class="avatar avatar-lg me-2">
                                                            <img src="{{ asset('uploads/'.$data->image) }}" class="rounded-circle" alt="user">
                                                        </a>
                                                        <div>
                                                            <h6 class="fw-medium"><a href="">{{$data->first_name}} {{$data->last_name}}</a>
                                                            </h6>
                                                            <span class="fs-12">{{$data->email}}</span>
                                                        </div>
                                                    </div>
                                                </td>
												<td>{{$data->due_date}}</td>
												<td>{{$data->total}}</td>
												<td>{{$data->reference_no}}</td>
												<td>{{$data->invoice_date}}</td>
                                                <!-- <td>
                                                    <span class="badge badge-soft-success d-inline-flex align-items-center">
														<i class="ti ti-point-filled me-1"></i>
													</span>
                                                </td> -->
                                                <td>
                                                    <div class="action-icon d-inline-flex">
                                                         <a href="{{ url('/download_invoice/'.$data->invoice_id) }}" class="me-2"><i class="ti ti-eye"></i></a>
                                                         <a href="/edit_invoice?invoice_id={{$data->invoice_id}}" class="me-2"><i class="ti ti-edit"></i></a>
                                                        <a href="#delete_modal" class="" data-bs-toggle="modal" data-bs-target="#delete_modal{{$data->invoice_id}}"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
											</tr>
                                           @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Invoice DataTable -->
			</div>


            <!-- Delete Modal -->
		<div class="modal fade" id="delete_modal{{$data->invoice_id}}">
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
							<a href="/delete_invoice?invoice_id={{$data->invoice_id}}" class="btn btn-danger">Yes, Delete</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete Modal -->

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