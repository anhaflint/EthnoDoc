<?php
/**
 * User: Quentin
 * Date: 15/04/2015
 * Time: 15:43
 */

require_once("./connexion.php");

//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");

// Edited musical note transfert query
// 19/05/2015, 24 056 insert on 24 056 edited musical note from the raddo database

$sql = "insert into ethnodoc.editedmusicalnote (id, title, locality, url, leadInCoupletFR, leadInRefrainFR, leadInCoupletVO,
        leadInRefrainVO, authorAncient, traditionalAuthor, publisherAncient, traditionalPublisher, culture, language,
        coiraultTheme, coiraultNumber, laforteNumber, precotationEthnodoc, phonogramTitle)
        SELECT null, raddo.document_global.titre, raddo.c_localite.localite,
        concat(concat(concat(concat(concat(concat('http://www.raddo-ethnodoc.com/extrait/', (case when raddo.document_global.cle_document = 1 THEN 'photo' when raddo.document_global.cle_document = 2 THEN 'chanson' when raddo.document_global.cle_document = 3 THEN 'chanson_texte' when raddo.document_global.cle_document = 4 THEN 'temoignage' when raddo.document_global.cle_document = 5 THEN 'parler' when raddo.document_global.cle_document = 6 THEN 'conte' when raddo.document_global.cle_document = 7 THEN 'discographie' when raddo.document_global.cle_document = 8 THEN 'manuscrit' end)),'/'), mil),'/'),nom_fichier), typ_fichier),
        raddo.document_chanson.incipit_couplet, raddo.document_chanson.incipit_refrain, raddo.document_chanson.incipit_langue_couplet,
        raddo.document_chanson.incipit_langue_refrain, raddo.c_auteur_an.auteur_an, raddo.c_auteur_folk.auteur_folk,
        raddo.c_editeur_an.editeur_an,  raddo.c_editeur_folk.editeur_folk, raddo.c_culture.culture, raddo.c_langue.langue,
        raddo.c_titre_off.titre_coirault, raddo.c_titre_off.cote_coirault, raddo.c_titre_off.titre_laforte,
        raddo.c_titre_off.cote_ethnodoc, raddo.c_edition_discographie.titre_edition_discographie
        FROM ((((((((((raddo.document_global
        LEFT JOIN raddo.document_son ON raddo.document_global.cle_document_son = raddo.document_son.cle_document_son)
        LEFT JOIN raddo.document_chanson_conte ON raddo.document_son.cle_document_chanson_conte = raddo.document_chanson_conte.cle_document_chanson_conte)
        LEFT JOIN raddo.c_typ_fichier ON raddo.document_global.cle_typ_fichier = raddo.c_typ_fichier.cle_typ_fichier)
        LEFT JOIN raddo.document_chanson ON raddo.document_chanson_conte.cle_document_chanson = raddo.document_chanson.cle_document_chanson)
        LEFT JOIN raddo.document_discographie ON raddo.document_chanson.cle_document_discographie = raddo.document_discographie.cle_document_discographie)
        LEFT JOIN raddo.c_edition_discographie ON raddo.document_discographie.cle_edition_discographie = raddo.c_edition_discographie.cle_edition_discographie)
        LEFT JOIN raddo.c_localite ON raddo.document_global.cle_localite = raddo.c_localite.cle_localite)
        LEFT JOIN ((((((raddo.c_titre_off
        LEFT JOIN raddo.c_ouvrage_an ON raddo.c_titre_off.cle_ouvrage_an = raddo.c_ouvrage_an.cle_ouvrage_an)
        LEFT JOIN raddo.c_ouvrage_folk ON raddo.c_titre_off.cle_ouvrage_folk = raddo.c_ouvrage_folk.cle_ouvrage_folk)
        LEFT JOIN raddo.c_auteur_an ON raddo.c_ouvrage_an.cle_auteur_an = raddo.c_auteur_an.cle_auteur_an)
        LEFT JOIN raddo.c_auteur_folk ON raddo.c_ouvrage_folk.cle_auteur_folk = raddo.c_auteur_folk.cle_auteur_folk)
        LEFT JOIN raddo.c_editeur_an ON raddo.c_ouvrage_an.cle_editeur_an = raddo.c_editeur_an.cle_editeur_an)
        LEFT JOIN raddo.c_editeur_folk ON raddo.c_ouvrage_folk.cle_editeur_folk = raddo.c_editeur_folk.cle_editeur_folk) ON raddo.document_chanson_conte.cle_titre_officiel = raddo.c_titre_off.cle_titre_off)
        LEFT JOIN raddo.c_culture ON raddo.document_global.cle_culture = raddo.c_culture.cle_culture)
        LEFT JOIN raddo.c_langue ON raddo.document_global.cle_langue = raddo.c_langue.cle_langue)
        WHERE cle_document = 7";

//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());

//Databases deconnection
mysqli_close();
?>
