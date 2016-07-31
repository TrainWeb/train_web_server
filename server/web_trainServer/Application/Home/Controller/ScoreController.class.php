<?php
namespace Home\Controller;
use Think\Controller;
class ScoreController extends Controller {

    public function score(){
    	$Point_Db =  M('points_reward');
    	$count    =  count($Point_Db->select());
    	$Page     =  getpage($count,12);
    	$show     =  $Page->show();
    	$result   = $Point_Db->order('reward_id')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('page',$show);
    	$this->assign('list',$result);
    	$this->display();
    }

    public function addscore(){
    	$this->display();
    }

    public function to_addscore(){
    	$upload = new \Think\Upload();
		$upload->maxSize=3145728;
		$upload->exts= array('jpg','gif','png','jpeg' );
		$upload->saveName = time().'_'.mt_rand();;
		$upload->rootPath='./Uploads/';
		$upload->savePath='score_img/';
		$upload->autoSub = false;
		$info   =   $upload->upload();
		if(!$info){
			$this->error($upload->getError());
		}else{
			$url = __ROOT__.'/Uploads/'.$info[0]['savepath'].$info[0]['savename'];

			$Point_Db = M('points_reward');


			$data['Reward_Name'] = I('name');
			$data['Reward_Picture'] = $url;
			$data['Need_Points'] = I('need_point');
			$data['TIME_OUT'] = I('time_out');
			
			$result = $Point_Db -> add($data);
			if($result){
				$this->success('数据写入成功');
			}else
			{
				$this->error('添加失败');
			}
		}

    }

    public function editscore($id = -1){
    	$where = "reward_id =".$id;
    	$Point = M('points_reward');
    	$result = $Point->where($where)->select();
    	$this->assign('list',$result);
    	$this->display();
    }

    public function to_editscore($id = -1){
    	$where = "reward_id =".$id;
    	$Point = M('points_reward');

    	$data['Reward_Name'] = I('name');
		$data['Need_Points'] = I('need_point');
		$data['TIME_OUT'] = I('time_out');

		$result = $Point->where($where)->save($data);
		if($result)
			$this->success('积分奖品修改成功');
		else
			$this->error('积分奖品数据修改失败或数据并未改变无需修改');
    }

    public function deletescore($id = -1){
    	$where = "reward_id =".$id;
    	$Point = M('points_reward');
    	$result = $Point->where($where)->select();


    	if(count($result)<=0){
            $this -> error('删除失败，没有在数据库中查到该数据或数据已删除');
        }

        $url     =  '.'.substr($result[0]['comm_picture_url'],16);



        $del_result = $Point->where($where)->delete();
        if($del_result){
            delfile($url);
            $this->success("删除数据成功");
        }else{
            $this->error("删除失败");
        }
    }

    public function findscore($find = -1){
    	if($find == -1){
    		$this->error('搜索编号不存在');
    	}
    	$Score_Db = new \Think\Model();
        $sql_lan = "SELECT * FROM points_reward WHERE reward_name LIKE '%".$find."%'";
        $result  = $Score_Db->query($sql_lan);
        if($result==null){
            $this->error("搜索结果为空");
        }
        $this->assign('list',$result);
        $this->display();
    }

}
