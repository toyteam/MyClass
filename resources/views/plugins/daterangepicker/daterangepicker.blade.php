<link rel="stylesheet" href="{{asset('AdminLTE2')}}/plugins/daterangepicker/daterangepicker-bs3.css">

<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-4">%label%</label>
  <div class="col-md-8 col-sm-8 col-xs-7">
    <input type="text" class="form-control" id="%id%" name="%name%" placeholder="%placeholder%" value="%value%">
  </div>
  <button type="button" value="%id%" class="plugin-close btn btn-default">&times;</button>
</div>

<script src="{{asset('AdminLTE2')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('AdminLTE2')}}/plugins/daterangepicker/daterangepicker.js"></script>

<script>
  $(document).ready(function(){
  	$('#%id%').daterangepicker({
  		singleDatePicker:false,
  		format:"YYYY/MM/DD",
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
	%col%:           控件宽度（基于bootstrap网格系统）
	%label%:         控件标签
	%size%:          控件内部宽度
	%name%:          控件name
	%id%:            控件id
	%placeholder%:   控件placeholder
	%value%:         控件value
	
	%pull%:          控件位置（pull-right pull-left）
 -->