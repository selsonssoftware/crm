@extends('layout')
@section('content')

    <div class="content mt-5">

        <!-- Breadcrumb -->
        <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
            <div class="my-auto mb-2">
                <h2 class="mb-1">Tickets</h2>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="https://smarthr.co.in/demo/html/template/index.html"><i
                                    class="ti ti-smart-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            Employee
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tickets</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">

                <div class="mb-2">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#add_ticket"
                        class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add
                        Ticket</a>
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

        <div class="row">
            <div class="col-xl-3 col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 d-flex">
                                <div class="flex-fill">
                                    <div
                                        class="border border-dashed border-primary rounded-circle d-inline-flex align-items-center justify-content-center p-1 mb-3">
                                        <span class="avatar avatar-lg avatar-rounded bg-primary-transparent "><i
                                                class="ti ti-ticket fs-20"></i></span>
                                    </div>
                                    <p class="fw-medium fs-12 mb-1">New Tickets</p>
                                    <h4>{{$newTickets}}</h4>
                                </div>
                            </div>
                            <div class="col-6 text-end d-flex">
                                <div class="d-flex flex-column justify-content-between align-items-end">
                                    <span class="badge bg-transparent-purple d-inline-flex align-items-center mb-3">
                                        <i class="ti ti-arrow-wave-right-down me-1"></i>
                                        +19.01%
                                    </span>
                                    <!-- <div class="ticket-chart-1">8,5,6,3,4,6,7,3,8,6,4,7</div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 d-flex">
                                <div class="flex-fill">
                                    <div
                                        class="border border-dashed border-purple rounded-circle d-inline-flex align-items-center justify-content-center p-1 mb-3">
                                        <span class="avatar avatar-lg avatar-rounded bg-transparent-purple"><i
                                                class="ti ti-folder-open fs-20"></i></span>
                                    </div>
                                    <p class="fw-medium fs-12 mb-1">Open Tickets</p>
                                    <h4>{{$openTickets}}</h4>
                                </div>
                            </div>
                            <div class="col-6 text-end d-flex">
                                <div class="d-flex flex-column justify-content-between align-items-end">
                                    <span class="badge bg-transparent-dark text-dark d-inline-flex align-items-center mb-3">
                                        <i class="ti ti-arrow-wave-right-down me-1"></i>
                                        +19.01%
                                    </span>
                                    <!-- <div class="ticket-chart-2">8,5,6,3,4,6,7,3,8,6,4,7</div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 d-flex">
                                <div class="flex-fill">
                                    <div
                                        class="border border-dashed border-success rounded-circle d-inline-flex align-items-center justify-content-center p-1 mb-3">
                                        <span class="avatar avatar-lg avatar-rounded bg-success-transparent"><i
                                                class="ti ti-checks fs-20"></i></span>
                                    </div>
                                    <p class="fw-medium fs-12 mb-1">Solved Tickets</p>
                                    <h4>{{$closeTicket}}</h4>
                                </div>
                            </div>
                            <div class="col-6 text-end d-flex">
                                <div class="d-flex flex-column justify-content-between align-items-end">
                                    <span class="badge bg-info-transparent d-inline-flex align-items-center mb-3">
                                        <i class="ti ti-arrow-wave-right-down me-1"></i>
                                        +19.01%
                                    </span>
                                    <!-- <div class="ticket-chart-3">8,5,6,3,4,6,7,3,8,6,4,7</div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 d-flex">
                                <div class="flex-fill">
                                    <div
                                        class="border border-dashed border-info rounded-circle d-inline-flex align-items-center justify-content-center p-1 mb-3">
                                        <span class="avatar avatar-lg avatar-rounded bg-info-transparent"><i
                                                class="ti ti-progress-alert fs-20"></i></span>
                                    </div>
                                    <p class="fw-medium fs-12 mb-1">OnProcess Tickets</p>
                                    <h4>{{$onProcess}}</h4>
                                </div>
                            </div>
                            <div class="col-6 text-end d-flex">
                                <div class="d-flex flex-column justify-content-between align-items-end">
                                    <span class="badge bg-secondary-transparent d-inline-flex align-items-center mb-3">
                                        <i class="ti ti-arrow-wave-right-down me-1"></i>
                                        +19.01%
                                    </span>
                                    <!-- <div class="ticket-chart-4">8,5,6,3,4,6,7,3,8,6,4,7</div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body p-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <h5>Ticket List</h5>
                    <div class="d-flex align-items-center flex-wrap row-gap-3">
                        <!-- <div class="dropdown me-2">
                                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-sm btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                            Priority
                                        </a>
                                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Priority</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">High</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Low</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Medium</a>
                                            </li>
                                        </ul>
                                    </div> -->
                        <div class="dropdown me-2">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-sm btn-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                Select Status
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                <li>
                                    <a href="{{ route('tickets.index', ['status' => 'Open']) }}"
                                        class="dropdown-item rounded-1">Open</a>
                                </li>
                                <li>
                                    <a href="{{ route('tickets.index', ['status' => 'On Process']) }}"
                                        class="dropdown-item rounded-1">On Process</a>
                                </li>
                                <li>
                                    <a href="{{ route('tickets.index', ['status' => 'Close']) }}"
                                        class="dropdown-item rounded-1">Close</a>
                                </li>
                                <li>
                                    <a href="{{ route('tickets.index', ['status' => '']) }}"
                                        class="dropdown-item rounded-1">All</a>
                                </li>
                            </ul>
                        </div>

                        <!-- <div class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-sm btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
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
            </div>
        </div>
        <div class="row">
            <div class="col-xl-9 col-md-8">
                @foreach($variable as $data)
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                            <h5 class="text-info fw-medium">{{$data->title}}</h5>
                            <div class="d-flex align-items-center">
                                <span class="badge badge-danger d-inline-flex align-items-center"><i
                                        class="ti ti-circle-filled fs-5 me-1"></i>{{$data->priority}}</span>

                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <span class="badge badge-info rounded-pill mb-2">{{$data->ticket_number}}</span>
                                <div class="d-flex align-items-center mb-2">
                                    <h5 class="fw-semibold me-2"><a
                                            href="{{ route('ticket.details', $data->ticket_id) }}">{{$data->event_category}}</a>
                                    </h5>
                                    <span class="badge bg-outline-pink d-flex align-items-center ms-1"><i
                                            class="ti ti-circle-filled fs-5 me-1"></i>{{$data->status}}</span>
                                </div>
                                <div class="d-flex align-items-center flex-wrap row-gap-2">
                                    <p class="d-flex align-items-center mb-0 me-2">
                                        <img class="border border-white" src="{{ asset('uploads/logo/' . $data->logo) }}"
                                            style="width:50px;height:50px;border-radius:50%"></th> Assigned to <span
                                            class="text-dark ms-1">{{$data->first_name}} {{$data->last_name}}</span>
                                    </p>
                                    <p class="d-flex align-items-center mb-0 me-2"><i
                                            class="ti ti-calendar-bolt me-1"></i>Updated {{$data->updated_at}}</p>
                                    <p class="d-flex align-items-center mb-0"><i class="ti ti-message-share me-1"></i>9 Comments
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="text-center mb-4">
                    <a href="#" class="btn btn-primary"><i class="ti ti-loader-3 me-1"></i>Load</a>
                </div>
            </div>
            <div class="col-xl-3 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Ticket Categories</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-between border-bottom p-3">
                                <a href="javascript:void(0);">Internet Issue</a>
                                <div class="d-flex align-items-center">
                                    <span class="badge badge-xs bg-dark rounded-circle">0</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-bottom p-3">
                                <a href="javascript:void(0);">Computer</a>
                                <div class="d-flex align-items-center">
                                    <span class="badge badge-xs bg-dark rounded-circle">1</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-bottom p-3">
                                <a href="javascript:void(0);">Redistribute</a>
                                <div class="d-flex align-items-center">
                                    <span class="badge badge-xs bg-dark rounded-circle">0</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-bottom p-3">
                                <a href="javascript:void(0);">Payment</a>
                                <div class="d-flex align-items-center">
                                    <span class="badge badge-xs bg-dark rounded-circle">2</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between p-3">
                                <a href="javascript:void(0);">Complaint</a>
                                <div class="d-flex align-items-center">
                                    <span class="badge badge-xs bg-dark rounded-circle">1</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Support Agents</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-between border-bottom p-3">
                                <span class="d-flex align-items-center">
                                    <img src="https://smarthr.co.in/demo/html/template/assets/img/profiles/avatar-01.jpg"
                                        class="avatar avatar-xs rounded-circle me-2" alt="img">Edgar Hansel
                                </span>
                                <div class="d-flex align-items-center">
                                    <span class="badge badge-xs bg-dark rounded-circle">0</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-bottom p-3">
                                <span class="d-flex align-items-center">
                                    <img src="https://smarthr.co.in/demo/html/template/assets/img/profiles/avatar-02.jpg"
                                        class="avatar avatar-xs rounded-circle me-2" alt="img">Ann Lynch
                                </span>
                                <div class="d-flex align-items-center">
                                    <span class="badge badge-xs bg-dark rounded-circle">1</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-bottom p-3">
                                <span class="d-flex align-items-center">
                                    <img src="https://smarthr.co.in/demo/html/template/assets/img/profiles/avatar-03.jpg"
                                        class="avatar avatar-xs rounded-circle me-2" alt="img">Juan Hermann
                                </span>
                                <div class="d-flex align-items-center">
                                    <span class="badge badge-xs bg-dark rounded-circle">0</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between p-3">
                                <span class="d-flex align-items-center">
                                    <img src="https://smarthr.co.in/demo/html/template/assets/img/profiles/avatar-04.jpg"
                                        class="avatar avatar-xs rounded-circle me-2" alt="img">Jessie Otero
                                </span>
                                <div class="d-flex align-items-center">
                                    <span class="badge badge-xs bg-dark rounded-circle">2</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Add Ticket -->
    <div class="modal fade" id="add_ticket">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Ticket</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="/store_tickets" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" placeholder="Enter Title" name="title" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Event Category</label>
                                    <select class="select" name="event_category">
                                        <option>Select</option>
                                        <option>Internet Issue</option>
                                        <option>Redistribute</option>
                                        <option>Computer</option>
                                        <option>Complaint</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Subject</label>
                                    <input type="text" class="form-control" placeholder="Enter Subject" name="subject">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Assigned To</label>
                                    <select class="select" name="assign_to">
                                        <option>Select</option>
                                        @foreach($employees as $emp)
                                            <option value="{{ $emp->employee_id }}">
                                                {{ $emp->first_name }} {{ $emp->last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ticket Description</label>
                                    <textarea class="form-control" placeholder="Add Question"
                                        name="ticket_description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Priority</label>
                                    <select class="select" name="priority">
                                        <option>Select</option>
                                        <option>High</option>
                                        <option>Low</option>
                                        <option>Medium</option>
                                    </select>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">Status</label>
                                    <select class="select" name="status">
                                        <option>Select</option>
                                        <option>Close</option>
                                        <option>Open</option>
                                        <option>On Process</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Add Ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Ticket -->
@endsection