<?php

/**
 * NFS-e (Nota Fiscal Eletronica de Serviço)
 * Exemplo usando a classe NFSePHP.class.php
 * @author Bruno PorKaria <bruno at porkaria dot com dot br> 
*/

require_once "../libs/NFSePHP_SE.class.php";

$nfse = new NFSeSE(false,1,false);

$itens = array( 1 =>
	array(
	'valor' => '10.00',
	'valorDeducoes' => '0.00',
	'valorPis' => '0.00',
	'valorCofins' => '0.00',
	'valorIr' => '0.00',
	'valorCsll' => '0.00',
	'issRetido' => 2,
	'valorIss' =>  '0.00',
	'valorIssRetido' => '0.00',
	'outrasRetencoes' => '0.00',
	'baseCalculo' => '0.00',
	'aliquota' => 0,
	'valorLiquidoNfse' => '10.00',
	'descontoIncondicionado' => '0.00',
	'descontoCondicionado' => '0.00',
	'itemListaServico' => '0.00',
	'codigoCnae' => '5822100',
	'discriminacao' => 'Testando a Nota via sistem')
);

$nfse->setItens($itens);

$xml = $nfse->buildNFSe();

if ($xml) {
	
	if ($nfse->valida($nfse->nfsexml)) {

		$enviar = $nfse->enviaNFSe($nfse->nfsexml,$nfse->numNFSe);

		// // para ver o xml na tela
		// header ("Content-Type:text/xml");
		// echo $nfse->nfsexml;	
		// die;

		echo '<br /> Debug SOAP: <br/ >';
		var_dump($nfse->soapDebug);

		echo 'Debug ErrMsg: <br />';
		var_dump($nfse->errMsg);
			
	}
	
}



?>