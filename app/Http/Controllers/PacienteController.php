<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\paciente;
use App\Models\LaraFpdf;
use App\Models\despacho_canal;
use App\Models\despacho_canalS;
use Carbon\Carbon;
use DateTime;

class PacienteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */



    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $listapac= DB::select(DB::raw('SELECT idPaciente,Nombrepaciente,Cedula,Telefono,Direccion FROM paciente'));
         return view('pages.listapacientes')->with('listapacientes',$listapac)->with('cantidad',$listapac);
       // return view('dashboard');
    }

    public function registrarpaciente(Request $request)
    {

        $nombrepaciente=$request->input('nombrepaciente');
        $cedula=$request->input('cedula');
        $estado=$request->input('estado');
        $direccion=$request->input('direccion');
        $telefono=$request->input('telefono');
        $ciudad=$request->input('ciudad');
        $eps=$request->input('eps');
        $serviciofunebre=$request->input('serviciofunebre');
        $datetimepicker1=$request->input('datetimepicker1');

    $registrarpacientes=DB::insert(DB::raw("Insert into paciente (Nombrepaciente,Cedula,Telefono,Direccion,Fechanacimiento,Serviciofunebre,Eps,estado) values ('$nombrepaciente','$cedula','$telefono','$direccion','$datetimepicker1','$serviciofunebre','$eps','$estado')"));
    $resultado="Guardo";


return $resultado;
       
    }










    public function listapacientes()
    {
        $listapac= DB::select(DB::raw('SELECT idPaciente,Nombrepaciente,Cedula,Telefono,Direccion FROM paciente'));
        return view('pages.listapacientes')->with('listapacientes',$listapac)->with('cantidad',$listapac);
      // return view('dashboard');
    }

    public function acudientes()
    {
       $acudientes= DB::select(DB::raw("SELECT * FROM acudiente"));
        return view('pages.listaacudientes')->with('acudientes',$acudientes);
    }

    public function crearpaciente()
    {
       //$listaconductor= DB::select(DB::raw("SELECT * FROM Conductores"));
        return view('pages.crearpaciente');
 
    }

    public function Gconductores(Request $request)
    {
   
        $Cedulaconductor=$request->input('CCconductor');
        $nombreconductor=$request->input('nombreconductor');
        $placas=$request->input('Pconductor');


$existe= DB::select(DB::raw("SELECT * FROM Conductores where ConductorId='$Cedulaconductor'"));


$resultado="";
if(count($existe)!=0){
    $resultado='Noguardo';

}else{
    $guardardatoconductor=DB::insert(DB::raw("Insert into Conductores (ConductorId,Descripcion,Placa,Estado,FecRegistro,FecRegistroMod,Tipo) values ('$Cedulaconductor','$nombreconductor','$placas','1',GetDate(),GetDate(),'2')"));
    $resultado='Guardo';
}

return $resultado;
       
    }


    public function autorizardespachoturbo(Request $request)
    {
        $iddespacho=$request->input('iddespacho');

 
        $updateconductor=DB::update(DB::raw("UPDATE Despacho SET Estado='1' where Id_despacho='$iddespacho'"));
           
            $guardo="Guardo";
        return $guardo ;
    }
   
    

    public function eliminarcanal(Request $request)
    {

        $codigo=$request->input('id_despacho_canal');
   
        $deleted = DB::delete("delete from Despacho_canal where Id_despacho_canal='$codigo'");

       //print_r($usuarios);
        return $deleted;
       
    }


    public function detalledespachocanal($codigo)
    {
   
       $listadespachodetalle= DB::select(DB::raw("SELECT * FROM Despacho_canal as despa inner join Despacho on Despacho.Id_despacho=despa.despacho_Id where despa.despacho_Id='$codigo'"));

       //print_r($usuarios);
        return view('pages.listadespachosdetalle')->with('listadespachodetalle',$listadespachodetalle);
       
    }
    
    //Esta funcion se encarga de guardar las canales en las diferentes tablas

    public function guardarcanales(Request $request)
    {

        $Dconductor=$request->input('Dconductor');
        $CCconductor=$request->input('CCconductor');
        $idcanales=$request->input('idcanal');
        $permisosalida=$request->input('permisosalida');
        $nombreconductor=$request->input('nombreconductor');
        $placa=$request->input('placa');
        $Rmotivo=$request->input('motivo');
        $SC1=0;
        $SC2=0;
        $Validacreaciondespacho="";


        if($Dconductor=="9999"){

            $Validacreaciondespacho= DB::select(DB::raw("SELECT * FROM Despacho as despac where despac.Conductor_id='$CCconductor' and despac.Estado='0'"));

            $existedespacho="";

            if(empty($Validacreaciondespacho)){

                $id = DB::table('Despacho')->insertGetId(["Conductor_id"=>$Dconductor,"Estado"=>'0']); 
                $existedespacho="N";
            }else{


                foreach ($Validacreaciondespacho as $key => $selecdesp) {

                    $id=$selecdesp->Id_despacho;
    
                }


                $existedespacho="S";
            }
           

            $Validarexisteconductor= DB::select(DB::raw("SELECT * FROM Conductores as cond where cond.Conductor_id='$CCconductor' and cond.Placa='$placa'"));

            if(empty($Validarexisteconductor)){

                $insertdatoconductor=DB::insert(DB::raw("Insert into Conductores (ConductorId,Descripcion,Placa,Estado,FecRegistro,FecRegistroMod,Tipo) values ('$CCconductor','$nombreconductor','$placa','1',GetDate(),GetDate(),'2')"));

                $existeconductor="N";
            }else{

                $updateconductor=DB::update(DB::raw("UPDATE Conductores SET Placa='$placa' where ConductorId='$CCconductor'"));
           
                $existeconductor="S";

            }

            $fecha=Carbon::now()->format('Ymd');

            $idasignado=$id.$fecha.$idcanales;

            $VALORSC=substr($idcanales,1,2);

            $animalllave=substr($idcanales,3);
             
        if($VALORSC==1){
            $SC1=1;
        }else{
            $SC2=1;
        }


        $selecciondespachocanal= DB::select(DB::raw("SELECT * FROM Despacho_canal as despac_canal where despac_canal.AnimalLlaveC='$idcanales'"));
        $insertardespachocanal ="";
        $resultado=0;
        if(empty($selecciondespachocanal)){

        $insertardespachocanal = DB::table('Despacho_canal')->insertGetId(["Id_despacho_canal"=>$idasignado,"despacho_Id"=>$id,"AnimalLlave"=>$animalllave,"AnimalLlaveC"=>$idcanales,"SC1"=>$SC1,"SC2"=>$SC2,"CSolicitada"=>$permisosalida]); 
        $resultado=$insertardespachocanal;
        if($permisosalida==1){

            $motivo=$Rmotivo;

            $idcanalpermiso = DB::table('despacho_canalS')->insertGetId(["Despacho_canal_Id"=>$idasignado,"Usuario_Id"=>Auth::id(),"Motivo"=>$motivo]); 
          
        }
        $varables="";



        }else{
            $resultado=0; 

        }


          

            return $resultado;


        }else{

        
            $Validacreaciondedespacho= DB::select(DB::raw("SELECT * FROM Despacho as despac where despac.Conductor_id='$Dconductor' and despac.Estado='0'"));

            $seleccionexistecanal= DB::select(DB::raw("SELECT * FROM Despacho_canal as despac_canal where despac_canal.AnimalLlaveC='$idcanales'"));

            if(empty($Validacreaciondedespacho) && empty($seleccionexistecanal)){



                $id = DB::table('Despacho')->insertGetId(["Conductor_id"=>$Dconductor,"Estado"=>'0']); 
                $updateconductor=DB::update(DB::raw("UPDATE Conductores SET Placa='$placa' where ConductorId='$Dconductor'"));
           
                $existedespacho="N";

            }else{

                foreach ($Validacreaciondedespacho as $key => $selecdesp) {

                    $id=$selecdesp->Id_despacho;
    
                }
                $updateconductor=DB::update(DB::raw("UPDATE Conductores SET Placa='$placa' where ConductorId='$Dconductor'"));
           

                $existedespacho="S";
            }


            $fecha=Carbon::now()->format('Ymd');

            $idasignado=$id.$fecha.$idcanales;

            $VALORSC=substr($idcanales,1,2);

            $animalllave=substr($idcanales,3);
            


        if($VALORSC==1){
            $SC1=1;
        }else{
            $SC2=1;
        }
            

        $selecciondespachocanal= DB::select(DB::raw("SELECT * FROM Despacho_canal as despac_canal where despac_canal.AnimalLlaveC='$idcanales'"));

        $resultado=0;
        if(empty($selecciondespachocanal)){

  $resultado=2;
        $idcanal = DB::table('Despacho_canal')->insertGetId(["Id_despacho_canal"=>$idasignado,"despacho_Id"=>$id,"AnimalLlave"=>$animalllave,"AnimalLlaveC"=>$idcanales,"SC1"=>$SC1,"SC2"=>$SC2,"CSolicitada"=>$permisosalida]); 
   
        if($permisosalida==1){

            $motivo=$Rmotivo;

            $idcanalpermiso = DB::table('despacho_canalS')->insertGetId(["Despacho_canal_Id"=>$idasignado,"Usuario_Id"=>Auth::id(),"Motivo"=>$motivo]); 
          
        }


        }else{
            $resultado=0;
        }


      

        return  $resultado;

        }

       


    }


 


    public function permisosalida(Request $request)
    {

        $email=$request->input("emaildato");
        $pass=Hash::make(trim($request->input("passdato"),""));

       $respuestasolicitud= DB::select(DB::raw("SELECT password FROM [dbo].users where (Idperfil='1' OR Idperfil='2') and email='$email'"));
        
       $retornar="No es la misma";
       if(!empty($respuestasolicitud)){
        if(password_verify($request->input("passdato"),$respuestasolicitud[0]->password))
         {
            $retornar="Es la misma";
        }

       }

        return $retornar;
       
    }

    public function verificarganado(Request $request)
    {
       
        $resultado=$request->all(); 
        $Qr=$request->input("qr");
    

         $qrresultado= DB::select(DB::raw("SELECT *
       FROM [dbo].SolicitudD where AnimalLlave='$Qr' and FechaSolcitud=convert(varchar, getdate(), 112)"));
  
       return $qrresultado;
       
    }


    public function datoscliente($codigonit){
      
        $datousuario = DB::table('ClientesIns') ->where('Nit',$codigonit)->get();

        return view('pages.datos_cliente')->with('datosusuario',$datousuario);
    }
    
    public function carteracliente($codigonit){
        $datousuariocartera = DB::table('ClientesIns_CAR') ->where('Nit',$codigonit)->get();
       

        return view('pages.cartera_cliente')->with('carteraclientes',$datousuariocartera);

    }



}