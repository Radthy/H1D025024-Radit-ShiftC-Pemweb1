drop database if exists modul_6_tugas;
create database modul_6_tugas;

use modul_6_tugas;

CREATE TABLE barang (
  id int(11) NOT NULL auto_increment,
  nama varchar(100),
  harga int(11),
  PRIMARY KEY (id)
);

CREATE TABLE pembeli (
  id int(11) NOT NULL auto_increment,
  nama varchar(100),
  nomor_hp varchar(20),
  alamat varchar(255),
  PRIMARY KEY (id)
);

CREATE TABLE kurir (
  id int(11) NOT NULL auto_increment,
  nama varchar(100),
  nomor_hp varchar(20),
  PRIMARY KEY (id)
);

INSERT INTO barang (nama, harga) VALUES
('Gergaji', 75000), ('Pulpen', 3000), ('Laptop', 8500000);

INSERT INTO pembeli (nama, nomor_hp, alamat) VALUES
('Muflih', '081234567890', 'Purwokerto'),
('Romi', '081234567891', 'Banyumas'),
('Anin', '081234567892', 'Purbalingga');

INSERT INTO kurir (nama, nomor_hp) VALUES
('Althaaf', '082111111111'),
('Irsyad', '082111111112'),
('Ilhan', '082111111113');
