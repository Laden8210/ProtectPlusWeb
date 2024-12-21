@extends('layout')

@section('title', 'Monitor Hazard')

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Hazard Prone Areas</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Monitor Hazard Prone Areas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="datatables">
        <div id="map" style="height: 1000px; width: 100%;"></div>
    </div>
@endsection


@push('scripts')
    <script>
        var map;

        let hazardLocation = {
            hazardType: "",
            riskLevel: "",
            coordinates: {
                lat: 0,
                lng: 0
            }
        };

        let main_marker = null;

        const hazardLocations = [{
                lat: 6.112,
                lng: 125.171,
                hazardType: "Flood",
                riskLevel: "High"
            },
            {
                lat: 7.190,
                lng: 125.455,
                hazardType: "Landslide",
                riskLevel: "Moderate"
            },
            {
                lat: 6.953,
                lng: 124.894,
                hazardType: "Earthquake",
                riskLevel: "Severe"
            },
            {
                lat: 8.501,
                lng: 124.640,
                hazardType: "Typhoon",
                riskLevel: "High"
            },
            {
                lat: 7.073,
                lng: 124.276,
                hazardType: "Flood",
                riskLevel: "Moderate"
            }
        ];

        initializeMap();

        async function initializeMap() {
            map = L.map('map').setView([6.497396, 124.847160], 8);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Add geocoder control
            L.Control.geocoder({
                defaultMarkGeocode: false
            }).on('markgeocode', function(e) {
                var latlng = e.geocode.center;
                map.setView(latlng, 11);
            }).addTo(map);

            // Add random hazard locations to the map with color-coded circle markers
            hazardLocations.forEach(location => {
                const circleColor = getMarkerColor(location.riskLevel);

                const circleMarker = L.circleMarker([location.lat, location.lng], {
                    color: circleColor,
                    radius: 10,
                    fillOpacity: 0.7
                }).addTo(map);

                circleMarker.bindPopup(`
                    <div>
                        <strong>Hazard Type:</strong> ${location.hazardType}<br>
                        <strong>Risk Level:</strong> ${location.riskLevel}<br>
                        <strong>Coordinates:</strong> ${location.lat}, ${location.lng}
                    </div>
                    `);
            });
        }

        function getMarkerColor(riskLevel) {
            switch (riskLevel) {
                case "High":
                    return "red"; // Red
                case "Moderate":
                    return "orange"; // Orange
                case "Severe":
                    return "darkred"; // Dark Red
                default:
                    return "green"; // Green
            }
        }

        function updateMarkerPopup(marker) {
            marker.setPopupContent(`
                <div>
                    <div>Coordinates: ${hazardLocation.coordinates.lat}, ${hazardLocation.coordinates.lng}</div>
                </div>
            `).openPopup();
        }
    </script>
@endpush
