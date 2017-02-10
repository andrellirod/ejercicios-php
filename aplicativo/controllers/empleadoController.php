<?php

/*
 * Hecho por Andre Hurtado Llirod
 */

require './models/empleado.php';

class EmpleadoController {

    private $obj_json;

    function __construct() {
        $this->obj_json = file_get_contents("data/employees.json");
    }

    public function listarTodos() {
        $arr_json = json_decode($this->obj_json, true);
        $arr_emp = Array();
        for ($i = 0; $i < count($arr_json); $i++) {
            $emp = new EmpleadoModel();
            $emp_json = $arr_json[$i];
            $emp->id = $emp_json['id'];
            $emp->name = $emp_json['name'];
            $emp->email = $emp_json['email'];
            $emp->position = $emp_json['position'];            
            $emp->salary = $emp_json['salary'];
            array_push($arr_emp, $emp);
        }
        return $arr_emp;
    }

    public function buscarId($id) {
        $arr_json = json_decode($this->obj_json, true);
        $i = array_search($id, array_column($arr_json, 'id'));        
        if (is_bool($i)) {
            return null;
        } else {
            $emp = new EmpleadoModel();
            $emp_json = $arr_json[$i];
            $emp->id = $emp_json['id'];
            $emp->name = $emp_json['name'];
            $emp->email = $emp_json['email'];
            $emp->position = $emp_json['position'];
            $emp->salary = $emp_json['salary'];
            $emp->address = $emp_json['address'];
            $emp->skills = $emp_json['skills'];
            $emp->phone = $emp_json['phone'];
            return $emp;
        }
    }

    public function buscarEmail($email) {
        if ($email == '') {
            return $this->listarTodos();
        }
        $arr_json = json_decode($this->obj_json, true);
        $i = array_search($email, array_column($arr_json, 'email'));
        $arr_emp = Array();
        if (is_bool($i)) {
            return null;
        } else {            
            $emp = new EmpleadoModel();
            $emp_json = $arr_json[$i];
            $emp->id = $emp_json['id'];
            $emp->name = $emp_json['name'];
            $emp->email = $emp_json['email'];
            $emp->position = $emp_json['position'];
            $emp->salary = $emp_json['salary'];
            array_push($arr_emp, $emp);
            return $arr_emp;
        }
    }

    public function buscarSalario($min, $max) {
        $arr_json = json_decode($this->obj_json, true);
        $arr_emp = Array();
        $min = str_replace(',', '', $min);
        $max = str_replace(',', '', $max);
        for ($i = 0; $i < count($arr_json); $i++) {
            $salario = $arr_json[$i]['salary'];
            $salario = str_replace('$', '', $salario);
            $salario = str_replace(',', '', $salario);
            if ($salario >= $min && $salario <= $max) {
                array_push($arr_emp, $arr_json[$i]);
            }
        }
        return $arr_emp;
    }

}
