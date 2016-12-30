<link rel="stylesheet" href="{{asset('AdminLTE2')}}/plugins/daterangepicker/daterangepicker-bs3.css">

<div class="form-group %col%">
  <label>%label%</label>
  <div class="input-group">
    <input type="text" class="form-control %size% %pull%" id="%id%" name="%name%" placeholder="%placeholder%" value="%value%">
    <div class="input-group-addon">
      <i class="fa fa-calendar"></i>
    </div>
  </div>
</div>

<script src="{{asset('AdminLTE2')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('AdminLTE2')}}/plugins/daterangepicker/daterangepicker.js"></script>

<script>
  $(document).ready(function(){
  	$('#%id%').daterangepicker({
      timePicker: true, 
      timePickerIncrement: 30,
  		singleDatePicker:true,
  		format:"YYYY/MM/DD HH:mm A",
  		locale:{
        applyLabel: '确定',
        cancelLabel: '取消',
        fromLabel: '从',
        toLabel: '到',
        customRangeLabel: '自定义',
        daysOfWeek: ['日', '一', '二', '三', '四', '五','六'],
        monthNames: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
        firstDay: 0
              }
  	});
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
	
	%pull%:          控件位置（pull-right pull-left）
 -->