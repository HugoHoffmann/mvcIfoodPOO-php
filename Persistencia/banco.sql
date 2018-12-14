create table tbcliente(
    clicodigo      serial,
    clinome        varchar(30),
    clicpf         varchar(14),
    clidatanasc    date,
    clitelefone    varchar(15),
    cliemail       varchar(35) not null,
    clisenha       varchar(30),
    clicidade      varchar(30),
    clibairro      varchar(30),
    clirua         varchar(30),
    clinumero      integer,
    clicomplemento varchar(35),
    CONSTRAINT pk_tbcliente PRIMARY KEY (clicodigo)
)



create table tbusuario(
    usucodigo serial,
    rescodigo integer,
    clicodigo integer,
    usuemail  varchar(30) NOT NULL,
    ususenha  varchar(50) NOT NULL,
    usutipo   varchar (20) NOT NULL ,
    CONSTRAINT pk_tbusuario PRIMARY KEY (usucodigo),
    CONSTRAINT "TDCLIENTE -> TBUSUARIO" foreign key (clicodigo)
        references tbcliente (clicodigo),
    CONSTRAINT "TDRESTAURANTE -> TBUSUARIO" foreign key (rescodigo)
        references tbrestaurante (rescodigo)
)

create table tbrestaurante(
    rescodigo serial,
    resnome        varchar(50),
    rescnpj        varchar(20),
    resemail       varchar(30),
    ressenha       varchar(50),
    rescidade      varchar(30),
    resbairro      varchar(30),
    resrua         varchar(30),
    resnumero      integer,
    rescomplemento varchar(40),
    reslatitude    varchar(20),
    reslongitude   varchar(20),
    respagamento   varchar(30),
    resdescricao   varchar(30),
    CONSTRAINT pk_tbrestaurante PRIMARY KEY (rescodigo)
)

create table tblog(
    logcodigo serial,
    loghoradata timestamp not null,
    logmensagem varchar(250) not null,
    logarquivo varchar(100) not null,
    CONSTRAINT pk_tblog primary key (logcodigo)
)







