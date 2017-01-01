<div class="from-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-4">%label%</label>
	<div class="col-md-8 col-sm-8 col-xs-7" id="%id%"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" value="%id%" class="plugin-close btn btn-default">&times;</button>
</div>
<br />

<script>
	var values = "%values%";
	values = values.split(/[,，]/);
	for (var i = 0; i < values.length; i++) {
		$('#%id%').append('<div class="radio"><label class="pull-left"><input type="radio" name="%name%" id="%name%_'+i+'" value="'+values[i]+'">'+values[i]+'</label></div>');
	}
</script>

<script>
	$('.plugin-close').click(function(e){
		$(e.target).parent().remove();
		var t = $('#data').val().substring(4, $('#data').val().length).split('%%@@');
		var arr = "";
		for (var i = 0; i < t.length; i++) {
			if(JSON.parse(t[i]).id != $(e.target).val()){
				arr+="%%@@";
				arr+=(t[i]);
			}
		}
		$('#data').val(arr);
	});
</script>

<!-- 
	%id%:            控件id
	%name%:          控件name

	%values%:        每个控件的value（数组:[a,b,...]）
 -->