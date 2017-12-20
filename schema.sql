#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: tClients
#------------------------------------------------------------

CREATE TABLE tClients(
        id        Int NOT NULL ,
        username  Varchar (3) ,
        firstname Varchar (255) NOT NULL ,
        lastname  Varchar (255) NOT NULL ,
        password  Varchar (255) ,
        email     Varchar (255) ,
        active    Bool ,
        PRIMARY KEY (id ) ,
        UNIQUE (username )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tProducts
#------------------------------------------------------------

CREATE TABLE tProducts(
        id          Int NOT NULL ,
        name        Varchar (255) NOT NULL ,
        price       Float NOT NULL ,
        reference   Varchar (25) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tOrders
#------------------------------------------------------------

CREATE TABLE tOrders(
        id          Int NOT NULL ,
        close       Bool NOT NULL ,
        id_tClients Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tOrdersContent
#------------------------------------------------------------

CREATE TABLE tOrdersContent(
        quantity   Int NOT NULL ,
        id         Int NOT NULL ,
        id_tOrders Int NOT NULL ,
        PRIMARY KEY (id ,id_tOrders )
)ENGINE=InnoDB;

ALTER TABLE tOrders ADD CONSTRAINT FK_tOrders_id_tClients FOREIGN KEY (id_tClients) REFERENCES tClients(id);
ALTER TABLE tOrdersContent ADD CONSTRAINT FK_tOrdersContent_id FOREIGN KEY (id) REFERENCES tProducts(id);
ALTER TABLE tOrdersContent ADD CONSTRAINT FK_tOrdersContent_id_tOrders FOREIGN KEY (id_tOrders) REFERENCES tOrders(id);

#------------------------------------------------------------
# Insert Table: tClients
#------------------------------------------------------------

INSERT INTO `tclients` (`id`, `username`, `firstname`, `lastname`, `password`, `email`, `active`) VALUES
(1, 'qmz', 'Quentin', 'Martinez', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'qmz@algobreizh.fr', 1),
(2, 'bst', 'Paul', 'Besret', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'bst@algobreizh.fr', 1),
(3, 'dpe', 'Dorian', 'Pilorge', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'dpe@algobreizh.fr', 1);


#------------------------------------------------------------
# Insert Table: tProducts
#------------------------------------------------------------

INSERT INTO `tproducts` (`id`, `name`, `price`, `reference`) VALUES
(1, 'Chondrus crispus', 10, 'P001'),
(2, 'Conserves', 8, 'P002'),
(3, 'Court bouillon', 12, 'P003'),
(4, 'Émietté de thon Wakamé', 10, 'P004'),
(5, 'Épices marines', 9, 'P005'),
(6, 'Haricots de mer en saumure (500g)', 19, 'P006'),
(7, 'Haricots marins', 12.5, 'P007'),
(8, 'Laitue de mer en feuilles', 11.9, 'P008'),
(9, 'Laitue de mer en paillettes', 18.5, 'P009'),
(10, 'Moutarde à la salicorne', 15.5, 'P010'),
(11, 'Nori en feuilles', 15.1, 'P011'),
(12, 'Nori en paillettes', 7.5, 'P012'),
(13, 'Nori saupoudreur aromate (10g)', 5, 'P013'),
(14, 'Pates aux algues', 8, 'P014'),
(15, 'Salicornes au naturel', 9.5, 'P015'),
(16, 'Salicornes au vinaigre', 13.8, 'P016'),
(17, 'Sels aux algues', 17, 'P017'),
(18, 'Tisane aux algues', 7, 'P018'),
(19, 'Wakamé en feuilles', 5, 'P019'),
(20, 'Wakamé en paillettes', 8, 'P020');
