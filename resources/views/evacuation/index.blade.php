@extends('layout.layout')

@section('title', 'Evacuation Areas')

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Evacuation Areas</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Manage Evacuation Areas</li>
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
                        <i class="ti ti-plus"></i> Add Evacuation Area
                    </button>
                </div>

                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered text-nowrap align-middle">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Capacity</th>
                                <th>Type of Facility</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>View Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evacuationAreas as $area)
                                <tr>
                                    <td>{{ $area->name }}</td>
                                    <td>{{ $area->address }}</td>
                                    <td>{{ $area->capacity }}</td>
                                    <td>{{ $area->type_facility }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ $area->status }}</span>
                                    </td>
                                    <td>
                                        @if ($area->image)
                                            <img src="{{ asset('storage/' . $area->image) }}" alt="Evacuation Image"
                                                width="50">
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-success"
                                            onclick="viewLocation({{ $area->latitude }}, {{ $area->longitude }}, '{{ $area->name }}')">
                                            <i class="ti ti-eye"></i> View Location
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info" onclick="viewDetails({{ $area }})">
                                            <i class="ti ti-file"></i> View Details
                                        </button>
                                        <button class="btn btn-sm btn-primary" onclick="editModal({{ $area }})">
                                            <i class="ti ti-pencil"></i> Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger" onclick="deleteRow({{ $area->id }})">
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

    <!-- Modal -->
    <div class="modal fade" id="manage-evacuation-modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Evacuation Area</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="evacuationForm" enctype="multipart/form-data">
                        <input type="hidden" id="evacuation_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="Enter address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Capacity</label>
                                    <input type="number" class="form-control" id="capacity" placeholder="Enter capacity">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Type of Facility</label>
                                    <input type="text" class="form-control" id="type_facility"
                                        placeholder="Enter type of facility">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" id="status">
                                        <option value="Available">Available</option>
                                        <option value="Full">Full</option>
                                        <option value="Under Maintenance">Under Maintenance</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" class="form-control" id="image">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Select Location</label>
                                    <div id="map" style="height: 300px;"></div>
                                    <input type="hidden" id="latitude">
                                    <input type="hidden" id="longitude">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveEvacuationArea()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewLocationModal" tabindex="-1" aria-labelledby="viewLocationLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Evacuation Area Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="viewMap" style="height: 400px;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white">
                    <h5 class="modal-title fw-bold">Evacuation Area Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column gap-3">
                        <div>
                            <span class="fw-bold text-muted">Name:</span>
                            <p id="detailName" class="mb-0"></p>
                        </div>
                        <div>
                            <span class="fw-bold text-muted">Address:</span>
                            <p id="detailAddress" class="mb-0"></p>
                        </div>
                        <div>
                            <span class="fw-bold text-muted">Capacity:</span>
                            <p id="detailCapacity" class="mb-0"></p>
                        </div>
                        <div>
                            <span class="fw-bold text-muted">Type of Facility:</span>
                            <p id="detailFacility" class="mb-0"></p>
                        </div>
                        <div>
                            <span class="fw-bold text-muted">Status:</span>
                            <p id="detailStatus" class="mb-0"></p>
                        </div>
                        <div>
                            <span class="fw-bold text-muted">Image:</span>
                            <div id="detailImage" class="mt-2"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC70wVtKNui5s8L3xKPevA_NE8pYuh9XDk&callback=initMap" async
        defer></script>
    <script>
        var map;

        function initMap(lat = 6.112, lng = 125.171) {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat,
                    lng
                },
                zoom: 15,
            });
            let marker = new google.maps.Marker({
                position: {
                    lat,
                    lng
                },
                map: map,
                draggable: true,
            });

            google.maps.event.addListener(marker, 'dragend', function(event) {
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longitude').value = event.latLng.lng();
            });
        }

        var mapView;
        var markerView;

        function viewLocation(latitude, longitude, name) {
            var modal = new bootstrap.Modal(document.getElementById('viewLocationModal'));
            modal.show();

            setTimeout(() => {
                initViewMap(latitude, longitude, name);
            }, 500);
        }

        function initViewMap(latitude, longitude, name) {
            var mapContainer = document.getElementById('viewMap');

            if (mapContainer.innerHTML.trim() !== '') {
                mapContainer.innerHTML = "";
            }

            var map = L.map('viewMap').setView([latitude, longitude], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            L.marker([latitude, longitude]).addTo(map)
                .bindPopup(name)
                .openPopup();
        }


        function saveEvacuationArea() {
            var id = $('#evacuation_id').val();
            var url = id ? '/evacuation-areas/' + id : '/evacuation-areas';
            var method = id ? 'POST' : 'POST';

            var formData = new FormData();
            formData.append('_token', "{{ csrf_token() }}");
            formData.append('name', $('#name').val());
            formData.append('address', $('#address').val());
            formData.append('capacity', $('#capacity').val());
            formData.append('type_facility', $('#type_facility').val());
            formData.append('status', $('#status').val());
            formData.append('latitude', $('#latitude').val());
            formData.append('longitude', $('#longitude').val());

            var imageFile = $('#image')[0].files[0];
            if (imageFile) {
                formData.append('image', imageFile);
            }

            $.ajax({
                url: url,
                type: method,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then(() => {
                        $('#manage-evacuation-modal').modal('hide');
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire("Error!", "Failed to save evacuation area!", "error");
                }
            });
        }


        function showModal() {
            $('#manage-evacuation-modal').modal('show');
            initMap();
        }

        function editModal(area) {
            $('#evacuation_id').val(area.id);
            $('#name').val(area.name);
            $('#address').val(area.address);
            $('#capacity').val(area.capacity);
            $('#type_facility').val(area.type_facility);
            $('#latitude').val(area.latitude);
            $('#longitude').val(area.longitude);
            $('#manage-evacuation-modal').modal('show');
            initMap(area.latitude, area.longitude);
        }

        function viewDetails(area) {
            document.getElementById('detailName').innerText = area.name;
            document.getElementById('detailAddress').innerText = area.address;
            document.getElementById('detailCapacity').innerText = area.capacity;
            document.getElementById('detailFacility').innerText = area.type_facility;
            document.getElementById('detailStatus').innerHTML =
                `<span class="badge bg-info px-3 py-2">${area.status}</span>`;

            let imageCell = document.getElementById('detailImage');
            if (area.image) {
                imageCell.innerHTML = `
            <img src="${window.location.origin}/storage/${area.image}"
                 alt="Evacuation Image"
                 class="img-fluid rounded shadow-sm"
                 width="150">
        `;
            } else {
                imageCell.innerHTML = '<span class="text-muted">No image available</span>';
            }

            var modal = new bootstrap.Modal(document.getElementById('viewDetailsModal'));
            modal.show();
        }
    </script>
@endpush
