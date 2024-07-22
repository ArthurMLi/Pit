<?php
public class inserirNoBanco{
    $c = new Conta();
    c::setName("João"); //aqui se pegaria o dado da view

    //aqui vai chamar o metodo de rodar a inserção no banco
    $daoConta = new ContaDAO();
    ContaDAO::insertConta($this->c);
}

?>