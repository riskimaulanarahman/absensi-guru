@extends('layouts.empty', ['paceTop' => true])

@section('title', '404 Error Page')

@section('content')
	<!-- begin error -->
	<div class="error">
		<div class="error-code">Welcome</div>
		<div class="error-content">
            <form id="form-absensi" class="margin-bottom-0">
				{{-- {{ csrf_field() }} --}}
                <input type="hidden" name="status" value="{{$status}}">
            <div class="d-flex justify-content-center m-b-10">
                <div ><input type="text" name="nip" id="nip" placeholder="NIP" class="form-control" required></div>
            </div>
			<div class="error-desc m-b-20">
                <div class="col-md-12">
                    <div class="radio radio-css radio-inline">
                        <input type="radio" name="kehadiran" id="kehadiran" value="wfh" checked="">
                        <label for="kehadiran">WFH</label>
                    </div>
                    <div class="radio radio-css radio-inline">
                        <input type="radio" name="kehadiran" id="kehadiran2" value="wfo">
                        <label for="kehadiran2">WFO</label>
                    </div>
                    <div class="radio radio-css radio-inline">
                        <input type="radio" name="kehadiran" id="kehadiran3" value="izin">
                        <label for="kehadiran3">Izin</label>
                    </div>
                    <div class="radio radio-css radio-inline">
                        <input type="radio" name="kehadiran" id="kehadiran4" value="sakit">
                        <label for="kehadiran4">Sakit</label>
                    </div>
                </div>
			</div>
			<div>
            </div>
        </form>
        <button id="btn-simpan" class="btn btn-success p-l-20 p-r-20">Simpan</button>
        <a href="/absensi" class="btn btn-warning p-l-20 p-r-20">Kembali</a>
		</div>
	</div>
	<!-- end error -->
@endsection

@push('scripts')
<script>
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
        event.preventDefault();
        return false;
        }
    });
    
    $('#btn-simpan').click(function(){
        var datastring = $('#form-absensi').serialize();
        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "POST",
            url: "../api/form-absensi",
            data: datastring+"&_token="+CSRF_TOKEN,
            dataType: "json",
            success: function(data) {
                console.log(data);
                swal({
                    title: data.status,
                    text: data.message,
                    icon: data.status,
                    buttons: {
                        cancel: {
                            text: 'Close',
                            value: null,
                            visible: true,
                            className: 'btn btn-success',
                            closeModal: true,
                        }
                    }
                });
            },
            error: function() {
                swal({
                    title: data.status,
                    text: data.message,
                    icon: data.status,
                    buttons: {
                        cancel: {
                            text: 'Close',
                            value: null,
                            visible: true,
                            className: 'btn btn-error',
                            closeModal: true,
                        }
                    }
                });
            }
        });
    })

    setTimeout(function(){
            window.location.reload();
    }, 20000);

</script>

@endpush
        
