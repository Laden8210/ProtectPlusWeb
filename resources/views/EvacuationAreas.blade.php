@extends('layout')

@section('title', 'Evacuation Areas')

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Evacuation Areas</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Manage Manage Evacuation Areas</li>
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
                            <i class="ti ti-plus"></i> Add Evacuation Area
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap align-middle">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Capacity</th>
                                <th>Type of Facility</th>
                                <th>View Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- start row -->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-6">
                                        <img src="../assets/images/profile/user-4.jpg" width="45"
                                            class="rounded-circle" />
                                        <h6 class="mb-0"> Hign School Gymnasium</h6>
                                    </div>

                                </td>
                                <td>Koronadal City, South Cotabato</td>
                                <td>612</td>
                                <td>School</td>
                                <td>
                                    <button class="btn btn-sm btn-success me-1" onclick="viewLocation()">
                                        <i class="ti ti-eye"></i> View Location
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary me-1" onclick="showModal()">
                                        <i class="ti ti-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteRow(this)">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>

                            </tfoot>
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
                    <h5 class="modal-title" id="exampleModalLabel">Evacuation Area</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row w-100">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter name">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Select Location</label>
                                        <input type="text" id="locationInput" class="form-control"
                                            placeholder="Select Location">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Capacity</label>
                                        <input type="number" class="form-control" placeholder="enter capacity">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Type of Facility</label>
                                        <input type="text" class="form-control" placeholder="Enter type of facility">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Available</option>
                                            <option>Unavailable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-save add-user">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')
    <script>
        var map, view_map;

        let selectedLocation = {
            coordinates: {
                lat: 0,
                lng: 0
            }
        };

        let main_marker = null;

        

        $('.save-location').on('click', function() {
            $('#locationInput').val(selectedLocation.coordinates.lat + ", " + selectedLocation.coordinates.lng);
        });

        async function viewLocation() {
            
            $('#show-location-modal').modal('show');
        }

        $(document).ready(function() {
            $('#zero_config').DataTable();
        });

        async function showModal() {
            $('#manage-employee-modal').modal('show');
        }
    </script>
@endpush
