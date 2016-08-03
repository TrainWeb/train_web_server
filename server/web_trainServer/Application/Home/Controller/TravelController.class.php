<?php
namespace Home\Controller;
use Think\Controller;
class TravelController extends CommonController {

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
        $sce = M('scenic');
        $where_repeat = 'SCE_NAME ="'.I('sce_name').'"';
        $result_repeat = $sce->where($where_repeat)->select();
        if($result_repeat!=null)
            $this->error('添加错误：景点名称已存在,请修改景点名称');

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
			$url = $info[0]['savename'];

			
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
				$this->success('数据写入成功',U('home/travel/travel'));
			}else{
				$this->error('站点位置添加失败');
			}
			}else{
				$this->success('景点信息添加成功，暂时没有添加站点',U('home/travel/travel'));
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
        $url     =  '.'.C('SCE_IMG').$result[0]['sce_picture'];
        $del_result = $sce->where($where)->delete();
        if($del_result){
            delfile($url);
            $this->success("删除数据成功",U('home/travel/travel'));
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

    public function to_edittravel($id = -1){
        if($id==-1)
            $this->error('没有找到要编辑的信息');

        $sce = M('scenic');
        $where = 'sce_id ='.$id;
        $data['SCE_NAME'] = I('sce_name');
        $data['SCE_Address'] = I('sce_address');
        $data['Description'] = I('description');

        $sce = M('scenic');
        $where_repeat = 'SCE_NAME ="'.I('sce_name').'"';
        $result_repeat = $sce->where($where_repeat)->select();
        if($result_repeat!=null)
            $this->error('添加错误：景点名称已存在,请修改景点名称');



        $result = $sce -> where($where)->save($data);

        $ssdata['Station_ID']=I('station_id');

        $ss = M('station_scenic');    
        if($ssdata['Station_ID']!=null){
            
            $where_ss = 'Scenic_ID ='.$id;
            $result_sss = $ss->where($where_ss)->select();
                if($result_sss==null){
                    $ssdata['Scenic_ID'] = $id;
                    $ss->add($ssdata);
                }else{
                $result_ss = $ss->where($where_ss)->save($ssdata);
                }
            }else{
                $result_ss = $ss->where($where_ss)->delete();
            }
    if($result||$result_ss){
        $this->success('景点数据更新成功',U('home/travel/travel'));
    }
    }

    public function addmap($id = -1){
        if($id == -1){
            $this->error('没有找到要编辑的景点');
        }
        $sce = M('scenic');
        $where = 'sce_id ='.$id;
        $result = $sce->where($where)->select();

        $this->assign('list',$result);
        $this->display();

    }

    public function editmap(){
        $sce = M('scenic');
        $id  = I('sce_id');
        $where = 'sce_id ='.$id;
        $result_f = $sce->where($where)->select();
        if($result_f[0]['sce_router']!="scenic/router/default.png"){
            $old_url     =  '.'.C('DEL_SCE_IMG').$result_f[0]['sce_router'];
             delfile($old_url);
        } 

        $upload = new \Think\Upload();
        $upload->maxSize=3145728;
        $upload->exts= array('jpg','gif','png','jpeg' );
        $upload->saveName = time().'_'.mt_rand();;
        $upload->rootPath='./Uploads/';
        $upload->savePath='map_img/';
        $upload->autoSub = false;
        $info   =   $upload->upload();
        if(!$info){
            $this->error($upload->getError());
        }else{
            $url = $info[0]['savename'];

            $data['SCE_Router'] = $url;
            $result = $sce->where($where)->save($data);

            if($result){
                $this->success('路线地图修改成功',U('home/travel/travel'));
            }else{
                $this->error('路线地图修改出错');
            }
        }
    }

    public function edittravelimg(){
        $sce_id = I('sce_id');
        $where = "sce_id =".$sce_id;
        $scenic  = M('scenic');
        $result = $scenic->where($where)->select();
        if($result==null)
            $this->error('数据查询出错');

        $url_del     =  '.'.C('DEL_SCE_IMG').$result[0]['sce_picture'];
        

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
            $url = $info[0]['savename'];


            $data['SCE_Picture'] = $url;
            $data['SCE_ID'] = $sce_id; 

            $result = $scenic->save($data);
            if($result){
                delfile($url_del);
                $this->success('图片修改成功',U('home/travel/travel'));
            }else
            {
                $this->error('修改失败');
            }
        }
    }
}