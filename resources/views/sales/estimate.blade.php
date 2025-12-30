@extends('layout')
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <!-- Breadcrumb -->
            <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
                <div class="my-auto mb-2">
                    <h2 class="mb-1">Estimates</h2>
                    
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">

                    <div class="mb-2">
                        <a href="#" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#add_estimate"><i class="ti ti-circle-plus me-2"></i>Add Estimates</a>
                    </div>
                    <div class="head-icons ms-2">
                        <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-original-title="Collapse" id="collapse-header">
                            <i class="ti ti-chevrons-up"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Breadcrumb -->

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <h5>Estimates List</h5>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">

                        <div class="dropdown me-3">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                Select Status
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Accepted</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">sent</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Expired</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">Declined</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
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
                                    <th>Client Name</th>
                                    <th>Email</th>
                                    <th>Client Address</th>
                                    <th>Billing Address</th>
                                    <th>Estimate Date</th>
                                    <th>Expiry Date</th>
                                    <th>Amount</th>
                                    <th>Other Information</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-md">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center file-name-icon">
                                                <a href="#" class="avatar avatar-md avatar-rounded">
                                                    <img src="https://smarthr.co.in/demo/html/template/assets/img/users/user-09.jpg"
                                                        class="img-fluid" alt="img">
                                                </a>
                                                <div class="ms-2">
                                                    <h6 class="fw-medium"><a href="#">{{$item->first_name}}
                                                            {{ $item->last_name }}</a></h6>
                                                    <span class="d-block mt-1">{{$item->name}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->client_address}}</td>
                                        <td>{{$item->billing_address}}</td>
                                        <td>{{$item->estimate_date}}</td>
                                        <td>{{$item->expiry_date}}</td>
                                        <td>RS.{{$item->grand_total}}</td>
                                        <td>{{$item->other_information}}</td>
                                        <td>
                                            <div class="action-icon d-inline-flex">
                                                <a href="#" class="me-2" data-bs-toggle="modal"
                                                    data-bs-target="#edit_estimate-{{ $item->estimate_Id }}">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#delete_modal"
                                                    onclick="setDeleteUrl({{ $item->estimate_Id }})">
                                                    <i class="ti ti-trash"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>


                                    <!-- Edit Estimate  -->

                                    <div class="modal fade" id="edit_estimate-{{ $item->estimate_Id }}">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Estimate</h4>
                                                    <button type="button" class="btn-close custom-btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="ti ti-x"></i>
                                                    </button>
                                                </div>
                                                <form method="POST" action="/update_estimate">
                                                    @csrf
                                                    <input type="hidden" id="estimate_Id" name="estimate_Id"
                                                        value="{{$item->estimate_Id}}">
                                                    <div class="modal-body pb-0">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Client <span class="text-danger">
                                                                            *</span></label>
                                                                    <select class="select" name="client_id">
                                                                        <option value="">Select</option>
                                                                        @foreach ($contact as $items)
                                                                            <option value="{{ $items->contact_id}}" {{ $items->contact_id == $item->client_Id ? 'selected' : '' }}>
                                                                                {{ $items->first_name }} {{ $items->last_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Project <span class="text-danger">
                                                                            *</span></label>
                                                                    <select class="select" name="employee_id">
                                                                        <option value="">Select</option>
                                                                        @foreach ($projects as $items)
                                                                            <option value="{{ $items->project_id }}" {{ $items->project_id == $item->employee_Id ? 'selected' : '' }}>
                                                                                {{ $items->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Email <span class="text-danger">
                                                                            *</span></label>
                                                                    <input type="email" class="form-control" name="email"
                                                                        value="{{$item->email}}">
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-6">
                                                                                                            <div class="mb-3">
                                                                                                                <label class="form-label">Tax <span class="text-danger"> *</span></label>
                                                                                                                <select class="select">
                                                                                                                    <option>Select</option>
                                                                                                                    <option selected>VAT</option>
                                                                                                                    <option>GST</option>
                                                                                                                    <option>No Tax</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div> -->
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Client Address</label>
                                                                    <textarea class="form-control" name="client_address"
                                                                        rows="3">{{ $item->client_address }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Biling Address</label>
                                                                    <textarea class="form-control" name="billing_address"
                                                                        rows="3">{{ $item->billing_address }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Estimate Date</label>
                                                                    <div class="input-icon position-relative w-100 me-2">
                                                                        <!-- <span class="input-icon-addon">
                                                                            <i class="ti ti-calendar"></i>
                                                                        </span> -->
                                                                        <input type="date" class="form-control "
                                                                            name="estimate_date"
                                                                            value="{{ $item->estimate_date }}"
                                                                            placeholder="dd/mm/yyyy">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Expiry Date</label>
                                                                    <div class="input-icon position-relative w-100 me-2">
                                                                        <!-- <span class="input-icon-addon">
                                                                            <i class="ti ti-calendar"></i>
                                                                        </span> -->
                                                                        <input type="date" class="form-control "
                                                                            name="expiry_date" value="{{ $item->expiry_date }}"
                                                                            placeholder="dd/mm/yyyy">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <h4 class="mb-2">Add Items</h4>
                                                            <div class="border rounded p-3 mb-3">
                                                                <div class="estimate-items-wrapper">
                                                                    @foreach($estimate_items->where('estimate_Id', $item->estimate_Id) as $existingItem)
                                                                        <div class="item-row border rounded p-3 mb-3">
                                                                            <div class="row">
                                                                                <div class="col-md-2">
                                                                                    <label>Item</label>
                                                                                    <input type="text" name="item[]" class="form-control" 
                                                                                        data-name="item" value="{{ $existingItem->items }}">
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <label>Description</label>
                                                                                    <input type="text" name="description[]" class="form-control"
                                                                                        data-name="description" value="{{ $existingItem->description }}">
                                                                                </div>

                                                                                <div class="col-md-2">
                                                                                    <label>Unit Cost</label>
                                                                                    <input type="text" name="unit_cost[]" class="form-control unit-cost"
                                                                                        data-name="unit_cost" value="{{ $existingItem->unit_cost }}">
                                                                                </div>

                                                                                <div class="col-md-2">
                                                                                    <label>Qty</label>
                                                                                    <input type="text" name="qty[]" class="form-control qty"
                                                                                        data-name="qty" value="{{ $existingItem->quantity }}">
                                                                                </div>

                                                                                <div class="col-md-2">
                                                                                    <label>Amount</label>
                                                                                    <input type="text" name="amount[]" class="form-control amount"
                                                                                        data-name="amount" value="{{ $existingItem->amount }}" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <a href="javascript:void(0);"
                                                                            class="btn btn-sm btn-danger remove-item mt-2 {{ $loop->first ? 'd-none' : '' }}">
                                                                                Remove
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm btn-primary add-item">
                                                                        <i class="ti ti-plus me-1"></i> Add New Item
                                                                    </a>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Total </label>
                                                                            <input type="text" class="form-control total" name="total" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Tax </label>
                                                                            <input type="text" class="form-control tax" name="tax" value="{{ $item->tax }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Discount(%) </label>
                                                                            <input type="text" class="form-control discount" name="discount" value="{{ $item->discount }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Grand Total </label>
                                                                            <input type="text" class="form-control grand_total" name="grand_total" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Other Information</label>
                                                                <textarea class="form-control" name="other_information"
                                                                    rows="3">{{ $item->other_information }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light me-2"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Update Estimate</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /edit Estimate -->

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete_modal">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
                                                        <i class="ti ti-trash-x fs-36"></i>
                                                    </span>
                                                    <h4 class="mb-1">Confirm Delete</h4>
                                                    <p class="mb-3">Are you sure! you want to delete this details.</p>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="javascript:void(0);" class="btn btn-light me-3"
                                                            data-bs-dismiss="modal">Cancel</a>
                                                        <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Yes, Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function setDeleteUrl(id) {
                                            const url = "{{ url('delete_estimate') }}/" + id;
                                            document.getElementById('confirmDeleteBtn').setAttribute('href', url);
                                        }
                                    </script>

                                    @if(session('delete'))
                                        <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999; max-width: 100%;">
                                            <div id="dangerToast" class="toast colored-toast bg-danger-transparent" role="alert"
                                                aria-live="assertive" aria-atomic="true" data-bs-autohide="true"
                                                data-bs-delay="5000">
                                                <div class="toast-header bg-danger text-fixed-white">
                                                    <strong class="me-auto">Deleted</strong>
                                                    <button type="button" class="btn-close btn-light" data-bs-dismiss="toast"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="toast-body">
                                                    {{ session('delete') }}
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                const toastElement = document.getElementById('dangerToast');
                                                if (toastElement) {
                                                    const toast = new bootstrap.Toast(toastElement);
                                                    toast.show();
                                                }
                                            });
                                        </script>
                                    @endif
                                    <!-- /Delete Modal -->







                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Wrapper -->

    <!-- Add Estimate  -->
    <div class="modal fade" id="add_estimate">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Estimate</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="/store_estimate" method="post">
                    @csrf
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Client <span class="text-danger"> *</span></label>
                                    <select class="select" name="client_id">
                                        <option>Select</option>
                                        @foreach ($contact as $item)
                                            <option value="{{$item->contact_id }}">{{ $item->first_name }}
                                                {{ $item->last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Project <span class="text-danger"> *</span></label>
                                    <select class="select" name="employee_id">
                                        <option>Select</option>
                                        @foreach ($projects as $item)
                                            <option value="{{ $item->project_id }}">{{ $item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email <span class="text-danger"> *</span></label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                                                                                        <div class="mb-3">
                                                                                                            <label class="form-label">Tax <span class="text-danger"> *</span></label>
                                                                                                            <select class="select">
                                                                                                                <option>Select</option>
                                                                                                                <option>VAT</option>
                                                                                                                <option>GST</option>
                                                                                                                <option>No Tax</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div> -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Client Address</label>
                                    <textarea class="form-control" rows="3" name="client_address"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Biling Address</label>
                                    <textarea class="form-control" rows="3" name="billing_address"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Estimate Date</label>
                                    <div class="input-icon position-relative w-100 me-2">
                                        <!-- <span class="input-icon-addon">
                                            <i class="ti ti-calendar"></i>
                                        </span> -->
                                        <input type="date" class="form-control " name="estimate_date"
                                            placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Expiry Date</label>
                                    <div class="input-icon position-relative w-100 me-2">
                                        <!-- <span class="input-icon-addon">
                                            <i class="ti ti-calendar"></i>
                                        </span> -->
                                        <input type="date" class="form-control " name="expiry_date"
                                            placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h4 class="mb-2">Add Items</h4>
                            <div class="border rounded p-3 mb-3">
                                <div class="estimate-items-wrapper">
                                    <div class="border rounded p-3 mb-3 item-row">
                                        <div class="add-estimate-info">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="form-label">Item</label>
                                                    <input type="text" class="form-control" name="item[]">
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label">Description</label>
                                                    <input type="text" class="form-control" name="description[]">
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">Unit Cost</label>
                                                    <input type="text" class="form-control unit-cost" name="unit_cost[]">
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">Qty</label>
                                                    <input type="text" class="form-control qty" name="qty[]">
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">Amount</label>
                                                    <input type="text" class="form-control amount" name="amount[]" readonly>
                                                </div>


                                            </div>
                                        </div>
                                        <a href="javascript:void(0);"
                                            class="btn btn-sm btn-danger text-light remove-item fw-medium d-none mt-2">
                                            Remove
                                        </a>
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary add-item">
                                        <i class="ti ti-plus me-1"></i> Add New Item
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Total </label>
                                            <input class="form-control total" name="total" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tax </label>
                                            <input type="text" class="form-control tax " name="tax" placeholder="Tax %">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Discount(%) </label>
                                            <input type="text" class="form-control discount" name="discount"
                                                placeholder="Discount %">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Grand Total </label>
                                            <input type="text" class="form-control grand_total" name="grand_total" 
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Other Information</label>
                                <textarea class="form-control" rows="3" name="other_information"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Estimate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(session('success'))
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
            document.addEventListener('DOMContentLoaded', function () {
                const toastElement = document.getElementById('successToast');
                if (toastElement) {
                    const toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }
            });
        </script>
    @endif

    <!-- /Add Estimate -->



    <script>

document.addEventListener("click", function (e) {
    if (e.target.closest(".add-item")) {
    let wrapper = e.target.closest(".estimate-items-wrapper");
    let addBtn = e.target.closest(".add-item");

    let firstRow = wrapper.querySelector(".item-row");
    if (!firstRow) return;

    let newRow = firstRow.cloneNode(true);

    // Clear all inputs in the new row
    newRow.querySelectorAll("input").forEach(input => {
        if (!input.classList.contains("amount")) {
            input.value = "";
        }
    });

    // CRITICAL: Ensure ALL inputs have proper name attributes
    newRow.querySelectorAll("input").forEach(input => {
        if (input.classList.contains("unit-cost")) {
            input.name = "unit_cost[]";
        } else if (input.classList.contains("qty")) {
            input.name = "qty[]";
        } else if (input.classList.contains("amount")) {
            input.name = "amount[]";
            input.readOnly = true;
        } else {
            // For item and description inputs - check by placeholder or position
            if (!input.name || input.name === "") {
                // Check which input it is by looking at its class or siblings
                const label = input.parentElement.querySelector('label');
                if (label && label.textContent.includes('Description')) {
                    input.name = "description[]";
                } else if (label && label.textContent.includes('Item')) {
                    input.name = "item[]";
                }
            }
        }
    });

    // Also fix for textarea if any
    newRow.querySelectorAll("textarea").forEach(textarea => {
        if (!textarea.name || textarea.name === "") {
            textarea.name = "description[]";
        }
    });

    let removeBtn = newRow.querySelector(".remove-item");
    if (removeBtn) {
        removeBtn.classList.remove("d-none");
    }

    // Insert BEFORE the Add button
    wrapper.insertBefore(newRow, addBtn);
    
    // Recalculate for the modal
    let modal = wrapper.closest(".modal");
    calculateEstimate(modal);
}
    if (e.target.closest(".remove-item")) {
        let modal = e.target.closest(".modal");
        e.target.closest(".item-row").remove();
        calculateEstimate(modal);
    }
});

document.addEventListener("input", function (e) {
    if (
        e.target.classList.contains("unit-cost") ||
        e.target.classList.contains("qty") ||
        e.target.classList.contains("tax") ||
        e.target.classList.contains("discount")
    ) {
        let modal = e.target.closest(".modal");
        calculateEstimate(modal);
    }
});

function calculateEstimate(modal) {
    let total = 0;

    modal.querySelectorAll(".item-row").forEach(row => {
        let cost = parseFloat(row.querySelector(".unit-cost")?.value) || 0;
        let qty = parseFloat(row.querySelector(".qty")?.value) || 0;
        let amount = cost * qty;

        let amountInput = row.querySelector(".amount");
        if (amountInput) {
            amountInput.value = amount.toFixed(2);
        }
        total += amount;
    });

    let totalInput = modal.querySelector(".total");
    if (totalInput) {
        totalInput.value = total.toFixed(2);
    }

    let tax = parseFloat(modal.querySelector(".tax")?.value) || 0;
    let discount = parseFloat(modal.querySelector(".discount")?.value) || 0;

    let discountAmount = total * discount / 100;
    let subTotal = total - discountAmount;
    let taxAmount = subTotal * tax / 100;
    let grandTotal = subTotal + taxAmount;

    let grandTotalInput = modal.querySelector(".grand_total");
    if (grandTotalInput) {
        grandTotalInput.value = grandTotal.toFixed(2);
    }
}

document.addEventListener('shown.bs.modal', function (e) {
    let modal = e.target;
    if (modal.classList.contains('modal')) {
        calculateEstimate(modal);
    }
});


</script>



@endsection