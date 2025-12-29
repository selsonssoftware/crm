@extends('layout')
@section('content')
			<div class="content">

				<!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h2 class="mb-1">Settings</h2>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="#"><i class="ti ti-smart-home"></i></a>
								</li>
								<li class="breadcrumb-item">
									Administration
								</li>
								<li class="breadcrumb-item active" aria-current="page">Settings</li>
							</ol>
						</nav>
					</div>
					<div class="head-icons ms-2">
						<a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
							<i class="ti ti-chevrons-up"></i>
						</a>
					</div>
				</div>
				<!-- /Breadcrumb -->

				<ul class="nav nav-tabs nav-tabs-solid bg-transparent border-bottom mb-3">
					<li class="nav-item">
						<a class="nav-link active" href="/generalsettings"><i class="ti ti-settings me-2"></i>General Settings</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" href="https://smarthr.co.in/demo/html/template/bussiness-settings.html"><i class="ti ti-world-cog me-2"></i>Website Settings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="https://smarthr.co.in/demo/html/template/salary-settings.html"><i class="ti ti-device-ipad-horizontal-cog me-2"></i>App Settings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="https://smarthr.co.in/demo/html/template/email-settings.html"><i class="ti ti-server-cog me-2"></i>System Settings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="https://smarthr.co.in/demo/html/template/payment-gateways.html"><i class="ti ti-settings-dollar me-2"></i>Financial Settings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="https://smarthr.co.in/demo/html/template/custom-css.html"><i class="ti ti-settings-2 me-2"></i>Other Settings</a>
					</li> -->
				</ul>
				<div class="row">
					<!-- <div class="col-xl-3 theiaStickySidebar">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-column list-group settings-list">
									<a href="https://smarthr.co.in/demo/html/template/profile-settings.html" class="d-inline-flex align-items-center rounded active py-2 px-3"><i class="ti ti-arrow-badge-right me-2"></i>Profile Settings</a>
									<a href="https://smarthr.co.in/demo/html/template/security-settings.html" class="d-inline-flex align-items-center rounded py-2 px-3">Security Settings</a>
									<a href="https://smarthr.co.in/demo/html/template/notification-settings.html" class="d-inline-flex align-items-center rounded py-2 px-3">Notifications</a>
									<a href="https://smarthr.co.in/demo/html/template/connected-apps.html" class="d-inline-flex align-items-center rounded py-2 px-3">Connected Apps</a>
								</div>
							</div>
						</div>
					</div> -->
					<div class="col-xl-8 col-lg-9 col-md-10 mx-auto">

						<div class="card">
							<div class="card-body">
								<div class="border-bottom mb-3 pb-3">
									<h4>Company Settings</h4>
								</div>
								<form action="/generalsettingsstore" method="post" enctype="multipart/form-data">
                                    @csrf
									<div class="border-bottom mb-3">
										<div class="row">
											<div class="col-md-12">
												<div>					
													<h6 class="mb-3">Company Information</h6>
													<div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">

                                                    <div class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded-circle border border-dashed me-2 flex-shrink-0 text-dark frames" style="overflow: hidden;">

                                                        @if(!empty($generalsettings?->logo))
                                                            <img 
                                                                src="{{ asset('uploads/generalsettings/'.$generalsettings->logo) }}"
                                                                id="logoPreview"
                                                                style="width:100%; height:100%; object-fit:cover; border-radius:50%;">
                                                        @else
                                                            <i class="ti ti-photo text-gray-3 fs-16"></i>
                                                        @endif

                                                    </div>

                                                    <div class="profile-upload">
                                                        <div class="mb-2">
                                                            <h6 class="mb-1">Company Logo</h6>
                                                            <p class="fs-12">Recommended image size is 40px x 40px</p>
                                                        </div>

                                                        <div class="profile-uploader d-flex align-items-center">
                                                            <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                                                                Upload
                                                                <input type="file" name="logo" class="form-control image-sign" accept="image/*">
                                                            </div>
                                                            <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                                        </div>
                                                    </div>

                                                </div>

												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="row align-items-center mb-3">
													<div class="col-md-4">
														<label class="form-label mb-md-0">Company Name</label>
													</div>
													<div class="col-md-8">
														<input type="text" name="company_name" class="form-control" value="{{ old('company_name', $generalsettings->company_name ?? '') }}">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="row align-items-center mb-3">
													<div class="col-md-4">
														<label class="form-label mb-md-0">GST Number</label>
													</div>
													<div class="col-md-8">
														  <input type="text" name="gst_number" class="form-control" value="{{ old('gst_number', $generalsettings->gst_number ?? '') }}">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="row align-items-center mb-3">
													<div class="col-md-4">
														<label class="form-label mb-md-0">Email</label>
													</div>
													<div class="col-md-8">
														<input type="email" name="email" class="form-control" value="{{ old('email', $generalsettings->email ?? '') }}">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="row align-items-center mb-3">
													<div class="col-md-4">
														<label class="form-label mb-md-0">Phone</label>
													</div>
													<div class="col-md-8">
														<input type="text" name="phone" class="form-control" value="{{ old('phone', $generalsettings->phone ?? '') }}">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="border-bottom mb-3">
										<h6 class="mb-3">Address Information</h6>
										<div class="row">
											<div class="col-md-12">
												<div class="row align-items-center mb-3">
													<div class="col-md-2">
														<label class="form-label mb-md-0">Address</label>
													</div>
													<div class="col-md-10">
														<input type="text" name="address" class="form-control" value="{{ old('address', $generalsettings->address ?? '') }}">

													</div>	
												</div>
											</div>
											<div class="col-md-6">
												<div class="row align-items-center mb-3">
													<div class="col-md-4">
														<label class="form-label mb-md-0">Country</label>
													</div>
													<div class="col-md-8">
														<div>
															<input type="text" name="country" class="form-control" value="{{ old('country', $generalsettings->country ?? '') }}">
														</div>
													</div>	
												</div>
											</div>
											<div class="col-md-6">
												<div class="row align-items-center mb-3">
													<div class="col-md-4">
														<label class="form-label mb-md-0">State</label>
													</div>
													<div class="col-md-8">
														<div>
															  <input type="text" name="state" class="form-control" value="{{ old('state', $generalsettings->state ?? '') }}">
														</div>
													</div>	
												</div>
											</div>
											<div class="col-md-6">
												<div class="row align-items-center mb-3">
													<div class="col-md-4">
														<label class="form-label mb-md-0">City</label>
													</div>
													<div class="col-md-8">
														 <input type="text" name="city" class="form-control" value="{{ old('city', $generalsettings->city ?? '') }}">
													</div>	
												</div>
											</div>
											<div class="col-md-6">
												<div class="row align-items-center mb-3">
													<div class="col-md-4">
														<label class="form-label mb-md-0">Pin Code</label>
													</div>
													<div class="col-md-8">
														<input type="text" name="pincode" class="form-control" value="{{ old('pincode', $generalsettings->pincode ?? '') }}">
													</div>	
												</div>
											</div>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-end">
										<button type="button" class="btn btn-outline-light border me-3">Cancel</button>
										<button type="submit" class="btn btn-primary">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>




            <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelector('.image-sign').addEventListener('change', function (e) {
                    const file = e.target.files[0];
                    if (!file) return;

                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const frame = document.querySelector('.frames');
                        frame.innerHTML = `
                            <img 
                                src="${e.target.result}"
                                id="logoPreview"
                                style="width:100%; height:100%; object-fit:cover; border-radius:50%;"> `;
                    };
                    reader.readAsDataURL(file);
                });
            });
            </script>

@endsection