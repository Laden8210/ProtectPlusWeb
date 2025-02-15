@extends('layout.layout')
@section('title', 'Hazard Areas Management')

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Hazard Prone Areas</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Manage Manage Hazard Prone Areas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="datatables">
        <div class="card">
            <div class="card-body">
                <div class="add-button">
                    <div class="mb-3">
                        <button class="btn btn-success" onclick="showModal()">
                            <i class="ti ti-plus"></i> Add Hazard Prone Area
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap align-middle">
                        <thead>
                            <tr>
                                <th>Location Name</th>
                                <th>Hazard Type</th>
                                <th>Risk Level</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($hazardAreas) == 0)
                                <tr>
                                    <td colspan="4" class="text-center">No data available</td>
                                </tr>
                            @endif

                            @foreach ($hazardAreas as $hazard)
                                <tr  data-id="{{ $hazard->id }}">
                                    <td>
                                        <div class="d-flex align-items-center gap-6">
                                            <img src="{{ $hazard->image ? asset('storage/' . $hazard->image) : asset('images/default.png') }}"
                                                width="45" class="rounded-circle" />
                                            <h6 class="mb-0"> {{ $hazard->location_name }}</h6>
                                        </div>
                                    </td>

                                    <td>{{ $hazard->hazard_type }}</td>
                                    <td>
                                        <button class="btn btn-outline-warning m-1">
                                            {{ $hazard->risk_level }}
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info me-1" onclick="viewHazard({{ $hazard->id }})">
                                            <i class="ti ti-eye"></i> View
                                        </button>
                                        <button class="btn btn-sm btn-primary me-1"
                                            onclick="editHazard({{ $hazard->id }})">
                                            <i class="ti ti-pencil"></i> Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="confirmDelete(this)">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="manage-employee-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hazard Prone Area</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('hazards.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row w-100">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Location Name</label>
                                            <input type="text" name="location_name" class="form-control"
                                                placeholder="Enter Location Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Select Location</label>
                                            <input type="text" name="location" id="locationInput" class="form-control"
                                                placeholder="Select Location">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Hazard Type</label>
                                            <input type="text" name="hazard_type" class="form-control"
                                                placeholder="e.g., flood, earthquake">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-4">
                                            <label class="form-label">Risk Level</label>
                                            <select class="form-control" name="risk_level">
                                                <option>Low</option>
                                                <option>Moderate</option>
                                                <option>High</option>
                                                <option>Very High</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-4">
                                            <label class="form-label">Status</label>
                                            <select class="form-control" name="status">
                                                <option>Available</option>
                                                <option>Unavailable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Image</label>
                                            <input class="form-control" type="file" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary btn-save add-user"
                            onclick="saveData()">Save</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function confirmDelete(button) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let row = button.closest("tr");
                    let hazardId = row.getAttribute("data-id"); // Make sure this is correctly set

                    if (!hazardId) {
                        Swal.fire("Error", "Hazard ID is missing!", "error");
                        return;
                    }

                    fetch(`/hazards/${hazardId}`, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                                "Content-Type": "application/json"
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire("Deleted!", "Hazard has been deleted.", "success");
                                row.remove(); // Remove from table
                            } else {
                                Swal.fire("Error", data.message, "error");
                            }
                        })
                        .catch(error => {
                            Swal.fire("Error", "Failed to delete hazard", "error");
                        });
                }
            });
        }



        async function showModal() {
            $('#manage-employee-modal').modal('show');
        }

        $(document).ready(function() {
            $('#zero_config').DataTable();
        });

        function saveData() {
            let formData = new FormData(document.querySelector("form"));
            let csrfToken = document.querySelector('meta[name="csrf-token"]');

            if (!csrfToken) {
                Swal.fire("Error!", "CSRF token not found. Please refresh the page.", "error");
                return;
            }

            fetch("{{ route('hazards.store') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": csrfToken.content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire("Success!", "Hazard Prone Area has been saved.", "success")
                            .then(() => location.reload()); // Reload to update the table
                    } else {
                        Swal.fire("Error!", "Failed to save hazard area.", "error");
                    }
                })
                .catch(error => Swal.fire("Error!", "Something went wrong.", "error"));
        }

        function viewHazard(id) {
            fetch(`/hazards/${id}`)
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        title: "Hazard Details",
                        html: `
                    <strong>Location Name:</strong> ${data.location_name} <br>
                    <strong>Hazard Type:</strong> ${data.hazard_type} <br>
                    <strong>Risk Level:</strong> ${data.risk_level} <br>
                    <strong>Status:</strong> ${data.status} <br>
                    <br>
                    <img src="${data.image ? '/storage/' + data.image : '/images/default.png'}" width="100%" class="rounded"/>
                `,
                        icon: "info"
                    });
                })
                .catch(error => {
                    Swal.fire("Error", "Failed to fetch hazard details", "error");
                });
        }
    </script>
@endpush
