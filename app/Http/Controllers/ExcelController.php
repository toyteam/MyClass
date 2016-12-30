<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Excel;

$data = array();

class ExcelController extends Controller
{
	protected $user_db;

	public function __construct()
	{
		$this->user_db = new \App\UserModel();
	}

	/**
	 * 用excel批量导入用户信息
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    	public function importUsers(Request $request)
    	{
    		$uploaddir = storage_path('files/tmp_uploads/');

		if (!empty($_FILES['excel_users']['name'])) {

			if($this->isExcel($_FILES['excel_users']['type']))
			{			
				$upload_filename = $uploaddir . $_FILES['excel_users']['name'];
				if (move_uploaded_file($_FILES['excel_users']['tmp_name'], $upload_filename)) {
					Excel::load($upload_filename, function($reader){
						$reader->noHeading();
						$GLOBALS['data'] = $reader->toObject();
					});
					
					unset($GLOBALS['data'][0]);
					// 开始事务
					\DB::beginTransaction();
					foreach ($GLOBALS['data'] as $key => $value) {
						
						$user_sno = $value[0];
						if(is_float($user_sno)){
							$user_sno = (int)$user_sno;
						}
						
						$user_pw = password_hash($user_sno, PASSWORD_DEFAULT);
						$user_name = $value[1];

						$user = [
						'user_sno' => $user_sno,
						'user_pw' => $user_pw,
						'user_name' => $user_name,
						'user_role_id' => 2,
						'user_class_id' => 1,
						'user_create_time' => time(),
						];
						
						if(! $this->user_db->insertUserInfo($user)){
							// 回滚事务
							\DB::rollBack();
							return redirect('/manage/user')->withErrors('表格中，第' . $key+1 .'行有错误');
						}
					}
					// 提交事务
					\DB::commit();
					return redirect('/manage/user');
				} else {
					return redirect('/manage/user')->withErrors('导入表格时发生错误，请及时联系系统管理员');
				}
			} else {
				return redirect('/manage/user')->withErrors('文件格式错误');
			}
		}else {
			return redirect('/manage/user')->withErrors('未选择文件或文件上传失败');
		}
    	}

    	/**
    	 * 判断文件是否为excel文件
    	 * @param  [String]  $type [文件类型]
    	 * @return boolean       [description]
    	 */
    	private function isExcel($type)
    	{
    		return ($type == "application/vnd.ms-excel")
    		||  ($type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
    		|| ($type == "application/vnd.oasis.opendocument.spreadsheet");
    	}
}
