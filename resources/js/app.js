// css
import 'remixicon/fonts/remixicon.css';
import 'leaflet/dist/leaflet.css';

// js
import 'preline';
import Chart from 'chart.js/auto';
import L from 'leaflet';
import Swal from 'sweetalert2'

// export
window.Chart = Chart;
window.L = L;
window.Swal = Swal;

document.addEventListener('livewire:navigated', 'wire:click', () => {
    window.HSStaticMethods.autoInit();
});
