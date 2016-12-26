<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    public function getUserInfoBySno($user_sno)
    {
        return \DB::table('user')
        ->select('*')
        ->where('user_sno', '=' , $user_sno)
        ->whereNull('user_delete_time')
        ->first();
    } 

        public function updateUserInfo($id, $data)
        {
            $data = $this->changeObjtoArr($data);

            if(isset($data['id'])){
                unset($data['id']);
            }

            return \DB::table('user')
            ->where('id' , '=', $id)
            ->update($data);
        }

        /**
         * [changeObjtoArr 把object变量转成array变量]
         * @param  [object] $obj [description]
         * @return [array]      [description]
         */
        private function changeObjtoArr($obj)
        {
            if(is_array($obj)) {
                return $obj;
            }

            if(is_object($obj)){
                $res =  array();
                foreach ($obj as $key => $value) {
                    $res[$key] = $value;
                }
                return $res;
            }

            return array();
        }
}
