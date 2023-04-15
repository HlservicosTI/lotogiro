CREATE TABLE lotogiro2.cotacoes (
    id smallint AUTO_INCREMENT PRIMARY KEY,
	modalidades Varchar(50) NOT NULL UNIQUE,
    cotacao DECIMAL(6,2) NOT NULL
);
