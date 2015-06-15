create table apoderado(
    apo_id int auto_increment,
    apo_nombre1 varchar(20),
    apo_nombre2 varchar(20),
    apo_apepat varchar(20),
    apo_apemat varchar(20),
    ape_rut varchar(12),
    apo_ano int,
    ape_hijo int,
    primary key (apo_id),
    foreign key (ape_hijo) references matricula (mat_id)
)