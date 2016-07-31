<?php
namespace Home\Controller;
use Think\Controller;
class FoodController extends Controller {
    public function food(){
        $Food_Db = M('commodity');
        $where   = 'Comm_Type = 1';
        $result  = $Food_Db->where($where)->select();
        $count   = count($result);
        $Page    = getpage($count, 12);
        $show    = $Page->show();
        $list    = $Food_Db->where($where)->order('comm_id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('result',$list);
        $this->assign('page',$show);
        $this->display();
    }

    public function addfood(){
    	$this->display();
    }

    public function editfood($comm_id = -1){
        $Food_Db = M('commodity');
        $where   = 'comm_id ='.$comm_id;
        $result  = $Food_Db->where($where)->select();

        if(count($result)<=0){
            $this -> error('数据不存在或查询错误');
        }
        $this->assign('list',$result);
    	$this->display();
    }

    public function to_editfood($comm_id = -1){
        $Food_Db  =  M('commodity');
        $where    =  'Comm_id ='.$comm_id;
        $data['Comm_Name']     =  I('comm_name');
        $data['Comm_Price']    =  I('comm_price');
        $data['Comm_Counts']   =  I('comm_counts');
        $data['Comm_Discounted'] = I('comm_discounted');
        $data['Comm_Descr']    =  I('comm_descr');

        $result = $Food_Db->where($where)->save($data);
        if($result){
            $this->success('修改成功');
        }else{
            $this->error('修改失败或数据没有修改');
        }
    }

    public function deletefood($comm_id = -1){
        
        $Food_Db =  M('commodity');
        $where   =  'comm_id ='.$comm_id;
        $result  =  $Food_Db->where($where)->select();

        if(count($result)<=0){
            $this -> error('删除失败，没有在数据库中查到该数据或数据已删除');
        }

        $url     =  '.'.substr($result[0]['comm_picture_url'],16);



        $del_result = $Food_Db->where($where)->delete();
        if($del_result){
            delfile($url);
            $this->success("删除数据成功");
        }else{
            $this->error("删除失败");
        }
    }

    public function findfood($find = '!@#'){
        $Food_Db = new \Think\Model();
        $sql_lan = "SELECT * FROM commodity WHERE comm_name LIKE '%".$find."%'";
        $result  = $Food_Db->query($sql_lan);
        if($result==null){
            $this->error("搜索结果为空");
        }
        $this->assign('list',$result);
        $this->display();
    }

    public function commentfood($comm_id= '!@#'){
        $where = 'comm_id ='.$comm_id;
        $Comment = M('comm_comment');
        $Food_Db = M('commodity');
        $result = $Comment -> where($where)->select();
        $result1 = $Food_Db -> where($where)->select();

        $this->assign('list',$result);
        $this->assign('list1',$result1);
        $this->display();
    }
}
