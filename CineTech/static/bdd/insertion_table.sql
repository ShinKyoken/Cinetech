#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------




#------------------------------------------------------------
# Delete : Toutes les tables
#------------------------------------------------------------

DELETE FROM FILMS;
DELETE FROM REALISATEURS;
DELETE FROM REALISE_PAR;
DELETE FROM TYPES;
DELETE FROM POSSEDE;




#----------------------------------------------------------
# Insertion: FILMS
#----------------------------------------------------------

INSERT INTO FILMS(titre, annee, synopsis, duree, urlFilm, urlImage) VALUES('Skyscraper ', 2018, "La vie de Will Ford a changée à jamais alors qu'il travaillait pour faire libérer des otages pour le FBI. Dix années se sont écoulées et aujourd'hui, le père de deux enfants est responsable de la sécurité dans les gratte-ciels. Son avenir s'annonce radieux depuis qu'il a décroché un important contrat en Chine: s'occuper de la plus haute tour du monde. Sa joie est toutefois de courte durée lorsque des criminels déclenchent un immense incendie. Non seulement Will devra trouver un moyen de s'immiscer à l'intérieur de l'immeuble, mais il doit également secourir sa famille qui fuit les flammes... et les malfrats.", "1:42:24", 'https://r1---sn-25ge7nsd.googlevideo.com/videoplayback?id=f1560c9e5e2d8026&itag=22&source=picasa&begin=0&requiressl=yes&mm=30&mn=sn-25ge7nsd&ms=nxu&mv=m&pl=23&sc=yes&ei=JGu2W9H2JMyZcOTev7AF&susc=ph&app=fife&mime=video/mp4&cnr=14&dur=6144.580&lmt=1538034740742344&mt=1538681563&ip=46.193.0.12&ipbits=0&expire=1538688836&sparams=ip,ipbits,expire,id,itag,source,requiressl,mm,mn,ms,mv,pl,sc,ei,susc,app,mime,cnr,dur,lmt&signature=C25E2B0BB5BCD1DBDCCBC243BFC974FF5D9C3F45A6D6FDFC3E13E977FA3A1E69.5FEA7C9947CBFC1CFE986A2A7E5C75A6721605A5A8CF379720837C04311A1894&key=us0', 'https://image.tmdb.org/t/p/original/5LYSsOPzuP13201qSzMjNxi8FxN.jpg');
INSERT INTO FILMS(titre, annee, synopsis, duree, urlFilm, urlImage) VALUES('Battle Drone', 2018, "Un groupe de mercenaires surentraînés se retrouvent trahis par le gouvernement américain alors qu'ils sont en mission sur une île. Ils se voient alors contraints de se frayer un chemin à travers une embuscade tendue par une nouvelle équipe très dangereuse de droïdes humains. Ils vont devoir affronter ce nouveau genre de robots terriblement puissants pour pouvoir rester en vie, avec pour objectif de révéler la supercherie dont ils ont été victimes. Ne pouvant plus se contenter uniquement de leur force physique, ils mettent en place des stratégies.", "1:33:43", 'http://lh3.googleusercontent.com/pbTQ3r1IA7VOw4QpjbH8S6lJXCFyPCT6hUIa-JgJ-NgyuM1uBQwn7oQZJsCLp2W6bdoDxo4zJnjBx2g26PDvAydRQ0eDVp0iQjkprIKCT1fCx_IN-vRhFK6TIOfZ6lbtd1ZXeSs1qA=m22', 'https://image.tmdb.org/t/p/original/i2SCbPlhLod3qFwKvNVkFQb9oXs.jpg');
INSERT INTO FILMS(titre, annee, synopsis, duree, urlFilm, urlImage) VALUES('Demi-sœurs', 2018, "Lauren, ravissante it-girl de 29 ans, tente de percer dans le milieu de la mode en écumant les soirées parisiennes. Olivia, 28 ans et un rien psychorigide, a deux obsessions : sauver la confiserie de ses parents, et se trouver le mari idéal. A 26 ans, Salma, jeune professeur d’histoire fougueuse, vit encore chez sa mère en banlieue. Leurs routes n’ont aucune raison de se croiser… Jusqu’au jour où, à la mort de leur père biologique qu’elles n’ont jamais connu, elles héritent ensemble d’un splendide appartement parisien.Pour ces trois sœurs qui n’ont rien en commun, la cohabitation va s’avérer pour le moins explosive…", "1:41:15", "http://lh3.googleusercontent.com/Kd5pLZ_oR8X-NnEcy9ugBktdlpBfCh97ohZYl5drob7p-U7gQT2gf8KpBqfx9URXDe-_sCx1QI_MXL0mBhAOzxXtq7aOCRDWsnhltB42JSE3o5zqZkoDMlr7thXBlHMFMZR-7dHTwg=m22", 'https://image.tmdb.org/t/p/original/xuVkZtMaZW7cZZh5mlypG0gBaZj.jpg');
INSERT INTO FILMS(titre, annee, synopsis, duree, urlFilm, urlImage) VALUES('Mandy', 2018, "Pacific Northwest, 1983. Red Miller et Mandy Bloom mènent une existence paisible et empreinte d'amour. Quand leur refuge entouré de pinèdes est sauvagement détruit par les membres d'une secte dirigée par le sadique Jérémie Sand, Red est catapulté dans un voyage fantasmagorique marqué par la vengeance, le sang et le feu...", "2:01:10", "http://lh3.googleusercontent.com/_vFHHT_Fof73TuGK52g7_x56DbQ0P2Eu9rZCW0ClQuQF_YA7mZcAtILR-E6qnMBCCpFK57_1qbrUDdydXmU6meBKZB-v7wXjuCUFy2u5y-ITZYbgJ_s8NVUFgduKSZa9t-bBskauaA=m22", 'https://image.tmdb.org/t/p/original/m0yf7J7HsKeK6E81SMRcX8vx6mH.jpg');
INSERT INTO FILMS(titre, annee, synopsis, duree, urlFilm, urlImage) VALUES('Darkest Minds : Rébellion', 2018, "Alors que des adolescents se mettent à développer de dangereuses facultés, le gouvernement décide d’adopter des mesures radicales pour les emprisonner, les considérant comme une menace incontrôlable. Ruby, l’une des plus puissantes d’entre eux, parvient à s’échapper du camp où elle est retenue pour rejoindre un groupe de jeunes en fuite à la recherche d’un refuge. Rapidement, cette nouvelle famille réalise que fuir ne suffira pas dans un monde où les adultes au pouvoir les ont trahis. Ils devront mener une puissante rébellion, unissant leur pouvoir pour reprendre le contrôle de leur avenir.", "1:43:57", "http://lh3.googleusercontent.com/b-lgne9sPdBA8bykd-xnacFlrYd9sU7lEia9K0KNdlUlz2_rCYABZZitqtc3YoQ7UEzk8mnqHIG4oFZJGKEHqoChRZJpKHrumjPkOQuqWslK-R_cAVO9yFl2nfUaGQ2HhlWJfTFOUQ=m22", 'https://image.tmdb.org/t/p/original/1b6swvBA5EwgRtF63I48vUzgPFT.jpg');
INSERT INTO FILMS(titre, annee, synopsis, duree, urlFilm, urlImage) VALUES("Hôtel Transylvanie 3 : Les vacances d'été", 2018, "Comme Marvis croit que son père, Dracula, est stressé par son travail et a besoin de vacances, elle décide de l'inviter à participer à une croisière en famille. Ses plus fidèles amis, dont Frankenstein, la momie, l'homme invisible et le loup-garou, sont aussi de la partie. Tout se déroule comme sur des roulettes jusqu'à ce que la capitaine du bateau s'en mêle. Cette dernière est l'arrière-petite-fille d'Abraham Van Helsing, un chasseur de vampires qui a bien l'intention d'éliminer tous les monstres de la surface de la Terre. Comme Dracula tombe amoureux d'elle au premier regard, il ne voit pas les plans machiavéliques qu'elle échafaude en secret.", "1:37:20", "http://lh3.googleusercontent.com/unysfiFVLoZTL_JqI58ge4ceHOB-3z_Lvke-qxONBQqIRnP1KnLnJSTzH5kAj6kgWWCfhVlynDgKfr3VNmmdgVGCnnDJG0ezD3sNJkQ6yJrW9FeCuxdz0dqp_zQk2wUbXLKq8VBp9g=m22", 'https://image.tmdb.org/t/p/original/cl2rJztO76q8n6xx5LNf6NYXS2u.jpg');




#----------------------------------------------------------
# Insertion: REALISATEURS
#----------------------------------------------------------

INSERT INTO REALISATEURS(name) VALUES("Rawson Marshall Thurber");
INSERT INTO REALISATEURS(name) VALUES("Mitch Gould");
INSERT INTO REALISATEURS(name) VALUES("Saphia Azzeddine");
INSERT INTO REALISATEURS(name) VALUES("François-Régis Jeanne");
INSERT INTO REALISATEURS(name) VALUES("Panos Cosmatos");
INSERT INTO REALISATEURS(name) VALUES("Jennifer Yuh Nelson");
INSERT INTO REALISATEURS(name) VALUES("Genndy Tartakovsky");




#----------------------------------------------------------
# Insertion: REALISE_PAR
#----------------------------------------------------------

INSERT INTO REALISE_PAR(idFilm, idRealisateur) VALUES(1, 1);
INSERT INTO REALISE_PAR(idFilm, idRealisateur) VALUES(2, 2);
INSERT INTO REALISE_PAR(idFilm, idRealisateur) VALUES(3, 3);
INSERT INTO REALISE_PAR(idFilm, idRealisateur) VALUES(3, 4);
INSERT INTO REALISE_PAR(idFilm, idRealisateur) VALUES(4, 5);
INSERT INTO REALISE_PAR(idFilm, idRealisateur) VALUES(5, 6);
INSERT INTO REALISE_PAR(idFilm, idRealisateur) VALUES(6, 7);




#----------------------------------------------------------
# Insertion: TYPES
#----------------------------------------------------------

INSERT INTO TYPES(type) VALUES("Action");
INSERT INTO TYPES(type) VALUES("Animation");
INSERT INTO TYPES(type) VALUES("Aventure");
INSERT INTO TYPES(type) VALUES("Biopic");
INSERT INTO TYPES(type) VALUES("Comédie");
INSERT INTO TYPES(type) VALUES("Drame");
INSERT INTO TYPES(type) VALUES("Documentaire");
INSERT INTO TYPES(type) VALUES("Familliale");
INSERT INTO TYPES(type) VALUES("Fantastique");
INSERT INTO TYPES(type) VALUES("Histoire");
INSERT INTO TYPES(type) VALUES("Horreur");
INSERT INTO TYPES(type) VALUES("Policier");
INSERT INTO TYPES(type) VALUES("Romantique");
INSERT INTO TYPES(type) VALUES("Science Fiction");
INSERT INTO TYPES(type) VALUES("Thriller");




#----------------------------------------------------------
# Insertion: POSSEDE
#----------------------------------------------------------

INSERT INTO POSSEDE(idFilm, idType) VALUES(1, 1);
INSERT INTO POSSEDE(idFilm, idType) VALUES(1, 14);
INSERT INTO POSSEDE(idFilm, idType) VALUES(2, 14);
INSERT INTO POSSEDE(idFilm, idType) VALUES(3, 5);
INSERT INTO POSSEDE(idFilm, idType) VALUES(4, 15);
INSERT INTO POSSEDE(idFilm, idType) VALUES(5, 14);
INSERT INTO POSSEDE(idFilm, idType) VALUES(6, 2);