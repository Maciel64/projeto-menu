<?php

    /** 
     * @author Maciel G S J
     * 
     * @param string $table Tabela de onde os dados serão alterados
     * @param string $valueToCompare Valor a ser comparado para filtro
     * @param string $fieldToBeCompared Campo usado para comparação de filtro
     * @param array $fieldsToChange Campos a terem seus valores atualizados
     * @param array $newValues Novos valores a serem salvos
     * 
     * @return bool Se foi possível alterar os campos
     */


    function update ($table, $valueToCompare, $fieldToBeCompared, $fieldsToChange, $newValues) {
        $connection = connect();

        $sql = "UPDATE $table SET ";

        foreach ($fieldsToChange as $index => $value) {

            $sql .= "$value = ?";
            
            if ($index < sizeof($fieldsToChange) - 1) {

                $sql .= ", ";
            }
        }

        $sql .= " WHERE $fieldToBeCompared = $valueToCompare;";

        $prepare = $connection->prepare($sql);
        var_dump($prepare);
        return $prepare->execute($newValues);
    }


?>