<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Producto;

class DefaultController extends Controller
{

    const COMANDO_AGREGAR = "Agregar";
    const COMANDO_RESTAR = "Restar";
    const COMANDO_ACTIVAR = "Activar";
    const COMANDO_DESACTIVAR = "Desactivar";

    /**
     * @Route("/", name="homepage", methods={"GET"})
     * @param Request $request
     */
    public function indexAction(Request $request)
    {
		$productos = $this->getDoctrine()->getManager()->getRepository(Producto::class)->findAll();

        return $this->render('default/index.html.twig', [
			"productos"=>$productos
		]);
    }
   
    /**
     * 
     * @Route("/uploadFile", name="uploadcsv", methods={"POST"})
     * @param Request $request
     */
    public function uploadCSVAction(Request $request){
        $file = $request->files->get("csv");
        $handle = fopen($file->getPathname(),"r");
        $em = $this->getDoctrine()->getManager();
        if($handle){
            while(($line = fgets($handle)) !== false){
                $lineSplit = explode(",",$line);
                $id = trim($lineSplit[0]);
                $accion = trim($lineSplit[1]);
                $param = trim($lineSplit[2]);

                // Se busca el producto
                $producto = $em->getRepository(Producto::class)->find($id);
                if(is_null($producto)){
                    continue;
                }

                switch($accion){
                    case self::COMANDO_ACTIVAR:
                        $producto->activar();
                        break;
                    case self::COMANDO_DESACTIVAR:
                        $producto->desactivar();
                        break;
                    case self::COMANDO_AGREGAR:
                        $producto->agregar($param);
                        break;
                    case self::COMANDO_RESTAR:
                        $producto->restar($param);
                        break;
                }
                
            }
            fclose($handle);
        }
        $em->flush();
        return $this->redirectToRoute("homepage");
    }
}
