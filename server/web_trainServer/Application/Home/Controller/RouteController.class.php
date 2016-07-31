<?php
namespace Home\Controller;
use Think\Controller;
class RouteController extends Controller{

	public function route(){


		  /*$Station_Db = M('station');
        $count   = $Station_Db->count();
        $Page    = getpage($count,20);
        $show    = $Page->show();
        $list    = $Station_Db->order('s_id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('result',$list);
        $this->assign('page',$show);
    	$this->display();*/
		$train = M('train');
		$count = $train->count();
		$Page  = getpage($count,20);
		$show  = $Page->show();
		$result = $train ->limit($Page->firstRow.','.$Page->listRows)->select();

		$Train_router_time = M('train_router_time');

	

		for($i=0;$i<count($result);$i++){
			$where = "Trian_ID ='".$result[$i]['trian_id']."'";
			$find_trian = $Train_router_time->where($where)->order('ID')->select();
			$firststation[$i] = $find_trian[0]['station_id'];
			$laststation[$i] = $find_trian[count($find_trian)-1]['station_id'];
		}

		$station = M('station');

		for ($i=0; $i < count($firststation); $i++) { 
			$findfirst = "S_ID =".$firststation[$i];
			$findlast  = "S_ID =".$laststation[$i];
			$firstresult = $station->where($findfirst)->select();
			$lastresult  = $station->where($findlast)->select();


			$result[$i]['firstname'] = $firstresult[0]['s_name'];
			$result[$i]['lastname'] = $lastresult[0]['s_name'];
		}

	
		$this->assign('list',$result);
		$this->assign('page',$show);
        $this->display(); 
    }

    public function addroute(){
        $this->display();
    }

	public function to_addroute(){
		echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
		if(!IS_POST) $this->error('页面不存在');

		$station_info = I('route_number');
		$arrayName = I('station_name');
		$arrayArrivetime = I('station_arrivetime');
		$arrayLeavetion = I('station_leavetion');

		$train = M('train');
		$where ="Trian_ID ='".$station_info."'";
		$data['Trian_ID'] = $station_info;
		$find = $train->where($where)->select();
		if($find==NULL)
		{
		$result = $train->add($data);
		}else{
			$this->error('路线编号已经存在，请更改编号或删除当前存在编号');
		}

		$station = M('station');

		for ($i=0; $i < count($arrayName) ; $i++) {
			$data['S_Name'] = $arrayName[$i]; 
			$station_id[$i] = $station->where($data)->getField('S_ID');
			if($station_id[$i]==NULL){
				$this->error("请先去站点管理添加该站点：".$arrayName[$i]);
			}
		}
		
		$train_router = M('train_router');
		$train_data['Trian_ID'] = $station_info;
		$train_data['Leaves_Station'] = $station_id[0];
		$train_router->add($train_data);

		$Route = new \Think\Model();
		for($i=0;$i<count($arrayName);$i++){
			if($i==0){

				$sql_lan =  "INSERT INTO `train_router_time`(`Trian_ID`,`Pre_Station`,`Station_ID`,`Drive_Time`,`Arrival_Time`) VALUES('".$station_info."',NULL,'".$station_id[$i]."','".$arrayLeavetion[$i]."','".$arrayArrivetime[$i]."');";
			}else{
				$sql_lan =  "INSERT INTO `train_router_time`(`Trian_ID`,`Pre_Station`,`Station_ID`,`Drive_Time`,`Arrival_Time`) VALUES('".$station_info."','".$station_id[$i-1]."','".$station_id[$i]."','".$arrayLeavetion[$i]."','".$arrayArrivetime[$i]."');";
			}
				$Route->execute($sql_lan);
			}
		$this->success('添加成功','route');
	}

	public function deletestation($S_ID = -1){
		if($S_ID == -1)
			$this->error("删除出错");
		$where = 's_id ='.$S_ID;
		$Station_Db = M('station');
		$result = $Station_Db->where($where)->delete();
		if($result)
			$this->success("删除成功");
		else
			$this->error("删除失败");
	}

	public function routedetails($ID = "!@#"){
		if($ID == "!@#")
			$this->error("查询失败");
		$where = "Trian_ID ='".$ID."'";
		$route_id[0]['id'] = $ID; 
		$Route = M("train_router_time");
		$result = $Route->where($where)->select();

		$Station = M('station');
		for($i=0;$i<count($result);$i++){
			$findname = 'S_ID ='.$result[$i]['station_id'];
			$station_result = $Station->where($findname)->select();
			$result[$i]['station_name'] = $station_result[0]['s_name'];
		}
		$this->assign('route_id',$route_id);
		$this->assign('list',$result);
		$this->display();
	}

	public function findroute($find = '!@#'){
		if($find == '!@#')
			$this->error('搜索内容为空或结果不存在');
		$Route_Db = new \Think\Model();
		$sql_lan = "SELECT * FROM train WHERE Trian_ID = '".$find."'";

		$result = $Route_Db->query($sql_lan);
		if($result == NULL)
			$this->error('搜索路线不存在');

		$train_router_time = M('train_router_time');
		$where = "Trian_ID ='".$result[0]['trian_id']."'";
		
		$train_result = $train_router_time->where($where)->order('ID')->select();

		$station = M('station');


		$firstfind = "S_ID =".$train_result[0]['station_id'];
		$lastfind  = "S_ID =".$train_result[count($train_result)-1]['station_id'];

		$firstresult = $station->where($firstfind)->select();
		$lastresult  = $station->where($lastfind)->select();

		$result[0]['firstname'] = $firstresult[0]['s_name'];
		$result[0]['lastname'] = $lastresult[0]['s_name'];

        $this->assign('list',$result);
        $this->display();

	}


	public function deleteroute($id='!@#'){

		if($id == '!@#')
			$this->error('没有该删除的编号');
		
		$where = "Trian_ID ='".$id."'";
		$train_router_time = M('train_router_time');
		$train_router = M('train_router');
		$train = M('train');

		$train_router_time->where($where)->delete();
		$train_router->where($where)->delete();
		$train->where($where)->delete();

		$this->success('删除成功');

	}
}

?>