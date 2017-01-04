
	<label class="control-label col-md-3 col-sm-3 col-xs-4">%label%</label>
	<div class="col-md-8 col-sm-8 col-xs-7" id="%id%">
		<div class="col-md-3 col-sm-3">
			<select id="%id%_province" name="%id%_province" class="form-control"></select>
		</div>
		<div class="col-md-3 col-sm-3">
			<select id="%id%_city" name="%id%_city" class="form-control"></select>
		</div>
		<div class="col-md-3 col-sm-3">
			<select id="%id%_district" name="%id%_district" class="form-control"></select>
		</div>
		<div class="col-md-3 col-sm-3">
			<input type="text" id="%id%_detail" name="%id%_detail" class="form-control" placeholder="%placeholder%" value="%value%">
		</div>
	</div>

<script src="{{asset('AdminLTE2')}}/plugins/distpicker/dist/distpicker.js"></script>

<script>
	$(document).ready(function(){
		$('#%id%').distpicker({
			province: '省',
			city: '市',
			district: '区'
		});
	});
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
	%id%:            控件id
	%placeholder%:   控件placeholder
	%value%:         控件value
 -->