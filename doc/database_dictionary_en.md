#DatabaseDictionary


## user_form
### User table table

| Name | Type | Length | Default | Null | PrimaryKey | Annotation |
|------|:----:|-------:|-------:|------:|----------:|-------:|
| id | int | 11 | | Not | yes | A unique identifier for the fill-in relationship |
| user_form_user_id | int | 11 | | | no | id of the user |
| user_form_form_id | int | 11 | | | no | The id of the table |
| user_form_data | text | 0 | | | no | The data for the table |
| user_form_create_time | bigint | 0 | | | no | Creation time of table |
| user_form_delete_time | bigint | 0 | | | no | Delete time of table |
| user_form_update_time | bigint | 0 | | | no | Updates to the table |
| user_form_fill_id | int | 11 | | | no | User fill in the form of state |



## form
### A table of tables
| Name | Type | Length | Default | Null | PrimaryKey | Annotation |
|-----------------------|:--------------:|-------------:|--------:|------:|----------:|-------------:|
| id | int | 11 || Not | yes | The unique identifier for the table |
| form_title | varchar | 50 ||| no | The title of the table
| form_detail | text | 0 ||| no | Description of the table
| form_create_user_id | int | 11 ||| no | User ID to create this table |
| form_create_time | bigint | 0 ||| no | The creation time of the table |
| form_delete_time | bigint | 0 ||| no | Time to delete tables
| form_update_time | bigint | 0 ||| no | Updates to tables
| form_close_time | bigint | 0 ||| no | The closing time of the form |

## user
### User table
| Name | Type | Length | Default | Null | PrimaryKey | Annotation |
|-----------------------|:--------------:|-------------:|--------:|------:|----------:|-----------------:|
| id | int | 11 || Not | yes | The unique identifier for the user
| user_sno | varchar | 50 ||| no | user number or job number |
| user_pw | varchar | 255 ||| no | user password |
| user_name | varchar | 50 ||| no | user name |
| user_class_id | int | 11 ||| no | Class ID of the user
| user_role_id | int | 11 ||| no | The role id of the user
| user_bio | text | 0 ||| no | User Profile |
| user_avatar | varchar | 255 ||| no | User avatar link |
| user_create_time | bigint | 0 ||| no | Created by the user |
| user_delete_time | bigint | 0 ||| no | User delete time |
| user_latest_login_time | bigint | 0 ||| no | User last login |
| user_latest_ip | varchar | 50 ||| no | The last time the user logged in ip |

## form_col
### Table structure table
| Name | Type | Length | Default | Null | PrimaryKey | Annotation |
|-----------------------|:--------------:|-------------:| --------:|------:|----------:|-----------------:|
| id | int | 11 || Not | yes | The unique identifier for the column |
| form_col_form_id | int | 11 || | no | The id of the table to which the column belongs
| form_col_name | varchar | 50 ||| no | The name of the column |
| form_col_default | text | 0 ||| no | The default value for columns
| form_col_placeholder | text | 0 ||| no | The placeholder for |
| form_col_plugin_id | int | 0 ||| no | The control id for the column
| form_col_order_id | text | 0 ||| no | The order of the columns

## notice
### Bulletin board
| name | Type | Length | Default | Null | PrimaryKey | Annotation |
|-----------------------|:--------------:|-----:| --------:|------:|----------:|----:|
| id | int | 11 || Not | yes | Unique identifier for the advertisement |
| notice_title | varchar | 50 ||| no | the title of the announcement
| notice_txt | varchar | 50 ||| no | the contents of the announcement
| notice_create_user_id | int | 11 ||| no | User ID to create this announcement |
| notice_create_time | bigint | 0 ||| no | time to create the table |
| notice_update_time | bigint | 0 ||| no | Updates to the table
| notice_delete_time | bigint | 0 ||| no | The deletion time of the table

## Class
### Class table
| Name | Type | Length | Default | Null | PrimaryKey | Annotation |
|-----------------------|:--------------:|-------------:|--------:|------:|----------:|-----------------:|
| id | int | 11 || Not | yes | Unique ID of the class
| class_name | varchar | 50 ||| | The name of the class |
| class_introduction | text | 0 ||| | Introduction to Classes |

## role
### Role table
| Name | Type | Length | Default | Null | PrimaryKey | Annotation |
|-----------------------|:--------------:|-------------:|--------:|------:|----------:|-----------------:|
| id | int | 11 || Not | yes | The unique identifier of the |
| role_name | varchar | 50 ||| no | The name of the role |
| role_introduction | text | 0 ||| no | Introduction to Roles |

## log
### The log table
| Name | Type | Length | Default | Null | PrimaryKey | Annotation |
|-----------------------|:--------------:|-------------:|--------:|------:|----------:|-----------------:|
| id | int | 11 || Not | yes | A unique identifier for the log |
| log_data | text | 0 ||| no | The contents of the log

## plugin
### Plugin table
| Name | Type | Length | Default | Null | PrimaryKey | Annotation |
|-----------------------|:--------------:|-------------:|--------:|------:|----------:|-----------------:|
| id | int | 11 || Not | yes | The unique identifier for the plugins |
| plugin_name | varchar | 50 ||| no | Plugin name |
| plugin_url | varchar | 50 ||| no | Plugin url |
| plugin_detail | text | 0 ||| no | Plugins Introduction |
