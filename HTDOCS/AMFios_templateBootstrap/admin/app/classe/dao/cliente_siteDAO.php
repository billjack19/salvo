
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class cliente_siteDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraCliente_site(Cliente_site $entidadeCliente_site, $area){

		// Configuração de notificação
		/* $area = 'cliente_site'; */
		 
		$descricaoNotificacao = 'Nome => '.$entidadeCliente_site->get('nome_cliente_site').'<br>';
		$descricaoNotificacao .= 'Login => '.$entidadeCliente_site->get('login_cliente_site').'<br>';
		$descricaoNotificacao .= 'Senha => '.$entidadeCliente_site->get('senha_cliente_site').'<br>';
		$descricaoNotificacao .= 'Telefone => '.$entidadeCliente_site->get('telefone_cliente_site').'<br>';
		$descricaoNotificacao .= 'Celular => '.$entidadeCliente_site->get('celular_cliente_site').'<br>';
		$descricaoNotificacao .= 'Endereço => '.$entidadeCliente_site->get('endereco_cliente_site').'<br>';
		$descricaoNotificacao .= 'Número => '.$entidadeCliente_site->get('numero_cliente_site').'<br>';
		$descricaoNotificacao .= 'Complemento => '.$entidadeCliente_site->get('complemento_cliente_site').'<br>';
		$descricaoNotificacao .= 'Bairro => '.$entidadeCliente_site->get('bairro_cliente_site').'<br>';
		$descricaoNotificacao .= 'Cidade => '.$entidadeCliente_site->get('cidade_cliente_site').'<br>';
		$descricaoNotificacao .= 'Estado => /%/SELECT * FROM estado WHERE id_estado = '.$entidadeCliente_site->get('estado_id').'/%/<br>';
		$descricaoNotificacao .= 'Cep => '.$entidadeCliente_site->get('cep_cliente_site').'<br>';
		$descricaoBool = $entidadeCliente_site->get('bool_ativo_cliente_site') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':nome_cliente_site'=>$entidadeCliente_site->get('nome_cliente_site'), 
				':login_cliente_site'=>$entidadeCliente_site->get('login_cliente_site'), 
				':senha_cliente_site'=>$entidadeCliente_site->get('senha_cliente_site'), 
				':telefone_cliente_site'=>$entidadeCliente_site->get('telefone_cliente_site'), 
				':celular_cliente_site'=>$entidadeCliente_site->get('celular_cliente_site'), 
				':endereco_cliente_site'=>$entidadeCliente_site->get('endereco_cliente_site'), 
				':numero_cliente_site'=>$entidadeCliente_site->get('numero_cliente_site'), 
				':complemento_cliente_site'=>$entidadeCliente_site->get('complemento_cliente_site'), 
				':bairro_cliente_site'=>$entidadeCliente_site->get('bairro_cliente_site'), 
				':cidade_cliente_site'=>$entidadeCliente_site->get('cidade_cliente_site'), 
				':estado_id'=>$entidadeCliente_site->get('estado_id'), 
				':cep_cliente_site'=>$entidadeCliente_site->get('cep_cliente_site'), 
				':bool_ativo_cliente_site'=>$entidadeCliente_site->get('bool_ativo_cliente_site')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO cliente_site (nome_cliente_site, login_cliente_site, senha_cliente_site, telefone_cliente_site, celular_cliente_site, endereco_cliente_site, numero_cliente_site, complemento_cliente_site, bairro_cliente_site, cidade_cliente_site, estado_id, cep_cliente_site, bool_ativo_cliente_site) VALUES (:nome_cliente_site, :login_cliente_site, PASSWORD(:senha_cliente_site), :telefone_cliente_site, :celular_cliente_site, :endereco_cliente_site, :numero_cliente_site, :complemento_cliente_site, :bairro_cliente_site, :cidade_cliente_site, :estado_id, :cep_cliente_site, :bool_ativo_cliente_site);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Cliente_site ".$ex->getMessage();
		}
	}


	function atualizaCliente_site(Cliente_site $entidadeCliente_site, $id, $area){

		// Configuração de notificação
		/* $area = 'cliente_site'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		 
		$sql = "SELECT * FROM cliente_site WHERE id_cliente_site = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['nome_cliente_site'] != $entidadeCliente_site->get('nome_cliente_site')) {
				$descricaoNotificacao .= '<b style="color: red">Nome: '.$dados['nome_cliente_site'].' => '.$entidadeCliente_site->get('nome_cliente_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Nome => '.$entidadeCliente_site->get('nome_cliente_site').'<br>';
			}
			if ($dados['login_cliente_site'] != $entidadeCliente_site->get('login_cliente_site')) {
				$descricaoNotificacao .= '<b style="color: red">Login: '.$dados['login_cliente_site'].' => '.$entidadeCliente_site->get('login_cliente_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Login => '.$entidadeCliente_site->get('login_cliente_site').'<br>';
			}
			if ($dados['senha_cliente_site'] != $entidadeCliente_site->get('senha_cliente_site')) {
				$descricaoNotificacao .= '<b style="color: red">Senha: '.$dados['senha_cliente_site'].' => '.$entidadeCliente_site->get('senha_cliente_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Senha => '.$entidadeCliente_site->get('senha_cliente_site').'<br>';
			}
			if ($dados['telefone_cliente_site'] != $entidadeCliente_site->get('telefone_cliente_site')) {
				$descricaoNotificacao .= '<b style="color: red">Telefone: '.$dados['telefone_cliente_site'].' => '.$entidadeCliente_site->get('telefone_cliente_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Telefone => '.$entidadeCliente_site->get('telefone_cliente_site').'<br>';
			}
			if ($dados['celular_cliente_site'] != $entidadeCliente_site->get('celular_cliente_site')) {
				$descricaoNotificacao .= '<b style="color: red">Celular: '.$dados['celular_cliente_site'].' => '.$entidadeCliente_site->get('celular_cliente_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Celular => '.$entidadeCliente_site->get('celular_cliente_site').'<br>';
			}
			if ($dados['endereco_cliente_site'] != $entidadeCliente_site->get('endereco_cliente_site')) {
				$descricaoNotificacao .= '<b style="color: red">Endereço: '.$dados['endereco_cliente_site'].' => '.$entidadeCliente_site->get('endereco_cliente_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Endereço => '.$entidadeCliente_site->get('endereco_cliente_site').'<br>';
			}
			if ($dados['numero_cliente_site'] != $entidadeCliente_site->get('numero_cliente_site')) {
				$descricaoNotificacao .= '<b style="color: red">Número: '.$dados['numero_cliente_site'].' => '.$entidadeCliente_site->get('numero_cliente_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Número => '.$entidadeCliente_site->get('numero_cliente_site').'<br>';
			}
			if ($dados['complemento_cliente_site'] != $entidadeCliente_site->get('complemento_cliente_site')) {
				$descricaoNotificacao .= '<b style="color: red">Complemento: '.$dados['complemento_cliente_site'].' => '.$entidadeCliente_site->get('complemento_cliente_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Complemento => '.$entidadeCliente_site->get('complemento_cliente_site').'<br>';
			}
			if ($dados['bairro_cliente_site'] != $entidadeCliente_site->get('bairro_cliente_site')) {
				$descricaoNotificacao .= '<b style="color: red">Bairro: '.$dados['bairro_cliente_site'].' => '.$entidadeCliente_site->get('bairro_cliente_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Bairro => '.$entidadeCliente_site->get('bairro_cliente_site').'<br>';
			}
			if ($dados['cidade_cliente_site'] != $entidadeCliente_site->get('cidade_cliente_site')) {
				$descricaoNotificacao .= '<b style="color: red">Cidade: '.$dados['cidade_cliente_site'].' => '.$entidadeCliente_site->get('cidade_cliente_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Cidade => '.$entidadeCliente_site->get('cidade_cliente_site').'<br>';
			}
			if ($dados['estado_id'] != $entidadeCliente_site->get('estado_id')) {
				$descricaoNotificacao .= '<b style="color: red">Estado: /%/SELECT * FROM estado WHERE id_estado = '.$dados['estado_id'].'/%/ => /%/SELECT * FROM estado WHERE id_estado = '.$entidadeCliente_site->get('estado_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Estado => /%/SELECT * FROM estado WHERE id_estado = '.$entidadeCliente_site->get('estado_id').'/%/<br>';
			}
			if ($dados['cep_cliente_site'] != $entidadeCliente_site->get('cep_cliente_site')) {
				$descricaoNotificacao .= '<b style="color: red">Cep: '.$dados['cep_cliente_site'].' => '.$entidadeCliente_site->get('cep_cliente_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Cep => '.$entidadeCliente_site->get('cep_cliente_site').'<br>';
			}
			if ($dados['bool_ativo_cliente_site'] != $entidadeCliente_site->get('bool_ativo_cliente_site')) {
				$descricaoBool = $entidadeCliente_site->get('bool_ativo_cliente_site') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_cliente_site'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeCliente_site->get('bool_ativo_cliente_site') == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
			}
		}
		$tipo_alteracao_notificacoes = 'u';
		if($descricaoNotificacao != "" && $controleAteracao != 0){
			registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);
		}

		// Tenta atualizar um registro exitente
		try{
			$param = array(
				':nome_cliente_site'=>$entidadeCliente_site->get('nome_cliente_site'), 
				':login_cliente_site'=>$entidadeCliente_site->get('login_cliente_site'), 
				':telefone_cliente_site'=>$entidadeCliente_site->get('telefone_cliente_site'), 
				':celular_cliente_site'=>$entidadeCliente_site->get('celular_cliente_site'), 
				':endereco_cliente_site'=>$entidadeCliente_site->get('endereco_cliente_site'), 
				':numero_cliente_site'=>$entidadeCliente_site->get('numero_cliente_site'), 
				':complemento_cliente_site'=>$entidadeCliente_site->get('complemento_cliente_site'), 
				':bairro_cliente_site'=>$entidadeCliente_site->get('bairro_cliente_site'), 
				':cidade_cliente_site'=>$entidadeCliente_site->get('cidade_cliente_site'), 
				':estado_id'=>$entidadeCliente_site->get('estado_id'), 
				':cep_cliente_site'=>$entidadeCliente_site->get('cep_cliente_site'), 
				':bool_ativo_cliente_site'=>$entidadeCliente_site->get('bool_ativo_cliente_site')
			);

			$stmt = $this->pdo->prepare("UPDATE cliente_site SET nome_cliente_site = :nome_cliente_site, login_cliente_site = :login_cliente_site, telefone_cliente_site = :telefone_cliente_site, celular_cliente_site = :celular_cliente_site, endereco_cliente_site = :endereco_cliente_site, numero_cliente_site = :numero_cliente_site, complemento_cliente_site = :complemento_cliente_site, bairro_cliente_site = :bairro_cliente_site, cidade_cliente_site = :cidade_cliente_site, estado_id = :estado_id, cep_cliente_site = :cep_cliente_site, bool_ativo_cliente_site = :bool_ativo_cliente_site WHERE id_cliente_site = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Cliente_site ".$ex->getMessage();
		}
	}
}
?>