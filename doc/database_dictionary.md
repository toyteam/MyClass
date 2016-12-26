#Database Dictionary##user_form###用户表格表|Name			               |Type		        |Length	        |default  |Null	   |Primary Key	|Annotation         || -----------------------|:--------------:| -------------:|--------:| ------:| ----------:| -----------------:||id			                 |int		          |11		          |         |Not	   |	yes	      |填表关系的唯一标识   ||user_form_user_id	     |int		          |11		          |	        |        |	no	      |用户的id            ||user_form_form_id	     |int		          |11		          |	        |        |	no	      |表格的id            ||user_form_data	         |int		          |11		          |	        |        |	no	      |表格的数据          ||user_form_create_time   |timestamp	      |0		          |	        |        |	no	      |表格的创建时间      ||user_form_delete_time   |timestamp       |0		          |  	      |        |	no	      |表格的删除时间      ||user_form_update_time   |timestamp	      |0		          |	        |        |	no	      |表格的更新时间      ||user_form_fill_id       |int             |11		          |  	      |        |	no	      |用户对表格的填写状态 |##form###表格表|Name			               |Type		        |Length	        |default  |Null	   |Primary Key	|Annotation         || -----------------------|:--------------:| -------------:|--------:| ------:| ----------:| -----------------:||id			                 |int		          |11		          |         |Not	   |	yes	      |表格的唯一标识      ||form_title       	     |varchar         |50		          |	        |        |	no	      |表格的标题          ||form_detail       	     |text            |0		          |	        |        |	no	      |表格的描述          ||form_create_user_id     |int		          |11		          |	        |        |	no	      |创建这张表格的用户id ||form_create_time	       |timestamp       |0		          |	        |        |	no	      |表格的创建时间      ||form_delete_time        |timestamp	      |0		          |	        |        |	no	      |表格的删除时间      ||form_update_time        |timestamp       |0		          |  	      |        |	no	      |表格的更新时间      ||form_close_time         |timestamp	      |0		          |	        |        |	no	      |表格的关闭时间      |

##user###用户表|Name			               |Type		        |Length	        |default  |Null	   |Primary Key	|Annotation         || -----------------------|:--------------:| -------------:|--------:| ------:| ----------:| -----------------:||id			                 |int		          |11		          |         |Not	   |	yes	      |用户的唯一标识      ||user_sno         	     |varchar         |50		          |	        |        |	no	      |用户学号或工号      ||user_pw                 |varchar         |255		          |	        |        |	no	      |用户密码            ||user_name               |varchar         |50		          |	        |        |	no	      |用户姓名            ||user_class_id           |int		          |11		          |	        |        |	no	      |用户所属班级id      ||user_bio          	     |text            |0		          |	        |        |	no	      |用户简介            ||user_avatar             |varchar         |255		        |	        |        |	no	      |用户头像链接        ||user_create_time	       |timestamp       |0		          |	        |        |	no	      |用户的创建时间      ||user_delete_time        |timestamp	      |0		          |	        |        |	no	      |用户的删除时间      ||user_latest_login_time  |timestamp       |0		          |  	      |        |	no	      |用户最后一次登陆时间 ||user_latest_ip          |varchar	        |50		          |	        |        |	no	      |用户最后一次登陆ip   |

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
|notice_create_time      |timestamp       |0		          |	        |        |	no	      |表格的创建时间      |
|notice_update_time      |timestamp	      |0		          |	        |        |	no	      |表格的更新时间      |
|notice_delete_time      |timestamp       |0		          |  	      |        |	no	      |表格的删除时间      |

##class
###班级表
|Name			               |Type		        |Length	        |default  |Null	   |Primary Key	|Annotation         |
| -----------------------|:--------------:| -------------:|--------:| ------:| ----------:| -----------------:|
|id			                 |int		          |11		          |         |Not	   |	yes	      |班级的唯一标识      |
|class_name              |varchar         |50		          |	        |        |	no	      |班级的名称          |
|class_introduction      |text            |0		          |	        |        |	no	      |班级的简介          |

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
