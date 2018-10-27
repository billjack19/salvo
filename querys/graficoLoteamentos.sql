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
WHERE 
	TAB_LOTES_STATUS.Loteamento = 2