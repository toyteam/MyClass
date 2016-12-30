<div class="form-group" id="id">
	<label class="pull-left" style="height: 34px; padding: 6px 12px;">%label%</label>
	<div class="col-md-2 col-sm-2">
		<select id="%id%_province" name="%id%_province" class="form-control"></select>
	</div>
	<div class="col-md-2 col-sm-2">
		<select id="%id%_city" name="%id%_city" class="form-control"></select>
	</div>
	<div class="col-md-2 col-sm-2">
		<select id="%id%_district" name="%id%_district" class="form-control"></select>
	</div>
	<div class="col-md-2 col-sm-2">
		<input type="text" name="%id%_detail" class="form-control" placeholder="%placeholder%" value="%value%">
	</div>
</div>

<script src="{{asset('AdminLTE2')}}/plugins/distpicker/dist/distpicker.js"></script>

<script>
	$(document).ready(function(){
		$('#id').distpicker({
			province: '省',
			city: '市',
			district: '区'
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