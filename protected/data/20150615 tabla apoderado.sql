create table apoderado(
    apo_id int auto_increment,
    apo_nombre1 varchar(20),
    apo_nombre2 varchar(20),
    apo_apepat varchar(20),
    apo_apemat varchar(20),
    apo_rut varchar(12),
    apo_ano int,
    apo_hijo int,
    primary key (apo_id),
    foreign key (apo_hijo) references matricula (mat_id)
)