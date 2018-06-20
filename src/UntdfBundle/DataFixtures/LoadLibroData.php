<?php
namespace UntdfBundle\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UntdfBundle\Entity\Libro;
use DateTime;


class LoadLibroData extends Fixture implements ORMFixtureInterface
{

public function load(ObjectManager $manager)
    {
        $libro = new Libro();
        $libro->setNombre('Montaje De Infraestructuras De Redes Locales De Datos. Eles0209 - Montaje Y Mantenimiento De Sistema');
        $libro->setIsbn('9788415648956');
        $libro->setEdicion(12);
        $libro->setEditorial('ic editorial');
        $libro->setResumen('Resumen Libro');
        $libro->setFoto('Foto Libro');
        $libro->setVistaprevia('Vistaprevia Libro');
        $libro->setLinkarchivo('Link Libro');
        $libro->setWeb('http://Libro');
        $libro->setIndice('1/2');
       	$libro->setFechadecarga(new DateTime('2018-04-24'));
        $libro->setIdioma($this->getReference('idiomav'));
        $libro->setAutores([$this->getReference('autor')]);
        $libro->setCategorias([$this->getReference('categoria')]);
        $manager->persist($libro);

        $libro = new Libro();
        $libro->setNombre('The Hobbit, or There and Back Again');
        $libro->setIsbn('9789505470631');
        $libro->setEdicion('1937');
        $libro->setEditorial('EDICIONES MINOTAURO');
        $libro->setResumen('Es la primera obra que explora el universo mitológico creado por Tolkien y que más tarde se encargarían de definir El Señor de los Anillos y El Silmarillion. Dentro de dicha ficción, el argumento de El hobbit se sitúa en el año 2941 de la Tercera Edad del Sol,2​ y narra la historia del hobbit Bilbo Bolsón, que junto con el mago Gandalf y un grupo de enanos, vive una aventura en busca del tesoro custodiado por el dragón Smaug en la Montaña Solitaria.');
        $libro->setFoto('Foto THE HOBBIT 1937');
        $libro->setVistaprevia('Vistaprevia THE HOBBIT');
        $libro->setLinkarchivo('Link THE HOBBIT');
        $libro->setWeb('http://LibroTHE HOBBIT');
        $libro->setIndice('15');
        $libro->setFechadecarga(new DateTime('2018-04-26'));
        $libro->setIdioma($this->getReference('idiomav'));
         $libro->setAutores([$this->getReference('autor')]);
        $libro->setCategorias([$this->getReference('categoria')]);
        $manager->persist($libro);

        $libro = new Libro();
        $libro->setNombre('BATMAN AÑO 100');
        $libro->setIsbn('9788490623961');
        $libro->setEdicion('5');
        $libro->setEditorial('DEBOLSILLO');
        $libro->setResumen('Debolsillo celebra el 75.º aniversario de Batman con una obra maestra de la mano de Paul Pope.Gotham City, año 2039. La población vive sometida bajo un estado policial que continuamente vulnera sus derechos. Un agente federal es asesinado y el sospechoso es un icono del pasado, un personaje que parece haber caído en el olvido. Es Batman. En medio de este caos, el capitán Gordon, nieto del comisario Gordon, se da cuenta de que probablemente el hombre al que buscan no debería existir.En una ciudad oscura, distópica y corrupta ya no hay lugar para una identidad secreta... excepto para Batman, que ha pasado de ser el héroe de Gotham a convertirse en un rebelde del sistema.');
        $libro->setFoto('Foto BATMAN AÑO 100');
        $libro->setVistaprevia('Vistaprevia BATMAN AÑO 100');
        $libro->setLinkarchivo('Link BATMAN AÑO 100');
        $libro->setWeb('http://BATMAN AÑO 100');
        $libro->setIndice('1/2');
        $libro->setFechadecarga(new DateTime('2018-04-29'));
        $libro->setIdioma($this->getReference('idiomav'));
         $libro->setAutores([$this->getReference('autor')]);
        $libro->setCategorias([$this->getReference('categoria')]);
        $manager->persist($libro);

        $libro = new Libro();
        $libro->setNombre('Montaje De Infraestructuras De Redes Locales De Datos');
        $libro->setIsbn('9788415648956');
        $libro->setEdicion(12);
        $libro->setEditorial('ic editorial');
        $libro->setResumen('Resumen Liro');
        $libro->setFoto('Foto Libro');
        $libro->setVistaprevia('Vistaprevia Libro');
        $libro->setLinkarchivo('Link Libro');
        $libro->setWeb('http://Libro');
        $libro->setIndice('1/2');
        $libro->setFechadecarga(new DateTime('2018-04-24'));
        $libro->setIdioma($this->getReference('idiomav'));
         $libro->setAutores([$this->getReference('autor')]);
        $libro->setCategorias([$this->getReference('categoria')]);
        $manager->persist($libro);

        $libro = new Libro();
        $libro->setNombre(' Eles0209 - Montaje Y Mantenimiento De Sistema');
        $libro->setIsbn('9788415648956');
        $libro->setEdicion(12);
        $libro->setEditorial('ic editorial');
        $libro->setResumen('Resumen Liro');
        $libro->setFoto('Foto Libro');
        $libro->setVistaprevia('Vistaprevia Libro');
        $libro->setLinkarchivo('Link Libro');
        $libro->setWeb('http://Libro');
        $libro->setIndice('1/2');
        $libro->setFechadecarga(new DateTime('2018-04-24'));
        $libro->setIdioma($this->getReference('idiomav'));
         $libro->setAutores([$this->getReference('autor')]);
        $libro->setCategorias([$this->getReference('categoria')]);
        $manager->persist($libro);

        $libro = new Libro();
        $libro->setNombre('Montaje De Infraestructuras  Montaje Y Mantenimiento De Sistema');
        $libro->setIsbn('9788415648956');
        $libro->setEdicion(12);
        $libro->setEditorial('ic editorial');
        $libro->setResumen('Resumen Liro');
        $libro->setFoto('Foto Libro');
        $libro->setVistaprevia('Vistaprevia Libro');
        $libro->setLinkarchivo('Link Libro');
        $libro->setWeb('http://Libro');
        $libro->setIndice('1/2');
        $libro->setFechadecarga(new DateTime('2018-04-24'));
        $libro->setIdioma($this->getReference('idiomav'));
         $libro->setAutores([$this->getReference('autor')]);
        $libro->setCategorias([$this->getReference('categoria')]);
        $manager->persist($libro);

        $libro = new Libro();
        $libro->setNombre('Montaje De Infraestructuras De Redes La');
        $libro->setIsbn('9788415648956');
        $libro->setEdicion(12);
        $libro->setEditorial('ic editorial');
        $libro->setResumen('Resumen Liro');
        $libro->setFoto('Foto Libro');
        $libro->setVistaprevia('Vistaprevia Libro');
        $libro->setLinkarchivo('Link Libro');
        $libro->setWeb('http://Libro');
        $libro->setIndice('1/2');
        $libro->setFechadecarga(new DateTime('2018-04-24'));
        $libro->setIdioma($this->getReference('idiomav'));
         $libro->setAutores([$this->getReference('autor')]);
        $libro->setCategorias([$this->getReference('categoria')]);
        $manager->persist($libro);

        $libro = new Libro();
        $libro->setNombre('Montaje De ');
        $libro->setIsbn('9788415648956');
        $libro->setEdicion(12);
        $libro->setEditorial('ic editorial');
        $libro->setResumen('Resumen Liro');
        $libro->setFoto('Foto Libro');
        $libro->setVistaprevia('Vistaprevia Libro');
        $libro->setLinkarchivo('Link Libro');
        $libro->setWeb('http://Libro');
        $libro->setIndice('1/2');
        $libro->setFechadecarga(new DateTime('2018-04-24'));
        $libro->setIdioma($this->getReference('idiomav'));
         $libro->setAutores([$this->getReference('autor')]);
        $libro->setCategorias([$this->getReference('categoria')]);
        $manager->persist($libro);






        $manager->flush();

        


    }


}