<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DeptModel extends Model
{
    use HasFactory;

    public function getAll()
    {
        return DB::select("select * from DEPT");
    }

    public function get($n)
    {
        return DB::selectOne('select * from DEPT where DEPTNO = ?;', [$n]);
    }

    public function store($deptno, $dname, $loc)
    {
        try {
            DB::insert('insert into DEPT(DEPTNO,DNAME,LOC) VALUES(?,?,?);', [$deptno, $dname, $loc]);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public function updateDept($deptno, $dname, $loc)
    {
        return DB::update('update DEPT SET DNAME=?, LOC=? WHERE DEPTNO=?;', [$dname, $loc, $deptno]);
    }

    public function deleteDept($id)
    {
        return DB::delete('delete from DEPT where DEPTNO=?;',[$id]);
    }
}