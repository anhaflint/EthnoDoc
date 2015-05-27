<?php
/**
 * User: Quentin
 * Date: 15/04/2015
 * Time: 15:45
 */

require_once("./connexion.php");

//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
global $dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
global $dbdest = connect("localhost", "root", "", "ethnodoc");

// Ico-Video graphy note transfert query
// 19/05/2015, 123 606 insert on 123 606 ico-video graphy note from the raddo database

$sql = "insert into $dbdest.icovideographynote (id, title, locality, url, decade, publisher, publisherNumber, survey)
        select null, raddo.document_global.titre, raddo.c_localite.localite,
        concat(concat(concat(concat(concat(concat('http://www.raddo-ethnodoc.com/extrait/', (case when raddo.document_global.$_photo > 0 THEN 'photo' when raddo.document_global.$_discographie > 0 then 'discographie' when raddo.document_global.M_chanson_texte > 0 then 'chanson_texte' when raddo.document_global.$_conte > 0 then 'conte' when raddo.document_global.$_temoignage > 0 then 'temoignage' when raddo.document_global.$_parler > 0 then 'parler' when raddo.document_global.$_cd then 'cd' when raddo.document_global.$_film > 0 then 'film' end)),'/'), mil),'/'),nom_fichier), typ_fichier),
        raddo.c_decenie.decenie, raddo.c_editeur.editeur, raddo.document_photo.num_edit, raddo.document_global.cle_enquete
        FROM (((((raddo.document_global
        LEFT JOIN raddo.document_photo ON raddo.document_global.cle_document_photo = raddo.document_photo.cle_document_photo)
        LEFT JOIN raddo.c_localite ON raddo.document_global.cle_localite = raddo.c_localite.cle_localite)
        LEFT JOIN raddo.c_decenie ON raddo.document_global.cle_decenie = raddo.c_decenie.cle_decenie)
        LEFT JOIN raddo.c_typ_fichier ON raddo.document_global.cle_typ_fichier = raddo.c_typ_fichier.cle_typ_fichier)
        LEFT JOIN raddo.c_editeur ON raddo.document_photo.cle_editeur = raddo.c_editeur.cle_editeur)
        where raddo.document_global.cle_document=1";

//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());

//Databases deconnection
mysqli_close();
?>