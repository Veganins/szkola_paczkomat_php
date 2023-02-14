drop database Paczkomat;
create database Paczkomat;
use Paczkomat;
CREATE TABLE Paczka(
    paczka_id int not null auto_increment,
    paczka_numer varchar(20) NOT NULL UNIQUE,
    p_status ENUM("1","2","3","4") ,
    PRIMARY KEY(paczka_id) 
)
Engine=InnoDB default charset='utf8';
INSERT INTO `paczkomat`.`paczka` (`paczka_id`, `paczka_numer`, `p_status`) VALUES ('1', '123456', '3');
INSERT INTO `paczkomat`.`paczka` (`paczka_id`, `paczka_numer`, `p_status`) VALUES ('2', '321321', '4');
INSERT INTO `paczkomat`.`paczka` (`paczka_id`, `paczka_numer`, `p_status`) VALUES ('3', '987654', '1');
