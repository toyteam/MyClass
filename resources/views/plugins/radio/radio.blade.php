
	<label class="control-label col-md-3 col-sm-3 col-xs-4">%label%</label>
	<div class="col-md-8 col-sm-8 col-xs-7" id="%id%"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br />

<script>
	var values = "%values%";
	values = values.split(/[,，]/);
	for (var i = 0; i < values.length; i++) {
		$('#%id%').append('<div class="radio"><label class="pull-left"><input type="radio" name="%name%" id="%name%_'+i+'" value="'+values[i]+'">'+values[i]+'</label></div>');
	}
</script>

<!-- 
	%id%:            控件id
	%name%:          控件name

	%values%:        每个控件的value（数组:[a,b,...]）
 -->