#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------



#------------------------------------------------------------
# Drop: Toutes les tables
#------------------------------------------------------------
DROP TABLE IF EXISTS USER;
DROP TABLE IF EXISTS POSSEDE;
DROP TABLE IF EXISTS REALISE_PAR;
DROP TABLE IF EXISTS FILMS;
DROP TABLE IF EXISTS REALISATEURS;
DROP TABLE IF EXISTS TYPES;




#------------------------------------------------------------
# Table: USER
#------------------------------------------------------------

CREATE TABLE USER(
        idUser          Integer  Auto_increment  NOT NULL ,
        login           Varchar (50) NOT NULL ,
        password        Varchar (100) NOT NULL ,
        email           Varchar (50) NOT NULL ,
        admin           Integer NOT NULL ,
        connected       Integer NOT NULL ,
	CONSTRAINT USER_AK UNIQUE (login) ,
	CONSTRAINT USER_PK PRIMARY KEY (idUser)
);


#------------------------------------------------------------
# Table: FILMS
#------------------------------------------------------------

CREATE TABLE FILMS(
        idFilm                  Integer  Auto_increment  NOT NULL ,
        titre                   Varchar (100) NOT NULL ,
        annee                   Integer NOT NULL ,
        synopsis                TEXT NOT NULL ,
        duree                   Varchar (8) NOT NULL ,
        urlFilm                 TEXT NOT NULL ,
        urlImage                TEXT NOT NULL ,
        note                    Integer NOT NULL DEFAULT 0 ,
        vote                    Integer NOT NULL DEFAULT 0 ,
        vue                     Integer Not NULL DEFAULT 0 ,
        dateEnregistrement      DateTime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT FILMS_TITRE_AK UNIQUE (titre) ,
  CONSTRAINT FILMS_URLFILM_AK UNIQUE (urlFilm(100)) ,
	CONSTRAINT FILMS_PK PRIMARY KEY (idFilm)
);


#------------------------------------------------------------
# Table: REALISATEURS
#------------------------------------------------------------

CREATE TABLE REALISATEURS(
        idRealisateur   Integer  Auto_increment  NOT NULL ,
        name            Varchar (100) NOT NULL ,
	CONSTRAINT REALISATEURS_PK PRIMARY KEY (idRealisateur) ,
        CONSTRAINT REALISATEURS_AK UNIQUE (name)
);


#------------------------------------------------------------
# Table: TYPES
#------------------------------------------------------------

CREATE TABLE TYPES(
        idType          Integer  Auto_increment  NOT NULL ,
        type            Varchar (50) NOT NULL ,
	CONSTRAINT TYPES_PK PRIMARY KEY (idType)
);


#------------------------------------------------------------
# Table: POSSEDE
#------------------------------------------------------------

CREATE TABLE POSSEDE(
        idFilm          Integer NOT NULL ,
        idType          Integer NOT NULL ,
	CONSTRAINT POSSEDE_PK PRIMARY KEY (idFilm,idType) ,
	CONSTRAINT POSSEDE_FILMS_FK FOREIGN KEY (idFilm) REFERENCES FILMS(idFilm) ,
	CONSTRAINT POSSEDE_TYPES0_FK FOREIGN KEY (idType) REFERENCES TYPES(idType)
);


#------------------------------------------------------------
# Table: REALISE_PAR
#------------------------------------------------------------

CREATE TABLE REALISE_PAR(
        idFilm          Integer NOT NULL ,
        idRealisateur   Integer NOT NULL ,
	CONSTRAINT REALISE_PAR_PK PRIMARY KEY (idRealisateur, idFilm) ,
	CONSTRAINT REALISE_PAR_REALISATEURS_FK FOREIGN KEY (idRealisateur) REFERENCES REALISATEURS(idRealisateur) ,
	CONSTRAINT REALISE_PAR_FILMS_FK FOREIGN KEY (idFilm) REFERENCES FILMS(idFilm)
);
