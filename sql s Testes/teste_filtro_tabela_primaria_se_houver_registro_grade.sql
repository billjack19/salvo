select console.* 
from console console 
where 
	(select 
		if(
			(select COUNT(*) from jogo where console_id = console.id_console) > 0, 
			1, -- se sim
			0  -- se não
		)
	) <> 0