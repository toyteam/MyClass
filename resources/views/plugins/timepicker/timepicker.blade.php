<link rel="stylesheet" href="{{asset('AdminLTE2')}}/plugins/timepicker/bootstrap-timepicker.min.css">

    <label class="control-label col-md-3 col-sm-3 col-xs-4">%label%</label>
    <div class="col-md-8 col-sm-8 col-xs-7">
          <div class="bootstrap-timepicker">
              <input type="text" class="form-control" name="%name%" id="%id%" placeholder="%placeholder%" value="%value%">
          </div>
    </div>

<script src="{{asset('AdminLTE2')}}/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script>
	$("#%id%").timepicker({
        showInputs: false
	});
</script>
<!-- 
  %label%:         控件标签
  %name%:          控件name
  %id%:            控件id
  %placeholder%:   控件placeholder
  %value%:         控件value
 -->