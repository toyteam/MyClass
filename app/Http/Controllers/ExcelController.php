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
				$upload_filename = $uploaddir . md5($_FILES['excel_users']['name']);
				if (move_uploaded_file($_FILES['excel_users']['tmp_name'], $upload_filename)) {
					Excel::load($upload_filename, function($reader){
						$reader->noHeading();
						$GLOBALS['data'] = $reader->toArray();
					});
					
					$info = $GLOBALS['data'];

					if(is_array($info[0][0])){
						$info = $info[0];
					}
					unset($info[0]);
					
					// 对每个学号生成一个密码，速度太慢，故使用默认密码
					$origin_pw =  password_hash("123456", PASSWORD_DEFAULT);

					// 开始事务
					\DB::beginTransaction();
					foreach ($info as $key => $value) {
						try{
							$user_sno = $value[0];
							if(is_float($user_sno)){
								$user_sno = (int)$user_sno;
							}
							
							// $user_pw = password_hash($user_sno, PASSWORD_DEFAULT);
							$user_name = $value[1];
							$user_gender = ($value[2] == "男"? 1: 2);
							$user_phone = $value[3];
							$user_address = $value[4];

							$user = [
							'user_sno' => $user_sno,
							'user_pw' => $origin_pw,
							'user_name' => $user_name,
							'user_gender' => $user_gender,
							'user_phone' => $user_phone,
							'user_address' => $user_address,
							'user_role_id' => 2,
							'user_class_id' => 1,
							'user_create_time' => time(),
							];
							
							if(! $this->user_db->insertUserInfo($user)){
								// 回滚事务
								\DB::rollBack();
								unlink($upload_filename);
								return redirect()->back()->withErrors('表格中，第' . ($key+1) .'行格式有误');
							}
						}catch(\Throwable $e){
							\DB::rollBack();
							unlink($upload_filename);
							return redirect()->back()->withErrors('表格中，第' . ($key+1) .'行格式有误');
						}
					}
					// 提交事务
					\DB::commit();
					unlink($upload_filename);
					return redirect()->back();
				} else {
					return redirect()->back()->withErrors('导入表格时发生错误，请及时联系系统管理员');
				}
			} else {
				return redirect()->back()->withErrors('文件格式错误');
			}
		}else {
			return redirect()->back()->withErrors('未选择文件或文件上传失败');
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
