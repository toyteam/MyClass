
	<label class="control-label col-md-3 col-sm-3 col-xs-4">%label%</label>
	<div class="col-md-8 col-sm-8 col-xs-7">
		<select class="form-control" name="%name%" id="%id%"></select>
	</div>

<script>
	var values = "%values%";
	values = values.split(/[,，]/);
	for (var i = 0; i < values.length; i++) {
		$('#%id%').append('<option value="'+values[i]+'">'+values[i]+'</option>');
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
	%label%:         控件标签
	%name%:          控件name
	%id%:            控件id

	%values%:        每个控件的value（数组:[a,b,...]）
 -->