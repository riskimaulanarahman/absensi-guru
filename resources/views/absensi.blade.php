@extends('layouts.empty', ['paceTop' => true])

@section('title', 'Absensi')

@section('content')
	<!-- begin error -->
	@if($status !== 'tutup')
	<div class="error">
		<div class="error-code">{!! QrCode::size(200)->generate($kode); !!}</div>
		<h4>({{$kode}})</h4>
		<div class="error-content">
            <div class="error-message" id="datetime"></div>
			<div class="error-desc mb-3 mb-sm-4 mb-md-5">
				Scan Barcode untuk melakukan absensi kehadiran <i>{{$status}}</i>. <br />
			</div>
			<div>
				<a href="/form-absensi/{{$kode}}" class="btn btn-success p-l-20 p-r-20">Go to link</a>
			</div>
		</div>
	</div>
	@else
	<div class="error">
		<div class="error-code">Tutup</div>
		<div class="error-content">
            <div class="error-message" id="datetime"></div>
			<div class="error-desc mb-3 mb-sm-4 mb-md-5">
				Absensi belum tersedia, silahkan hubungi admin. <br />
			</div>
			<div>
				<a href="/" class="btn btn-warning p-l-20 p-r-20">Kembali</a>
			</div>
		</div>
	</div>
	@endif
	<!-- end error -->
@endsection
        
@push('scripts')
<script>
    function showTime() {
        var d = new Date();
        document.getElementById("datetime").innerHTML = d.toLocaleDateString()+' - '+d.toLocaleTimeString();
    }
    setInterval(showTime, 100);

	setTimeout(function(){
            window.location.reload();
    }, 20000);
</script>

@endpush
