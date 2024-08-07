<?php

namespace App\Models;

use App\models\BaseModel;

class Sinhvien extends BaseModel
{
    protected $table = 'sinh_vien';
    public function getListStudent()
    {
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function add($data)
    {
      $name=$data['name'];
      $year_of_birth=$data['year_of_birth'];
      $phone_number=$data['phone_number'];

      $sql="INSERT INTO `$this->table`( `name`, `year_of_birth`, `phone_number`) VALUES (?,?,?)";
      $this->setQuery($sql);
      $data=[$name,$year_of_birth,$phone_number];
      return $this->execute($data);
    }
    public function delete($id)
    {
      $sql="DELETE from $this->table where id=?";
      $this->setQuery($sql);
      return $this->execute([$id]);
    }
    public function detail($id,)
    {
        $sql="SELECT * FROM $this->table where id=?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editSV($id, $data)
    {
        $name = $data['name'];
        $year_of_birth = $data['year_of_birth'];
        $phone_number = $data['phone_number'];
    
        $sql = "UPDATE `$this->table` SET `name` = ?, `year_of_birth` = ?, `phone_number` = ? WHERE id = ?";
        $this->setQuery($sql);
        $data = [$name, $year_of_birth, $phone_number, $id];
        return $this->execute($data);
    }
    
}
