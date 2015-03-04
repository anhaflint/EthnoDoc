<?php

namespace EthnoDoc\PublicationBundle\Controller;

use EthnoDoc\PublicationBundle\Entity\EditedMusicalNote;
use EthnoDoc\PublicationBundle\Entity\IcoVideoGraphyNote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    public function searchAction(Request $request)
    {
        //Test Type query
    /*    $editedNoteType = $this->get('fos_elastica.index.ethnodoc.icovideographynote');
        $result = $editedNoteType->search("coucou");

        //Test finder
        $finder = $this->get('fos_elastica.finder.ethnodoc.icovideographynote');
        $notes = $finder->findHybrid('coucou', 20);

        //Test custom repository
        /*$repoManager = $this->get('fos_elastica.manager');
        $repository = $repoManager->getRepository('EthnoDoc\PublicationBundle\Entity\IcoVideoGraphyNote');
            // Retourne un tableau d'objets de type hybrid.
            // Acces à l'entité doctrine par methode getTransformed.
        $editedNote = $repository->findTest('coucou');*/

       // var_dump($editedNote);
     /*   var_dump($notes);
        var_dump($notes); */



        if($request->isMethod('get')){
            $artist = $request->query->get('artist');
            echo $artist;
            $genre = $request->query->get('genre');
            if($genre !== null) {
                echo $genre;
            }
        }


        return $this->render('EthnoDocPublicationBundle:Search:search.html.twig', array(
                // ...
            ));    }

}
