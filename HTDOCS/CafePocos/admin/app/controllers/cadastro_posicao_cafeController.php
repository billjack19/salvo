
<?php 
	require_once "../classe/entidade/Posicao_cafe.php";
	require_once "../classe/dao/posicao_cafeDAO.php";

	$entidadePosicao_cafe = new Posicao_cafe();
	$posicao_cafeDAO = new posicao_cafeDAO();
	

	$cliente = $_POST['cliente'] == '' ? 0 : $_POST['cliente'];
	$entidadePosicao_cafe->set($cliente, 'cliente');

	$entidadePosicao_cafe->set($_POST['fazenda'], 'fazenda');
	$entidadePosicao_cafe->set($_POST['cidade'], 'cidade');
	$entidadePosicao_cafe->set($_POST['insc_est'], 'insc_est');
	$entidadePosicao_cafe->set($_POST['safra'], 'safra');
	$entidadePosicao_cafe->set($_POST['lote'], 'lote');
	$entidadePosicao_cafe->set($_POST['lote_cliente'], 'lote_cliente');
	$entidadePosicao_cafe->set($_POST['entrada'], 'entrada');
	$entidadePosicao_cafe->set($_POST['nfe_fiscal'], 'nfe_fiscal');
	$entidadePosicao_cafe->set($_POST['padrao'], 'padrao');
	$entidadePosicao_cafe->set($_POST['preparo'], 'preparo');

	$kilos = $_POST['kilos'] == '' ? 0 : $_POST['kilos'];
	$entidadePosicao_cafe->set($kilos, 'kilos');


	$sacas = $_POST['sacas'] == '' ? 0 : $_POST['sacas'];
	$entidadePosicao_cafe->set($sacas, 'sacas');


	$per_umi = $_POST['per_umi'] == '' ? 0 : $_POST['per_umi'];
	$entidadePosicao_cafe->set($per_umi, 'per_umi');


	$per_imp = $_POST['per_imp'] == '' ? 0 : $_POST['per_imp'];
	$entidadePosicao_cafe->set($per_imp, 'per_imp');


	$per_cat = $_POST['per_cat'] == '' ? 0 : $_POST['per_cat'];
	$entidadePosicao_cafe->set($per_cat, 'per_cat');


	$per_def = $_POST['per_def'] == '' ? 0 : $_POST['per_def'];
	$entidadePosicao_cafe->set($per_def, 'per_def');

	$entidadePosicao_cafe->set($_POST['cert'], 'cert');
	$entidadePosicao_cafe->set($_POST['data_atualizacao'], 'data_atualizacao');

	$retorno = $posicao_cafeDAO->cadastraPosicao_cafe($entidadePosicao_cafe);
	echo $retorno;
?>
