<?php
abstract class ClassConexao{

    #Realizará a conexão com o banco de dados
    protected function conectaDB()
    {
        try{
            $Con=new PDO("mysql:host=127.0.0.1:3306;dbname=u707576204_dbcd","u707576204_admin","CDadmin321");
            return $Con;
        }catch (PDOException $Erro){
            return $Erro->getMessage();
        }
    }
}
?>

