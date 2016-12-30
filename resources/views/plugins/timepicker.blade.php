<link rel="stylesheet" href="{{asset('AdminLTE2')}}/plugins/timepicker/bootstrap-timepicker.min.css">

<div class="form-group %col%">
  <label>%label%</label>
  <div class="input-group">
    <input type="text" class="form-control %size% %pull%" id="%id%" name="%name%" placeholder="%placeholder%" value="%value%">
    <div class="input-group-addon">
      <i class="fa fa-clock-o"></i>
    </div>
  </div>
</div>

<script src="{{asset('AdminLTE2')}}/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script>
	$(document).ready(function(){
		$(".timepicker").timepicker({
		  showInputs: false
		});
	});
</script>

<!-- 
  %col%:           控件宽度（基于bootstrap网格系统）
  %label%:         控件标签
  %size%:          控件内部宽度
  %name%:          控件name
  %id%:            控件id
  %placeholder%:   控件placeholder
  %value%:         控件value
  
  %pull%:          控件位置（pull-right pull-left）
 -->