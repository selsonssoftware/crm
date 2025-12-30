@extends('layout')
@section('content')

		<div class="content mt-5">

				<!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h2 class="mb-1">Promotion</h2>
						
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
						
						<div class="mb-2">
							<a href="#" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#new_promotion"><i class="ti ti-circle-plus me-2"></i>Add Promotion</a>
						</div>
						<div class="head-icons ms-2">
							<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
								<i class="ti ti-chevrons-up"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Breadcrumb -->

				<!-- Promotion List -->
                <div class="row">
					<div class="col-sm-12">
						<div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                <h5 class="d-flex align-items-center">Promotion List</h5>
                                <div class="d-flex align-items-center flex-wrap row-gap-3">
                                    <div class="input-icon position-relative me-2">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control date-range bookingrange" placeholder="dd/mm/yyyy - dd/mm/yyyy ">
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center fs-12" data-bs-toggle="dropdown">
                                            <p class="fs-12 d-inline-flex me-1">Sort By : </p>
                                            Last 7 Days
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
                                        </ul>
                                    </div>
                                </div>
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
												<th>Promoted Employee</th>
												<th>Department</th>
												<th>Designation From</th>
												<th>Designation To</th>
												<th>Promotion Date</th>
                                                <th>Action</th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($promotions as $promotion)
											<tr>
                                                <td>
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>                                        
                                                </td>
												<td>
                                                    <div class="d-flex align-items-center">
                                                       <img class="border border-white" src="{{ asset('uploads/logo/' . $promotion->employee_logo) }}"
                                                        style="width:50px;height:50px;border-radius:50%">

                                                        <h6 class="fw-medium"><a href="#">{{ $promotion->employee_name }}</a></h6>
                                                    </div>
                                                </td>
                                                <td>{{ $promotion->department_name }}</td>
                                                <td>{{ $promotion->old_designation }}</td>
                                                <td>{{ $promotion->new_designation }}</td>
                                                <td>{{ $promotion->promotion_date }}</td>

                                                <td>
                                                    <div class="action-icon d-inline-flex">
                                                        <a href="#" class="me-2"><i class="ti ti-edit" data-bs-toggle="modal" data-bs-target="#edit_promotion-{{$promotion->promotion_id}}"></i></a>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal{{$promotion->promotion_id}}"><i class="ti ti-trash"></i></a>
                                                    </div>
                                                </td>
											</tr>
                                            
                                    <!-- Edit Promotion -->
                                        <div class="modal fade" id="edit_promotion-{{$promotion->promotion_id}}">
                                            <div class="modal-dialog modal-dialog-centered modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Promotion</h4>
                                                        <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ti ti-x"></i>
                                                        </button>
                                                    </div>
                                                <form action="/promotionssave" method="post" enctype="multipart/form-data">
											        @csrf
										            <input type="hidden" id="promotion_id" name="promotion_id" value="{{$promotion->promotion_id}}">

                                                        <div class="modal-body pb-0">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Promotion For</label>
                                                                        <select name="employee_id" class="form-select" required>
                                                                            <option value="">Select</option>
                                                                            @foreach($employees as $emp)
                                                                                <option value="{{ $emp->employee_id }}"
                                                                                    {{ $promotion->employee_id == $emp->employee_id ? 'selected' : '' }}>
                                                                                    {{ $emp->first_name }} {{ $emp->last_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>									
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Promotion From</label>
                                                                        <select name="old_designation_id" class="form-select" required>
                                                                            <option value="">Select</option>
                                                                            @foreach($designations as $des)
                                                                                <option value="{{ $des->designation_id }}"
                                                                                    {{ $promotion->old_designation_id == $des->designation_id ? 'selected' : '' }}>
                                                                                    {{ $des->title }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>									
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Promotion To</label>
                                                                       <select name="new_designation_id" class="form-select" required>
                                                                            <option value="">Select</option>
                                                                            @foreach($designations as $des)
                                                                                <option value="{{ $des->designation_id }}"
                                                                                    {{ $promotion->new_designation_id == $des->designation_id ? 'selected' : '' }}>
                                                                                    {{ $des->title }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>									
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Promotion Date</label>
                                                                        <div class="input-icon-end position-relative">
                                                                            <input type="date" class="form-control" name="promotion_date" value="{{ $promotion->promotion_date }}">
                                                                        </div>
                                                                    </div>									
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- /Edit Promotion -->

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete_modal{{$promotion->promotion_id}}">
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
                                                                <a href="/delete_promotions?promotion_id={{$promotion->promotion_id}}"class="btn btn-danger">Yes, Delete</a>
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
				<!-- /Promotion List  -->

        <!-- Add Promotion -->
            <div class="modal fade" id="new_promotion">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Promotion</h4>
                            <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <i class="ti ti-x"></i>
                            </button>
                        </div>
                        <form action="/promotionsstore" method="post" enctype="multipart/form-data">
					    @csrf	
                            <div class="modal-body pb-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Promotion For</label>
                                          <select name="employee_id" class="form-select" required>
                                                <option value="">Select Employee</option>
                                                @foreach($employees as $emp)
                                                    <option value="{{ $emp->employee_id }}">
                                                        {{ $emp->first_name }} {{ $emp->last_name }}
                                                    </option>
                                                @endforeach
                                           </select>
                                        </div>									
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Promotion From</label>
                                            <select name="old_designation_id" class="form-select" required>
                                                <option value="">Select</option>
                                                @foreach($designations as $des)
                                                    <option value="{{ $des->designation_id }}">{{ $des->title }}</option>
                                                @endforeach
                                            </select>

                                        </div>									
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Promotion To</label>
                                            <select name="new_designation_id" class="form-select" required>
                                                <option value="">Select</option>
                                                @foreach($designations as $des)
                                                    <option value="{{ $des->designation_id }}">{{ $des->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>									
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Promotion Date</label>
                                            <div class="input-icon-end position-relative">
                                             <input type="date" class="form-control" name="promotion_date" required>
                                            </div>
                                        </div>									
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white border me-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Add Promotion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- /Add Promotion -->
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

	@if(session('delete'))
        <!-- Add position classes -->
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999; max-width: 100%;">
            <div id="dangerToast" class="toast colored-toast bg-danger-transparent" role="alert" aria-live="assertive"
                aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                <div class="toast-header bg-danger text-fixed-white">
                    <strong class="me-auto">Deleted</strong>
                    <button type="button" class="btn-close btn-light" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('delete') }}
                </div>
            </div>
        </div>

        <script>
            // Simple and direct approach
            document.addEventListener('DOMContentLoaded', function () {
                const toastElement = document.getElementById('dangerToast');
                if (toastElement) {
                    const toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }
            });
        </script>
    @endif


@endsection