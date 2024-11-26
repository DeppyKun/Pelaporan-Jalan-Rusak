<x-filament-panels::page>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

    <!-- Map container -->
    <div id="map" style="height: 500px;"></div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Inisialisasi peta
        var map = L.map('map').setView([-7.371628450097823, 108.52700299463467], 15) // Atur posisi awal ke salah satu koordinat

        // Tambahkan layer peta OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ikon kustom untuk marker
        var customIcon = L.icon({
            iconUrl: 'https://cdn-icons-png.flaticon.com/512/564/564619.png', // Ganti URL dengan ikon yang diinginkan
            iconSize: [30, 30],
            iconAnchor: [15, 30],
            popupAnchor: [0, -30],
        });

        // Pastikan data lokasi tidak kosong
        var locations = @json($locations);

        // Cek apakah locations ada
        if (locations && locations.length) {
            locations.forEach(location => {
                if (location.koordinat) {
                    var latitude = parseFloat(location.koordinat.latitude);
                    var longitude = parseFloat(location.koordinat.longitude);

                    var popupContent = `
                        <strong>${location.nama_jalan}</strong><br>
                        <b>Kelurahan:</b> ${location.kelurahan}<br>
                        <b>Lingkungan:</b> ${location.lingkungan}<br>
                        <b>RT/RW:</b> ${location.rt}/${location.rw}<br>
                        <b>Kondisi:</b> ${location.kondisi}
                    `;

                    L.marker([latitude, longitude], { icon: customIcon })
                        .addTo(map)
                        .bindPopup(popupContent);
                }
            });
        } else {
            console.log('Data lokasi tidak ditemukan.');
        }

    });
    </script>

</x-filament-panels::page>
