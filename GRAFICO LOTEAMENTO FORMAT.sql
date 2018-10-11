SELECT
	tabloteamentos.Codigo,
	tabloteamentos.Nome,
	CASE SUM(TAB_STATUS.TOTAL_LOTES)
		WHEN 0 THEN 0
		ELSE COUNT(TAB_STATUS.TOTAL_LOTES)
	END AS TOTAL_LOTES,
	TAB_STATUS.StatusLotes
FROM 
	tabloteamentos
INNER JOIN (
	SELECT
		TAB_LOTES_STATUS.Loteamento,
		TAB_LOTES_STATUS.TOTAL_LOTES,
		TAB_LOTES_STATUS.StatusLotes
	FROM(
			SELECT 
				tabloteamentos_lotes.Loteamento AS Loteamento,
				0 AS TOTAL_LOTES,
				'D' AS StatusLotes
			FROM tabloteamentos_lotes
			GROUP BY tabloteamentos_lotes.Loteamento
		UNION ALL
			SELECT 
				tabloteamentos_lotes.Loteamento AS Loteamento,
				0 AS TOTAL_LOTES,
				'IN' AS StatusLotes
			FROM tabloteamentos_lotes
			GROUP BY tabloteamentos_lotes.Loteamento
		UNION ALL
			SELECT 
				tabloteamentos_lotes.Loteamento AS Loteamento,
				0 AS TOTAL_LOTES,
				'R' AS StatusLotes
			FROM tabloteamentos_lotes
			GROUP BY tabloteamentos_lotes.Loteamento
		UNION ALL
			SELECT 
				tabloteamentos_lotes.Loteamento AS Loteamento,
				0 AS TOTAL_LOTES,
				'RE' AS StatusLotes
			FROM tabloteamentos_lotes
			GROUP BY tabloteamentos_lotes.Loteamento
		UNION ALL
			SELECT 
				tabloteamentos_lotes.Loteamento AS Loteamento,
				0 AS TOTAL_LOTES,
				'VE' AS StatusLotes
			FROM tabloteamentos_lotes
			GROUP BY tabloteamentos_lotes.Loteamento
		UNION ALL
			SELECT 
				tabloteamentos_lotes.Loteamento AS Loteamento,
				0 AS TOTAL_LOTES,
				'VP' AS StatusLotes
			FROM tabloteamentos_lotes
			GROUP BY tabloteamentos_lotes.Loteamento
		UNION ALL
			SELECT 
				tabloteamentos_lotes.Loteamento AS Loteamento,
				0 AS TOTAL_LOTES,
				'VQ' AS StatusLotes
			FROM tabloteamentos_lotes
			GROUP BY tabloteamentos_lotes.Loteamento
		UNION ALL
			SELECT
				tabloteamentos_lotes.Loteamento,
				tabloteamentos_lotes.NumLote AS TOTAL_LOTES,
				tabloteamentos_lotes.`Status` AS StatusLotes
			FROM
				tabloteamentos_lotes
	) AS TAB_LOTES_STATUS
) AS TAB_STATUS ON TAB_STATUS.Loteamento = tabloteamentos.Codigo
-- WHERE
-- 	tabloteamentos.Codigo = 1
GROUP BY
	tabloteamentos.Codigo,
	TAB_STATUS.StatusLotes
ORDER BY
	tabloteamentos.Codigo,
	TAB_STATUS.StatusLotes