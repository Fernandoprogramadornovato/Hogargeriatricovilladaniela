<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\Animales;
use App\Models\Cavas;
use App\Models\AnimalCava;

class CavasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $fecha='20200403';
        $animales=DB::select(DB::raw("SELECT Animales.cava,
        INVENTARIO.animalcodigo, INVENTARIO.animalllave,
        ANIMALES.ANIMALSEXO,   
        sum(c1cantidad) C1,  sum(c2cantidad) C2,    
        ANIMALES.PESOVIVO, ANIMALES.C1PESO, ANIMALES.C2PESO, ANIMALES.RENDIMIENTO 
        FROM INVENTARIO  JOIN  ANIMALES ON ANIMALES.ANIMALLLAVE = INVENTARIO.ANIMALLLAVE  
         JOIN terceros ON terceros.terceroid = animales.TerceroSacrificio  
         WHERE   INVENTARIO.Fecha <= '20200403'
        GROUP BY  INVENTARIO.animalcodigo, INVENTARIO.animalllave,  
        ANIMALES.ANIMALSEXO,ANIMALES.PESOVIVO, 
        C1PESO, C2PESO,   ANIMALES.RENDIMIENTO ,
        Animales.Lote    ,animales.cava
        HAVING  sum(c1cantidad+c2cantidad) <>  0"));
        //->join('AnimalEspecie','AnimalEspecie.AnimalEspecie','=','Animales.AnimalEspecie')
        //->join('Inventario','Inventario.AnimalLlave','=','Animales.AnimalLlave')
        //->select('Animales.*','AnimalEspecie.Descripcion')
        //->take(100)->get();
        return view('Cavas.cavas')->with('Animales',$animales);
    }

    public function inicio()
    {
        $cavas=DB::select(DB::raw('SELECT * FROM Cavas'));
        return view('Cavas.qr-cavas')->with('Cavas',$cavas);
    }

    //Esta funcion se encarga de guardar las canales en las diferentes tablas

    public function guardarcavas(Request $request){

       

        $Ccava=$request->input('Ccava');
        var_dump("entro algo");
        $Canales=$request->input('Canales');

    
        foreach ($Canales as $key => $canal) {
      
        $codigoqr=$canal[0];
        $llaveanimal=$canal[1];
        $canimal=$canal[2];
        $eanimal=$canal[3];
    
        $id = DB::table('AnimalesCava')->insertGetId(["AnimalLlave"=>$llaveanimal,"AnimalLlaveC"=>$canimal,"Cava"=>$Ccava,"Usuario"=>Auth::id()]); 

    print_r($id);
            
        }

        $updatecava=DB::update(DB::raw("UPDATE Animales SET Cava='$Ccava' where AnimalLlave='$llaveanimal'"));

        $valor="Salio";

        return $valor;
       

    }

    public function verificarcava(Request $request)
    {
       
        $resultado=$request->all(); 
        $Qr=$request->input("qr");
      
  
    

        

        $qrresultado= DB::select(DB::raw("SELECT AnimalEspecie.Descripcion,Animales.*
        FROM Animales inner join AnimalEspecie on AnimalEspecie.AnimalEspecie=Animales.AnimalEspecie
         where  AnimalLlave='$Qr'"));



       

       return $qrresultado;
       
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
