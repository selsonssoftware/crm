@extends('layout')
@section('content')
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content">
				<div class="row align-items-center">
					<div class="col-md-10 mx-auto">
						<div class="card">
                            <form action="/store_invoice" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <a href="/view_invoice" class="back-icon align-items-center fs-14 d-inline-flex fw-medium">
                                            <span class=" d-flex justify-content-center align-items-center rounded-circle me-2">
                                                <i class="ti ti-arrow-left fs-12"></i>
                                            </span>
                                            Back to List
                                        </a>
                                        <a href="#" class="text-primary text-decoration-underline" data-bs-toggle="modal" data-bs-target="#invoice_preview">
                                            Preview 
                                        </a>
                                    </div>

                                    <!-- My details -->
                                    <div class="bg-light p-3 rounded mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5>From</h5>
                                            <!-- <a href="" class="text-dark fw-medium"><span class="text-gray me-2"><i class="ti ti-edit"></i></span>Edit Details</a> -->
                                        </div>
                                        @foreach($site_details as $details)
                                        <div>
                                            <h4 class="mb-1">{{$details->company_name}}</h4>
                                            <p class="mb-1">{{$details->address}}, {{$details->city}}, {{$details->state}}, {{$details->pincode}}</p>
                                            <p class="mb-1">Email : <span class="text-dark">{{$details->email}}</span></p>
                                            <p>Phone : <span class="text-dark">+91 {{$details->phone}}</span></p>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- /My details -->

                                    <!-- Invoice Details-->
                                    <div class="border-bottom mb-3">
                                        <h4 class="mb-2">Invoice Details</h4>
                                        <div class="mb-2">
                                            <label class="form-label">Invoice Title</label>
                                            <input type="text" class="form-control" name="invoice_title">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Invoice No</label>
                                                    <input type="text" class="form-control" name="invoice_no">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Invoice Date</label>
                                                    <div class="input-icon position-relative w-100 me-2">
                                                        
                                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="invoice_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Due Date</label>
                                                    <div class="input-icon position-relative w-100 me-2">
                                                        
                                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="due_date">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Invoice Details-->

                                    <!-- Payment Details-->
                                    <div class="border-bottom mb-3">
                                        <h4 class="mb-2">Payment Details</h4>
                                        
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <label class="form-label">Customer</label>
                                                        <!-- <a href="" class="text-primary fw-medium d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add_customer">
                                                            <i class="ti ti-plus me-2"></i>Add New
                                                        </a> -->
                                                    </div>
                                                   <select name="contact_id" class="form-control" required>
                                                        <option value="">-- Select Client --</option>
                                                        @foreach($clients as $client)
                                                            <option value="{{ $client->contact_id }}">{{ $client->first_name }} {{ $client->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Reference Number</label>
                                                    <input type="text" class="form-control" name="reference_no">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Select Payment Type</label>
                                                    <select class="select select2-hidden-accessible" name="payment_type" data-select2-id="select2-data-1-l0ws" tabindex="-1" aria-hidden="true">
                                                        <option data-select2-id="select2-data-3-a0uv">Select</option>
                                                        <option>Cash</option>
                                                        <option>Bank</option>
                                                        <option>Check</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Bank Details</label>
                                                    <select class="select select2-hidden-accessible" name="bank_details" tabindex="-1" aria-hidden="true">
                                                        <option >Select</option>
                                                        <option>Bank1</option>
                                                        <option>Bank2</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Payment Details-->

                                    <!-- Add Items-->
                                    <div class="border-bottom mb-3">
                                        <h4 class="mb-2">Add Items</h4>

                                        <div id="items-wrapper">
                                            <div class="border rounded p-3 mb-3 item-row">
                                                <div class="add-description-info">									
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Description</label>
                                                                <input type="text" class="form-control" name="description[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Qty</label>
                                                                        <input type="number" class="form-control" name="quantity[]">
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Discount</label>
                                                                        <input type="number" class="form-control" name="discount[]">
                                                                    </div>
                                                                </div> -->
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Rate</label>
                                                                        <input type="number" class="form-control" name="rate[]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="javascript:void(0);" class="text-danger remove-item fw-medium d-none">
                                                    Remove
                                                </a>
                                            </div>
                                        </div>

                                        <a href="javascript:void(0);" class="text-primary add-more-description fw-medium d-flex align-items-center">
                                            <i class="ti ti-plus me-2"></i>Add New
                                        </a>
                                    </div>
                                    <!-- /Add Items-->
                                        <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Total</label>
                                            <input type="text" class="form-control" name="amount">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tax </label>
                                            <input type="text" class="form-control" name="tax">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Discount(%) </label>
                                            <input type="text" class="form-control" name="discount">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Grand Total </label>
                                            <input type="text" class="form-control" name="grand_total">
                                        </div>
                                    </div>
                                </div>
                                    <!-- Additional Details-->
                                    <div>
                                        <h4 class="mb-2">Additional Details</h4>
                                        <div class="mb-3">
                                            <label class="form-label"> Description</label>
                                            <textarea class="form-control" rows="3" name="invoice_description"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Notes</label>
                                            <textarea class="form-control" rows="3" name="notes"></textarea>
                                        </div>
                                    </div>
                                    <!-- Additional Details-->

                                    <!-- <div class="d-flex justify-content-end align-items-center flex-wrap row-gap-3">
                                        <a href="https://smarthr.co.in/demo/html/template/add-invoices.html#" class="btn btn-dark d-flex justify-content-center align-items-center"><i class="ti ti-printer me-2"></i>Save as Draft</a>
                                        <a href="https://smarthr.co.in/demo/html/template/add-invoices.html#" class="btn btn-primary d-flex justify-content-center align-items-center  ms-2"><i class="ti ti-copy me-2"></i>Save &amp; Send</a>
                                    </div> -->
                                    <div class="d-flex justify-content-end align-items-center flex-wrap row-gap-3">
														<button type="button" class="btn btn-dark d-flex justify-content-center align-items-center" data-bs-dismiss="modal">Cancel</button>
														<button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center  ms-2">Save</button>
													</div>
                                </div>
                            </form>
						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Page Wrapper -->

		<!-- Invoice Preview -->
		<div class="modal fade" id="invoice_preview">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-body p-4">
						<div class="invoice-content">		
							<!-- Invoices -->
							<div class="d-flex justify-content-center align-items-center">
								<div class="flex-fill">
									<div class="row justify-content-between align-items-center border-bottom mb-3">
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <img src="./Smarthr Admin Template_files/logo.svg" class="img-fluid" alt="logo">
                                            </div>
                                            <p>3099 Kennedy Court Framingham, MA 01702</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class=" text-end mb-3">
                                                <h5 class="text-gray mb-1">Invoice No <span class="text-primary">#INV0001</span></h5>
                                                <p class="mb-1 fw-medium">Created Date : <span class="text-dark">Sep 24, 2023</span> </p>
                                                <p class="fw-medium">Due Date : <span class="text-dark">Sep 30, 2023</span> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-bottom mb-3">
                                        <div class="col-md-5">
                                            <p class="text-dark mb-2 fw-semibold">From</p>
                                            <div>
                                                <h4 class="mb-1">Thomas Lawler</h4>
                                                <p class="mb-1">2077 Chicago Avenue Orosi, CA 93647</p>
                                                <p class="mb-1">Email : <span class="text-dark">Tarala2445@example.com</span></p>
                                                <p>Phone : <span class="text-dark">+1 987 654 3210</span></p>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <p class="text-dark mb-2 fw-semibold">To</p>
                                            <div>
                                                <h4 class="mb-1">Sara Inc,.</h4>
                                                <p class="mb-1">3103 Trainer Avenue Peoria, IL 61602</p>
                                                <p class="mb-1">Email : <span class="text-dark">Sara_inc34@example.com</span></p>
                                                <p>Phone : <span class="text-dark">+1 987 471 6589</span></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <p class="text-title mb-2 fw-medium">Payment Status </p>
                                                <span class="badge badge-danger align-items-center mb-3"><i class="ti ti-point-filled "></i>Due in 10 Days</span>
                                                <div>
                                                    <img src="./Smarthr Admin Template_files/qr.svg" class="img-fluid" alt="QR">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="fw-medium">Invoice For : <span class="text-dark fw-medium">Design &amp; development of Website</span></p>
                                        <div class="table-responsive mb-3">
                                            <table class="table">
                                                <thead class="thead-light">
													<tr>
														<th>Job Description</th>
														<th class="text-end">Qty</th>
														<th class="text-end">Cost</th>
														<th class="text-end">Discount</th>
														<th class="text-end">Total</th>
													</tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><h6>UX Strategy</h6></td>
                                                        <td class="text-gray-9 fw-medium text-end">1</td>
                                                        <td class="text-gray-9 fw-medium text-end">$500</td>
                                                        <td class="text-gray-9 fw-medium text-end">$100</td>
                                                        <td class="text-gray-9 fw-medium text-end">$500</td>
                                                    </tr>
                                                    <tr>
                                                        <td><h6>Design System</h6></td>
                                                        <td class="text-gray-9 fw-medium text-end">1</td>
                                                        <td class="text-gray-9 fw-medium text-end">$5000</td>
                                                        <td class="text-gray-9 fw-medium text-end">$100</td>
                                                        <td class="text-gray-9 fw-medium text-end">$5000</td>
                                                    </tr>
                                                    <tr>
                                                        <td><h6>Brand Guidellines</h6></td>
                                                        <td class="text-gray-9 fw-medium text-end">1</td>
                                                        <td class="text-gray-9 fw-medium text-end">$5000</td>
                                                        <td class="text-gray-9 fw-medium text-end">$100</td>
                                                        <td class="text-gray-9 fw-medium text-end">$5000</td>
                                                    </tr>
                                                    <tr>
                                                        <td><h6>Social Media Template</h6></td>
                                                        <td class="text-gray-9 fw-medium text-end">1</td>
                                                        <td class="text-gray-9 fw-medium text-end">$5000</td>
                                                        <td class="text-gray-9 fw-medium text-end">$100</td>
                                                        <td class="text-gray-9 fw-medium text-end">$5000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row border-bottom mb-3">
                                        <div class="col-md-7">
                                            <div class="py-4">
                                                <div class="mb-3">
                                                    <h6 class="mb-1">Terms and Conditions</h6>
                                                    <p>Please pay within 15 days from the date of invoice, overdue interest @ 14% will be charged on delayed payments.</p>
                                                </div>
                                                <div class="mb-3">
                                                    <h6 class="mb-1">Notes</h6>
                                                    <p>Please quote invoice number when remitting funds.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex justify-content-between align-items-center border-bottom mb-2 pe-3">
                                                <p class="mb-0">Sub Total</p>
                                                <p class="text-dark fw-medium mb-2">$5500</p>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center border-bottom mb-2 pe-3">
                                                <p class="mb-0">Discount(0%)</p>
                                                <p class="text-dark fw-medium mb-2">$400</p>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2 pe-3">
                                                <p class="mb-0">VAT(5%)</p>
                                                <p class="text-dark fw-medium mb-2">$54</p>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2 pe-3">
                                                <h5>Total Amount</h5>
                                                <h5>$5775</h5>
                                            </div>
                                            <p class="fs-12">
                                                Amount in Words : Dollar Five thousand Seven Seventy Five
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end align-items-end text-end border-bottom mb-3">
                                        <div class="col-md-3">
                                            <div class="text-end">
                                                <img src="./Smarthr Admin Template_files/sign.svg" class="img-fluid" alt="sign">
                                            </div>
                                            <div class="text-end mb-3">
                                                <h6 class="fs-14 fw-medium pe-3">Ted M. Davis</h6>
                                                <p>Assistant Manager</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="mb-3">
                                            <img src="./Smarthr Admin Template_files/logo.svg" class="img-fluid" alt="logo">
                                        </div>
                                        <p class="text-dark mb-1">Payment Made Via bank transfer / Cheque in the name of Thomas Lawler</p>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <p class="fs-12 mb-0 me-3">Bank Name : <span class="text-dark">HDFC Bank</span></p>
                                            <p class="fs-12 mb-0 me-3">Account Number : <span class="text-dark">45366287987</span></p>
                                            <p class="fs-12">IFSC : <span class="text-dark">HDFC0018159</span></p>
                                        </div>
                                    </div>
								</div>
							</div>
							<!-- /Invoices -->
						</div>
					</div>
						
				</div>
			</div>
		</div>
		<!-- /Invoice Preview -->

		<!-- Add Customer -->
		<!-- <div class="modal fade" id="add_customer">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add New Customer</h4>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<form action="" method="post">
                        @csrf
						<div class="modal-body">
							<div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">                                                
								<div class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded-circle border border-dashed me-2 flex-shrink-0 text-dark frames">
									<i class="ti ti-photo-plus fs-16"></i>
								</div>                                              
								<div class="profile-upload">
									<div class="mb-2">
										<h6 class="mb-1">Upload Profile Image</h6>
										<p class="fs-12">Image should be below 4 mb</p>
									</div>
									<div class="profile-uploader d-flex align-items-center">
										<div class="drag-upload-btn btn btn-sm btn-primary me-2">
											Upload
											<input type="file" class="form-control image-sign" multiple="">
										</div>
										<a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
									</div>
									
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">First Name <span class="text-danger"> *</span></label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Last Name <span class="text-danger"> *</span></label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">User Name <span class="text-danger"> *</span></label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Email <span class="text-danger"> *</span></label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3 ">
										<label class="form-label">Password <span class="text-danger"> *</span></label>
										<div class="pass-group">
											<input type="password" class="pass-input form-control">
											<span class="ti toggle-password ti-eye-off"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3 ">
										<label class="form-label">Confirm Password <span class="text-danger"> *</span></label>
										<div class="pass-group">
											<input type="password" class="pass-inputs form-control">
											<span class="ti toggle-passwords ti-eye-off"></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Phone Number <span class="text-danger"> *</span></label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Company <span class="text-danger"> *</span></label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-0">
										<label class="form-label">Address <span class="text-danger"> *</span></label>
										<input type="text" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<div class="d-flex align-items-center justify-content-end m-0">
								<button class="btn btn-outline border me-2" type="button" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div> -->
		<!-- /Add Customer -->


    </div>
	<!-- /Main Wrapper -->
<script>
document.addEventListener("DOMContentLoaded", function () {
	const addBtn = document.querySelector(".add-more-description");
	const wrapper = document.getElementById("items-wrapper");

	addBtn.addEventListener("click", function () {
		const firstRow = wrapper.querySelector(".item-row");
		const newRow = firstRow.cloneNode(true);

		// Clear input values
		newRow.querySelectorAll("input").forEach(input => {
			input.value = "";
		});

		// Show remove button on cloned rows
		newRow.querySelector(".remove-item").classList.remove("d-none");

		wrapper.appendChild(newRow);
	});

	// Remove row (event delegation)
	wrapper.addEventListener("click", function (e) {
		if (e.target.classList.contains("remove-item")) {
			e.target.closest(".item-row").remove();
		}
	});
});
</script>
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


<script>
document.addEventListener('DOMContentLoaded', function () {
    const itemsWrapper = document.getElementById('items-wrapper');

    function calculateTotals() {
        const qtyInputs = document.querySelectorAll('input[name="quantity[]"]');
        const rateInputs = document.querySelectorAll('input[name="rate[]"]');

        let subtotal = 0;

        qtyInputs.forEach((qtyInput, index) => {
            const qty = parseFloat(qtyInput.value) || 0;
            const rate = parseFloat(rateInputs[index].value) || 0;
            subtotal += qty * rate;
        });

        const taxPercent = parseFloat(document.querySelector('input[name="tax"]').value) || 0;
        const discountPercent = parseFloat(document.querySelector('input[name="discount"]').value) || 0;

        const discountAmount = (subtotal * discountPercent) / 100;
        const taxableAmount = subtotal - discountAmount;
        const taxAmount = (taxableAmount * taxPercent) / 100;

        const grandTotal = taxableAmount + taxAmount;

        document.querySelector('input[name="amount"]').value = subtotal.toFixed(2);
        document.querySelector('input[name="grand_total"]').value = grandTotal.toFixed(2);
    }

    itemsWrapper.addEventListener('input', calculateTotals);
    document.querySelector('input[name="tax"]').addEventListener('input', calculateTotals);
    document.querySelector('input[name="discount"]').addEventListener('input', calculateTotals);
});

</script>


@endsection