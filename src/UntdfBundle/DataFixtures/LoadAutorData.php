<?php
namespace UntdfBundle\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UntdfBundle\Entity\Autor;


class LoadAutorData extends Fixture implements ORMFixtureInterface
{

public function load(ObjectManager $manager)
    {

		$autor = new Autor();
		$autor->setNombre('José Javier');
		$autor->setApellido('Bermúdez Luque ');
		$autor->setApodo('JJBL');
		$autor->setFoto('foto');
		$autor->setBiografia('Nacio en Espana');
		$manager->persist($autor);
        
		$autor = new Autor();
		$autor->setNombre('John Ronald Reuel');
		$autor->setApellido('Tolkien');
		$autor->setApodo('J. R. R. Tolkien');
		$autor->setFoto('foto');
		$autor->setBiografia('Fue un escritor, poeta, servidor militar, filólogo, lingüista y profesor universitario británico nacido en el desaparecido Orange al sur de África, conocido principalmente por ser el autor de las novelas clásicas de fantasía heroica El hobbit y El Señor de los Anillos.
			');
		$manager->persist($autor);
       
       	$autor = new Autor();
		$autor->setNombre('Paul ');
		$autor->setApellido('Pope');
		$autor->setApodo('Pope Paul');
		$autor->setFoto('fotoL');
		$autor->setBiografia('Es un guionista y dibujante de comics estadounidense. Reconocido generalmente por su prolífica carrera como artista independiente y transgresor, aunque también ha trabajado en Marvel Comics y DC Comics. Su trabajo más destacado hasta la fecha ha sido el cómic Batman: Año 100 (ganador de dos premios Eisner el 2007).');
		$manager->persist($autor);
       
       $autor = new Autor();
		$autor->setNombre('Pablo');
		$autor->setApellido('De Santis');
		$autor->setApodo(' PabloD');
		$autor->setFoto('fotoL');
		$autor->setBiografia('Es un escritor, periodista y guionista de historietas argentino, ganador del Premio Planeta-Casa de América 2007 por su novela El enigma de París y también del Premio de la Novela de la Academia Argentina de Letras. Además su novela La sexta lámpara fue incluida en la lista de los 100 mejores libros de los últimos 25 años, confeccionada por diversos escritores y críticos en 2007.');
		$manager->persist($autor);

        $manager->flush();

        $this->addReference('autor', $autor);
    }

}