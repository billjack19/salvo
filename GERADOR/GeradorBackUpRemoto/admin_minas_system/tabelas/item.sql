
-- Criar tabela item
-- Gerando em: 01/08/2018 16:54:44
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `item`;

CREATE TABLE IF NOT EXISTS `item` (
	`id_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_item` varchar(300) NOT NULL ,
	`descricao_site_item` varchar(300)  ,
	`unidade_medida_item` varchar(3)  ,
	`imagem_item` varchar(200) NOT NULL ,
	`grupo_id` int(11)  ,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_item` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 1, 'Câmera de Seguração', '', '', 'camera.png', 1, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 2, 'Alarme', '', '', 'alarme.jpg', 4, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 3, 'Alarmes Slim', '', '', 'Alarmes-slim.png', 1, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 4, 'Alarmes Ultra', '', '', 'Alarmes-ultra.png', 1, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 5, 'Alta', '', '', 'alta.jpg', 4, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 6, 'Cabo HDMI', '', '', 'cabo hdmi.jpg', 4, 1, 0
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 7, 'Abraçadeira em Nylon Preta', '', '', 'Abracadeira-em-Nylon-Preta-300-x-36-mm-c-fortools-0070671.JPG', 6, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 8, 'Cabo Paralelo Megatron', '', '', 'cabo paralelo megatron.jpg', 4, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 9, 'Cabo de Rede', '', '', 'cabo rede.jpg', 4, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 10, 'Cabo Coaxial', '', '', 'coaxial.jpg', 4, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 11, 'Atack New Black Vista', '', '', 'atack-new-black-vista1-1-300x300.png', 1, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 12, 'Controle De Acesso', '', '', 'controle de acesso.jpg', 7, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 13, 'Controle de Acesso Gsproxct', '', '', 'controle-de-acesso-gsproxct.png', 7, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 14, 'Controle de Acesso Gstouchct', '', '', 'controle-de-acesso-gstouchct.png', 7, 1, 0
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 15, 'Controles Digitais Genno Tech Onix', '', '', 'Controles-Digitais-Genno-Tech-Onix.jpg', 1, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 16, 'Articulador', '', '', 'articulador.jpg', 6, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 17, 'Balun', '', '', 'balun.jpg', 6, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 18, 'Bnc Borne', '', '', 'bnc borne.jpg', 6, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 19, 'Filtro de Linha', '', '', 'filtro_de_linha_5_tom_pt_biv_lexman_89325845_0001_220x220.jpg', 6, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 20, 'Eletrificador Revolution Control', '', '', 'eletrificador-revolution-control-.png', 1, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 21, 'GATE-SAW', '', '', 'GATE-SAW.png', 1, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 22, 'IB 550 PET', '', '', 'IB-550-PET.png', 1, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 23, 'Sensor Magnético com Fio 1', '', '', 'Sensor-Magnetico-com-Fio-1.png', 1, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 24, 'Sensor Magnético SMG SAW.', '', '', 'Sensor-Magnetico-SMG-SAW.png', 1, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 25, 'Fontes', '', '', 'fontes.jpg', 6, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 26, 'Haste', '', '', 'haste.jpg', 6, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 27, 'Mola', '', '', 'mola.jpg', 6, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 28, 'P4', '', '', 'p4.jpg', 6, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 29, 'RCA', '', '', 'rca.jpg', 6, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 30, 'Refletor', '', '', 'refletor.jpg', 6, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 31, 'RJ-45', '', '', 'rj45.jpg', 6, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 32, 'Roteador TP Link', '', '', 'Roteador-TP-Link-TL-WR840N-Wireless-300Mbps-com-2-Antenas-Interna-3112369.jpg', 6, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 33, 'Suporte TV', '', '', 'suporte tv.jpg', 6, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 34, 'Bullet 20m', '', '', 'bullet 20m.jpg', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 35, 'Bullet 25m', '', '', 'bullet 25m.jpg', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 36, 'Bullet', '', '', 'bullet.jpg', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 37, 'Camera Infravermelho Sony Exmor Full Ahd Gsfhd1050tv', '', '', 'camera-infravermelho-sony-exmor-full-ahd-gsfhd1050tv.png', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 38, 'Camera Speed Dome IP  Gsip2m18x120ir', '', '', 'camera-speed-dome-ip-gsip2m18x120ir.png', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 39, 'Camera Infravermelho Dome Ahd Plus 20 Metros Plastica Gshdp20db28', '', '', 'camera_infravermelho_dome_ahd_plus_20_metros_plastica-gshdp20db28.png', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 40, 'Camera Infravermelho Dome Ahd Plus 30 Metros Metalica Gshdp30db28', '', '', 'camera_infravermelho_dome_ahd_plus_30_metros_metalica-gshdp30db28.png', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 41, 'Camera Infravermelho Tubular Ahd Plus 20 Metros Plastica Gshdp20tb', '', '', 'camera_infravermelho_tubular_ahd_plus_20_metros_plastica-gshdp20tb.png', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 42, 'Camera Infravermelho Tubular Ahd Plus 30 Metros Metalica Gshdp30tb28', '', '', 'camera_infravermelho_tubular_ahd_plus_30_metros_metalica-gshdp30tb28.png', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 43, 'Dome', '', '', 'dome.jpg', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 44, 'Dvr Flex', '', '', 'dvr flex.jpg', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 45, 'DVR', '', '', 'dvr.jpg', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 46, 'Ftg TV ISP230IR', '', '', 'ftg_TV-ISP230IRjpg301022018163043.jpg', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 47, 'DVR Stand Alone DVR Lite', '', '', 'giga-produtos-nivel3-dvr-stand-alone-dvr-lite-dvr-lite-img.png', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 48, 'Gravador Digital de Video HVR Ahd 720p Gs04hd', '', '', 'gravador-digital-de-video-hvr-ahd-720p-gs04hd.png', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 49, 'Wifi', '', '', 'wifi.jpg', 5, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 50, 'FTG X8 Preto', '', '', 'ftg_X8_Preto1jpg714072016113031.jpg', 7, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 51, 'FTM F6', '', '', 'ftm_F6jpg114072016110350.jpg', 7, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 52, 'FTM FL1000', '', '', 'ftm_FL1000_1jpg814072016110500.jpg', 7, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 53, 'Controle de Acesso Gstouchct', '', '', 'controle-de-acesso-gstouchct.png', 7, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 54, 'Nobreak 700', '', '', 'nobreak 700.jpg', 3, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 55, 'Nobreak', '', '', 'nobreak.jpg', 3, 1, 1
);
INSERT INTO item ( `id_item`, `descricao_item`, `descricao_site_item`, `unidade_medida_item`, `imagem_item`, `grupo_id`, `usuario_id`, `bool_ativo_item`) VALUES ( 56, 'Nobreak', '', '', 'nobreak.png', 3, 1, 1
);