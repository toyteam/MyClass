<div class="form-group %col%">
  <label>%label%</label>
  <select class="form-control %size%" name="%name%" id="%id%"></select>
</div>

<script>
	var values = %values%;
	for (var i = values.length - 1; i >= 0; i--) {
		$('#%id%').append('<option value="'+values[i]+'">'+values[i]+'</option>');
	}
</script>

<!-- 
	%col%:           控件宽度（基于bootstrap网格系统）
	%label%:         控件标签
	%size%:          控件内部宽度
	%name%:          控件name
	%id%:            控件id

	%values%:        每个控件的value（数组:[a,b,...]）
 -->