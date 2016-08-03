<?php
namespace Home\Controller;
use Think\Controller;
Class UploadimgController extends CommonController{
	public function Uploadimg(){
		$upload = new \Think\Upload();
		$upload->maxSize=3145728;
		$upload->exts= array('jpg','gif','png','jpeg' );
		$upload->saveName = time().'_'.mt_rand();;
		$upload->rootPath='./Uploads/';
		$upload->savePath='food_img/';
		$upload->autoSub = false;
		$info   =   $upload->upload();
		if(!$info){
			$this->error($upload->getError());
		}else{
			$url = $info[0]['savename'];

			$Food_Db = M('commodity');


			$data['Comm_Name'] = I('foodname');
			$data['Comm_Picture_Url'] = $url;
			$data['Comm_Price'] = I('foodprice');
			$data['Comm_Type'] = 1;
			$data['Comm_Descr'] = I('fooddiscribe');
			$data['Comm_Counts'] = I('foodnumber');
			$data['Comm_Discounted'] = I('fooddiscounts');

			$where_repeatName = 'Comm_Name ="'.I('foodname').'"';
        	$result_repeat = $Food_Db->where($where_repeatName)->select();
        	if($result_repeat!=null)
            $this->error('和其他物品名称重复，请修改名称');

			$result = $Food_Db -> add($data);
			if($result){
				$this->success('数据写入成功');
			}else
			{
				$this->error('添加失败');
			}
		}
	}



	public function Uploadimg2(){
		$upload = new \Think\Upload();
		$upload->maxSize=3145728;
		$upload->exts= array('jpg','gif','png','jpeg' );
		$upload->saveName = time().'_'.mt_rand();;
		$upload->rootPath='./Uploads/';
		$upload->savePath='comm_img/';
		$upload->autoSub = false;
		$info   =   $upload->upload();
		if(!$info){
			$this->error($upload->getError());
		}else{
			$url = $info[0]['savename'];

			$Food_Db = M('commodity');


			$data['Comm_Name'] = I('foodname');
			$data['Comm_Picture_Url'] = $url;
			$data['Comm_Price'] = I('foodprice');
			$data['Comm_Type'] = 2;
			$data['Comm_Descr'] = I('fooddiscribe');
			$data['Comm_Counts'] = I('foodnumber');
			$data['Comm_Discounted'] = I('fooddiscounts');

			$where_repeatName = 'Comm_Name ="'.I('foodname').'"';
        	$result_repeat = $Food_Db->where($where_repeatName)->select();
        	if($result_repeat!=null)
            $this->error('和其他商品名称重复，请修改名称');

			$result = $Food_Db -> add($data);
			if($result){
				$this->success('数据写入成功',U('home/commodity/commodity'));
			}else
			{
				$this->error('添加失败');
			}
		}
	}

}

?>