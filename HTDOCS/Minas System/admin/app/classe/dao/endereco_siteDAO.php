
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class endereco_siteDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraEndereco_site(Endereco_site $entidadeEndereco_site, $area){

		// Configuração de notificação
		/* $area = 'endereco_site'; */
		 
		$descricaoNotificacao = 'Descrição => '.$entidadeEndereco_site->get('descricao_endereco_site').'<br>';
		$descricaoNotificacao .= 'Endereço => '.$entidadeEndereco_site->get('endereco_endereco_site').'<br>';
		$descricaoNotificacao .= 'Número => '.$entidadeEndereco_site->get('numero_endereco_site').'<br>';
		$descricaoNotificacao .= 'Complemento => '.$entidadeEndereco_site->get('complemento_endereco_site').'<br>';
		$descricaoNotificacao .= 'Bairro => '.$entidadeEndereco_site->get('bairro_endereco_site').'<br>';
		$descricaoNotificacao .= 'Cidade => '.$entidadeEndereco_site->get('cidade_endereco_site').'<br>';
		$descricaoNotificacao .= 'Estado => /%/SELECT * FROM estado WHERE id_estado = '.$entidadeEndereco_site->get('estado_id').'/%/<br>';
		$descricaoNotificacao .= 'Cep => '.$entidadeEndereco_site->get('cep_endereco_site').'<br>';
		$descricaoNotificacao .= 'Telefone => '.$entidadeEndereco_site->get('telefone_endereco_site').'<br>';
		$descricaoNotificacao .= 'Celular => '.$entidadeEndereco_site->get('celular_endereco_site').'<br>';
		$descricaoNotificacao .= 'Email => '.$entidadeEndereco_site->get('email_endereco_site').'<br>';
		$descricaoNotificacao .= 'Horário Funcionamento => '.$entidadeEndereco_site->get('horario_funcionamento_endereco_site').'<br>';
		$descricaoNotificacao .= 'Latitude => '.$entidadeEndereco_site->get('latitude_endereco_site').'<br>';
		$descricaoNotificacao .= 'Longitude => '.$entidadeEndereco_site->get('longitude_endereco_site').'<br>';
		$descricaoNotificacao .= 'Configurar Site => /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$entidadeEndereco_site->get('configurar_site_id').'/%/<br>';
		$descricaoBool = $entidadeEndereco_site->get('bool_ativo_endereco_site') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':descricao_endereco_site'=>$entidadeEndereco_site->get('descricao_endereco_site'), 
				':endereco_endereco_site'=>$entidadeEndereco_site->get('endereco_endereco_site'), 
				':numero_endereco_site'=>$entidadeEndereco_site->get('numero_endereco_site'), 
				':complemento_endereco_site'=>$entidadeEndereco_site->get('complemento_endereco_site'), 
				':bairro_endereco_site'=>$entidadeEndereco_site->get('bairro_endereco_site'), 
				':cidade_endereco_site'=>$entidadeEndereco_site->get('cidade_endereco_site'), 
				':estado_id'=>$entidadeEndereco_site->get('estado_id'), 
				':cep_endereco_site'=>$entidadeEndereco_site->get('cep_endereco_site'), 
				':telefone_endereco_site'=>$entidadeEndereco_site->get('telefone_endereco_site'), 
				':celular_endereco_site'=>$entidadeEndereco_site->get('celular_endereco_site'), 
				':email_endereco_site'=>$entidadeEndereco_site->get('email_endereco_site'), 
				':horario_funcionamento_endereco_site'=>$entidadeEndereco_site->get('horario_funcionamento_endereco_site'), 
				':latitude_endereco_site'=>$entidadeEndereco_site->get('latitude_endereco_site'), 
				':longitude_endereco_site'=>$entidadeEndereco_site->get('longitude_endereco_site'), 
				':configurar_site_id'=>$entidadeEndereco_site->get('configurar_site_id'), 
				':bool_ativo_endereco_site'=>$entidadeEndereco_site->get('bool_ativo_endereco_site')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO endereco_site (descricao_endereco_site, endereco_endereco_site, numero_endereco_site, complemento_endereco_site, bairro_endereco_site, cidade_endereco_site, estado_id, cep_endereco_site, telefone_endereco_site, celular_endereco_site, email_endereco_site, horario_funcionamento_endereco_site, latitude_endereco_site, longitude_endereco_site, configurar_site_id, bool_ativo_endereco_site) VALUES (:descricao_endereco_site, :endereco_endereco_site, :numero_endereco_site, :complemento_endereco_site, :bairro_endereco_site, :cidade_endereco_site, :estado_id, :cep_endereco_site, :telefone_endereco_site, :celular_endereco_site, :email_endereco_site, :horario_funcionamento_endereco_site, :latitude_endereco_site, :longitude_endereco_site, :configurar_site_id, :bool_ativo_endereco_site);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Endereco_site ".$ex->getMessage();
		}
	}


	function atualizaEndereco_site(Endereco_site $entidadeEndereco_site, $id, $area){

		// Configuração de notificação
		/* $area = 'endereco_site'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		 
		$sql = "SELECT * FROM endereco_site WHERE id_endereco_site = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['descricao_endereco_site'] != $entidadeEndereco_site->get('descricao_endereco_site')) {
				$descricaoNotificacao .= '<b style="color: red">Descrição: '.$dados['descricao_endereco_site'].' => '.$entidadeEndereco_site->get('descricao_endereco_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Descrição => '.$entidadeEndereco_site->get('descricao_endereco_site').'<br>';
			}
			if ($dados['endereco_endereco_site'] != $entidadeEndereco_site->get('endereco_endereco_site')) {
				$descricaoNotificacao .= '<b style="color: red">Endereço: '.$dados['endereco_endereco_site'].' => '.$entidadeEndereco_site->get('endereco_endereco_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Endereço => '.$entidadeEndereco_site->get('endereco_endereco_site').'<br>';
			}
			if ($dados['numero_endereco_site'] != $entidadeEndereco_site->get('numero_endereco_site')) {
				$descricaoNotificacao .= '<b style="color: red">Número: '.$dados['numero_endereco_site'].' => '.$entidadeEndereco_site->get('numero_endereco_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Número => '.$entidadeEndereco_site->get('numero_endereco_site').'<br>';
			}
			if ($dados['complemento_endereco_site'] != $entidadeEndereco_site->get('complemento_endereco_site')) {
				$descricaoNotificacao .= '<b style="color: red">Complemento: '.$dados['complemento_endereco_site'].' => '.$entidadeEndereco_site->get('complemento_endereco_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Complemento => '.$entidadeEndereco_site->get('complemento_endereco_site').'<br>';
			}
			if ($dados['bairro_endereco_site'] != $entidadeEndereco_site->get('bairro_endereco_site')) {
				$descricaoNotificacao .= '<b style="color: red">Bairro: '.$dados['bairro_endereco_site'].' => '.$entidadeEndereco_site->get('bairro_endereco_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Bairro => '.$entidadeEndereco_site->get('bairro_endereco_site').'<br>';
			}
			if ($dados['cidade_endereco_site'] != $entidadeEndereco_site->get('cidade_endereco_site')) {
				$descricaoNotificacao .= '<b style="color: red">Cidade: '.$dados['cidade_endereco_site'].' => '.$entidadeEndereco_site->get('cidade_endereco_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Cidade => '.$entidadeEndereco_site->get('cidade_endereco_site').'<br>';
			}
			if ($dados['estado_id'] != $entidadeEndereco_site->get('estado_id')) {
				$descricaoNotificacao .= '<b style="color: red">Estado: /%/SELECT * FROM estado WHERE id_estado = '.$dados['estado_id'].'/%/ => /%/SELECT * FROM estado WHERE id_estado = '.$entidadeEndereco_site->get('estado_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Estado => /%/SELECT * FROM estado WHERE id_estado = '.$entidadeEndereco_site->get('estado_id').'/%/<br>';
			}
			if ($dados['cep_endereco_site'] != $entidadeEndereco_site->get('cep_endereco_site')) {
				$descricaoNotificacao .= '<b style="color: red">Cep: '.$dados['cep_endereco_site'].' => '.$entidadeEndereco_site->get('cep_endereco_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Cep => '.$entidadeEndereco_site->get('cep_endereco_site').'<br>';
			}
			if ($dados['telefone_endereco_site'] != $entidadeEndereco_site->get('telefone_endereco_site')) {
				$descricaoNotificacao .= '<b style="color: red">Telefone: '.$dados['telefone_endereco_site'].' => '.$entidadeEndereco_site->get('telefone_endereco_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Telefone => '.$entidadeEndereco_site->get('telefone_endereco_site').'<br>';
			}
			if ($dados['celular_endereco_site'] != $entidadeEndereco_site->get('celular_endereco_site')) {
				$descricaoNotificacao .= '<b style="color: red">Celular: '.$dados['celular_endereco_site'].' => '.$entidadeEndereco_site->get('celular_endereco_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Celular => '.$entidadeEndereco_site->get('celular_endereco_site').'<br>';
			}
			if ($dados['email_endereco_site'] != $entidadeEndereco_site->get('email_endereco_site')) {
				$descricaoNotificacao .= '<b style="color: red">Email: '.$dados['email_endereco_site'].' => '.$entidadeEndereco_site->get('email_endereco_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Email => '.$entidadeEndereco_site->get('email_endereco_site').'<br>';
			}
			if ($dados['horario_funcionamento_endereco_site'] != $entidadeEndereco_site->get('horario_funcionamento_endereco_site')) {
				$descricaoNotificacao .= '<b style="color: red">Horário Funcionamento: '.$dados['horario_funcionamento_endereco_site'].' => '.$entidadeEndereco_site->get('horario_funcionamento_endereco_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Horário Funcionamento => '.$entidadeEndereco_site->get('horario_funcionamento_endereco_site').'<br>';
			}
			if ($dados['latitude_endereco_site'] != $entidadeEndereco_site->get('latitude_endereco_site')) {
				$descricaoNotificacao .= '<b style="color: red">Latitude: '.$dados['latitude_endereco_site'].' => '.$entidadeEndereco_site->get('latitude_endereco_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Latitude => '.$entidadeEndereco_site->get('latitude_endereco_site').'<br>';
			}
			if ($dados['longitude_endereco_site'] != $entidadeEndereco_site->get('longitude_endereco_site')) {
				$descricaoNotificacao .= '<b style="color: red">Longitude: '.$dados['longitude_endereco_site'].' => '.$entidadeEndereco_site->get('longitude_endereco_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Longitude => '.$entidadeEndereco_site->get('longitude_endereco_site').'<br>';
			}
			if ($dados['configurar_site_id'] != $entidadeEndereco_site->get('configurar_site_id')) {
				$descricaoNotificacao .= '<b style="color: red">Configurar Site: /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$dados['configurar_site_id'].'/%/ => /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$entidadeEndereco_site->get('configurar_site_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Configurar Site => /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$entidadeEndereco_site->get('configurar_site_id').'/%/<br>';
			}
			if ($dados['bool_ativo_endereco_site'] != $entidadeEndereco_site->get('bool_ativo_endereco_site')) {
				$descricaoBool = $entidadeEndereco_site->get('bool_ativo_endereco_site') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_endereco_site'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeEndereco_site->get('bool_ativo_endereco_site') == 1 ? "Sim" : "Não";
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
				':descricao_endereco_site'=>$entidadeEndereco_site->get('descricao_endereco_site'), 
				':endereco_endereco_site'=>$entidadeEndereco_site->get('endereco_endereco_site'), 
				':numero_endereco_site'=>$entidadeEndereco_site->get('numero_endereco_site'), 
				':complemento_endereco_site'=>$entidadeEndereco_site->get('complemento_endereco_site'), 
				':bairro_endereco_site'=>$entidadeEndereco_site->get('bairro_endereco_site'), 
				':cidade_endereco_site'=>$entidadeEndereco_site->get('cidade_endereco_site'), 
				':estado_id'=>$entidadeEndereco_site->get('estado_id'), 
				':cep_endereco_site'=>$entidadeEndereco_site->get('cep_endereco_site'), 
				':telefone_endereco_site'=>$entidadeEndereco_site->get('telefone_endereco_site'), 
				':celular_endereco_site'=>$entidadeEndereco_site->get('celular_endereco_site'), 
				':email_endereco_site'=>$entidadeEndereco_site->get('email_endereco_site'), 
				':horario_funcionamento_endereco_site'=>$entidadeEndereco_site->get('horario_funcionamento_endereco_site'), 
				':latitude_endereco_site'=>$entidadeEndereco_site->get('latitude_endereco_site'), 
				':longitude_endereco_site'=>$entidadeEndereco_site->get('longitude_endereco_site'), 
				':configurar_site_id'=>$entidadeEndereco_site->get('configurar_site_id'), 
				':bool_ativo_endereco_site'=>$entidadeEndereco_site->get('bool_ativo_endereco_site')
			);

			$stmt = $this->pdo->prepare("UPDATE endereco_site SET descricao_endereco_site = :descricao_endereco_site, endereco_endereco_site = :endereco_endereco_site, numero_endereco_site = :numero_endereco_site, complemento_endereco_site = :complemento_endereco_site, bairro_endereco_site = :bairro_endereco_site, cidade_endereco_site = :cidade_endereco_site, estado_id = :estado_id, cep_endereco_site = :cep_endereco_site, telefone_endereco_site = :telefone_endereco_site, celular_endereco_site = :celular_endereco_site, email_endereco_site = :email_endereco_site, horario_funcionamento_endereco_site = :horario_funcionamento_endereco_site, latitude_endereco_site = :latitude_endereco_site, longitude_endereco_site = :longitude_endereco_site, configurar_site_id = :configurar_site_id, bool_ativo_endereco_site = :bool_ativo_endereco_site WHERE id_endereco_site = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Endereco_site ".$ex->getMessage();
		}
	}
}
?>