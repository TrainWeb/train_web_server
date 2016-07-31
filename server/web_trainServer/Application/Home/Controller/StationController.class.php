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

        $result = $station->add($data);
        if($result){
            $this->success('数据写入成功！','station',3);
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
            $this->success("删除成功",U('station/station'));
        else
            $this->error("删除失败");
    }

    public function editstation($S_ID = -1){
        if($S_ID==-1)
            $this->error("编辑页面加载出错");
        $where = 's_id ='.$S_ID;
        $Station_Db = M('station');
        $result = $Station_Db->where($where)->select();
        if($result){
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
        $Station_Db = M('station');
        $data['S_Name']  =  I('station');   
        $data['S_Province'] = I('province');

        $result = $Station_Db->where($where)->save($data);
        if($result)
            $this->success("站点修改成功");
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
} 

?>