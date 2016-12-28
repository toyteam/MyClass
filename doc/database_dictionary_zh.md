#Database Dictionary

##user

##form_col
###表格结构表
|Name			               |Type		        |Length	        |default  |Null	   |Primary Key	|Annotation         |
| -----------------------|:--------------:| -------------:|--------:| ------:| ----------:| -----------------:|
|id			                 |int		          |11		          |         |Not	   |	yes	      |列的唯一标识        |
|form_col_form_id  	     |int             |11		          |	        |        |	no	      |列所属表格的id      |
|form_col_name           |varchar         |50		          |	        |        |	no	      |列的名称            |
|form_col_default        |text            |0		          |	        |        |	no	      |列的默认值          |
|form_col_placeholder    |text            |0		          |	        |        |	no	      |列的占位符          |
|form_col_plugin_id      |int             |0		          |	        |        |	no	      |列的控件id          |
|form_col_order_id       |text            |0		          |	        |        |	no	      |列的顺序            |

##notice
###公告表
|Name			               |Type		        |Length	        |default  |Null	   |Primary Key	|Annotation         |
| -----------------------|:--------------:| -------------:|--------:| ------:| ----------:| -----------------:|
|id			                 |int		          |11		          |         |Not	   |	yes	      |公告的唯一标识      |
|notice_title      	     |varchar         |50		          |	        |        |	no	      |公告的标题          |
|notice_txt              |varchar         |50		          |	        |        |	no	      |公告的内容          |
|notice_create_user_id   |int		          |11		          |	        |        |	no	      |创建这条公告的用户id |
|notice_create_time      |bigint          |0		          |	        |        |	no	      |表格的创建时间      |
|notice_update_time      |bigint   	      |0		          |	        |        |	no	      |表格的更新时间      |
|notice_delete_time      |bigint          |0		          |  	      |        |	no	      |表格的删除时间      |

##class
###班级表
|Name			               |Type		        |Length	        |default  |Null	   |Primary Key	|Annotation         |
| -----------------------|:--------------:| -------------:|--------:| ------:| ----------:| -----------------:|
|id			                 |int		          |11		          |         |Not	   |	yes	      |班级的唯一标识      |
|class_name              |varchar         |50		          |	        |        |	no	      |班级的名称          |
|class_introduction      |text            |0		          |	        |        |	no	      |班级的简介          |
|class_grade             |int             |11		          |	        |        |	no	      |班级的年级          |

##role
###角色表
|Name			               |Type		        |Length	        |default  |Null	   |Primary Key	|Annotation         |
| -----------------------|:--------------:| -------------:|--------:| ------:| ----------:| -----------------:|
|id			                 |int		          |11		          |         |Not	   |	yes	      |身份的唯一标识      |
|role_name               |varchar         |50		          |	        |        |	no	      |角色的名称          |
|role_introduction       |text            |0		          |	        |        |	no	      |角色的简介          |

##log
###日志表
|Name			               |Type		        |Length	        |default  |Null	   |Primary Key	|Annotation         |
| -----------------------|:--------------:| -------------:|--------:| ------:| ----------:| -----------------:|
|id			                 |int		          |11		          |         |Not	   |	yes	      |一条日志的唯一标识   |
|log_data                |text            |0		          |	        |        |	no	      |日志的内容          |

##plugin
###控件表
|Name			               |Type		        |Length	        |default  |Null	   |Primary Key	|Annotation         |
| -----------------------|:--------------:| -------------:|--------:| ------:| ----------:| -----------------:|
|id			                 |int		          |11		          |         |Not	   |	yes	      |控件的唯一标识      |
|plugin_name             |varchar         |50		          |	        |        |	no	      |控件名              |
|plugin_url              |varchar         |50		          |	        |        |	no	      |控件url             |
|plugin_detail           |text            |0		          |	        |        |	no	      |控件简介            |