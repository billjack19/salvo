<?php ?>
<link href='calendario/fullcalendar.min.css' rel='stylesheet' />
<link href='calendario/fullcalendar.print.min.css' rel='stylesheet' media='print' >
<link rel="stylesheet" type="text/css" href="../../_css/estiloCalendario.css">

<script src='calendario/lib/moment.min.js'></script>
<script src='calendario/lib/jquery.min.js'></script>
<script src='calendario/fullcalendar.min.js'></script>
<script src='calendario/locale/pt-br.js'></script>
<script src='calendario/lib/jquery-ui.min.js'></script>
<script>
	$(document).ready(function() {
		// iniciar();
		$('#calendar').fullCalendar({
			header: {
				left: false,
				center: 'title',
				right: false
			},
			viewRender: function(view , title) {
		            $(this).css('color', 'red');
					$(this).css('font-size', '20px' );
		    },
			firstDay: 1,
			defaultDate: document.getElementById('dat').value,
			navLinks: true, // can click day/week names to navigate views
			weekends: true, // não conta os finais de semana
			navLinkDayClick: function(date, jsEvent) {
				console.log('day', date.format()); // date is a moment
				console.log('coords', jsEvent.pageX, jsEvent.pageY);
			},
			dayClick: function(date, jsEvent, view) {
				var dataEmprestimoKit = document.getElementById('dat').value;
				var url = '?data='+date.format();
				url += '&data2='+date.format('L');
				window.location = url;
			},
			editable: true,
			eventLimit: true,	
			footer: {
				center: 'prevYear prev,next nextYear today',
			}
		});
	});
</script>
	<div class="tamanhoLegal">
	<center>
	<table>
		<tr>
			<td>
			<h2>
				<center>
					<b>Professor:</b> &nbsp;
					<?php
						include "../../_request/processaPesquisaProfessor3.php";
					?>
				</center>
			</h2>
			<!-- calendario -->
			<div>
			<div class="fontTitulo calendarioFundo" id='calendar'></div>
			</div>
			</td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
			<td>
				<table id='horario' class="horaio">
					<tr>
						<td colspan="7">
							<h2>
							<b>Equipamento:</b>&nbsp;
							<?php
								include "../../_request/processaPesquisaKit3.php";
							?>
							</select>
							</h2>
						</td>
					</tr>
						<td colspan="7">
							<h2>
						<?php
							if ($_GET['data']=='') {
						?>
								<b>Data:</b>
								<span id='dataSelecionada'>
									<script>
										document.write(moment().format('L'));
									</script>
								</span>
						<?php
							}else{
						?>
							<b>Data:</b>
								<span id='dataSelecionada'>
									<?php echo $_GET['data2']?>
								</span>
						<?php
							}
						?>
							</h2>
						</td>
					</tr>
					<tr>
					   <td class="form-control tam1">
							<h2>
								<center>
									<b>Horario</b>
								</center>
							</h2>
					   	</td>
						<td class="padraoTabela">&nbsp;</td>
						<td class="form-control tam1">
							<h2>
								<center>
									<b>Manhã</b>
								</center>
							</h2>
						</td>
						<td class="padraoTabela">&nbsp;</td>
						<td class="form-control tam1">
							<h2>
								<center>
									<b>Tarde</b>
								</center>
							</h2>
						</td>
						<td class="padraoTabela">&nbsp;</td>
						<td class="form-control tam1">
							<h2>
								<center>
									<b>Noite</b>
								</center>
							</h2>
						</td>
					</tr>
					<tr>
						<td class="padraoTabela"></td>
					</tr>
					<?php
						include "calendario/_php/criaTabelaHorario.php";
					?>
					<tr>
						<td><br></td>
					</tr>
<?php
	include "calendario/_php/criaModais.php";
?>
<table>
	<tr>
		<td>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</td>
		<td>
			<a class="btn btn-xs btn-primary" style="font-size:20px" onclick="validarProximo()" href="agendaKitEquipamento.php?kit=">
				Voltar
			</a>
			<!-- <input  class="ocultar" type="text" size="1" value="" id="num" disabled /> -->
<?php
	if ($_GET['data']=='') {
	echo "<input class='ocultar' value='".date('Y-m-d')."' type='date' id='dat' disabled/>";
	}
	else{
	echo "<input class='ocultar' value='".$_GET['data']."' type='date' id='dat' disabled/>";
	}
?>	
		</td>
	</tr>
</table>
				</table>
			</td>
		</tr>
	</table>
	</center>
<?php
	include "calendario/_php/criaScript.php";
?>
<script type="text/javascript" src="calendario/_js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".agendarTal").click(function(){
	var codigo = this.value;
	$.post( 
		"../../_request/processaCadastroEmprestimo_kit.php", 
		{
			"codigo" 			: $('#codigo'+codigo).val() ,
			"dataEmprestimoKit"	: $('#dat').val()
		}
	);
	alert('Agendado com sucesso!');
	var dataEmprestimoKit = document.getElementById('dat').value;
	var data2 = moment(dataEmprestimoKit).format('L');
	var url = '?data='+dataEmprestimoKit;
	url += '&data2='+data2;
	window.location = url;
    });
});
</script>
<!-- 
	default
	primary
	success
	info
	warning
	danger
 -->