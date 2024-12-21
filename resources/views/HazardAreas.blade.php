@extends('layout')

@section('title', 'Employee Management')

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
                                        <h6 class="mb-0"> Koronadal City, South Cotabato</h6>
                                    </div>

                                </td>
                                <td>Flood</td>
                                <td>
                                    <button class="btn btn-outline-warning m-1">
                                        Moderate
                                    </button>
                                </td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Hazard Prone Area</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row w-100">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Location Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Location Name">
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
                                        <label class="form-label">Hazard Type</label>
                                        <input type="text" class="form-control"
                                            placeholder="e.g., flood, earthquake, landslide, typhoon, tsunami, volcanic eruption">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-4">
                                        <label class="form-label">Risk Level</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
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

    <div class="modal fade" id="location-modal" tabindex="-1" role="dialog" aria-labelledby="routeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="routeForm">
                        <div id="map" style="height: 700px;"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-save save-location"
                        data-bs-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="show-location-modal" tabindex="-1" role="dialog" aria-labelledby="routeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Evacuation Center Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="routeForm">
                        <div id="view_map" style="height: 700px;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var map, view_map;
        //ga store sang selected location 

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

        $(document).ready(function() {
            $('#zero_config').DataTable();
        });

        async function showModal() {
            $('#manage-employee-modal').modal('show');
        }

        $('#locationInput').on('click', function() {
            $('#location-modal').modal('show');
        });

        $('#location-modal').on('shown.bs.modal', function() {
            if(!map) {
                initializeMap();
            } else {
                map.invalidateSize(); 
            }
        });

        $('#show-location-modal').on('shown.bs.modal', function() {
            if(!view_map) {
                initMap();
            } else {
                view_map.invalidateSize();
            }
        });

        

        async function viewLocation() {
            $('#show-location-modal').modal('show');
        }

        async function initMap() {
            view_map = L.map('view_map').setView([6.497396, 124.847160], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(view_map);

            L.Control.geocoder({
                defaultMarkGeocode: false
            }).on('markgeocode', function(e) {
                var latlng = e.geocode.center;
                view_map.setView(latlng, 11);
            }).addTo(view_map);
        }

        async function initializeMap() {

            map = L.map('map').setView([6.497396, 124.847160], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            L.Control.geocoder({
                defaultMarkGeocode: false
            }).on('markgeocode', function(e) {
                var latlng = e.geocode.center;
                map.setView(latlng, 11);
            }).addTo(map);

            map.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;

                selectedLocation.coordinates.lat = lat;
                selectedLocation.coordinates.lng = lng;

                if (main_marker) {
                    // Update existing marker's position
                    main_marker.setLatLng([lat, lng]);
                    updateMarkerPopup(main_marker);
                } else {
                    // Create a new marker if it doesn't exist
                    main_marker = L.marker([lat, lng], {
                        draggable: true
                    }).addTo(map);
                    updateMarkerPopup(main_marker);

                    main_marker.on('dragend', function(e) {
                        let newLat = e.target.getLatLng().lat;
                        let newLng = e.target.getLatLng().lng;

                        selectedLocation.coordinates.lat = newLat;
                        selectedLocation.coordinates.lng = newLng;

                        updateMarkerPopup(main_marker);
                    });
                }
                console.log(selectedLocation);

            });
        }

        function updateMarkerPopup(marker) {
            marker.setPopupContent(`
                <div>
                    <div>Coordinates: ${selectedLocation.coordinates.lat}, ${selectedLocation.coordinates.lng}</div>
                </div>
            `).openPopup();
        }
    </script>
@endpush
