<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Productos;
use Illuminate\Support\Facades\Input;
use DB;
use Excel;

class ExcelController extends Controller
{
    public function importar(){
    	
    	Excel::load(Input::file('csv'),function($reader){
			$reader->each(function($sheet){
				Productos::firstOrCreate($sheet->toArray());
			});
		});
		return redirect('consultaProductos');
    }

    public function exportar(){
    	$productos=Productos::all();
    	Excel::create('Productos',function($excel) use($productos){
			$excel->sheet('Sheet 1',function($sheet) use($productos){
				$sheet->fromArray($productos);
			});
		})->export('xlsx');
		return redirect('consultaProductos');
    }
}
