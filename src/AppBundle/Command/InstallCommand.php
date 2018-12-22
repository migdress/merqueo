<?php


namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Producto;

class InstallCommand extends Command
{
    protected static $defaultName = 'app:install';

	/**
	 *
	 * @var EntityManager
	 */
	private $em;

	public function __construct(EntityManagerInterface $em) {

		$this->em = $em;
		parent::__construct();
	}

    protected function configure()
    {
		$this->setDescription("Instala los productos por defecto");

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
		$output->writeln("Creando productos por defecto..");

		$output->writeln("Limpiando BD..");
		$existentes = $this->em->getRepository(Producto::class)->findAll();
		foreach($existentes as $producto){
			$this->em->remove($producto);
		}

		$ps4 = new Producto();
		$xboxOne = new Producto();
		$rtx2080 = new Producto();
		$oculusRift = new Producto();


		$output->writeln("Creando ps4..");
		$ps4->setNombre("Play Station 4");
		$ps4->setReferencia("sony_ps4");
		$ps4->setPrecio(1200000);
		$ps4->setCosto(980000);
		$ps4->setUnidadesActuales(1);
		$ps4->setEstado(Producto::ESTADO_PRODUCTO_ACTIVO);
		$this->em->persist($ps4);

		$output->writeln("Creando xboxOne..");
		$xboxOne->setNombre("Xbox One");
		$xboxOne->setReferencia("microsoft_xboxOne");
		$xboxOne->setPrecio(1100000);
		$xboxOne->setCosto(910000);
		$xboxOne->setUnidadesActuales(1);
		$xboxOne->setEstado(Producto::ESTADO_PRODUCTO_ACTIVO);
		$this->em->persist($xboxOne);

		$output->writeln("Creando rtx2080..");
		$rtx2080->setNombre("Asus ROG Nvidia RTX 2080");
		$rtx2080->setReferencia("asus_nvidia_rtx2080");
		$rtx2080->setPrecio(2500000);
		$rtx2080->setCosto(2000000);
		$rtx2080->setUnidadesActuales(1);
		$rtx2080->setEstado(Producto::ESTADO_PRODUCTO_ACTIVO);
		$this->em->persist($rtx2080);

		$output->writeln("Creando oculusRift..");
		$oculusRift->setNombre("Oculus Rift CV1");
		$oculusRift->setReferencia("facebook_oculus_cv1");
		$oculusRift->setPrecio(1200000);
		$oculusRift->setCosto(900000);
		$oculusRift->setUnidadesActuales(1);
		$oculusRift->setEstado(Producto::ESTADO_PRODUCTO_ACTIVO);
		$this->em->persist($oculusRift);

		$output->write("Escribiendo a la BD..");
		$this->em->flush();
		$output->write("OK!\n");

    }
}