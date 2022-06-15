<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

global $alunos;
       
    $alunos = array(
        1 => array(
            "nome" => "Ana",
            "nota" => 9
        ),
        2 => array(
            "nome" => "Bruno",
            "nota" => 2
        ),
        3 => array(
            "nome" => "Carol",
            "nota" => 8
        ),
        4 => array(
            "nome" => "Danilo",
            "nota" => 6
        ),
        5 => array(
            "nome" => "Ellen",
            "nota" => 4
        )
    );


Route::get('/', function () {
    // return view('welcome');
    return "<h1>Rota Principal</h2>";
})->name('Principal');

//  Criando Novas Rotas
Route::get('/alunos', function() {

    $alunos = "<ul>
        <li>1- Ana</li>
        <li>2- Bruno</li>
        <li>3- Carol</li>
        <li>4- Danilo</li>
        <li>5- Ellen</li>
    </ul>";

    return $alunos;


})->name('alunos');

// Parâmetros de Rotas - Obrigatórios
Route::get('/alunos/limite/{limite}', function($total) {

    $dados = array(
        "Ana",
        "Bruno",
        "Carol",
        "Danilo",
        "Ellen"
    );

    $alunos = "<ul>";

    if($total <= count($dados)) {
        $cont = 0;
        foreach($dados as $nome) {
            $alunos .= "<li>$nome</li>";
            $cont++;
            if($cont >= $total) break;
        }
    }
   

    $alunos .= "</ul>";

    return $alunos;
})->name('alunos.limite')->where('total', '[0-9]+');

Route::get('/alunos/matricula/{matricula}', function($total) {

    $dados = array(
        "1- Ana",
        "2- Bruno",
        "3- Carol",
        "4- Danilo",
        "5- Ellen"
    );

    $alunos = "<ul>";
   
   
    if($total <= count($dados)) {
        $cont = 0;
       
        foreach($dados as $nome) {
            $cont++;
            if($cont == $total){
            $alunos .= "<li>$nome</li>";
            break;
            }
        }
    }
   

    $alunos .= "</ul>";

    return $alunos;

})->name('alunos.matricula')->where('total', '[0-9]+');




// Parâmetros de Rotas - Obrigatórios
Route::get('/alunos/nome/{nome}', function( $nome) {

    $alunos = "<ul>";

  
        $alunos .= "<li>$nome</li>";
    

    $alunos .= "</ul>";

    return $alunos;
})->name('alunos.nome');

