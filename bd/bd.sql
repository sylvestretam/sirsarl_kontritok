#Ma base de données : 

DROP TABLE IF EXISTS KTT_market_develloper;
CREATE TABLE KTT_market_develloper(
        employee     varchar(25),
        noms     varchar(255),
        target_vente     integer,
        target_prospection     integer,
        PRIMARY KEY (employee)
);

DROP TABLE IF EXISTS KTT_superviseur;
CREATE TABLE KTT_superviseur(
        employee     varchar(25),
        noms     varchar(255),
        target_vente     integer,
        target_prospection     integer,
        PRIMARY KEY (employee)
);

DROP TABLE IF EXISTS KTT_presence_md;
CREATE TABLE KTT_presence_md(
        date_jour       date,
        observation     varchar(500),
        PRIMARY KEY (date_jour)
);

DROP TABLE IF EXISTS KTT_ligne_presence_md;
CREATE TABLE KTT_ligne_presence_md(
        date_presence     date,
        market_develloper     varchar(25),
        status     varchar(25),

        PRIMARY KEY(date_presence,market_develloper)
);

DROP TABLE IF EXISTS KTT_point_de_vente;
CREATE TABLE KTT_point_de_vente(
        code_pv     varchar(25),
        nom     varchar(255),
        description     varchar(255),
        localisation     varchar(255),
        type     varchar(255),
        status     varchar(25),
        status_by     varchar(25),
        PRIMARY KEY (code_pv)
);

DROP TABLE IF EXISTS KTT_magasin;
CREATE TABLE KTT_magasin(
        code     varchar(25),
        designation     varchar(255),
        localisation     varchar(255),
        PRIMARY KEY (code)
);

DROP TABLE IF EXISTS KTT_retour_magasin_sup;
CREATE TABLE KTT_retour_magasin_sup(
        retour_id     varchar(25),
        date_retour     date,
        valeur_total     integer,
        observation     varchar(25),
        enreg_by     varchar(25),
        magasin     varchar(25),
        superviseur     varchar(25),
        uuid     varchar(500) unique,
        PRIMARY KEY (retour_id)
);

DROP TABLE IF EXISTS KTT_retour_magasin_pv;
CREATE TABLE KTT_retour_magasin_pv(
        retour_id     varchar(25),
        date_retour     date,
        valeur_total     integer,
        observation     varchar(255),
        enreg_by     varchar(25),
        point_de_vente     varchar(25),
        magasin     varchar(25),
        uuid     varchar(500) unique,
        PRIMARY KEY (retour_id)
);

DROP TABLE IF EXISTS KTT_sortie_magasin_sup;
CREATE TABLE KTT_sortie_magasin_sup(
        sortie_id     varchar(25),
        date_sortie     date,
        valeur_total     integer,
        observation     varchar(25),
        enreg_by     varchar(25),
        superviseur     varchar(25),
        magasin     varchar(25),
        uuid     varchar(500) unique,
        PRIMARY KEY (sortie_id)
);

DROP TABLE IF EXISTS KTT_sortie_magasin_pv;
CREATE TABLE KTT_sortie_magasin_pv(
        sortie_id     varchar(25),
        date_sortie     date,
        valeur_total     integer,
        observation     varchar(25),
        enreg_by     varchar(25),
        point_de_vente     varchar(25),
        magasin     varchar(25),
        uuid     varchar(500) unique,
        PRIMARY KEY (sortie_id)
);

DROP TABLE IF EXISTS KTT_vente_md;
CREATE TABLE KTT_vente_md(
        vente_id     varchar(25),
        date_vente     date,
        valeur_total     integer,
        observation     varchar(255),
        enreg_by     varchar(255),
        status     varchar(25),
        status_by     varchar(25),
        market_develloper     varchar(25),
        PRIMARY KEY (vente_id)
);

DROP TABLE IF EXISTS KTT_vente_pv;
CREATE TABLE KTT_vente_pv(
        vente_id     varchar(25),
        date_vente     date,
        valeur_total     integer,
        observation     varchar(255),
        enreg_by     varchar(255),
        status     varchar(25),
        status_by     varchar(25),
        pv     varchar(25),
        PRIMARY KEY (vente_id)
);

DROP TABLE IF EXISTS KTT_article;
CREATE TABLE KTT_article(
        code     varchar(25),
        designation     varchar(255),
        description     Varchar (500),
        PRIMARY KEY (code)
);

DROP TABLE IF EXISTS KTT_unite_stock;
CREATE TABLE KTT_unite_stock(
        code_unite     varchar(25),
        designation     varchar(255),
        description     Varchar (500),
        PRIMARY KEY (code_unite)
);

DROP TABLE IF EXISTS KTT_unite_article;
CREATE TABLE KTT_unite_article(
        article     varchar(25),
        unite     varchar(25),
        PRIMARY KEY (article,unite)
);

DROP TABLE IF EXISTS KTT_stock_magasin;
CREATE TABLE KTT_stock_magasin(
        quantite     integer,
        valeur     integer,
        article     varchar(25),
        unite     varchar(25),
        magasin     varchar(25),
        PRIMARY KEY (article,unite,magasin)
);

DROP TABLE IF EXISTS KTT_ligne_sortie_sup;
CREATE TABLE KTT_ligne_sortie_sup(
        quantite     integer,
        valeur     integer,
        sortie_sup     varchar(25),
        article     varchar(25),
        unite     varchar(25),
        PRIMARY KEY (sortie_sup,article,unite)
);

DROP TABLE IF EXISTS KTT_ligne_retour_sup;
CREATE TABLE KTT_ligne_retour_sup(
        quantite     integer,
        valeur     integer,
        unite     varchar(25),
        retour_sup     varchar(25),
        article     varchar(25),
        PRIMARY KEY (unite,retour_sup,article)
);

DROP TABLE IF EXISTS KTT_ligne_sortie_pv;
CREATE TABLE KTT_ligne_sortie_pv(
        quantite     integer,
        valeur     integer,
        unite     varchar(25),
        article     varchar(25),
        sortie_pv     varchar(25),
        PRIMARY KEY (unite,article,sortie_pv)
);

DROP TABLE IF EXISTS KTT_ligne_retour_pv;
CREATE TABLE KTT_ligne_retour_pv(
        quantite     integer,
        valeur     integer,
        retour_pv     varchar(25),
        unite     varchar(25),
        article     varchar(25),
        PRIMARY KEY (retour_pv,unite,article)
);

DROP TABLE IF EXISTS KTT_ligne_vente_md;
CREATE TABLE KTT_ligne_vente_md(
        quantite     integer,
        valeur     integer,
        vente_md     varchar(25),
        unite     varchar(25),
        article     varchar(25),
        PRIMARY KEY (vente_md,unite,article)
);

DROP TABLE IF EXISTS KTT_ligne_vente_pv;
CREATE TABLE KTT_ligne_vente_pv(
        quantite     integer,
        valeur     integer,
        vente_pv     varchar(25),
        unite     varchar(25),
        article     varchar(25),
        PRIMARY KEY (vente_pv,unite,article)
);

DROP TABLE IF EXISTS KTT_target_pv;
CREATE TABLE KTT_target_pv(
        quantite     integer,
        valeur     integer,
        point_de_vente     varchar(25),
        unite     varchar(25),
        article     varchar(25),
        PRIMARY KEY (point_de_vente,unite,article)
);

DROP TABLE IF EXISTS KTT_reception_magasin;
CREATE TABLE KTT_reception_magasin(
        reception_id varchar(25),
        date_reception     date,
        magasin     varchar(25),
        uuid     varchar(500) unique,
        PRIMARY KEY (reception_id)
);

DROP TABLE IF EXISTS KTT_ligne_reception_magasin;
CREATE TABLE KTT_ligne_reception_magasin(
        quantite     integer,
        valeur     integer,
        reception     varchar(25),
        unite     varchar(25),
        article     varchar(25),
        PRIMARY KEY (reception,unite,article)
);

DROP TABLE IF EXISTS KTT_stock_sup;
CREATE TABLE KTT_stock_sup(
        quantite     integer,
        superviseur     varchar(25),
        unite     varchar(25),
        article     varchar(25),
        PRIMARY KEY (superviseur,unite,article)
);

ALTER TABLE KTT_superviseur ADD CONSTRAINT FK_KTT_superviseur_employee FOREIGN KEY (employee) REFERENCES AT_employee(matricule);

ALTER TABLE KTT_market_develloper ADD CONSTRAINT FK_KTT_market_develloper_employee FOREIGN KEY (employee) REFERENCES AT_employee(matricule);

ALTER TABLE KTT_ligne_presence_md ADD CONSTRAINT FK_KTT_presence_md_market_develloper FOREIGN KEY (market_develloper) REFERENCES KTT_market_develloper(employee);
ALTER TABLE KTT_ligne_presence_md ADD CONSTRAINT FK_KTT_linge_presence_md_presence_md FOREIGN KEY (date_presence) REFERENCES KTT_presence_md(date_jour);

ALTER TABLE KTT_unite_article ADD CONSTRAINT FK_KTT_unite_article_unite FOREIGN KEY (unite) REFERENCES KTT_unite_stock(code_unite);
ALTER TABLE KTT_unite_article ADD CONSTRAINT FK_KTT_unite_article_article FOREIGN KEY (article) REFERENCES KTT_article(code);

ALTER TABLE KTT_retour_magasin_sup ADD CONSTRAINT FK_KTT_retour_magasin_sup_magasin FOREIGN KEY (magasin) REFERENCES KTT_magasin(code);
ALTER TABLE KTT_retour_magasin_sup ADD CONSTRAINT FK_KTT_retour_magasin_sup_superviseur FOREIGN KEY (superviseur) REFERENCES KTT_superviseur(employee);

ALTER TABLE KTT_retour_magasin_pv ADD CONSTRAINT FK_KTT_retour_magasin_pv_point_de_vente FOREIGN KEY (point_de_vente) REFERENCES KTT_point_de_vente(code_pv);
ALTER TABLE KTT_retour_magasin_pv ADD CONSTRAINT FK_KTT_retour_magasin_pv_magasin FOREIGN KEY (magasin) REFERENCES KTT_magasin(code);

ALTER TABLE KTT_sortie_magasin_sup ADD CONSTRAINT FK_KTT_sortie_magasin_sup_superviseur FOREIGN KEY (superviseur) REFERENCES KTT_superviseur(employee);
ALTER TABLE KTT_sortie_magasin_sup ADD CONSTRAINT FK_KTT_sortie_magasin_sup_magasin FOREIGN KEY (magasin) REFERENCES KTT_magasin(code);

ALTER TABLE KTT_sortie_magasin_pv ADD CONSTRAINT FK_KTT_sortie_magasin_pv_point_de_vente FOREIGN KEY (point_de_vente) REFERENCES KTT_point_de_vente(code_pv);
ALTER TABLE KTT_sortie_magasin_pv ADD CONSTRAINT FK_KTT_sortie_magasin_pv_magasin FOREIGN KEY (magasin) REFERENCES KTT_magasin(code);

ALTER TABLE KTT_vente_md ADD CONSTRAINT FK_KTT_vente_md_market_develloper FOREIGN KEY (market_develloper) REFERENCES KTT_market_develloper(employee);

ALTER TABLE KTT_stock_magasin ADD CONSTRAINT FK_KTT_stock_magasin_article FOREIGN KEY (article) REFERENCES KTT_article(code);
ALTER TABLE KTT_stock_magasin ADD CONSTRAINT FK_KTT_stock_magasin_unite FOREIGN KEY (unite) REFERENCES KTT_unite_stock(code_unite);
ALTER TABLE KTT_stock_magasin ADD CONSTRAINT FK_KTT_stock_magasin_magasin FOREIGN KEY (magasin) REFERENCES KTT_magasin(code);

ALTER TABLE KTT_ligne_sortie_sup ADD CONSTRAINT FK_KTT_ligne_sortie_sup_sortie_sup FOREIGN KEY (sortie_sup) REFERENCES KTT_sortie_magasin_sup(sortie_id);
ALTER TABLE KTT_ligne_sortie_sup ADD CONSTRAINT FK_KTT_ligne_sortie_sup_article FOREIGN KEY (article) REFERENCES KTT_article(code);
ALTER TABLE KTT_ligne_sortie_sup ADD CONSTRAINT FK_KTT_ligne_sortie_sup_unite FOREIGN KEY (unite) REFERENCES KTT_unite_stock(code_unite);

ALTER TABLE KTT_ligne_retour_sup ADD CONSTRAINT FK_KTT_ligne_retour_sup_unite FOREIGN KEY (unite) REFERENCES KTT_unite_stock(code_unite);
ALTER TABLE KTT_ligne_retour_sup ADD CONSTRAINT FK_KTT_ligne_retour_sup_retour_sup FOREIGN KEY (retour_sup) REFERENCES KTT_retour_magasin_sup(retour_id);
ALTER TABLE KTT_ligne_retour_sup ADD CONSTRAINT FK_KTT_ligne_retour_sup_article FOREIGN KEY (article) REFERENCES KTT_article(code);

ALTER TABLE KTT_ligne_sortie_pv ADD CONSTRAINT FK_KTT_ligne_sortie_pv_unite FOREIGN KEY (unite) REFERENCES KTT_unite_stock(code_unite);
ALTER TABLE KTT_ligne_sortie_pv ADD CONSTRAINT FK_KTT_ligne_sortie_pv_article FOREIGN KEY (article) REFERENCES KTT_article(code);
ALTER TABLE KTT_ligne_sortie_pv ADD CONSTRAINT FK_KTT_ligne_sortie_pv_sortie_pv FOREIGN KEY (sortie_pv) REFERENCES KTT_sortie_magasin_pv(sortie_id);

ALTER TABLE KTT_ligne_retour_pv ADD CONSTRAINT FK_KTT_ligne_retour_pv_retour_pv FOREIGN KEY (retour_pv) REFERENCES KTT_retour_magasin_pv(retour_id);
ALTER TABLE KTT_ligne_retour_pv ADD CONSTRAINT FK_KTT_ligne_retour_pv_unite FOREIGN KEY (unite) REFERENCES KTT_unite_stock(code_unite);
ALTER TABLE KTT_ligne_retour_pv ADD CONSTRAINT FK_KTT_ligne_retour_pv_article FOREIGN KEY (article) REFERENCES KTT_article(code);

ALTER TABLE KTT_ligne_vente_md ADD CONSTRAINT FK_KTT_ligne_vente_md_vente_md FOREIGN KEY (vente_md) REFERENCES KTT_vente_md(vente_id);
ALTER TABLE KTT_ligne_vente_md ADD CONSTRAINT FK_KTT_ligne_vente_md_unite FOREIGN KEY (unite) REFERENCES KTT_unite_stock(code_unite);
ALTER TABLE KTT_ligne_vente_md ADD CONSTRAINT FK_KTT_ligne_vente_md_article FOREIGN KEY (article) REFERENCES KTT_article(code);

ALTER TABLE KTT_target_pv ADD CONSTRAINT FK_KTT_target_pv_point_de_vente FOREIGN KEY (point_de_vente) REFERENCES KTT_point_de_vente(code_pv);
ALTER TABLE KTT_target_pv ADD CONSTRAINT FK_KTT_target_pv_unite FOREIGN KEY (unite) REFERENCES KTT_unite_stock(code_unite);
ALTER TABLE KTT_target_pv ADD CONSTRAINT FK_KTT_target_pv_article FOREIGN KEY (article) REFERENCES KTT_article(code);


ALTER TABLE KTT_reception_magasin ADD CONSTRAINT FK_KTT_reception_magasin_magasin FOREIGN KEY (magasin) REFERENCES KTT_magasin(code);

ALTER TABLE KTT_ligne_reception_magasin ADD CONSTRAINT FK_KTT_ligne_reception_magasin_reception FOREIGN KEY (reception) REFERENCES KTT_reception_magasin(reception_id);
ALTER TABLE KTT_ligne_reception_magasin ADD CONSTRAINT FK_KTT_ligne_reception_magasin_unite FOREIGN KEY (unite) REFERENCES KTT_unite_stock(code_unite);
ALTER TABLE KTT_ligne_reception_magasin ADD CONSTRAINT FK_KTT_ligne_reception_magasin_article FOREIGN KEY (article) REFERENCES KTT_article(code);

ALTER TABLE KTT_stock_sup ADD CONSTRAINT FK_KTT_stock_sup_superviseur FOREIGN KEY (superviseur) REFERENCES KTT_superviseur(employee);
ALTER TABLE KTT_stock_sup ADD CONSTRAINT FK_KTT_stock_sup_unite FOREIGN KEY (unite) REFERENCES KTT_unite_stock(code_unite);
ALTER TABLE KTT_stock_sup ADD CONSTRAINT FK_KTT_stock_sup_article FOREIGN KEY (article) REFERENCES KTT_article(code);


DROP TRIGGER IF EXISTS KTT_LigneReceptionINSERTUpdateStockMagasin;
DELIMITER |
CREATE TRIGGER KTT_LigneReceptionINSERTUpdateStockMagasin BEFORE INSERT
ON KTT_ligne_reception_magasin FOR EACH ROW
BEGIN

    DECLARE m_magasin varchar(25);
    DECLARE m_quantite integer default 0;
    DECLARE m_valeur integer default 0;
    DECLARE n_quantite integer default 0;
    DECLARE n_valeur integer default 0;

    SELECT magasin INTO @m_magasin FROM KTT_reception_magasin WHERE reception_id = NEW.reception;
    
    SELECT quantite INTO m_quantite FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = NEW.article AND unite = NEW.unite;
    SELECT valeur INTO m_valeur FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = NEW.article AND unite = NEW.unite;


    SET n_quantite = m_quantite + NEW.quantite;
    SET n_valeur = m_valeur + NEW.valeur;
    
	 
    DELETE FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = NEW.article AND unite = NEW.unite;
    
    INSERT INTO KTT_stock_magasin(quantite,valeur,article,unite,magasin)  VALUES( n_quantite, n_valeur, NEW.article, NEW.unite, @m_magasin);
END |

DROP TRIGGER IF EXISTS KTT_LigneReceptionDELETEUpdateStockMagasin;
DELIMITER |
CREATE TRIGGER KTT_LigneReceptionDELETEUpdateStockMagasin BEFORE DELETE
ON KTT_ligne_reception_magasin FOR EACH ROW
BEGIN

    DECLARE m_magasin varchar(25);
    DECLARE m_article varchar(25);
    DECLARE m_unite varchar(25);

    DECLARE m_quantite integer default 0;
    DECLARE m_valeur integer default 0;

    DECLARE n_quantite integer default 0;
    DECLARE n_valeur integer default 0;

    SET m_article = OLD.article;
    SET m_unite = OLD.unite;

    SELECT magasin INTO @m_magasin FROM KTT_reception_magasin WHERE reception_id = OLD.reception;
    
    SELECT quantite INTO m_quantite FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = m_article AND unite = m_unite;
    SELECT valeur INTO m_valeur FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = m_article AND unite = m_unite;


    SET n_quantite = m_quantite - OLD.quantite;
    SET n_valeur = m_valeur - OLD.valeur;
    

    IF n_quantite >= 0 THEN

        DELETE FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = m_article AND unite = m_unite;

        INSERT INTO KTT_stock_magasin(quantite,valeur,article,unite,magasin)  VALUES( n_quantite, n_valeur, m_article, m_unite, @m_magasin);
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'STOCK INSUFFISSANT ...';
    END IF;
END |

DROP TRIGGER IF EXISTS KTT_LigneSortieFTINSERTUpdateStockMagasin;
DELIMITER |
CREATE TRIGGER KTT_LigneSortieFTINSERTUpdateStockMagasin BEFORE INSERT
ON KTT_ligne_sortie_sup FOR EACH ROW
BEGIN

    DECLARE m_magasin varchar(25);
    DECLARE m_quantite integer default 0;
    DECLARE m_valeur integer default 0;
    DECLARE n_quantite integer default 0;
    DECLARE n_valeur integer default 0;

    SELECT magasin INTO @m_magasin FROM KTT_sortie_magasin_sup WHERE sortie_id = NEW.sortie_sup;
    
    SELECT quantite INTO m_quantite FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = NEW.article AND unite = NEW.unite;
    SELECT valeur INTO m_valeur FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = NEW.article AND unite = NEW.unite;


    SET n_quantite = m_quantite - NEW.quantite;
    SET n_valeur = m_valeur - NEW.valeur;
    
    IF n_quantite >= 0 THEN

       DELETE FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = NEW.article AND unite = NEW.unite;
    
       INSERT INTO KTT_stock_magasin(quantite,valeur,article,unite,magasin)  VALUES( n_quantite, n_valeur, NEW.article, NEW.unite, @m_magasin);
    
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'STOCK INSUFFISSANT ...';
    END IF;
END |

DROP TRIGGER IF EXISTS KTT_LigneSortieFTDELETEUpdateStockMagasin;
DELIMITER |
CREATE TRIGGER KTT_LigneSortieFTDELETEUpdateStockMagasin BEFORE DELETE
ON KTT_ligne_sortie_sup FOR EACH ROW
BEGIN

    DECLARE m_magasin varchar(25);
    DECLARE m_article varchar(25);
    DECLARE m_unite varchar(25);

    DECLARE m_quantite integer default 0;
    DECLARE m_valeur integer default 0;

    DECLARE n_quantite integer default 0;
    DECLARE n_valeur integer default 0;

    SET m_article = OLD.article;
    SET m_unite = OLD.unite;

    SELECT magasin INTO @m_magasin FROM KTT_sortie_magasin_sup WHERE sortie_id = OLD.sortie_sup;
    
    SELECT quantite INTO m_quantite FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = m_article AND unite = m_unite;
    SELECT valeur INTO m_valeur FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = m_article AND unite = m_unite;

    SET n_quantite = m_quantite + OLD.quantite;
    SET n_valeur = m_valeur + OLD.valeur;
     
    DELETE FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = m_article AND unite = m_unite;
    
    INSERT INTO KTT_stock_magasin(quantite,valeur,article,unite,magasin)  VALUES( n_quantite, n_valeur, m_article, m_unite, @m_magasin);
END |


DROP TRIGGER IF EXISTS KTT_LigneSortiePVINSERTUpdateStockMagasin;
DELIMITER |
CREATE TRIGGER KTT_LigneSortiePVINSERTUpdateStockMagasin BEFORE INSERT
ON KTT_ligne_sortie_pv FOR EACH ROW
BEGIN

    DECLARE m_magasin varchar(25);
    DECLARE m_quantite integer default 0;
    DECLARE m_valeur integer default 0;
    DECLARE n_quantite integer default 0;
    DECLARE n_valeur integer default 0;

    SELECT magasin INTO @m_magasin FROM KTT_sortie_magasin_pv WHERE sortie_id = NEW.sortie_pv;
    
    SELECT quantite INTO m_quantite FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = NEW.article AND unite = NEW.unite;
    SELECT valeur INTO m_valeur FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = NEW.article AND unite = NEW.unite;

    SET n_quantite = m_quantite - NEW.quantite;
    SET n_valeur = m_valeur - NEW.valeur;
    	 
    IF n_quantite >= 0 THEN

       DELETE FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = NEW.article AND unite = NEW.unite;
    
       INSERT INTO KTT_stock_magasin(quantite,valeur,article,unite,magasin)  VALUES( n_quantite, n_valeur, NEW.article, NEW.unite, @m_magasin);
    
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'STOCK INSUFFISSANT ...';
    END IF;
END |

DROP TRIGGER IF EXISTS KTT_LigneSortiePVDELETEUpdateStockMagasin;
DELIMITER |
CREATE TRIGGER KTT_LigneSortiePVDELETEUpdateStockMagasin BEFORE DELETE
ON KTT_ligne_sortie_pv FOR EACH ROW
BEGIN

    DECLARE m_magasin varchar(25);
    DECLARE m_article varchar(25);
    DECLARE m_unite varchar(25);

    DECLARE m_quantite integer default 0;
    DECLARE m_valeur integer default 0;

    DECLARE n_quantite integer default 0;
    DECLARE n_valeur integer default 0;

    SET m_article = OLD.article;
    SET m_unite = OLD.unite;

    SELECT magasin INTO @m_magasin FROM KTT_sortie_magasin_pv WHERE sortie_id = OLD.sortie_pv;
    
    SELECT quantite INTO m_quantite FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = m_article AND unite = m_unite;
    SELECT valeur INTO m_valeur FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = m_article AND unite = m_unite;

    SET n_quantite = m_quantite + OLD.quantite;
    SET n_valeur = m_valeur + OLD.valeur;
    	 
    DELETE FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = m_article AND unite = m_unite;
    
    INSERT INTO KTT_stock_magasin(quantite,valeur,article,unite,magasin)  VALUES( n_quantite, n_valeur, m_article, m_unite, @m_magasin);
END |



DROP TRIGGER IF EXISTS KTT_LigneRetourFTINSERTUpdateStockMagasin;
DELIMITER |
CREATE TRIGGER KTT_LigneRetourFTINSERTUpdateStockMagasin BEFORE INSERT
ON KTT_ligne_retour_sup FOR EACH ROW
BEGIN

    DECLARE m_magasin varchar(25);
    DECLARE m_quantite integer default 0;
    DECLARE m_valeur integer default 0;
    DECLARE n_quantite integer default 0;
    DECLARE n_valeur integer default 0;

    SELECT magasin INTO @m_magasin FROM KTT_retour_magasin_sup WHERE retour_id = NEW.retour_sup;
    
    SELECT quantite INTO m_quantite FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = NEW.article AND unite = NEW.unite;
    SELECT valeur INTO m_valeur FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = NEW.article AND unite = NEW.unite;


    SET n_quantite = m_quantite + NEW.quantite;
    SET n_valeur = m_valeur + NEW.valeur;
    
	 
    DELETE FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = NEW.article AND unite = NEW.unite;
    
    INSERT INTO KTT_stock_magasin(quantite,valeur,article,unite,magasin)  VALUES( n_quantite, n_valeur, NEW.article, NEW.unite, @m_magasin);
END |

DROP TRIGGER IF EXISTS KTT_LigneRetourFTDELETEUpdateStockMagasin;
DELIMITER |
CREATE TRIGGER KTT_LigneRetourFTDELETEUpdateStockMagasin BEFORE DELETE
ON KTT_ligne_retour_sup FOR EACH ROW
BEGIN

    DECLARE m_magasin varchar(25);
    DECLARE m_article varchar(25);
    DECLARE m_unite varchar(25);

    DECLARE m_quantite integer default 0;
    DECLARE m_valeur integer default 0;

    DECLARE n_quantite integer default 0;
    DECLARE n_valeur integer default 0;

    SET m_article = OLD.article;
    SET m_unite = OLD.unite;

    SELECT magasin INTO @m_magasin FROM KTT_retour_magasin_sup WHERE retour_id = OLD.retour_sup;
    
    SELECT quantite INTO m_quantite FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = m_article AND unite = m_unite;
    SELECT valeur INTO m_valeur FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = m_article AND unite = m_unite;

    SET n_quantite = m_quantite - OLD.quantite;
    SET n_valeur = m_valeur - OLD.valeur;
     
    DELETE FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = m_article AND unite = m_unite;
    
    INSERT INTO KTT_stock_magasin(quantite,valeur,article,unite,magasin)  VALUES( n_quantite, n_valeur, m_article, m_unite, @m_magasin);
END |



DROP TRIGGER IF EXISTS KTT_LigneRetourPVINSERTUpdateStockMagasin;
DELIMITER |
CREATE TRIGGER KTT_LigneRetourPVINSERTUpdateStockMagasin BEFORE INSERT
ON KTT_ligne_retour_pv FOR EACH ROW
BEGIN

    DECLARE m_magasin varchar(25);
    DECLARE m_quantite integer default 0;
    DECLARE m_valeur integer default 0;
    DECLARE n_quantite integer default 0;
    DECLARE n_valeur integer default 0;

    SELECT magasin INTO @m_magasin FROM KTT_retour_magasin_pv WHERE retour_id = NEW.retour_pv;
    
    SELECT quantite INTO m_quantite FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = NEW.article AND unite = NEW.unite;
    SELECT valeur INTO m_valeur FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = NEW.article AND unite = NEW.unite;

    SET n_quantite = m_quantite + NEW.quantite;
    SET n_valeur = m_valeur + NEW.valeur;
    	 
    DELETE FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = NEW.article AND unite = NEW.unite;
    
    INSERT INTO KTT_stock_magasin(quantite,valeur,article,unite,magasin)  VALUES( n_quantite, n_valeur, NEW.article, NEW.unite, @m_magasin);
END |

DROP TRIGGER IF EXISTS KTT_LigneRetourPVDELETEUpdateStockMagasin;
DELIMITER |
CREATE TRIGGER KTT_LigneRetourPVDELETEUpdateStockMagasin BEFORE DELETE
ON KTT_ligne_retour_pv FOR EACH ROW
BEGIN

    DECLARE m_magasin varchar(25);
    DECLARE m_article varchar(25);
    DECLARE m_unite varchar(25);

    DECLARE m_quantite integer default 0;
    DECLARE m_valeur integer default 0;

    DECLARE n_quantite integer default 0;
    DECLARE n_valeur integer default 0;

    SET m_article = OLD.article;
    SET m_unite = OLD.unite;

    SELECT magasin INTO @m_magasin FROM KTT_retour_magasin_pv WHERE retour_id = OLD.retour_pv;
    
    SELECT quantite INTO m_quantite FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = m_article AND unite = m_unite;
    SELECT valeur INTO m_valeur FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = m_article AND unite = m_unite;

    SET n_quantite = m_quantite - OLD.quantite;
    SET n_valeur = m_valeur - OLD.valeur;
    	 
    DELETE FROM KTT_stock_magasin WHERE magasin = @m_magasin AND article = m_article AND unite = m_unite;
    
    INSERT INTO KTT_stock_magasin(quantite,valeur,article,unite,magasin)  VALUES( n_quantite, n_valeur, m_article, m_unite, @m_magasin);
END |