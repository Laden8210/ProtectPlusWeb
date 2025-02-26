@extends('layout.layout')

@section('title', 'Employee Management')

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Emengency Hotlines</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Manage Emengency Hotlines</li>
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
                            <i class="ti ti-plus"></i> Add Emergency Hotline
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap align-middle">
                        <thead>
                            <tr>
                                <th>Emergency Hotline Type</th>
                                <th>Mobile Number</th>
                                <th>Telephone Number</th>
                                <th>Province</th>
                                <th>City/Municipality</th>
                                <th>Barangay</th>
                                <th>Actions</th>
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-6">
                                        <img src="../assets/images/profile/user-4.jpg" width="45"
                                            class="rounded-circle" />
                                        <h6 class="mb-0"> Fire Station</h6>
                                    </div>
                                </td>
                                <td>09956225434</td>
                                <td>909-23112-22</td>
                                <td>South Cotabato</td>
                                <td>Koronadal</td>
                                <td>Zulueta</td>
                                <td>
                                    <button class="btn btn-sm btn-primary me-1" onclick="showModal()">
                                        <i class="ti ti-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteRow(this)">
                                        <i class="ti ti-trash"></i> Delete
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
                    <h5 class="modal-title" id="exampleModalLabel">Emergency Hotlines</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row w-100">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Emergency Hotline Type</label>
                                        <input type="text" class="form-control"
                                            placeholder="e.g., police, fire, medical, disaster relief">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="tel" class="form-control" placeholder="09956225434">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Telephone Number</label>
                                        <input type="tel" class="form-control" placeholder="09956225434">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Province</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                            aria-placeholder="Select Province">
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label">City/Municipality</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                            aria-placeholder="Select City/Municipality">
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Barangay</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                            aria-placeholder="Select Barangay">
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label"> Image</label>
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
        async function showModal() {
            $('#manage-employee-modal').modal('show');
        }

        $(document).ready(function() {
            $('#zero_config').DataTable();
        });
    </script>
@endpush
