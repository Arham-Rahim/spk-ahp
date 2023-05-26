{{-- {{ dump($penilaians->where('alternatif_id', 1)->groupBy('nama')) }} --}}

@foreach($alternatifs as $al)
    @php $allData = $penilaians->where('alternatif_id', $al->id) @endphp
    @if(count($allData) == 0)
        <p>{{ $al->nama }}</p>
    @endif
@endforeach



{{-- pemanggilan alternatif dari relasi tabel --}}
{{-- @php $allData = $penilaians->where('alternatif_id', 1) @endphp --}}
{{-- {{ $allData['aternatif'] }} --}}
{{-- @foreach($allData as $p)
    {{ $p->subkriteria->nama_sub_kriteria }} <br>
@endforeach --}}

{{-- Gropu data by alternatif  --}}
@php $allg = $penilaians->groupBy('alternatif_id') @endphp
@foreach($allg as $key => $b)
    {{ $b[$key]->alternatif->nama }}<br>
@endforeach