<input type="text" class="form-control" id="%id%" name="%name%" placeholder="%placeholder%" value="%value%" data-inputmask='"mask": "%mask%"'>

<script src="{{asset('AdminLTE2')}}/plugins/input-mask/jquery.inputmask.js"></script>

<script>
	$(document).ready(function(){
		$('#%id%').inputmask();
	});
</script>

<!-- 
	%name%:          控件name
	%id%:            控件id
	%placeholder%:   控件placeholder
	%value%:         控件value
	
	%mask%:          控件输入格式
 -->