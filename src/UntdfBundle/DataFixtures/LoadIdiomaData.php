<?php 
namespace UntdfBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UntdfBundle\Entity\Idioma;

class LoadIdiomaData extends Fixture implements ORMFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $idioma = new Idioma();
        $idioma->setNombre('Ingles');
        $manager->persist($idioma);
        $manager->flush();

        $this->addReference('idiomav', $idioma);

    }
}