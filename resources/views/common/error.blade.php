
@if (count($errors))
@foreach($errors->all() as $error)
<script type="text/javascript">
	toastr.error("{{ $error }}",'',{timeOut: '5000', positionClass: 'toast-top-center' });
</script>
@endforeach
@endif