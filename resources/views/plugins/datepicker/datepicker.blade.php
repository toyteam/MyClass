<link rel="stylesheet" href="{{asset('AdminLTE2')}}/plugins/daterangepicker/daterangepicker-bs3.css">
<input type="text" class="form-control" id="%id%" name="%name%" placeholder="%placeholder%" value="%value%">

<script src="{{asset('AdminLTE2')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('AdminLTE2')}}/plugins/daterangepicker/daterangepicker.js"></script>

<script>
  $(document).ready(function(){
  	$('#%id%').daterangepicker({
  		singleDatePicker:true,
  		format:"YYYY/MM/DD",
  		locale:{
        daysOfWeek: ['日', '一', '二', '三', '四', '五','六'],
        monthNames: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
        firstDay: 0
              }
  	});
  });
</script>

<!-- 
	%name%:          控件name
	%id%:            控件id
	%placeholder%:   控件placeholder
	%value%:         控件value
 -->