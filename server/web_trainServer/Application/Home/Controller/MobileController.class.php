<?php
namespace Home\Controller;
use Think\Controller;
class MobileController extends Controller{

	public function login()
    {

        if (!IS_POST)
            $res['result'] = false;
        else {
            $user_id = I('User_ID');
            $train_Id = I('Train_ID');
            //   $user_id = "340322199411241612";
            //  $train_Id = "k123";

            $sql = "select tr.User_ID, tr.Trian_ID Train_Name , u.User_Name , tr.Start_Station ,s_start.S_Name startname
      , tr.End_Staton ,s_end.S_Name endname ,tr.Carriage , tr.Seatnum ,tr.ticket_type ,tr.seatType from ticket_record tr  ,Train t ,
       STATION s_start , STATION s_end  ,USER u  where tr.User_ID = '{$user_id}' and  tr.User_ID = u.User_ID
       and tr.Start_Station = s_start.S_ID 
       and tr.End_Staton = s_end.S_ID and tr.Trian_ID = '{$train_Id}';";

            $Station_Db = new \Think\Model();
            $result = $Station_Db->query($sql);

            if ($result == null) {
                $res['result'] = false;
            } else {
                $res['result'] = true;
                foreach ($result as $trains)
                    $res['info'] = $trains;
            }
            echo json_encode($res);
        }

    }

	public function stations_by_train()
    {//站点列表
        $train = I('get.train_id');
        $sql = "select tr.Pre_Station,tr.Station_Id ,s.S_Name ,tr.Day,date_format( tr.Arrival_Time,'%H:%i') as Arrival_Time ,
               tr.Stop_time,date_format( tr.Drive_Time,'%H:%i') as Arrival_Time
               from train_router_time tr,station s where tr.Trian_Id = '{$train}' and tr.Station_Id = s.S_ID";

        $Station_Db = new \Think\Model();
        $result = $Station_Db->query($sql);
        $res = array();
        if (count($result) > 0) {
            $res['result'] = true;
            $count = 0;
            $stations = array();
            foreach ($result as $ary) {
                if ($ary['pre_station'] == null)
                    $ary['pre_station'] = 0;
                $stations[$ary['pre_station']] = $ary;
                $count++;
            }

            $res['station_size'] = $count;
            $res['stations'] = $stations;
        } else {
            $res['result'] = false;
        }

        echo json_encode($res);

        // echo json_encode($result);
    }

	function sprintWeathInfomation($city)
    {
        $url = "http://api.map.baidu.com/telematics/v3/weather?location={$city}&output=json&ak=UznYFffrtQOZQ8xNFdotzWUG";

        $content = file_get_contents($url);

        $result = json_decode($content);
        $weather = array();
        $array = ($result->results[0]->weather_data[0]);
        $array = (array)$array;
        $weather['weather'] = $array['weather'];
        $weather['wind'] = $array['wind'];
        $weather['temperature'] = $array['temperature'];
        $weather ['date'] = $array['date'];
        return ($weather);
    }

	public function currentCityInfo()
    {
        $station = I('get.station');

        $sql = "select sd.station_id , sd.img_url,s.S_Name ,sd.description from station_describe sd,station s where sd.Station_Id = '{$station}' AND  s.S_ID = sd.Station_Id";
        $Station_Db = new \Think\Model();
        $result = $Station_Db->query($sql);

        $res = array();
        $info= array();

        if (count($result) > 0) {
            $res['result'] = true;
            $info ['city'] = $result[0];
            $city = $result[0]['s_name'];
            $info['weather_info'] = MobileController::sprintWeathInfomation($city);
            $res['info'] =   $info;
        } else {
            $res['result'] = false;
        }

        echo json_encode($res);

    }

	public function StationAllIntroduce(){
    $station = 13;
    /*$station = I('get.station');*/
    /*
    *周围景点展示
     */

    $where_sta = 'S_ID ='.$station;
    $station_db = M('station');
    $result_sta = $station_db->where($where)->select();
    if($result_sta==null)
    	$this->error('站点编号出错');
    $cas_result['station_name'] = $result_sta[0]['s_name'];
    $cas_result['station_province'] = $result_sta[0]['s_province'];

    $where_des = 'station_id ='.$station;
    $station_des = M('station_describe');
    $result_des = $station_des->where($where)->select();
    $cas_result['station_des'] = $result_des[0]['description'];
    $cas_result['station_img'] = $result_des[0]['img_url'];

    $ss = M('station_scenic');
    $where = 'Station_ID ='.$station;
    $result = $ss->where($where)->select();
    $scenic = M('scenic');
    for ($i=0; $i<count($result) ; $i++) {
        $where_sce = 'SCE_ID ='.$result[$i]['scenic_id'];
        $result_sce = $scenic->where($where_sce)->select(); 
        $end_result[$i] = $result_sce[0];
        # code...
    }
    $this->assign('station',$cas_result);
    $this->assign('views',$end_result);
    $this->display();
}

}