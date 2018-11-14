<?php

/*

Uma boa prática para criação de funções no wordpress, visando que não ocorra conflitos
com possíveis nomes iguais de funções existentes em plugins e outras áreas do sistema,
é utilizar a primeira letra do nome do criador da função, seguida da primeira letra do 
nome do tema mais um _, depois o nome da função

*/

function sp_fim(){
	echo "Função de fim de script";
}
