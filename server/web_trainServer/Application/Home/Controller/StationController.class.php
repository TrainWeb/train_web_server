<?php
namespace Home\Controller;
use Think\Controller;
class StationController extends CommonController{

	public function station(){
        $Station_Db = M('station');
        $count   = $Station_Db->count();
        $Page    = getpage($count,20);
        $show    = $Page->show();
        $list    = $Station_Db->order('s_id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('result',$list);
        $this->assign('page',$show);
    	$this->display();
    }

    public function addstation(){
    	$this->display();
    }

    public function to_addstaion(){
        echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
        if(!IS_POST) $this->error('页面不存在');
        
        $station = M('station');
        $data['S_Name'] = I('station');
        $data['S_Province'] = I('province');

        $where_repeat = 'S_Name ="'.I('station').'"';
        $result_repeat = $station->where($where_repeat)->select();
        if($result_repeat!=null)
            $this->error('添加错误：站点名称已存在,请修改站点名称');

        $result = $station->add($data);
        if($result){
        $upload = new \Think\Upload();
        $upload->maxSize=3145728;
        $upload->exts= array('jpg','gif','png','jpeg' );
        $upload->saveName = time().'_'.mt_rand();;
        $upload->rootPath='./Uploads/';
        $upload->savePath='station_img/';
        $upload->autoSub = false;
        $info   =   $upload->upload();
        if(!$info){
            $this->error($upload->getError());
        }else{
            $url = $info[0]['savename'];
            $Db = new \Think\Model();
            $sql_lan = "INSERT INTO `station_describe` (`Station_Id`, `img_url`, `description`) VALUES ('".$result."', '".$url."', '".I('stationdiscribe')."');";
            $result_des  = $Db->execute($sql_lan);
            if($result_des){
                $this->success('站点信息添加成功',U('home/station/station'));
            }else
            {
                $this->error('添加图片和描述失败');
            }
        }
        }else{
            $this->error('数据写入失败...');
        }
       

    }

    public function deletestation($S_ID = -1){
        if($S_ID == -1)
            $this->error("删除出错");
        $where = 's_id ='.$S_ID;
        $Station_Db = M('station');
        $result = $Station_Db->where($where)->delete();
        if($result)
            $this->success("删除成功",U('home/station/station'));
        else
            $this->error("删除失败");
    }

    public function editstation($S_ID = -1){
        if($S_ID==-1)
            $this->error("编辑页面加载出错");
        $where = 's_id ='.$S_ID;
        $where_des = 'Station_id ='.$S_ID;
        $Station_Db = M('station');
        $Station_des = M('station_describe');

        $result = $Station_Db->where($where)->select();
        $result_des = $Station_des->where($where_des)->select();
        if($result){
            $this->assign('list1',$result_des);
            $this->assign('list',$result);
            $this->display();
        }else{
            $this->error('编辑页面加载出错');
            $this->display();
        }
    }
    public function to_editstation($s_id = -1){
        if($s_id==-1)
            $this->error('修改失败');
        $where = 'S_ID ='.$s_id;
        $where_des = 'Station_id ='.$s_id;
        $Station_Db = M('station');
        $Station_des = M('station_describe');
        $data['S_Name']  =  I('station');   
        $data['S_Province'] = I('province');
        $data_des['description'] = I('stationdiscribe');

        $where_repeat = 'S_Name ="'.I('station').'"';
        $result_repeat = $station->where($where_repeat)->select();
        if($result_repeat!=null)
            $this->error('添加错误：站点名称已存在,请修改站点名称');

        $result = $Station_Db->where($where)->save($data);
        $result_des = $Station_des->where($where_des)->save($data_des);
        if($result||$result_des)
            $this->success("站点修改成功",U('home/station/station'));
        else
            $this->error("站点信息修改失败或信息未修改");
    }

    public function findstation($find ="!@#" ){

        $Station_Db = new \Think\Model();
        $sql_lan    = "SELECT * FROM station WHERE S_Name LIKE '%".$find."%' OR S_Province LIKE '%".$find."%'";
        $result     = $Station_Db->query($sql_lan);
        if($result==null){
            $this->error("搜索结果为空");
        }
        $this->assign('list',$result);
        $this->display();
    }

    public function editstationimg(){
        $station_id = I('station_id');
        $where = "station_id =".$station_id;
        $Station_des  = M('station_describe');
        $result = $Station_des->where($where)->select();
        if($result==null)
            $this->error('数据查询出错');

        $url_del     =  '.'.C('DEL_STATION_IMG').$result[0]['img_url'];
        delfile($url_del);

        $upload = new \Think\Upload();
        $upload->maxSize=3145728;
        $upload->exts= array('jpg','gif','png','jpeg' );
        $upload->saveName = time().'_'.mt_rand();;
        $upload->rootPath='./Uploads/';
        $upload->savePath='station_img/';
        $upload->autoSub = false;
        $info   =   $upload->upload();
        if(!$info){
            $this->error($upload->getError());
        }else{
            $url = $info[0]['savename'];


            $data['img_url'] = $url;         

            $result = $Station_des->where($where)->save($data);
            if($result){
                $this->success('图片修改成功',U('home/station/station'));
            }else
            {
                $this->error('修改失败');
            }
        }
    }
} 

?>