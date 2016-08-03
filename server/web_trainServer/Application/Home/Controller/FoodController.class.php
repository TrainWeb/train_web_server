<?php
namespace Home\Controller;
use Think\Controller;
class FoodController extends CommonController {
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

        $where_repeatName = 'Comm_Name ="'.I('comm_name').'"';
        $result_repeat = $Food_Db->where($where_repeatName)->select();
        if($result_repeat!=null)
            $this->error('添加失败：和其他名称重复，请修改名称');

        $result = $Food_Db->where($where)->save($data);
        if($result){
            $this->success('修改成功',U('home/food/food'));
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

        $url     =  '.'.C('DEL_FOOD_IMG').$result[0]['comm_picture_url'];



        $del_result = $Food_Db->where($where)->delete();
        if($del_result){
            delfile($url);
            $this->success("删除数据成功",U('home/food/food'));
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

     public function editfoodimg(){
         $comm_id = I('comm_id');
        $where = "comm_id =".$comm_id;
        $food  = M('commodity');
        $result = $food->where($where)->select();
        if($result==null)
            $this->error('数据查询出错');

        $url     =  '.'.C('DEL_FOOD_IMG').$result[0]['comm_picture_url'];
        delfile($url_del);

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
            $url =$info[0]['savename'];


            $data['Comm_Picture_Url'] = $url;         

            $result = $food->where($where)->save($data);
            if($result){
                $this->success('图片修改成功',U('home/food/food'));
            }else
            {
                $this->error('修改失败');
            }
        }
    }
}
