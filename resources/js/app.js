import './bootstrap';
import 'bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;

// KODE AJAX HARUS DI BAWAH INI
$(document).ready(function() {
    $(document).on('change', '#course_id', function () {
        const id = this.value;
        if (!id) return;
        
        $('#availability').text('Memuat ketersediaan...');
        
        $.ajax({
            url: `/courses/${id}/availability`,
            method: 'GET',
            dataType: 'json',
            success(data) {
                $('#availability').text(`${data.remaining} kursi tersisa untuk ${data.course}.`);
            },
            error() {
                $('#availability').text('Gagal memuat ketersediaan kursus.');
            }
        });
    });
});