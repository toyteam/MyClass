
	<label class="control-label col-md-3 col-sm-3 col-xs-4">%label%</label>
	<div class="col-md-8 col-sm-8 col-xs-7">
    	<input type="text" class="form-control" id="%id%" name="%name%" placeholder="%placeholder%" value="%value%" data-inputmask='"mask": "%mask%"'>
	</div>

<script src="{{asset('AdminLTE2')}}/plugins/input-mask/jquery.inputmask.js"></script>

<script>
	$(document).ready(function(){
		$('#%id%').inputmask();
	});
</script>

<!-- 
	%label%:         控件标签
	%name%:          控件name
	%id%:            控件id
	%placeholder%:   控件placeholder
	%value%:         控件value
	
	%mask%:          控件输入格式
 -->