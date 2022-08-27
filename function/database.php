<?php
namespace sw\function;

class database {

    //ดึงข้อไปแสดงที่เว็ปอาหาร
    public function foodData($id){
        $connect = new \mysqli("127.0.0.1", "root", "123", "test_work");
        $sql = $connect->query("SELECT * From food where id=".$id);
        $data = $sql->fetch_assoc();

        return $data;
    }

    public function foodtypeAll(){

        $connect = new \mysqli("127.0.0.1", "root", "123", "test_work");
        $sql = $connect->query("SELECT type_food From food");
        $data = $sql->fetch_all();

        return $data;
    }

    public function vote($id, $point){

        $connect = new \mysqli("127.0.0.1", "root", "123", "test_work");
        $connect->query("UPDATE food SET vote_point=vote_point+$point , num_of_vote=num_of_vote+1 where id=$id");

        return true;
    }

    public function foodDataAll($type){

        if($type == "all"){
            $connect = new \mysqli("127.0.0.1", "root", "123", "test_work");
            $sql = $connect->query("SELECT * From food");
            $data = $sql->fetch_all();

            return $data;
        }else{
            $connect = new \mysqli("127.0.0.1", "root", "123", "test_work");
            $sql = $connect->query("SELECT * From food where type_food='".$type."'");
            $data = $sql->fetch_all();

            return $data;
        }
    }

    //ดึงภาพไปแสดงในหน้าหลัก
    public function ImageSlide (){
        $array_data = [];

        $connect = new \mysqli("127.0.0.1", "root", "123", "test_work");
        $sql = $connect->query("SELECT * From food");
        $data = $sql->fetch_all();

        $i = 0;
        foreach($data as $item){
            $array_data[$i]["image"] = $item[3];

            $i += 1;
        }

        return $array_data;
    }

    public function Getpublish (){

        $array_data = [];

        $connect = new \mysqli("127.0.0.1", "root", "123", "test_work");
        $sql = $connect->query("SELECT * From publish");
        $data = $sql->fetch_all();

        $i = 0;
        foreach($data as $item){
            $array_data[$i]["id"] = $item[0];
            $array_data[$i]["reason"] = $item[1];
            $array_data[$i]["date"] = $item[2];

            $i += 1;
        }

        return $array_data;

    }
}
?>