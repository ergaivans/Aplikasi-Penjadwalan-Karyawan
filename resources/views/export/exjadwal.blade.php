<table class="table table-striped table-advance table-hover" style='table-layout: fixed' id="tabelku">
    <tbody>
        <tr>
            <th><i class="icon_profile"></i> No</th>
            <th><i class="icon_profile"></i> Nama Sales</th>
            <th><i class="icon_profile"></i> Kegiatan</th>
            <th><i class="icon_calendar"></i>Tanggal Kegiatan</th>
            <th><i class="icon_mail_alt"></i> Action </th>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($jadwal as $jadwal)

            <tr>
                <td>{{ $no }}</td>
                <td>{{ $jadwal->NAMA_KARYAWAN }}</td>
                <td>{{ $jadwal->JADWAL }}</td>
                <td>{{ $jadwal->TANGGAL }}</td>
            </tr>

            @php
                $no++;
            @endphp


        @endforeach


    </tbody>
</table>
