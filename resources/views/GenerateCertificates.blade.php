@extends('layout')

@section('title', 'Generate Certificates')

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Certificates</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Generate Certificates</li>
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
                            <i class="ti ti-plus"></i> Generate Certificate
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap align-middle">
                        <thead>
                            <tr>
                                <th>Certificate Title</th>
                                <th>Certuficate Type</th>
                                <th>Description</th>
                                <th>Date</th>
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
                                        <h6 class="mb-0"> Certificate 1</h6>
                                    </div>
                                </td>
                                <td>Fire Hazard</td>
                                <td>Certificate for Fire Hazard</td>
                                <td>19-12-2024</td>
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

    <div class="modal fade" id="generate-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generate Certificate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row w-100">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Certificate Title</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Certificate Type</label>
                                        <input type="tel" class="form-control" placeholder="09956225434">
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
                    <button type="button" class="btn btn-primary btn-save">Generate</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#zero_config').DataTable();
        });
        async function showModal(){
          $('#generate-modal').modal('show');
        }
    </script>
@endpush
