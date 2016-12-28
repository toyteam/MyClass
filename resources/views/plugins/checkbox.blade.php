<div id="%id%" class="from-group"></div>

<script>
	var values = %values%;
	$('#%id%').append('<label><input type="checkbox" name="%name%" id="%name%_'+1+'" value="'+values[1]+'">'+values[1]+'</label>');
	for (var i = 1; i < values.length; i++) {
		$('#%id%').append('<label><input type="checkbox" name="%name%" id="%name%_'+i+'" value="'+values[i]+'">'+values[i]+'</label>');
	}
</script>

<!-- 
	%id%:            控件id
	%name%:          控件name
	
	%values%:        每个控件的value（数组:[a,b,...]）
 -->