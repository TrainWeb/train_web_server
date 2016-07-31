<?php
namespace Home\Controller;
use Think\Controller;
class TravelController extends Controller {

    public function travel(){
    	$sce = M('scenic');
        $ss  = M('station_scenic');
        $station = M('station');
    	$count = $sce->count();
    	$Page  = getpage($count,12);
    	$show  = $Page->show();
    	$result = $sce->limit($Page->firstRow.','.$Page->listRows)->select();
        for($i=0;$i<$count;$i++){
        $where = 'Scenic_ID ='.$result[$i]['sce_id'];
        $result_ss = $ss->where($where)->select();
         if($result_ss==null){
            $result[$i]['station']="";
        }
        else{
            $where_station = "S_ID =".$result_ss[0]['station_id'];
            $result_station = $station->where($where_station)->select();
            $result[$i]['station'] = $result_station[0]['s_name'];
        }
        }
    	$this->assign('page',$show);
    	$this->assign('list',$result);
    	$this->display();
    }

    public function addtravelpoint(){
    	$station = M('station');
    	$result = $station->select();
    	$this->assign('list',$result);
    	$this->display();
    }

    public function to_addtravel(){
    	$upload = new \Think\Upload();
		$upload->maxSize=3145728;
		$upload->exts= array('jpg','gif','png','jpeg' );
		$upload->saveName = time().'_'.mt_rand();;
		$upload->rootPath='./Uploads/';
		$upload->savePath='sce_img/';
		$upload->autoSub = false;
		$info   =   $upload->upload();
		if(!$info){
			$this->error($upload->getError());
		}else{
			$url = __ROOT__.'/Uploads/'.$info[0]['savepath'].$info[0]['savename'];

			$sce = M('scenic');
			$data['SCE_NAME'] = I('sce_name');
			$data['SCE_Address'] = I('sce_address');
			$data['SCE_Picture'] = $url;
			$data['Description'] = I('description');

			$result = $sce -> add($data);
			if($result){
				$ssdata['Station_ID']=I('station_id');
				if($ssdata['Station_ID']!=null){
				$ssdata['Scenic_ID']=$result;
				$ss = M('station_scenic');
				$result_ss = $ss->add($ssdata);
				if($result_ss){ 
				$this->success('数据写入成功');
			}else{
				$this->error('站点位置添加失败');
			}
			}else{
				$this->success('景点信息添加成功，暂时没有添加站点');
			}
			}else
			{
				$this->error('添加失败');
			}
		}
    }

    public function deletetravel($id=-1){
    	if($id == -1){
    		$this->error('找不到需要删除的景点');
    	}
    	$sce = M('scenic');
    	$ss  = M('station_scenic');

    	$where_ss = 'scenic_id ='.$id;
    	$where = 'sce_id ='.$id;

    	$result_ss = $ss->where($where_ss)->delete();

    	$result  =  $sce->where($where)->select();
    	if(count($result)<=0){
            $this -> error('删除失败，没有在数据库中查到该数据或数据已删除');
        }
        $url     =  '.'.substr($result[0]['sce_picture'],16);
        $del_result = $sce->where($where)->delete();
        if($del_result){
            delfile($url);
            $this->success("删除数据成功");
        }else{
            $this->error("删除失败");
        }
    }

    public function edittravel($id = -1){
        if($id == -1)
            $this->error('景点信息错误');
        $where = 'sce_id ='.$id;
        $sce = M('scenic');
        $result = $sce->where($where)->select();
        $ss = M('station_scenic');
        $where_ss = 'Scenic_ID ='.$id;
        $result_ss = $ss->where($where_ss)->select();
        $station = M('station');
        if($result_ss==null){
            $result[0]['station']="
            ";
        }else{
            
            $where_station = 'S_ID ='.$result_ss[0]['station_id'];
            $result[0]['station_id'] = $result_ss[0]['station_id'];
            $result_station = $station->where($where_station)->select();
            $result[0]['station'] = $result_station[0]['s_name'];
        }
        $all_station = $station->select();
        $this->assign('all_station',$all_station);
        $this->assign('list',$result);
        $this->display();

    }

    public function findtravel(){
        $findtext = I('findtext');
        $FindTravel = new \Think\Model();
        $sql_lan = "SELECT * FROM scenic WHERE sce_name LIKE '%".$findtext."%'";
        $result  = $FindTravel->query($sql_lan);
        if($result==null){
            $this->error("搜索结果为空");
        }
        for($i=0;$i<$count;$i++){
        $where = 'Scenic_ID ='.$result[$i]['sce_id'];
        $result_ss = $ss->where($where)->select();
         if($result_ss==null){
            $result[$i]['station']="";
        }
        else{
            $where_station = "S_ID =".$result_ss[0]['station_id'];
            $result_station = $station->where($where_station)->select();
            $result[$i]['station'] = $result_station[0]['s_name'];
        }
        }
        $this->assign('list',$result);
        $this->display();
    
    }
}
