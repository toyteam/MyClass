<link rel="stylesheet" href="{{asset('AdminLTE2')}}/plugins/timepicker/bootstrap-timepicker.min.css">
<div class="bootstrap-timepicker">
    <input type="text" class="form-control" name="%name%" id="%id%" placeholder="%placeholder%" value="%value%">
</div>

<script src="{{asset('AdminLTE2')}}/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script>
	$("#%id%").timepicker({
        showInputs: false
	});
</script>
<!-- 
  %name%:          控件name
  %id%:            控件id
  %placeholder%:   控件placeholder
  %value%:         控件value
 -->