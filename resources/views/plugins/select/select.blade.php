<select class="form-control" name="%name%" id="%id%"></select>

<script>
	var values = "%values%";
	values = values.split(/[,，]/);
	for (var i = 0; i < values.length; i++) {
		$('#%id%').append('<option value="'+values[i]+'">'+values[i]+'</option>');
	}
</script>


<!-- 
	%name%:          控件name
	%id%:            控件id

	%values%:        每个控件的value（数组:[a,b,...]）
 -->