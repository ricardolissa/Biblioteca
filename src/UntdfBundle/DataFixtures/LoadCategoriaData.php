<?php
namespace UntdfBundle\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UntdfBundle\Entity\Categoria;

class LoadCategoriaData extends Fixture implements ORMFixtureInterface
{

public function load(ObjectManager $manager)
    {
    	 $categoria = new Categoria();
        $categoria->setNombre('Tecnologia');
        $manager->persist($categoria);
        
        $categoria = new Categoria();
        $categoria->setNombre('Terror');
        $manager->persist($categoria);
        
        $categoria = new Categoria();
        $categoria->setNombre('Comic');
        $manager->persist($categoria);
        
        $categoria = new Categoria();
        $categoria->setNombre('Romance');
        $manager->persist($categoria);
        
        $categoria = new Categoria();
        $categoria->setNombre('Infantiles');
        $manager->persist($categoria);
        
        $categoria = new Categoria();
        $categoria->setNombre('Drama');
        $manager->persist($categoria);
        
        $categoria = new Categoria();
        $categoria->setNombre('Comedia');
        $manager->persist($categoria);

		$manager->flush();

		$this->addReference('categoria', $categoria);

    }

}