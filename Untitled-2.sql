select pro.id, pro.nome Professor, are.nome Area
	from professor pro
	join area are
	on pro.id_area = are.id;

select * from professor;