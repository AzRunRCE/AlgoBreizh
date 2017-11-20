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
        description Varchar (255) NOT NULL ,
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

INSERT INTO `tclients` (`id`, `firstname`, `lastname`, `password`, `email`, `active`, `code`) VALUES
(1, 'qmz', 'Quentin', 'Martinez', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'qmz@algobreizh.fr', 1),
(2, 'bst','Paul', 'Besret', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'bst@algobreizh.fr', 1),
(3,'dpe', 'Dorian', 'Pilorge', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'dpe@algobreizh.fr', 0);


#------------------------------------------------------------
# Insert Table: tProducts
#------------------------------------------------------------

INSERT INTO `tproducts` (`id`, `label`, `description`, `price`, `reference`) VALUES
(1, 'chrondus-crispus', 'chrondus-crispus', 10, 'P001'),
(2, 'conserves', 'conserves', 8, 'P002'),
(3, 'court-bouillon', 'court-bouillon', 12, 'P003'),
(4, 'emiette-de-thon-wakame', 'emiette-de-thon-wakame', 10, 'P004'),
(5, 'epices-marines', 'epices-marines', 9, 'P005'),
(6, 'haricot-de-mer-en-saumure-500-g', 'haricot-de-mer-en-saumure-500-g', 9, 'P006'),
(8, 'haricot-de-mer-en-saumure-500-g', 'haricot-de-mer-en-saumure-500-g', 19, 'P007'),
(9, 'haricots-marins', 'haricots-marins', 12.5, 'P008'),
(10, 'laitue-de-mer-feuilles', 'laitue-de-mer-feuilles', 11.9, 'P010'),
(11, 'laitue-de-mer-paillete', 'laitue-de-mer-paillete', 18.5, 'P011'),
(12, 'moutarde-salicorne', 'moutarde-salicorne', 15.5, 'P012'),
(13, 'nori-en-feuilles', 'nori-en-feuilles', 15.1, 'P013'),
(14, 'nori-paillette', 'nori-paillette', 7.5, 'P014'),
(15, 'nori-saupoudreur-aromate-10g', 'nori-saupoudreur-aromate-10g', 5, 'P015'),
(16, 'pates-aux-algues', 'pates-aux-algues', 8, 'P016'),
(18, 'salicornes_au_naturel', 'salicornes_au_naturel', 9.5, 'P018'),
(19, 'salicornes_au_vinaigre', 'salicornes_au_vinaigre', 13.8, 'P019'),
(20, 'sels-aux-algues', 'sels-aux-algues', 17, 'P020'),
(21, 'tisane-aux-algues', 'tisane-aux-algues', 7, 'P021'),
(22, 'wakame_feuille', 'wakame_feuille', 5, 'P022'),
(23, 'wakame-paillette', 'wakame-paillette', 8, 'P023');
