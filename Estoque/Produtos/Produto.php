<?php
namespace Estoque\Produtos;
use Illuminate\Support\Facades\DB;

Class Produto{
    public function listar(){
        return db::select('SELECT * FROM produtos');
    }
    public function findById($id){
        return db::select('SELECT * FROM produtos WHERE id_produto = :id',[
            'id' => $id
        ]);
    }


}
