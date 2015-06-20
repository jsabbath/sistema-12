create table evento(
	eve_id int auto_increment,
    eve_descripcion varchar(255),
    eve_fecha date,
    eve_inicio time,
    eve_fin time,
    eve_usuario int,
    primary key (eve_id),
    foreign key (eve_usuario) references usuario (usu_id)
	)