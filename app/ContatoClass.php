<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContatoClass extends Model
{
    public function ListarContatos() {

        $query = "SELECT 
                        id, 
                        nome_completo, 
                        telefone_residencial, 
                        telefone_celular, 
                        email, 
                        created_at, 
                        updated_at
                    FROM 
                        tb_contato";

        $contatos = DB::select($query);

        return $contatos;
    }

    public function InserirContatos($fields) {

        $query = "INSERT INTO 
                            tb_contato
                            (
                                nome_completo, 
                                telefone_residencial, 
                                telefone_celular, 
                                email, 
                                created_at, 
                                updated_at
                            )
                    VALUES
                            (
                                :nome, 
                                :telres, 
                                :telcel, 
                                :email, 
                                NOW(), 
                                NULL
                            )";
        
        $contato = DB::insert($query, $fields);

    }

    public function ListarContatoByID($id) {

        $query = "SELECT
                        id,
                        nome_completo,
                        telefone_residencial,
                        telefone_celular,
                        email
                    FROM
                        tb_contato
                    WHERE
                        id = :id";
        
        $contato = DB::select($query, [':id' => $id]);

        return $contato;
    }

    public function AtualizarContato($fields, $id) {

        $query = "UPDATE 
                        tb_contato
                    SET 
                        nome_completo = :nome, 
                        telefone_residencial = :telres, 
                        telefone_celular = :telcel, 
                        email = :email,
                        updated_at = NOW()
                    WHERE 
                        id = :id";
        
        $contato = DB::update($query, [
                                        ':id' => $id,
                                        ':nome' => $fields['nome'],
                                        ':telres' => $fields['telres'],
                                        ':telcel' => $fields['telcel'],
                                        ':email' => $fields['email']
                                    ]);
    }
}
