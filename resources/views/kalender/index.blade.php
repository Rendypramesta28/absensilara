@extends('layouts.app')

@section('title', 'Kalender Digital & Klasik')

@section('content')
    <h4 class="mb-4 fw-bold text-primary">
        <i class="bi bi-calendar3 me-2"></i> Kalender Digital & Klasik
    </h4>

    <!-- Jam Digital -->
    <div id="digital-clock" class="mb-4 fs-3 fw-bold text-center" style="font-family: monospace; letter-spacing: 2px;">
        --:--:--
    </div>

    <!-- Kalender Klasik dengan navigasi -->
    <div id="classic-calendar" class="mx-auto"></div>
@endsection

@push('styles')
<style>
    #digital-clock {
        color: #0d6efd;
        user-select: none;
    }
    #classic-calendar {
        max-width: 340px;
        margin: 0 auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        user-select: none;
        border: 1px solid #ddd;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 0 12px rgba(0,0,0,0.1);
        background: white;
    }
    #classic-calendar table {
        width: 100%;
        border-collapse: collapse;
    }
    #classic-calendar th {
        padding: 10px 0;
        color: #0d6efd;
        font-weight: 600;
        border-bottom: 2px solid #0d6efd;
        text-align: center;
    }
    #classic-calendar td {
        padding: 10px 0;
        text-align: center;
        border-bottom: 1px solid #eee;
        cursor: default;
        user-select: none;
    }
    #classic-calendar td.today {
        background-color: #0d6efd;
        color: white;
        font-weight: 700;
        border-radius: 50%;
    }
    /* Navigasi header */
    #calendar-nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        font-weight: 700;
        color: #0d6efd;
    }
    #calendar-nav button {
        background: #0d6efd;
        border: none;
        color: white;
        padding: 6px 12px;
        border-radius: 8px;
        cursor: pointer;
        user-select: none;
        transition: background-color 0.3s ease;
    }
    #calendar-nav button:hover {
        background: #0a58ca;
    }
</style>
@endpush

@push('scripts')
<script>
    let currentYear, currentMonth; // variabel global untuk bulan dan tahun yang sedang ditampilkan

    function updateDigitalClock() {
        const clock = document.getElementById('digital-clock');
        const now = new Date();

        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');

        const dayName = days[now.getDay()];
        const date = now.getDate();
        const monthName = months[now.getMonth()];
        const year = now.getFullYear();

        clock.textContent = `${dayName}, ${date} ${monthName} ${year} - ${hours}:${minutes}:${seconds}`;
    }

    function renderClassicCalendar(year, month) {
        const classicCal = document.getElementById('classic-calendar');
        const now = new Date();

        // Kalau param kosong, pakai bulan & tahun sekarang
        year = year ?? now.getFullYear();
        month = month ?? now.getMonth();

        currentYear = year;
        currentMonth = month;

        const days = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
        const monthsFull = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        // Header navigasi bulan & tahun dengan tombol
        let html = `
            <div id="calendar-nav" aria-label="Navigasi kalender">
                <button type="button" onclick="prevMonth()" aria-label="Bulan sebelumnya">&lt;</button>
                <div aria-live="polite" aria-atomic="true">${monthsFull[month]} ${year}</div>
                <button type="button" onclick="nextMonth()" aria-label="Bulan berikutnya">&gt;</button>
            </div>
        `;

        html += '<table aria-label="Kalender bulan berjalan">';
        html += '<thead><tr>';

        for (let d of days) {
            html += `<th scope="col">${d}</th>`;
        }
        html += '</tr></thead><tbody><tr>';

        for (let i = 0; i < firstDay; i++) {
            html += '<td></td>';
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dayOfWeek = (firstDay + day - 1) % 7;
            // Highlight hari ini kalau tahun & bulan sesuai sekarang
            const isToday = (day === now.getDate() && month === now.getMonth() && year === now.getFullYear());

            html += `<td class="${isToday ? 'today' : ''}">${day}</td>`;

            if (dayOfWeek === 6 && day !== daysInMonth) {
                html += '</tr><tr>';
            }
        }

        const lastDayOfWeek = (firstDay + daysInMonth - 1) % 7;
        for (let i = lastDayOfWeek + 1; i < 7; i++) {
            html += '<td></td>';
        }

        html += '</tr></tbody></table>';

        classicCal.innerHTML = html;
    }

    // Fungsi pindah bulan
    function prevMonth() {
        if (currentMonth === 0) {
            currentMonth = 11;
            currentYear--;
        } else {
            currentMonth--;
        }
        renderClassicCalendar(currentYear, currentMonth);
    }

    function nextMonth() {
        if (currentMonth === 11) {
            currentMonth = 0;
            currentYear++;
        } else {
            currentMonth++;
        }
        renderClassicCalendar(currentYear, currentMonth);
    }

    document.addEventListener('DOMContentLoaded', function () {
        updateDigitalClock();
        setInterval(updateDigitalClock, 1000);
        renderClassicCalendar();
    });
</script>
@endpush
