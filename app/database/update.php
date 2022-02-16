<?php

    /** 
     * @author Maciel G S J
     * 
     * @param string $table Tabela de onde os dados serão alterados
     * @param string $value Valor a ser comparado para filtro
     * @param array $values Novos valores a serem salvos
     * @param string $field Campo usado para comparação de filtro
     * @param array $fields Campos a terem seus valores atualizados
     * 
     * @return bool Se foi possível alterar os campos
     */


    function update ($table, $value, $values, $field, $fields) {
        $connection = connect();

        $sql = "UPDATE $table SET ";

        foreach ($fields as $index => $itt) {

            $sql .= "$itt = ?";
            
            if ($index >= sizeof($fields)) {

                $sql .= ", ";
            } else {
                $sql .= " ";
            }
        }

        $sql .= "WHERE $field = $value;";

        $prepare = $connection->prepare($sql);
        return $prepare->execute($values);
    }


?>