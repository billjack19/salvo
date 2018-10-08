<?php

// Menu
$RootMenu = new cMenu("RootMenu", TRUE);
$RootMenu->AddMenuItem(1, "mi_aluno", $Language->MenuPhrase("1", "MenuText"), "alunolist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(2, "mi_ano", $Language->MenuPhrase("2", "MenuText"), "anolist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(3, "mi_cadastro", $Language->MenuPhrase("3", "MenuText"), "cadastrolist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(4, "mi_cargo", $Language->MenuPhrase("4", "MenuText"), "cargolist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(5, "mi_emprestimo_kit", $Language->MenuPhrase("5", "MenuText"), "emprestimo_kitlist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(6, "mi_emprestimo_livro", $Language->MenuPhrase("6", "MenuText"), "emprestimo_livrolist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(7, "mi_emprestimo_livro2", $Language->MenuPhrase("7", "MenuText"), "emprestimo_livro2list.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(8, "mi_frase_do_dia", $Language->MenuPhrase("8", "MenuText"), "frase_do_dialist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(9, "mi_funcionario", $Language->MenuPhrase("9", "MenuText"), "funcionariolist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(10, "mi_idioma", $Language->MenuPhrase("10", "MenuText"), "idiomalist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(11, "mi_itens", $Language->MenuPhrase("11", "MenuText"), "itenslist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(12, "mi_kit", $Language->MenuPhrase("12", "MenuText"), "kitlist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(13, "mi_livro", $Language->MenuPhrase("13", "MenuText"), "livrolist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(14, "mi_log_emprestimo_livro", $Language->MenuPhrase("14", "MenuText"), "log_emprestimo_livrolist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(15, "mi_materia", $Language->MenuPhrase("15", "MenuText"), "materialist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(16, "mi_nivel_acesso", $Language->MenuPhrase("16", "MenuText"), "nivel_acessolist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(17, "mi_ponto", $Language->MenuPhrase("17", "MenuText"), "pontolist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(18, "mi_produto", $Language->MenuPhrase("18", "MenuText"), "produtolist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(19, "mi_sala", $Language->MenuPhrase("19", "MenuText"), "salalist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(20, "mi_tema", $Language->MenuPhrase("20", "MenuText"), "temalist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(21, "mi_turno", $Language->MenuPhrase("21", "MenuText"), "turnolist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(22, "mi_v_emprestimokit", $Language->MenuPhrase("22", "MenuText"), "v_emprestimokitlist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(23, "mi_v_emprestimolivro", $Language->MenuPhrase("23", "MenuText"), "v_emprestimolivrolist.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(24, "mi_v_emprestimolivro2", $Language->MenuPhrase("24", "MenuText"), "v_emprestimolivro2list.php", -1, "", TRUE, FALSE, FALSE, "");
$RootMenu->AddMenuItem(25, "mi_v_logemprestimolivro", $Language->MenuPhrase("25", "MenuText"), "v_logemprestimolivrolist.php", -1, "", TRUE, FALSE, FALSE, "");
echo $RootMenu->ToScript();
?>
<div class="ewVertical" id="ewMenu"></div>
