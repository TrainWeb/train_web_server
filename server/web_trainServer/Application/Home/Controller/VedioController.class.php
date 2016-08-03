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
            echo $info['savename'];
        }
        $data['name'] = $info['savename'];
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
            $url = $info[0]['savename'];

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
                $this->success('数据写入成功',U('home/vedio/vedio'));
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


        $img_url     =  '.'.C('DEL_VEDIO_IMG').$result[0]['f_image_url'];
        $vedio_url   =  '.'.C('DEL_VEDIOS').$result[0]['f_source_url'];


        $del_result = $Film_Db->where($where)->delete();
        if($del_result){
            delfile($img_url);
            delfile($vedio_url);
            $this->success("删除数据成功",U('home/vedio/vedio'));
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
            $this->success('修改成功',U('home/vedio/vedio'));
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

    public function editvedioimg(){
        $f_id = I('f_id');
        $where = "f_id =".$f_id;
        $film = M('film');
        $result = $film->where($where)->select();
        if($result==null)
            $this->error('数据查询出错');

        $url_del     =  '.'.C('DEL_VEDIO_IMG').$result[0]['f_image_url'];
        delfile($url_del);

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
            $url = $info[0]['savename'];


            $data['F_Image_Url'] = $url;         

            $result = $film->where($where)->save($data);
            if($result){
                $this->success('图片修改成功',U('home/vedio/vedio'));
            }else
            {
                $this->error('修改失败');
            }
        }
    }

    public function editvediosource(){
        $vedio_url = I('vedio_url');
        $vedio_id  = I('vedio_id');

        if($vedio_url=="")
            $this->error('上传新的视频路径获取错误，请先上传视频');

        $film = M('film');
        $result = $film->where($where)->select();

        if($result == null){
            $this->error('找不到相关视频编号');
        }

        $url_del     =  '.'.C('DEL_VEDIOS').$result[0]['f_source_url'];
        

        $data['F_ID'] = $vedio_id; 
        $data['F_Source_Url']   = $vedio_url;
        $result = $film->save($data);
        if($result){
            delfile($url_del);
            $this->success('修改视频内容成功',U('home/vedio/vedio'));
        }else{
            $this->error('修改视频内容失败');
        }

    }
}