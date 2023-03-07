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

class HomeController extends Controller
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






    public function clientes()
    {
   
       $usuarios= DB::select(DB::raw('SELECT client.*,vend.VendNom FROM ClientesIns as client  inner join Vendedores as vend ON vend.VendId=client.VendId'));

       //print_r($usuarios);
        return view('pages.table_list_cliente')->with('users',$usuarios);
       
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


   public function imprimir($codigodespacho)
   {

    $resultadodespacho= DB::select(DB::raw("SELECT anm.*,despa.AnimalLlaveC,despa.CSolicitada,despa.despacho_Id,despa.Fechadespacho,despa.Id_despacho_canal,despa.SC1,despa.SC2  FROM Despacho_canal as despa inner join Animales as anm ON anm.AnimalLlave=despa.AnimalLlave where despa.despacho_Id='$codigodespacho'"));
    $datosdespacho= DB::select(DB::raw("SELECT desp.Id_despacho,FORMAT (desp.Fecha, 'yyyy-MM-dd HH:mm')  as fechadespacho,cond.* FROM Despacho as desp  inner join Conductores as cond ON cond.ConductorId=desp.Conductor_id where desp.Id_despacho='$codigodespacho'"));
  
    $fpdf= new  \Fpdf('P','mm','Letter');
    $fpdf::AddPage('P','Letter');

    //$fpdf::Image('./material/img/1-11.png',10,1,50,'');

   $fpdf::SetFont('Arial','B',12);
//$fpdf::Cell(120);

  //  $fpdf::Cell(60,10,'SU ALIADO',0,1,'R');
//$fpdf::Ln(-5);
  //  $fpdf::Cell(120);
 //   $fpdf::Cell(60,10,' INTEGRAL DE',0,1,'R');
//$fpdf::Ln(-5);
 //   $fpdf::Cell(120);
  //  $fpdf::Cell(60,10,'  PRINCIPIO A FIN',0,1,'R');
   
  
   
    // Select Arial bold 15
  //  $fpdf::SetFont('Arial','B',10);
    // Move to the right
   // $fpdf::Cell(15);
    // Framed title

  //  $fpdf::Ln(7);
    

   // $fpdf::MultiCell(50,6.7, $fpdf::Image('./material/img/1-11.png',10,1,50,''),1, 'C');
    $fpdf::MultiCell(50,25, $fpdf::Image('./material/img/1-11.png', $fpdf::GetX(), $fpdf::GetY()-6,50),1,'C');
    $fpdf::SetXY(60,10);
    $fpdf::SetFont('Arial','B',12);
    $fpdf::MultiCell(90,6.7,'DESPACHO DE'."\n".'CANALES','LRTB', 'C',0);
    $fpdf::SetFont('Arial','B',10);
    $fpdf::SetXY(150,10);
    $fpdf::MultiCell(55,6.7,'SU ALIADO INTEGRAL DE'."\n".'PRINCIPIO A FIN',1, 'C');
    $fpdf::Ln(0);
    $fpdf::Cell(50);
    $fpdf::SetFont('Arial','',10);
    $fpdf::MultiCell(90,6.7,utf8_decode('FRIGORÍFICO VIJAGUAL S.A.'. "\n".'Nit: 804.002.981-6'."\n". 'PLANTA BUCARAMANGA-SANTANDER'. "\n". ' Km. 8 Vía Rionegro Tel. (57-7)6300177'),'LRTB', 'C',0);
  
    // Line break
    $fpdf::Ln(0);
    $fpdf::Cell(140);
    $fpdf::SetXY(150,23.5);
    $fpdf::SetFont('Arial','B',10);
    foreach ($datosdespacho as $key => $datodespacho) {
    $fpdf::MultiCell(55,5.35,utf8_decode(' '."\n".'Pag 1 de 2 '."\n"."\n".'FECHA Y HORA IMPRESION'."\n".Carbon::now('America/Bogota')),'LRTB', 'C',0);
    }

    $fpdf::SetXY(10,35.2);

    foreach ($datosdespacho as $key => $datodespacho) {
    $fpdf::MultiCell(50,5.0,utf8_decode('Despacho N°:'.$codigodespacho ."\n".'Fecha despacho: '.$datodespacho->fechadespacho),'LRTB', 'C',0);
    }


    // Line break
    $fpdf::Ln(0);
    $fpdf::Cell(40);
    //$fpdf::MultiCell(100,6.7,utf8_decode('FRIGORÍFICO VIJAGUAL S.A.'. "\n".'Nit: 804.002.981-6'."\n". 'PLANTA BUCARAMANGA-SANTANDER'. "\n". ' Km. 8 Vía Rionegro Tel. (57-7)6300177'),'J', 'C',0);
    $fpdf::Ln(5);
  
    $fpdf::Cell(15);

    //$fpdf::MultiCell(160,5,utf8_decode('El _____ de ______ del presente año se despacho desde FRIGORIFICO VIJAGUAL S.A. Planta'. "\n". 'Bucaramanga, con destino ______________ ubicado en XXXXXXXXXXXXXXX'),'J', 'L',0);
   
    $fpdf::Ln(4);
    $fpdf::Cell(10);
    $fpdf::SetFont('Arial','B',10);
    $fpdf::Cell(40,12,'CODIGO ANIMAL',1,0,'C');
    $fpdf::Cell(20,12,'CANAL',1,0,'C');
    $fpdf::Cell(40,12,'LOTE',1,0,'C');
    $fpdf::Cell(40,12,'PUESTO',1,0,'C');
    $fpdf::MultiCell(30,6,'FECHA DE'. "\n". 'VENCIMIENTO','LRTB', 'C',0);
    $fpdf::SetFont('Arial','',8);

    
    if(empty($resultadodespacho)){
        $fpdf::Ln(0);
        $fpdf::Cell(10);
        $fpdf::Cell(150,12,'No tiene productos despachados.',1,0,'C');
    }else{

        foreach ($resultadodespacho as $key => $canal) {

            $animalllave=$canal->AnimalLlave;
            $fechadesp=$canal->Fechadespacho;
            $scanal=$canal->SC1;
            $lote=$canal->Lote;
            $fechavencimiento= DB::select(DB::raw("SELECT TOP 1 FORMAT(DATEADD(day, 7, noq.FechaBeneficio), 'yyyy-MM-dd') as fechavenc,FORMAT(noq.FechaVencimiento,'yyy-MM-dd') as fechavenci,anm.C1Puesto,anm.C2Puesto from Despacho as desp INNER JOIN Despacho_canal as despc ON desp.Id_despacho=despc.despacho_Id
            INNER JOIN Noqueo as noq ON noq.AnimalLlave=despc.AnimalLlave
            INNER JOIN Animales as anm ON anm.AnimalLlave=noq.AnimalLlave where despc.AnimalLlave='$animalllave'"));

            $fpdf::Cell(10);
            $fpdf::SetFont('Arial','',10);
            $fpdf::Cell(40,8,substr($animalllave, 8),1,0,'C');

            if($scanal==1){
                $fpdf::Cell(20,8,'C1',1,0,'C');
            }else{
                $fpdf::Cell(20,8,'C2',1,0,'C');
            }

            $fpdf::Cell(40,8,$lote,1,0,'C');

            if($scanal==1){

                foreach ($fechavencimiento as $key => $fech) {
                    $fpdf::Cell(40,8,$fech->C1Puesto,1,0,'C');
                    }
        

            }else{



                foreach ($fechavencimiento as $key => $fech) {
                    $fpdf::Cell(40,8,$fech->C2Puesto,1,0,'C');
                    }
        



            }

            foreach ($fechavencimiento as $key => $fech) {
            $fpdf::Cell(30,8,$fech->fechavenci,1,0,'C');
            }

            $fpdf::Ln(8);

        }
        $fpdf::Ln(0);
        $fpdf::Cell(16);
        $fpdf::Cell(60,10,'_________________________________',0,1,'R');
        $fpdf::Ln(-1);
        $fpdf::Cell(10);

       
        $fpdf::MultiCell(190,12,utf8_decode('Cantidad Total: '.count($resultadodespacho).' Medias canales '.
    '   Cantidad total de Lenguas ______   Cantidad Total de Vísceras ______'),'J', 'L',0);
   
      
    }



    $fpdf::AddPage('P','Letter');

    $fpdf::MultiCell(50,25, $fpdf::Image('./material/img/1-11.png', $fpdf::GetX(), $fpdf::GetY()-6,50),1,'C');
    $fpdf::SetXY(60,10);
    $fpdf::SetFont('Arial','B',12);
    $fpdf::MultiCell(90,6.7,'DESPACHO DE'."\n".'CANALES','LRTB', 'C',0);
    $fpdf::SetFont('Arial','B',10);
    $fpdf::SetXY(150,10);
    $fpdf::MultiCell(55,6.7,'SU ALIADO INTEGRAL DE'."\n".'PRINCIPIO A FIN',1, 'C');
    $fpdf::Ln(0);
    $fpdf::Cell(50);
    $fpdf::SetFont('Arial','',10);
    $fpdf::MultiCell(90,6.7,utf8_decode('FRIGORÍFICO VIJAGUAL S.A.'. "\n".'Nit: 804.002.981-6'."\n". 'PLANTA BUCARAMANGA-SANTANDER'. "\n". ' Km. 8 Vía Rionegro Tel. (57-7)6300177'),'LRTB', 'C',0);
  
    // Line break
    $fpdf::Ln(0);
    $fpdf::Cell(140);
    $fpdf::SetXY(150,23.5);
    $fpdf::SetFont('Arial','B',10);
    foreach ($datosdespacho as $key => $datodespacho) {
    $fpdf::MultiCell(55,5.35,utf8_decode(' '."\n".'Pag 2 de 2 '."\n"."\n".'FECHA Y HORA IMPRESION'."\n".Carbon::now('America/Bogota')),'LRTB', 'C',0);
    }

    $fpdf::SetXY(10,35.2);

    foreach ($datosdespacho as $key => $datodespacho) {
    $fpdf::MultiCell(50,5.0,utf8_decode('Despacho N°:'.$codigodespacho ."\n".'Fecha despacho: '.$datodespacho->fechadespacho),'LRTB', 'C',0);
    }


    //$fpdf::MultiCell(160,5,utf8_decode('Estas operaciones de producción fueron realizados dentro de los más estrictos controles que exigen'."\n". 
    //'las BPM y el sistema HACCP implementados en nuestra planta, tanto para los procesos y'."\n" . 
    //'operaciones como para el personal operativo, dando cumplimiento a la normatividad sanitaria vigente.'),'J', 'L',0);

   // $fpdf::Ln(7);
  //  $fpdf::Cell(15);

   // $fpdf::MultiCell(160,5,utf8_decode('El producto despachado es de tipo APROBADO y se encuentra bajo condiciones de empaque'."\n". 
   // 'XXXXX a temperatura de XXXXX'),'J', 'L',0);

    $fpdf::Ln(10);
    $fpdf::SetFont('Arial','',10);

    foreach ($datosdespacho as $key => $datodesp) {

        $placa=$datodesp->Placa;
        $nombrecond=$datodesp->Descripcion;
        $cedula=$datodesp->ConductorId;
        $fpdf::Cell(15);
    $fpdf::MultiCell(160,5,utf8_decode('El Vehículo que transporta el producto es el furgon termo de tipo Turbo con placa '. $placa .''."\n". 
    'conducido por el señor '. $nombrecond .' identificado con cedula de ciudadania '.$cedula.' con numero de precinto de seguridad _______________'),'J', 'L',0);


    $fpdf::Ln(2);

    $fpdf::Cell(15);
    $fpdf::MultiCell(160,5,utf8_decode('* Condiciones de Limpieza: C__NC__           * Certificado Transporte de alimentos: C__NC__ '."\n". 
    '* Leyenda Transporte de Alimentos cárnicos: C__NC__       * T° Inicial___ T°Final___'."\n". 
    '* Carnet Manipulador de Alimentos: C__NC__'),'J', 'L',0);

    $fpdf::Ln(3);

    $fpdf::Cell(15);
    $fpdf::MultiCell(160,5,utf8_decode('GARANTÍA DE DESPACHO:'."\n". "\n".'1. Frigorifico Vijagual S.A. respondera por el producto hasta el cargue en el muelle de la planta de Frigorico Vijagual S.A., quedando bajo responsabilidad del Cliente y/o la persona autorizada por escrito para tal efecto, lo que pueda suceder  con este después de la entrega en el muelle. '."\n". 
    '2. Frigorífico Vijagual S.A., pone de manifiesto al Cliente y/o a la persona autorizada por escrito para tal efecto, y al Conductor del Vehículo, que el cargue adicional que se haga excediendo la capacidad del vehículo, se hará bajo la absoluta responsabilidad del Cliente y del Conductor del Vehículo que transportará la carga; de igual forma hacen constar con la suscripción del presente documento, que al momento de colocar los sellos de seguridad al vehículo que transportará la carga, se efectúa en presencia de cada uno de ellos o de las personas autorizadas por escrito para verificar el cargue. '."\n". 
    '3. Frigorífico Vijagual S.A., El Cliente y/o a la persona autorizada por escrito para tal efecto y El Conductor del Vehículo que transportará la carga, hacen constar con la suscripción del presente documento, que las temperaturas y demás características de la carga, descritas en el presente informe, han sido claramente verificadas, revisadas y autorizadas por ellos.'),'J', 'L',0);

    $fpdf::SetFont('Arial','B',10);
    $fpdf::Ln(3);

    $fpdf::Cell(15);
    $fpdf::MultiCell(160,5,utf8_decode('En constancia de lo anterior se firma por las partes que participaron en este proceso: '),'J', 'L',0);
    $fpdf::SetFont('Arial','',10);

    $fpdf::Ln(20);
    $fpdf::Cell(10);
    $fpdf::SetFont('Arial','B',12);
    $fpdf::Cell(40,12,'Cordialmente',0,0,'C');

    $fpdf::Ln(20);
    $fpdf::Cell(20);
    $fpdf::SetFont('Arial','B',10);
    $fpdf::Cell(50,12,'______________________________',0,0,'C');
    $fpdf::Cell(50,12,'',0,0,'C');
    $fpdf::Cell(50,12,'______________________________',0,0,'C');
    $fpdf::Ln(10);
    $fpdf::Cell(20);
    $fpdf::MultiCell(50,4,utf8_decode('    Responsable Despacho'. "\n" .'Frigorífico Vijagual   '),'J','C',0);
    $fpdf::SetXY(130,227);
    $fpdf::MultiCell(50,4,utf8_decode('    TRANSCARNES'. "\n" .'Conductor:'.$nombrecond.' '),'J','C',0);


    }

   


    $nombredocumento="Despacho-".$codigodespacho.".pdf";

    $fpdf::Output('I',$nombredocumento);
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