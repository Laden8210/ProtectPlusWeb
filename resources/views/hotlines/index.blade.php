@extends('layout.layout')

@section('title', 'Emergency Hotlines Management')

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Emergency Hotlines</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Manage Emergency Hotlines</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="datatables">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <button class="btn btn-success" onclick="showModal()">
                        <i class="ti ti-plus"></i> Add Emergency Hotline
                    </button>
                </div>
                <div class="table-responsive">
                    <table id="hotline_table" class="table table-striped table-bordered text-nowrap align-middle">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Contact Number</th>
                                <th>Telephone Number</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hotlines as $hotline)
                                <tr>
                                    <td>{{ $hotline->name }}</td>
                                    <td>{{ $hotline->type }}</td>
                                    <td>{{ $hotline->contact_number }}</td>
                                    <td>{{ $hotline->telephone_number }}</td>
                                    <td>{{ $hotline->address }}</td>
                                    <td>{{ $hotline->status }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary me-1"
                                            onclick="editHotline({{ $hotline }})">
                                            <i class="ti ti-pencil"></i> Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="deleteHotline({{ $hotline->id }})">
                                            <i class="ti ti-trash"></i> Delete
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

    <!-- Modal -->
    <div class="modal fade" id="hotline-modal" tabindex="-1" aria-labelledby="hotlineModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Manage Emergency Hotline</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="hotline-form">
                    <div class="modal-body">
                        <input type="hidden" id="hotline_id">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Type</label>
                                <input type="text" class="form-control" id="type" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="contact_number" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Telephone Number</label>
                                <input type="tel" class="form-control" id="telephone_number">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-control" id="status">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function showModal() {
            $('#hotline-form')[0].reset();
            $('#hotline_id').val('');
            $('#hotline-modal').modal('show');
        }

        function editHotline(hotline) {
            $('#hotline_id').val(hotline.id);
            $('#name').val(hotline.name);
            $('#type').val(hotline.type);
            $('#contact_number').val(hotline.contact_number);
            $('#telephone_number').val(hotline.telephone_number);
            $('#address').val(hotline.address);
            $('#status').val(hotline.status);
            $('#hotline-modal').modal('show');
        }
        $('#hotline-form').submit(function(e) {
            e.preventDefault();
            let id = $('#hotline_id').val();
            let url = id ? `{{ url('/emergency-hotlines') }}/${id}` : `{{ route('emergency-hotlines.store') }}`;
            let method = id ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                method: method,
                data: {
                    _token: '{{ csrf_token() }}',
                    name: $('#name').val(),
                    type: $('#type').val(),
                    contact_number: $('#contact_number').val(),
                    telephone_number: $('#telephone_number').val(),
                    address: $('#address').val(),
                    status: $('#status').val()
                },
                success: function(response) {
                    Swal.fire({
                        title: "Success!",
                        text: "Emergency hotline has been saved.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let error = Object.values(errors)[0][0];

                        Swal.fire({
                            title: "Validation Error",
                            text: error,
                            icon: "warning",
                            confirmButtonText: "OK"
                        });
                    } else {
                        Swal.fire("Error!", "Something went wrong.", "error");
                    }
                }
            });
        });


        function deleteHotline(id) {
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
                    $.ajax({
                        url: `{{ url('/emergency-hotlines') }}/${id}`,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire("Deleted!", "The emergency hotline has been deleted.", "success")
                                .then(() => {
                                    location.reload();
                                });
                        },
                        error: function() {
                            Swal.fire("Error!", "Something went wrong.", "error");
                        }
                    });
                }
            });
        }
    </script>
@endpush
