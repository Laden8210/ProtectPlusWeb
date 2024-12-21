@extends('layout')

@section('title', 'Approve Lectures')

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Lectures</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Approve Lectures</li>
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
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap align-middle">
                        <thead>
                            <tr>
                                <th>Lecture Title</th>
                                <th>Lecture Type</th>
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
                                        <h6 class="mb-0"> Fire Hazard Lecture Volume 1</h6>
                                    </div>
                                </td>
                                <td>Fire Hazard</td>
                                <td>Lecture for Fire Hazard</td>
                                <td>19-12-2024</td>
                                <td>
                                    <button class="btn btn-sm btn-primary me-1" onclick="showModal()">
                                        <i class="ti ti-check"></i> Approve
                                    </button>
                                </td>
                            </tr>

                            </tfoot>
                    </table>
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
    </script>
@endpush
