<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\DeptModel;
use Illuminate\Http\Request;

class DeptController extends Controller
{
    // méthode permettant d'afficher le détail du département d'id n
    public function display($id)
    {
        $deptModel = new DeptModel();
        $dept = $deptModel->get($id);
        if ($dept != null) {
            return view('dept',['departement'=>$dept]);
        }
        else {
            return view('deptnontrouve');
        }
    }

    // méthode permattant d'afficher tous les départements
    public function displayAll()
    {
        // dd(auth()->user());
        $deptModel = new DeptModel();
        $depts = $deptModel->getAll();
        return view('depts',['departements'=>$depts]);
    }

    // méthode retournant la vue contenant le formulaire de création de département
    public function create()
    {
        return view('deptform');
    }

    // méthode permettant d'enregistrer un nouveau département dans la BDD
    public function store(Request $request)
    {
        $this->validate($request,[
            'deptno' => 'required|numeric',
            'dname' => 'required|string|min:3|max:50',
            'loc' => 'required|string|min:3|max:50'
        ]);
        $deptno = $request->input('deptno');
        $dname = $request->input('dname');
        $loc = $request->input('loc');
        //instantiation du model
        $deptModel = new DeptModel();
        //demande au model d'insertion d'un nouveau département en BDD
        $res = $deptModel->store($deptno, $dname, $loc);
        if (!$res) {
            return view('deptform',['errorMessage' => "Erreur : le département n'a pas pu être créé."]);
        } else {
            return redirect()->route('dept.detail',['id'=>$deptno])->withSuccess('Département crée');
        }

    }

    // méthode retournant le formulaire de mise à jour du département demandé 
    public function modify($id)
    {
        $deptModel = new DeptModel();
        $dept = $deptModel->get($id);
        if ($dept != null) {
            return view('modifydept',['dept'=>$dept]);
        }
        else {
            return view('deptnontrouve');
        }
    }

    // méthode permettant de mettre à jour un département
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'dname' => 'required|string|min:3|max:50',
            'loc' => 'required|string|min:3|max:50'
        ]);
        $deptModel = new DeptModel();
        $res = $deptModel->updateDept($id,$request->input('dname'),$request->input('loc'));
        if ($res == 0) {
            return view('modifydept',['errorMessage' => "Erreur : le département n'a pas pu être modifié."]);
        } else {
            return redirect()->route('dept.detail',['id'=>$id])->withSuccess('Département modifié');
        }
    }

    public function delete(Request $request)
    {
        $deptModel = new DeptModel();
        $res =$deptModel->deleteDept($request->input('id'));
        if ($res == 0) {
            return redirect()->back()->withError('Le département n\'a pas pu être supprimé');
        } else {
            dd('test');
            redirect()->route('dept.displayAll')->withSuccess('Département bien supprimé');
        }
    }
}
