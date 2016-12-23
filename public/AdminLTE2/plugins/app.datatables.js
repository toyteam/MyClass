

// (function($) {

//   $.fn.checkbox = function(option) {

//   }

// })(jQuery);

var str='<div class="input-group" style="text-align:left"><select class="select2" id="searchColumn"><option value="time">日志时间</option><option value="card_identity">卡号</option><option value="card_name">卡名</option><option value="meet_name">会议室名称</option></select></div>';
var datatableUtil = {
  customFilter : function(filterId) {
    $('#'+filterId).children().remove();
      // $('#'+filterId).append('<button id="create" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#create_modal">高级搜索</button>');

    $('#'+filterId).append(str);
      //$('#'+filterId).append('<button class="btn btn-default search-btn" >test</button>');
    $('#'+filterId).append('<div class="input-group"><input type="text" class="form-control" placeholder="搜索..."><span class="input-group-btn"><button class="btn btn-default" id="searchIcon" ><span class="fa fa-search"></span></button></span></div>');
      
  },


  customSearchBox : function(filterId) {
    $('#'+filterId).children().remove();
    $('#'+filterId).append('<div class="input-group"><input type="text" id="search_value" class="form-control" placeholder="搜索..."><span class="input-group-btn"><button class="btn btn-default" id="searchIcon" ><span class="fa fa-search"></span></button></span></div>');
  },


	changeFilterTrigger : function(table) {
		$('.dataTables_filter input')
          .unbind()
          .bind('keypress keyup', function(e){
            if(e.keyCode == 13 && e.type == 'keypress') {

            //alert(this.value);
              //Call the API search function
              table.search("");
              for(var i = 0; i< table.ajax.params().columns.length;i++) {
                table.column(i).search("");
              }

              var searchColumn = $("#searchColumn").val();
              //alert(searchColumn);
              if(searchColumn != undefined && searchColumn != 0) {
                 table.column(searchColumn).search(this.value).draw();
              } else {
                table.search(this.value).draw();
              }
            }
        });


    $("#searchIcon").click( function(){
        
        var e = $.Event('keypress');
        e.keyCode = 13;
        $('.dataTables_filter input').trigger(e);
    });

	},



};