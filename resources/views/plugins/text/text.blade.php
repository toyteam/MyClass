<div class="form-group from-inline">
	<label class="control-label col-md-3 col-sm-3 col-xs-4">%label%</label>
	<div class="col-md-8 col-sm-8 col-xs-7">
		<input type="text" class="form-control" name="%name%" id="%id%" placeholder="%placeholder%" value="%value%">
	</div>
	<button type="button" value="%id%" class="plugin-close btn btn-default">&times;</button>
</div>

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
	%label%:         控件标签
	%name%:          控件name
	%id%:            控件id
	%placeholder%:   控件placeholder
	%value%:         控件value
 -->