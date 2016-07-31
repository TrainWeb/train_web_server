<?php
namespace Home\Controller;
use Think\Controller;
class VedioController extends Controller {

    public function vedio(){
        $Film_Db = M('film');
        $count = $Film_Db->count();
        $Page  = getpage($count,12);
        $show  = $Page->show();

        $result = $Film_Db->order('f_id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$result);
        $this->assign('page',$show);
    	$this->display();

    }

    public function uploadify(){
        if(!empty($_FILES)){
        $upload = new \Think\Upload();
        $upload->maxSize=31457280000000;
        $upload->exts= C('VRDIOTYPE');
        $upload->saveName = time().'_'.mt_rand();
        $upload->rootPath='./Uploads/';
        $upload->savePath='vedios/';
        $upload->autoSub = false;
        $info   =   $upload->uploadOne($_FILES['Filedata']);
        if(!$info)
        {
            echo "error".$upload->getError();
        }else
        {
            echo __ROOT__.'/Uploads/'.$info['savepath'].$info['savename'];
        }
        $data['name'] = $info['savepath'].$info['savename'];
    }

    }

    public function uploadvedio(){

        $upload = new \Think\Upload();
         $upload->maxSize=3145728;
        $upload->exts= array('jpg','gif','png','jpeg' );
        $upload->saveName = time().'_'.mt_rand();;
        $upload->rootPath='./Uploads/';
        $upload->savePath='vedio_img/';
        $upload->autoSub = false;
        $info   =   $upload->upload();
        if(!$info){
            $this->error($upload->getError());
        }else{
            $url = __ROOT__.'/Uploads/'.$info[0]['savepath'].$info[0]['savename'];

            $Film_Db = M('film');

            $data['F_Name'] = I('vedio_name');
            $data['F_Type'] = I('vedio_type');
            $data['F_Year'] = I('vedio_year');
            $data['F_Point'] = I('vedio_point');
            $data['F_Introduction'] = I('vedio_details');
            $data['F_Source_Url'] = I('vedio_url');
            $data['F_WPrice'] = I('vedio_price');
            $data['F_Image_Url'] = $url;

            $result = $Film_Db -> add($data);
            if($result){
                $this->success('数据写入成功');
            }else
            {
                $this->error('添加失败');
            }
        }
    }

    public function deletevedio($id = -1){
        $where   = 'f_id ='.$id;
        $Film_Db = M('film');
        $result  = $Film_Db->where($where)->select();
        if($result == null){
            $this->error('删除对象不存在或者已经被删除');
        } 


        $img_url     =  '.'.substr($result[0]['f_image_url'],16);
        $vedio_url   =  '.'.substr($result[0]['f_source_url'],16);


        $del_result = $Film_Db->where($where)->delete();
        if($del_result){
            delfile($img_url);
            delfile($vedio_url);
            $this->success("删除数据成功");
        }else{
            $this->error("删除失败");
    }
}

    public function editvedio($id = -1){
        if($id==-1)
            $this->error('没有找到视频编号');
        $where = 'f_id ='.$id;
        $Film_Db = M('film');
        $result = $Film_Db->where($where)->select();
        if($result == null)
            $this->error('没有找到视频信息');
        $this->assign('list',$result);
        $this->display();
    }

    public function to_editvedio(){
        $Film_Db = M('film');
        $vedio_id = I('vedio_id');
        $where   = 'f_id ='.$vedio_id;

        $data['F_Name'] = I('vedio_name');
        $data['F_Type'] = I('vedio_type');
        $data['F_Year'] = I('vedio_year');
        $data['F_Point'] = I('vedio_point');
        $data['F_Introduction'] = I('vedio_details');
        $data['F_WPrice'] = I('vedio_price');

        $result = $Film_Db->where($where)->save($data);
         if($result){
            $this->success('修改成功');
        }else{
            $this->error('修改失败或数据没有修改');
        }
    }

    public function findvedio($find = "!@#"){
        if($find == "!@#"){
            $this->error('没有找到对应视频信息');
        }
        $Film = new \Think\Model();
        $sql_lan = "SELECT * FROM film WHERE F_Name LIKE '%".$find."%' OR F_Type LIKE '%".$find."%'";
        $result  = $Film->query($sql_lan);
        if($result==null){
            $this->error("搜索结果为空");
        }
        $this->assign('list',$result);
        $this->display();
    }

    public function vediocomment($id = -1){

        $where = 'f_id ='.$id;
        $where_comment = 'film_id ='.$id;

        $Film = M('film');
        $Comment = M('film_comment');
        
        $result = $Film -> where($where)->select();
        $result1 = $Comment -> where($where_comment)->select();

        $this->assign('list',$result);
        $this->assign('list1',$result1);
        $this->display();

    }
}