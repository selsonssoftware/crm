@extends('layout')
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <!-- Breadcrumb -->
            <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
                <div class="my-auto mb-2">
                    <h2 class="mb-1">Contacts</h2>
                    
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                    <div class="me-2 mb-2">
                        <div class="d-flex align-items-center border bg-white rounded p-1 me-2 icon-list">
                            <a href="http://127.0.0.1:8000/contact-column" class="btn btn-icon btn-sm me-1"><i
                                    class="ti ti-list-tree"></i></a>
                            <a href="http://127.0.0.1:8000/contact" class="btn btn-icon btn-sm bg-primary text-white"><i
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
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_contact"
                            class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add
                            Contact</a>
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

            <!-- Contact Grid -->
            <div class="card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5>Contact Grid</h5>
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-sm btn-white d-inline-flex align-items-center"
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
            </div>

            <div class="row">
                @foreach($data as $item)
                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body">

                                <!-- Header -->
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>

                                    <div>
                                        <a href="#"
                                            class="avatar avatar-xl avatar-rounded border p-1 border-primary rounded-circle">
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
                                            <a class="dropdown-item" onclick='editContact(@json($item))' data-bs-toggle="modal"
                                                data-bs-target="#edit_contact">
                                                <i class="ti ti-edit me-1"></i>Edit
                                            </a>


                                            <li>
                                                <a class="dropdown-item" onclick="openDeleteModal({{ $item->contact_id }})">
                                                    <i class="ti ti-trash me-1"></i>Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Name + Role -->
                                <div class="text-center mb-3">
                                    <h6 class="mb-1">{{ $item->first_name }} {{ $item->last_name }}</h6>
                                    <span class="badge bg-pink-transparent fs-10 fw-medium">{{ $item->position }}</span>
                                </div>

                                <!-- Contact Details -->
                                <div class="d-flex flex-column">
                                    <p class="text-dark mb-2">
                                        <i class="ti ti-mail-forward text-gray-5 me-2"></i>
                                        {{ $item->email }}
                                    </p>
                                    <p class="text-dark mb-2">
                                        <i class="ti ti-phone text-gray-5 me-2"></i>
                                        {{ $item->phone }}
                                    </p>
                                    <p class="text-dark mb-2">
                                        <i class="ti ti-briefcase text-gray-5 me-2"></i>
                                        {{ $item->company_name }}
                                    </p>
                                    <p class="text-dark">
                                        <i class="ti ti-brand-codepen text-gray-5 me-2"></i>
                                        {{ $item->source }}
                                    </p>
                                </div>

                                <!-- Footer -->
                                <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                    <div class="icons-social d-flex">
                                        <a href="#" class="avatar avatar-rounded avatar-sm me-1"><i class="ti ti-mail"></i></a>
                                        <a href="#" class="avatar avatar-rounded avatar-sm me-1"><i
                                                class="ti ti-phone-call"></i></a>
                                        <a href="#" class="avatar avatar-rounded avatar-sm me-1"><i
                                                class="ti ti-message-2"></i></a>
                                        <a href="#" class="avatar avatar-rounded avatar-sm me-1"><i
                                                class="ti ti-brand-skype"></i></a>
                                        <a href="#" class="avatar avatar-rounded avatar-sm"><i
                                                class="ti ti-brand-facebook"></i></a>
                                    </div>
                                    <span><i class="ti ti-star-filled text-warning me-1"></i>{{ $item->rating }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /Contact Grid -->
        </div>
    </div>
    <!-- /Page Wrapper -->

    <!-- Add Contact -->
    <div class="modal fade" id="add_contact">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Contact</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="/storecontact" method="post" enctype="multipart/form-data">
                    @csrf
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
                                                        <input type="file" name="image" class="form-control image-sign">
                                                    </div>
                                                    <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">First Name <span class="text-danger"> *</span></label>
                                            <input type="text" name="first_name" class="form-control"
                                                placeholder="enter your fisrt name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control"
                                                placeholder="enter your last name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Job Title <span class="text-danger"> *</span></label>
                                            <input type="text" name="position" class="form-control"
                                                placeholder="enter your job title" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Company Name <span class="text-danger">
                                                    *</span></label>
                                            <input type="text" class="form-control" name="company_name"
                                                placeholder="enter company name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control"
                                                placeholder="enter your email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number <span class="text-danger">
                                                    *</span></label>
                                            <input type="text" name="phone" class="form-control"
                                                placeholder="mobile number">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Date of Birth <span class="text-danger"> *</span>
                                            </label>
                                            <div class="input-icon-end position-relative">
                                                <input type="text" name="dob" class="form-control datetimepicker"
                                                    placeholder="yyyy/mm/dd">
                                                <span class="input-icon-addon">
                                                    <i class="ti ti-calendar text-gray-7"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 ">
                                            <label class="form-label">Source <span class="text-danger"> *</span> </label>
                                            <select class="select" name="source">
                                                <option>Select</option>
                                                <option>Phone Calls</option>
                                                <option>Social Media</option>
                                                <option>Refferal Sites</option>
                                                <option>Web Analytics</option>
                                                <option>Previous Purchase</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab" tabindex="0">
                            <div class="modal-body pb-0 ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Address <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Country <span class="text-danger"> *</span></label>
                                            <select class="select">
                                                <option>Select</option>
                                                <option>USA</option>
                                                <option>Canada</option>
                                                <option>Germany</option>
                                                <option>France</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">State <span class="text-danger"> *</span></label>
                                            <select class="select">
                                                <option>Select</option>
                                                <option>California</option>
                                                <option>New York</option>
                                                <option>Texas</option>
                                                <option>Florida</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">City <span class="text-danger"> *</span></label>
                                            <select class="select">
                                                <option>Select</option>
                                                <option>Los Angeles</option>
                                                <option>San Diego</option>
                                                <option>Fresno</option>
                                                <option>San Francisco</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Zipcode <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control">
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
    <!-- /Add Contact -->

    <!-- Edit Contact -->
    <div class="modal fade" id="edit_contact">
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

                    <!-- CHANGED SECTION STARTS HERE -->
                    <div class="contact-grids-tab">
                        <ul class="nav nav-underline" id="editMyTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="edit-info-tab" data-bs-toggle="tab"
                                    data-bs-target="#edit-basic-info" type="button" role="tab" aria-selected="true">Basic
                                    Information</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="edit-address-tab" data-bs-toggle="tab"
                                    data-bs-target="#edit-address" type="button" role="tab"
                                    aria-selected="false">Address</button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="editMyTabContent">
                        <div class="tab-pane fade show active" id="edit-basic-info" role="tabpanel"
                            aria-labelledby="edit-info-tab" tabindex="0">
                            <!-- CHANGED SECTION ENDS HERE -->

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
                                                        <input type="file" name="image" id="edit_image"
                                                            class="form-control image-sign">
                                                    </div>
                                                    <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">First Name <span class="text-danger"> *</span></label>
                                            <input type="text" name="first_name" id="edit_first_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" id="edit_last_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Job Title <span class="text-danger"> *</span></label>
                                            <input type="text" name="position" id="edit_position" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Company Name <span class="text-danger">
                                                    *</span></label>
                                            <input type="text" class="form-control" id="edit_company_name"
                                                name="company_name" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="email" id="edit_email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number <span class="text-danger">
                                                    *</span></label>
                                            <input type="text" name="phone" id="edit_phone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Date of Birth <span class="text-danger">
                                                    *</span></label>
                                            <div class="input-icon-end position-relative">
                                                <input type="text" name="dob" id="edit_dob"
                                                    class="form-control datetimepicker">
                                                <span class="input-icon-addon">
                                                    <i class="ti ti-calendar text-gray-7"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 ">
                                            <label class="form-label">Source <span class="text-danger"> *</span> </label>
                                            <select class="select" name="source" id="edit_source">
                                                <option value="">Select</option>
                                                <option value="Phone Calls">Phone Calls</option>
                                                <option value="Social Media">Social Media</option>
                                                <option value="Refferal Sites">Refferal Sites</option>
                                                <option value="Web Analytics">Web Analytics</option>
                                                <option value="Previous Purchase">Previous Purchase</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                        <!-- CHANGED: Updated the address tab -->
                        <div class="tab-pane fade" id="edit-address" role="tabpanel" aria-labelledby="edit-address-tab"
                            tabindex="0">
                            <div class="modal-body pb-0 ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Address <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Country <span class="text-danger"> *</span></label>
                                            <select class="select">
                                                <option>Select</option>
                                                <option>USA</option>
                                                <option>Canada</option>
                                                <option>Germany</option>
                                                <option>France</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">State <span class="text-danger"> *</span></label>
                                            <select class="select">
                                                <option>Select</option>
                                                <option>California</option>
                                                <option>New York</option>
                                                <option>Texas</option>
                                                <option>Florida</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">City <span class="text-danger"> *</span></label>
                                            <select class="select">
                                                <option>Select</option>
                                                <option>Los Angeles</option>
                                                <option>San Diego</option>
                                                <option>Fresno</option>
                                                <option>San Francisco</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Zipcode <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Edit Contact -->


    <!-- Delete Modal -->
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Contact?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this contact?
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
        let editModalInstance = null;

        function editContact(item) {
            console.log('Editing contact ID:', item.contact_id);

            document.getElementById('editForm').action = "{{ url('contacts') }}/" + item.contact_id;
            document.getElementById('edit_id').value = item.contact_id;

            document.getElementById('edit_first_name').value = item.first_name || '';
            document.getElementById('edit_last_name').value = item.last_name || '';
            document.getElementById('edit_position').value = item.position || '';
            document.getElementById('edit_company_name').value = item.company_name || '';
            document.getElementById('edit_email').value = item.email || '';
            document.getElementById('edit_phone').value = item.phone || '';
            document.getElementById('edit_dob').value = item.dob || '';
            document.getElementById('edit_source').value = item.source;
            $('#edit_source').trigger('change');

            if (item.image) {
                document.getElementById('edit_preview_img').src = "/uploads/" + item.image;
            } else {
                document.getElementById('edit_preview_img').src = "/default.png";
            }

            const editModalElement = document.getElementById('edit_contact');

            if (!editModalInstance) {
                editModalInstance = new bootstrap.Modal(editModalElement);
            }

            // Show the modal
            editModalInstance.show();

            const editForm = document.getElementById('editForm');
            editForm.addEventListener('submit', function (e) {
                console.log('Form submitted normally');
            });
        }

        // Delete script
        function openDeleteModal(id) {
            document.getElementById('deleteConfirmBtn').href = "/deletecontact/" + id;

            // Show the modal
            var modal = new bootstrap.Modal(document.getElementById('delete_modal'));
            modal.show();
        }

        document.addEventListener('DOMContentLoaded', function () {
            const editModalElement = document.getElementById('edit_contact');

            if (editModalElement) {
                const editCancelButtons = editModalElement.querySelectorAll('.btn-light[data-bs-dismiss="modal"]');

                editCancelButtons.forEach(button => {
                    const newButton = button.cloneNode(true);
                    button.parentNode.replaceChild(newButton, button);

                    newButton.addEventListener('click', function (e) {
                        e.preventDefault();
                        e.stopImmediatePropagation();
                        console.log('Cancel clicked - preventing refresh');

                        if (editModalInstance) {
                            editModalInstance.hide();
                        }

                        return false;
                    });
                });

                editModalElement.addEventListener('hidden.bs.modal', function () {
                    console.log('Modal hidden - resetting form');
                    document.getElementById('editForm').reset();

                    const backdrops = document.querySelectorAll('.modal-backdrop');
                    backdrops.forEach(backdrop => {
                        backdrop.remove();
                    });

                    document.body.classList.remove('modal-open');
                    document.body.style.overflow = '';
                    document.body.style.paddingRight = '';
                });

                editModalElement.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter' && e.target.type !== 'submit') {
                        e.preventDefault();
                        return false;
                    }
                });
            }

            const addModal = document.getElementById('add_contact');
            if (addModal) {
                const addCancelButtons = addModal.querySelectorAll('.btn-light[data-bs-dismiss="modal"]');
                addCancelButtons.forEach(button => {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();
                    });
                });
            }
        });

        window.addEventListener('beforeunload', function (e) {
            const editModal = document.getElementById('edit_contact');
            if (editModal && editModal.classList.contains('show')) {
                console.log('Page trying to reload while modal is open');
            }
        });
    </script>


@endsection