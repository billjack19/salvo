<!-- Cabeçario do Sistema -->
<div class="col-xs-12" style="border-bottom-style: solid;height: 15%;">
	<div class="col-xs-2 text-center" style="margin-top: 5px;padding-bottom: 6px; height: 15%;">
		<img src="img/Logo.png" width="80%">
		<br>
		<span id="nomeUsuario" class="nomeUsuarioEstilo">
			<i class="fa fa-user"></i>&nbsp;<b>Adiministrador</b>
		</span>
		<style type="text/css">
			.nomeUsuarioEstilo{
				font-size: 15px;
				padding-left: 10px;
				padding-right: 10px;
				/*text-shadow: 2px 2px 1px #333;*/
				border-style: solid;
				border-radius: 5px;
			}
		</style>
	</div>

	<div class="col-xs-5 text-center">
		<h1 style="font-family: font_titulo;font-size: 65px;margin-bottom: 0px;margin-top: 25px;">
			Magrão Lanches
		</h1>
	</div>

	<div class="col-xs-5" style="margin-bottom: 0px;">
		<div class="col-xs-12 text-center" style="margin-top: 10px;">
			<!-- <div class="col-xs-3"> -->
				<!--  style="margin-top: 25px;margin-left: -120px;" -->
			<!-- </div> -->
		<!-- </div> -->
		<!-- <div class="col-xs-12" style="margin-top: 5px;margin-bottom: 5px; margin-top: 5px;margin-left: -15px;"> -->
			<!-- <div class="col-xs-1"></div> -->
			<div class="col-xs-3">
				<button class="btn btn-primary btn-block" onclick="novoPedido();">
					<!-- adicionaPedido('normal'); -->
					<i class="fa fa-file"></i><br>
					Novo
				</button>
			</div>
			<!-- <div class="col-xs-3">
				<button class="btn btn-primary btn-block" onclick="imprimirTelaImpressao();">
					<i class="fa fa-print"></i><br>
					Imprimir
				</button>
			</div> -->
			<div class="col-xs-3" id='btn_pedido_itens_ListaCabecario'>
				<button class="btn btn-warning btn-block" id="btn_apertarUmaVezBug" onclick="console.log('clicou');verificarPedidoSelecionado();" disabled>
					<i class="fa fa-list"></i><br>
					Pedido <!--Itens -->
				</button>
				<script type="text/javascript">
					/* Carregar combo cliente antes */

					/* document.getElementById("btn_apertarUmaVezBug").click(); */
				</script>
			</div>
			<div class="hidden" id='btn_pedido_ListaCabecario'>
				<button class="btn btn-warning btn-block" onclick="abrirTelaPedido('talaPedidos')">
					<i class="fa fa-list"></i><br>
					Pedido
				</button>
			</div>
			<div class="col-xs-3">
				<button class="btn btn-danger btn-block" onclick="logoff()">
					<i class="fa fa-sign-out"></i><br>
					Sair
				</button>
			</div>

			<div class="col-xs-3">
				<canvas id="relogio" width="80%" height="70" style="background-color: #333;border-radius: 5px;"></canvas>
			</div>
		</div>
	</div>
</div>
 



 <!-- Scripts relogio -->
<script type="text/javascript">
		document.getElementById("relogio").style.paddingLeft = (document.getElementById("relogio").width / 6) +"px";
		/* document.getElementById("relogio").style.marginLeft = "-" + (document.getElementById("relogio").width / 5) +"px"; */
		/* document.getElementById("relogio").style.marginRight = (document.getElementById("relogio").width) +"px"; */
		/* document.getElementById("relogio").style.paddingRigth = "-" + document.getElementById("relogio").width +"px"; */
		var canvas = document.getElementById("relogio");
		var ctx = canvas.getContext("2d");
		var radius = canvas.height / 2;
		ctx.translate(radius, radius);
		radius = radius * 0.90;
		setInterval(drawClock, 1000);

		function drawClock(){
			drawFace(ctx, radius);
			drawNumber(ctx, radius);
			drawTime(ctx, radius);
		}



		function drawTime(ctx, radius){
			var now = new Date();
			var hour = now.getHours();
			var minute = now.getMinutes();
			var second = now.getSeconds();
			/* hour */
			hour = hour % 12;
			hour = (hour * Math.PI / 6) + (minute * Math.PI / (6 * 60)) + (second * Math.PI / (360 * 60));
			drawHand(ctx, hour, radius * 0.5, radius * 0.07);
			/* minute */
			minute = (minute * Math.PI / 30) + (second * Math.PI / (30*60));
			drawHand(ctx, minute, radius * 0.8, radius * 0.07);
			/* second */
			second = (second * Math.PI / 30);
			drawHand(ctx, second, radius * 0.9, radius * 0.02);
		}


		function drawHand(ctx, pos, length, width){
			ctx.beginPath();
			ctx.lineWidth = width;
			ctx.lineCap = "round";
			ctx.moveTo(0,0);
			ctx.rotate(pos);
			ctx.lineTo(0, -length);
			ctx.stroke();
			ctx.rotate(-pos);
		}


		function drawNumber(ctx, radius){
			var ang;
			var num;
			ctx.font = radius * 0.35 + "px arial";
			ctx.textBaseline = "middle";
			ctx.textAlign = "center";
			for(num = 1; num < 13; num++){
				ang = num * Math.PI / 6;
				ctx.rotate(ang);
				ctx.translate(0, -radius * 0.85);
				ctx.rotate(-ang);
				ctx.fillText(num.toString(), 0, 0);
				ctx.rotate(ang);
				ctx.translate(0, radius * 0.85);
				ctx.rotate(-ang);
			}
		}


		function drawFace(ctx, radius){
			var grad;

			ctx.beginPath();
			ctx.arc(0, 0, radius, 0, 2 * Math.PI);
			ctx.fillStyle = "white";
			ctx.fill();

			grad = ctx.createRadialGradient(0, 0, radius * 0.95, 0, 0, radius * 1.05);
			grad.addColorStop(0, '#333');
			grad.addColorStop(0.5, 'white');
			grad.addColorStop(1, '#333');
			ctx.strokeStyle = grad;
			ctx.lineWidth = radius*0.1;
			ctx.stroke();

			ctx.beginPath();
			ctx.arc(0, 0, radius * 0.1, 0, 2 * Math.PI);
			ctx.fillStyle = "#333";
			ctx.fill();
		}
	</script>