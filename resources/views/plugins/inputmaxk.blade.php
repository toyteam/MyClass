<div class="form-group %col%">
  <label>%label%</label>
  <div class="input-group">
    <div class="input-group-addon">
      <i class="fa fa-%fa%"></i>
    </div>
    <input type="text" class="form-control %size% %pull%" id="%id%" name="%name%" placeholder="%placeholder%" value="%value%" data-inputmask='"mask": "%mask%"'>
  </div>
</div>

<script src="{{asset('AdminLTE2')}}/plugins/input-mask/jquery.inputmask.js"></script>

<script>
	$(document).ready(function(){
		$('#%id%').inputmask();
	});
</script>

<!-- 
	%col%:           控件宽度（基于bootstrap网格系统）
	%label%:         控件标签
	%size%:          控件内部宽度
	%name%:          控件name
	%id%:            控件id
	%placeholder%:   控件placeholder
	%value%:         控件value
	
	%fa%:            图标
	%mask%:          控件输入格式
	%pull%:          控件位置（pull-right pull-left）
 -->