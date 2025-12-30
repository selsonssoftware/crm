@extends('layout')
@section('content')

    <div class="page-wrapper">
        <div class="content">

            <!-- Breadcrumb -->
            <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
                <div class="my-auto mb-2">
                    <h2 class="mb-1">Companies</h2>
                    
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                    <div class="me-2 mb-2">
                        <div class="d-flex align-items-center border bg-white rounded p-1 me-2 icon-list">
                            <a href="https://smarthr.co.in/demo/html/template/companies-crm.html"
                                class="btn btn-icon btn-sm me-1"><i class="ti ti-list-tree"></i></a>
                            <a href="https://smarthr.co.in/demo/html/template/companies-grid.html"
                                class="btn btn-icon btn-sm active bg-primary text-white"><i
                                    class="ti ti-layout-grid"></i></a>
                        </div>
                    </div>
                    <div class="me-2 mb-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="ti ti-file-export me-1"></i>Export
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                                            class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                                            class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-2">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_company"
                            class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add
                            Company</a>
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
                <div class="card-body p-3 overflow-visible">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5>Companies Grid</h5>

                        <div class="dropdown">
                            <button class="btn btn-sm btn-white dropdown-toggle" data-bs-toggle="dropdown">
                                Sort By :
                                {{ request('sort') ? ucwords(str_replace('_', ' ', request('sort'))) : 'Last 7 Days' }}
                            </button>


                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('companies.companyindex', ['sort' => 'recent']) }}">
                                        Recently Added
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('companies.companyindex', ['sort' => 'asc']) }}">
                                        Ascending
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('companies.companyindex', ['sort' => 'desc']) }}">
                                        Descending
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('companies.companyindex', ['sort' => 'last_month']) }}">
                                        Last Month
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('companies.companyindex', ['sort' => 'last_7_days']) }}">
                                        Last 7 Days
                                    </a>
                                </li>
                            </ul>

                        </div>

                    </div>
                </div>
            </div>


            <div class="row">
                @foreach ($data as $item)

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                    <div>
                                        <a href="company-details.html"
                                            class="avatar avatar-xl avatar-rounded online border rounded-circle">
                                            <img src="{{ asset('uploads/' . $item->image) }}" class="img-fluid h-auto w-auto"
                                                alt="img">
                                        </a>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-icon btn-sm rounded-circle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                            <li>
                                                <a class="dropdown-item" onclick='editCompany(@json($item))'
                                                    data-bs-toggle="modal" data-bs-target="#edit_company">
                                                    <i class="ti ti-edit me-1"></i>Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" onclick="openDeleteModal({{ $item->company_id }})">
                                                    <i class="ti ti-trash me-1"></i>Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="text-center mb-3">
                                    <h6 class="mb-1"><a href="#">{{ $item->name }}</a></h6>
                                    <span class="badge bg-pink-transparent fs-10 fw-medium">{{ $item->owner }}</span>
                                </div>
                                <div class="d-flex flex-column">
                                    <p class="text-dark d-inline-flex align-items-center mb-2">
                                        <i class="ti ti-brand-storybook text-gray-5 me-2"></i>
                                        <a href="#" class="__cf_industry__">{{ $item->industry }}</a>
                                    </p>
                                    <p class="text-dark d-inline-flex align-items-center mb-2">
                                        <i class="ti ti-mail-forward text-gray-5 me-2"></i>
                                        <a href="#" class="__cf_email__">{{ $item->email }}</a>
                                    </p>
                                    <p class="text-dark d-inline-flex align-items-center mb-2">
                                        <i class="ti ti-phone text-gray-5 me-2"></i>
                                        {{ $item->phone }}
                                    </p>
                                    <p class="text-dark d-inline-flex align-items-center mb-2">
                                        <i class="ti ti-map-pin text-gray-5 me-2"></i>
                                        {{ $item->address }},
                                        {{ $item->country }},
                                        {{ $item->state }},
                                        {{ $item->city }},
                                        {{ $item->zipcode }}.
                                    </p>
                                    <p class="text-dark d-inline-flex align-items-center">
                                        <i class="ti ti-message-circle text-gray-5 me-2"></i>
                                        {{ $item->about }}
                                    </p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                    <div class="icons-social d-flex align-items-center">
                                        <a href="#" class="avatar avatar-rounded avatar-sm me-1"><i class="ti ti-world"></i></a>
                                        {{ $item->website }}
                                    </div>
                                    <span class="d-inline-flex align-items-center"><i
                                            class="ti ti-star-filled text-warning me-1"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>

    <!-- Add Company -->
    <div class="modal fade" id="add_company">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Company</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="/addcompany" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="contact-grids-tab">
                        <ul class="nav nav-underline" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="info-tab" data-bs-toggle="tab"
                                    data-bs-target="#basic-info" type="button" role="tab" aria-selected="true">Basic
                                    Information</button>
                            </li>
                            <!-- <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address"
                                                        type="button" role="tab" aria-selected="false">Address</button>
                                                </li> -->
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab"
                            tabindex="0">
                            <div class="modal-body pb-0 ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div
                                            class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">
                                            <div
                                                class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded-circle border border-dashed me-2 flex-shrink-0 text-dark frames">
                                                <i class="ti ti-photo text-gray-2 fs-16"></i>
                                            </div>
                                            <div class="profile-upload">
                                                <div class="mb-2">
                                                    <h6 class="mb-1">Upload Profile Image</h6>
                                                    <p class="fs-12">Image should be below 4 mb</p>
                                                </div>
                                                <div class="profile-uploader d-flex align-items-center">
                                                    <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                                                        Upload
                                                        <input type="file" name="image" class="form-control image-sign"
                                                            multiple="">
                                                    </div>
                                                    <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Company Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Owner <span
                                                    class="text-danger">*</span></select></label>
                                            <input type="text" class="form-control" name="owner" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="phone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Website</label>
                                            <input type="text" name="website" class="form-control">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Address</label>
                                                                    <input type="text" name="address" class="form-control">
                                                                </div>
                                                            </div> -->
                                    <div class="col-md-6">
                                        <div class="mb-3 ">
                                            <label class="form-label">Industry <span class="text-danger">*</span></label>
                                            <select class="select" name="industry">
                                                <option>Select</option>
                                                <option>Retail Industry</option>
                                                <option>Banking</option>
                                                <option>Hotels</option>
                                                <option>Financial Services</option>
                                                <option>Insurance</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 ">
                                            <label class="form-label">About <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="about"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Country <span class="text-danger">
                                                    *</span></label>
                                            <input type="text" class="form-control" name="country">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">State <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="state">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">City <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="city">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Zipcode <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="zipcode">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                        </div>
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
    <!-- /Add Company -->

    <!-- Edit Contact -->
    <div class="modal fade" id="edit_company">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Contact</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">
                    <div class="contact-grids-tab">
                        <ul class="nav nav-underline" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="info-tab" data-bs-toggle="tab"
                                    data-bs-target="#basic-info" type="button" role="tab" aria-selected="true">Basic
                                    Information</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address"
                                    type="button" role="tab" aria-selected="false">Address</button>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab"
                            tabindex="0">
                            <div class="modal-body pb-0 ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div
                                            class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">
                                            <div
                                                class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded-circle border border-dashed me-2 flex-shrink-0 text-dark frames">
                                                <img id="edit_preview_img" src="" class="rounded-circle"
                                                    style="width: 80px; height: 80px; object-fit: cover;"
                                                    alt="Profile Image">
                                            </div>
                                            <div class="profile-upload">
                                                <div class="mb-2">
                                                    <h6 class="mb-1">Upload Profile Image</h6>
                                                    <p class="fs-12">Image should be below 4 mb</p>
                                                </div>
                                                <div class="profile-uploader d-flex align-items-center">
                                                    <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                                                        Upload
                                                        <input type="file" name="image" class="form-control image-sign"
                                                            multiple="">
                                                    </div>
                                                    <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Company Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" id="edit_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Owner <span class="text-danger">*</span></label>
                                            <input type="text" name="owner" id="edit_owner" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="text" name="email" id="edit_email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="phone" class="form-control" id="edit_phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Website</label>
                                            <input type="text" name="website" class="form-control" id="edit_website">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 ">
                                            <label class="form-label">Industry <span class="text-danger">*</span></label>
                                            <select class="select" name="industry" id="edit_industry">
                                                <option value="">Select</option>
                                                <option value="Retail Industry">Retail Industry</option>
                                                <option value="Banking">Banking</option>
                                                <option value="Hotels">Hotels</option>
                                                <option value="Financial Services">Financial Services</option>
                                                <option value="Insurance">Insurance</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3 ">
                                            <label class="form-label">About <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="about" id="edit_about"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address" id="edit_address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Country <span class="text-danger">
                                                    *</span></label>
                                            <input type="text" name="country" class="form-control" id="edit_country">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">State <span class="text-danger"> *</span></label>
                                            <input type="text" name="state" class="form-control" id="edit_state">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">City <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="city" id="edit_city">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Zipcode <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="zipcode" id="edit_zipcode">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Edit Company -->

    <!-- Delete Modal -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Company?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Company Details?
                </div>
                <div class="modal-footer">
                    <!-- This href will be updated by JavaScript -->
                    <a href="#" id="deleteConfirmBtn" class="btn btn-danger me-1">Delete</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    @if(session('delete'))
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999; max-width: 100%;">
            <div id="dangerToast" class="toast colored-toast bg-danger-transparent" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="toast-header bg-danger text-fixed-white">
                    <strong class="me-auto">Deleted</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
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


    <script>
        function editCompany(item) {
            document.getElementById('editForm').action = "{{ url('companies') }}/" + item.company_id;

            document.getElementById('edit_id').value = item.id;
            document.getElementById('edit_name').value = item.name;
            document.getElementById('edit_address').value = item.address;
            document.getElementById('edit_website').value = item.website;
            document.getElementById('edit_owner').value = item.owner;
            document.getElementById('edit_email').value = item.email;
            document.getElementById('edit_phone').value = item.phone;
            document.getElementById('edit_about').value = item.about;
            document.getElementById('edit_country').value = item.country;
            document.getElementById('edit_state').value = item.state;
            document.getElementById('edit_city').value = item.city;
            document.getElementById('edit_zipcode').value = item.zipcode;

            document.getElementById('edit_industry').value = item.industry;
            $('#edit_industry').trigger('change');


            // ⭐ Show existing uploaded image
            if (item.image) {
                document.getElementById('edit_preview_img').src = "/uploads/" + item.image;
            } else {
                document.getElementById('edit_preview_img').src = "/default.png";
            }

            const modalEl = document.getElementById('edit_company');
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }

        //delete script
        function openDeleteModal(id) {
            // Set the delete URL with the correct ID
            document.getElementById('deleteConfirmBtn').href = "/deletecompany/" + id;

            // Show the modal
            var modal = new bootstrap.Modal(document.getElementById('delete_modal'));
            modal.show();
        }

    </script>
@endsection