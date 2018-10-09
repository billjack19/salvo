

var tabela = "<table id=\"example1\" class=\"table table-bordered table-striped\">"
			+ 	"<thead>"
			+ 		"<tr>"
			+ 			"<th colspan='3'>Cliente</th>"
			// + 			"<>"
			// + 			"<th></th>"
			+ 			"<th rowspan='2'>Editar</th>"
			+ 			"<th rowspan='2'>Visualizar</th>"

			+ 		"</tr><tr>"

			+ 			"<th>Filial</th>"
			+ 			"<th>Documento</th>"
			+ 			"<th>Total</th>"
			+ 		"</tr>"
			+ 	"</thead>"
			+ 	"<tbody>";
for (var i = 0; i < data.length; i++) {
	tabela 	+= 		"<tr>"
			+ 			"<td colspan='3'>"+data[i].razaosocial+"</td>"

			+			"<td rowspan='2'>"
			+				"<button class='btn btn-warning'>"
			+					"<i class='fa fa-pencil'></i>"
			+				"</button>"
			// + 				"&nbsp;&nbsp;&nbsp;"
			+			"</td>"
			+			"<td rowspan='2'>"
			+				"<button class='btn btn-primary'>"
			+					"<i class='fa fa-eye'></i>"
			+				"</button>"
			+			"</td>"

			+ 		"</tr><tr>"

			+ 			"<td>"+data[i].filial+"</td>"
			+ 			"<td>"+data[i].documento+"</td>"
			+ 			"<td>"+data[i].total+"</td>"
			+ 		"</tr>"
}
	tabela  += 	"</tbody>"
			/*+ 	"<tfoot>"
			+ 		"<tr>"
			+ 			"<th>Filial</th>"
			+ 			"<th>Documento</th>"
			+ 			"<th>Cliente</th>"
			+ 			"<th>Total</th>"
			+ 			"<th></th>"
			// + 			"<th>Editar</th>"
			// + 			"<th>Visualizar</th>"
			+ 		"</tr>"
			+ 	"</tfoot>"*/
			+ "</table>";

$("#tabelaDinamica").html(tabela);
$('#example1').DataTable({
	'paging'            : true,
	'lengthChange'		: true,
	'searching'     	: true,
	'ordering'       	: true,
	'info'              : true,
	"language": {
		"decimal": ",",
		"loadingRecords": "Carregando...",
		"processing":     "Processando...",
		"search":         "Buscar:",
		"lengthMenu": "Listar de _MENU_ registros",
		"zeroRecords": "Nenhum registro encontrado",
		"info": "Pagina: _PAGE_ de _PAGES_",
		"infoEmpty": "Nenhum registro",
		"infoFiltered": "( filtrando entre _MAX_ registro(s) )",
		"paginate": {
			"first":      "Primeiro",
			"last":       "Último",
			"next":       "Proximo",
			"previous":   "Anterior"
		}
	}
});

/*
	"language": {
	    "decimal":        "",
	    "emptyTable":     "No data available in table",
	    "info":           "Showing _START_ to _END_ of _TOTAL_ entries",
	    "infoEmpty":      "Showing 0 to 0 of 0 entries",
	    "infoFiltered":   "(filtered from _MAX_ total entries)",
	    "infoPostFix":    "",
	    "thousands":      ",",
	    "lengthMenu":     "Show _MENU_ entries",
	    "loadingRecords": "Loading...",
	    "processing":     "Processing...",
	    "search":         "Search:",
	    "zeroRecords":    "No matching records found",
	    "paginate": {
	        "first":      "First",
	        "last":       "Last",
	        "next":       "Next",
	        "previous":   "Previous"
	    },
	    "aria": {
	        "sortAscending":  ": activate to sort column ascending",
	        "sortDescending": ": activate to sort column descending"
	    }
	}
*/