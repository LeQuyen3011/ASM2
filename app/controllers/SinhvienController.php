<?php
namespace App\Controllers;

use App\Models\Sinhvien;

class SinhvienController extends BaseController{
    protected $student;

    public function __construct()
    {
        $this->student = new Sinhvien();
    }

    public function getStudent() {
        $students = $this->student->getListStudent();
        return $this->render('student.index', compact('students'));
    }

    public function addStudent() { // Đảm bảo tên phương thức đúng
       return $this->render('student.create');
    }
    public function store() { // Đảm bảo tên phương thức đúng
        $data=[
            'name'=>$_POST['name'],
            'year_of_birth'=>$_POST['year_of_birth'],
            'phone_number'=>$_POST['phone_number'],
        ];
        $errors=[];
        if($data['name']==""){
            $errors[]="không được bỏ trống name";
        }
        if($data['year_of_birth']==""){
            $errors[]="không được bỏ trống năm sinh";
        }
        if($data['phone_number']==""){
            $errors[]="không được bỏ trống số điện thoại";
        }
        if(count($errors)>0){
            redirect('errors',$errors,'add');
        }else{
            $this->student->add($data);
            redirect('success',"Thêm mới thành công",'add');
        }
    }
    public function destroy($id){
        $result= $this->student->delete($id);
        $result ? redirect('success','Xóa thành công') : redirect('errors','Xóa không thành công');
        
    }
    public function edit($id){
        $student =$this->student->detail($id);
        // print_r($student);
        return $this->render('student.edit',compact('student'));
    }
    public function update($id)
{
    $data = [
        'name' => $_POST['name'],
        'year_of_birth' => $_POST['year_of_birth'],
        'phone_number' => $_POST['phone_number'],
    ];
    $errors = [];
    if ($data['name'] == "") {
        $errors[] = "không được bỏ trống name";
    }
    if ($data['year_of_birth'] == "") {
        $errors[] = "không được bỏ trống năm sinh";
    }
    if ($data['phone_number'] == "") {
        $errors[] = "không được bỏ trống số điện thoại";
    }
    if (count($errors) > 0) {
        redirect('errors', $errors, 'edit/' . $id);
    } else {
        $this->student->editSV($id, $data);
        redirect('success', "Cập nhật thành công");
    }
}

}
?>

