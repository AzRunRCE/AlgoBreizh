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
        label       Varchar (255) ,
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

INSERT INTO `tproducts` (`id`, `label`, `name`, `price`, `reference`) VALUES
(1, 'chrondus-crispus', 'Chondrus crispus', 10, 'P001'),
(2, 'conserves', 'Conserves', 8, 'P002'),
(3, 'court-bouillon', 'Court bouillon', 12, 'P003'),
(4, 'emiette-de-thon-wakame', 'Émietté de thon Wakamé', 10, 'P004'),
(5, 'epices-marines', 'Épices marines', 9, 'P005'),
(6, 'haricot-de-mer-en-saumure-500-g', 'Haricots de mer en saumure (500g)', 19, 'P006'),
(7, 'haricots-marins', 'Haricots marins', 12.5, 'P007'),
(8, 'laitue-de-mer-feuilles', 'Laitue de mer en feuilles', 11.9, 'P008'),
(9, 'laitue-de-mer-paillete', 'Laitue de mer en paillettes', 18.5, 'P009'),
(10, 'moutarde-salicorne', 'Moutarde à la salicorne', 15.5, 'P010'),
(11, 'nori-en-feuilles', 'Nori en feuilles', 15.1, 'P011'),
(12, 'nori-paillette', 'Nori en paillettes', 7.5, 'P012'),
(13, 'nori-saupoudreur-aromate-10g', 'Nori saupoudreur aromate (10g)', 5, 'P013'),
(14, 'pates-aux-algues', 'Pates aux algues', 8, 'P014'),
(15, 'salicornes_au_naturel', 'Salicornes au naturel', 9.5, 'P015'),
(16, 'salicornes_au_vinaigre', 'Salicornes au vinaigre', 13.8, 'P016'),
(17, 'sels-aux-algues', 'Sels aux algues', 17, 'P017'),
(18, 'tisane-aux-algues', 'Tisane aux algues', 7, 'P018'),
(19, 'wakame_feuille', 'Wakamé en feuilles', 5, 'P019'),
(20, 'wakame-paillette', 'Wakamé en paillettes', 8, 'P020');
