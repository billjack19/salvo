
-- Criar tabela upload_arq
-- Gerando em: 01/08/2018 16:54:53
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `upload_arq`;

CREATE TABLE IF NOT EXISTS `upload_arq` (
	`id_upload_arq` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_upload_arq` varchar(100) NOT NULL ,
	`tipo_upload_arq` varchar(100) NOT NULL ,
	`data_atualizacaoupload_arq` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_upload_arq` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 24, 'informatica.png', 'imagem', '2018-01-27 08:21:06', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 25, 'seguranca.png', 'imagem', '2018-01-27 08:40:47', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 26, 'security-resized-no-watermark.jpeg', 'imagem', '2018-01-27 08:58:10', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 27, 'giga-produtos-nivel3-dvr-stand-alone-dvr-lite-dvr-lite-img.png', 'imagem', '2018-02-05 15:28:50', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 28, 'cabo paralelo megatron.jpg', 'imagem', '2018-02-05 15:29:15', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 36, 'Roteador-TP-Link-TL-WR840N-Wireless-300Mbps-com-2-Antenas-Interna-3112369.jpg', 'imagem', '2018-02-05 15:29:55', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 40, 'Sensor-Magnetico-SMG-SAW.png', 'imagem', '2018-02-05 16:13:29', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 41, 'Sensor-Magnetico-com-Fio-1.png', 'imagem', '2018-02-05 16:13:34', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 49, 'camera-speed-dome-ip-gsip2m18x120ir.png', 'imagem', '2018-02-05 16:14:12', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 54, 'cabo hdmi.jpg', 'imagem', '2018-02-05 16:14:34', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 55, 'Controles-Digitais-Genno-Tech-Onix.jpg', 'imagem', '2018-02-05 16:14:38', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 56, 'camera_infravermelho_dome_ahd_plus_30_metros_metalica-gshdp30db28.png', 'imagem', '2018-02-05 16:14:44', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 57, 'camera_infravermelho_dome_ahd_plus_20_metros_plastica-gshdp20db28.png', 'imagem', '2018-02-05 16:14:49', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 58, 'camera_infravermelho_tubular_ahd_plus_30_metros_metalica-gshdp30tb28.png', 'imagem', '2018-02-05 16:14:54', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 59, 'camera_infravermelho_tubular_ahd_plus_20_metros_plastica-gshdp20tb.png', 'imagem', '2018-02-05 16:14:59', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 60, 'cftv-hvr-adr-16-canais-gs16hd-hd-720p-giga-security-D_NQ_NP_143101-MLB8203210394_042015-F.jpg', 'imagem', '2018-02-05 16:15:03', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 62, 'dome.jpg', 'imagem', '2018-02-05 16:15:12', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 63, 'dvr flex.jpg', 'imagem', '2018-02-05 16:15:17', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 64, 'dvr.jpg', 'imagem', '2018-02-05 16:15:23', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 65, 'eletrificador-revolution-control-.png', 'imagem', '2018-02-05 16:15:27', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 66, 'haste.jpg', 'imagem', '2018-02-05 16:15:31', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 67, 'ftg_TV-ISP230IRjpg301022018163043.jpg', 'imagem', '2018-02-05 16:15:36', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 68, 'filtro_de_linha_5_tom_pt_biv_lexman_89325845_0001_220x220.jpg', 'imagem', '2018-02-05 16:15:40', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 71, 'gravador-digital-de-video-hvr-ahd-720p-gs04hd.png', 'imagem', '2018-02-05 16:15:56', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 72, 'lider.jpg', 'imagem', '2018-02-05 16:16:01', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 73, 'megatron.jpg', 'imagem', '2018-02-05 16:16:06', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 75, 'multilaser.png', 'imagem', '2018-02-05 16:16:17', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 76, 'mola.jpg', 'imagem', '2018-02-05 16:16:22', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 77, 'nobreak 700.jpg', 'imagem', '2018-02-05 16:16:26', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 78, 'logo_travben.jpg', 'imagem', '2018-02-05 16:16:31', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 79, 'nobreak.png', 'imagem', '2018-02-05 16:16:35', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 80, 'nobreak.jpg', 'imagem', '2018-02-05 16:16:40', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 82, 'rca.jpg', 'imagem', '2018-02-05 16:16:50', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 83, 'ragteck.jpg', 'imagem', '2018-02-05 16:16:56', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 84, 'refletor.jpg', 'imagem', '2018-02-05 16:17:01', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 85, 'tecvoz-1.jpg', 'imagem', '2018-02-05 16:17:06', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 86, 'telecam.png', 'imagem', '2018-02-05 16:17:11', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 87, 'suporte tv.jpg', 'imagem', '2018-02-05 16:17:16', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 90, 'controle de acesso.jpg', 'imagem', '2018-02-05 16:41:23', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 92, 'controle-de-acesso-gstouchct.png', 'imagem', '2018-02-05 16:41:33', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 93, 'ftg_X8_Preto1jpg714072016113031.jpg', 'imagem', '2018-02-05 16:41:38', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 94, 'ftm_F6jpg114072016110350.jpg', 'imagem', '2018-02-05 16:41:44', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 95, 'ftm_FL1000_1jpg814072016110500.jpg', 'imagem', '2018-02-05 16:41:50', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 97, 'fundo4.jpg', 'imagem', '2018-02-06 08:58:34', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 142, 'Automacao.jpg', 'imagem', '2018-02-06 09:28:43', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 143, 'Baterias.jpg', 'imagem', '2018-02-06 09:28:44', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 144, 'Baterias_e_Pilhas.jpg', 'imagem', '2018-02-06 09:28:44', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 146, 'CFTV.png', 'imagem', '2018-02-06 09:28:44', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 147, 'Cabos.jpg', 'imagem', '2018-02-06 09:28:44', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 148, 'Conectores.jpg', 'imagem', '2018-02-06 09:28:45', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 149, 'Controle_de_Acesso.png', 'imagem', '2018-02-06 09:28:45', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 150, 'GATE-SAW.png', 'imagem', '2018-02-06 09:28:45', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 151, 'IB-550-PET.png', 'imagem', '2018-02-06 09:28:45', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 152, 'Logo.png', 'imagem', '2018-02-06 09:28:45', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 153, 'LogoLg.png', 'imagem', '2018-02-06 09:28:46', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 154, 'LogoLgBranca.png', 'imagem', '2018-02-06 09:28:46', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 155, 'LogoLgForm.png', 'imagem', '2018-02-06 09:28:46', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 156, 'LogoSmBranca.png', 'imagem', '2018-02-06 09:28:46', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 157, 'LogoSmForm.png', 'imagem', '2018-02-06 09:28:46', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 158, 'Logonext.jpg', 'imagem', '2018-02-06 09:28:47', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 160, 'alarmes.JPG', 'imagem', '2018-02-06 09:28:47', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 165, 'bnc borne.jpg', 'imagem', '2018-02-06 09:28:48', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 166, 'bullet 20m.jpg', 'imagem', '2018-02-06 09:28:48', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 167, 'bullet 25m.jpg', 'imagem', '2018-02-06 09:28:48', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 168, 'bullet.jpg', 'imagem', '2018-02-06 09:28:49', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 169, 'cabo rede.jpg', 'imagem', '2018-02-06 09:28:49', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 170, 'camera-infravermelho-sony-exmor-full-ahd-gsfhd1050tv.png', 'imagem', '2018-02-06 09:28:49', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 171, 'camera.png', 'imagem', '2018-02-06 09:28:50', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 172, 'coaxial.jpg', 'imagem', '2018-02-06 09:28:50', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 173, 'controle-de-acesso-gsproxct.png', 'imagem', '2018-02-06 09:28:50', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 174, 'fontes.jpg', 'imagem', '2018-02-06 09:28:50', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 175, 'fundo1.jpg', 'imagem', '2018-02-06 09:28:50', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 176, 'fundo2.jpg', 'imagem', '2018-02-06 09:28:51', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 177, 'fundo3.jpg', 'imagem', '2018-02-06 09:28:51', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 178, 'genno.jpg', 'imagem', '2018-02-06 09:28:51', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 179, 'logo-onix.png', 'imagem', '2018-02-06 09:28:51', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 180, 'loja.png', 'imagem', '2018-02-06 09:28:51', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 181, 'marcanewback.png', 'imagem', '2018-02-06 09:28:52', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 182, 'p4.jpg', 'imagem', '2018-02-06 09:28:52', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 183, 'rj45.jpg', 'imagem', '2018-02-06 09:28:52', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 184, 'udi cabos.png', 'imagem', '2018-02-06 09:28:52', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 185, 'wifi.jpg', 'imagem', '2018-02-06 09:28:52', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 186, 'CFTV2.png', 'imagem', '2018-02-06 17:39:26', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 189, 'WhatsApp Image 2018-02-19 at 14.46.46 (1).jpeg', 'imagem', '2018-02-19 14:53:55', 1
);
INSERT INTO upload_arq ( `id_upload_arq`, `descricao_upload_arq`, `tipo_upload_arq`, `data_atualizacaoupload_arq`, `bool_ativo_upload_arq`) VALUES ( 190, 'bateria_nobreak.jpg', 'imagem', '2018-02-19 14:59:54', 1
);