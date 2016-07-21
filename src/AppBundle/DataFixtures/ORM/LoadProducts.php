<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Product;

/**
 * Description of LoadSlotData
 *
 * @author oberfreak
 */
class LoadProducts extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
		$manager->persist(new Product("Pizza Feuerwehr","5.00"));
		$manager->persist(new Product("Pizza Al Tonno","5.00"));
		$manager->persist(new Product("Pizza Vienna","5.00"));
		$manager->persist(new Product("Pizza Diabolino","5.00"));
		$manager->persist(new Product("Pizza Mozzarella","5.00"));
		$manager->persist(new Product("Menü 7 - Pasta Bolognese mit Cola","8.90"));
		$manager->persist(new Product("Pizza Cardinale","5.00"));
		$manager->persist(new Product("Pizza Die Insel","5.00"));
		$manager->persist(new Product("Pizza Hawaii","5.00"));
		$manager->persist(new Product("Pizza Provinciale","5.00"));
		$manager->persist(new Product("Pizza Cardinale mit Knoblauch","5.50"));
		$manager->persist(new Product("Pizza Funghi","5.00"));
		$manager->persist(new Product("Pizza Margherita","5.00"));
		$manager->persist(new Product("Hausgemachte Bacon Burger Mit Potato Wedges","8.50"));
		$manager->persist(new Product("Pizza Salami mit Mais","6.00"));
		$manager->persist(new Product("Pizza Spinaci ohne Ei","5.00"));
		$manager->persist(new Product("Pizza Romana","5.00"));
		$manager->persist(new Product("Pizza Melanzani","5.00"));
		$manager->persist(new Product("Pizza Die Insel (Knoblauch statt Pfefferoni)","5.00"));
		$manager->persist(new Product("Pizza Spinaci","5.00"));
		$manager->persist(new Product("Pizza Trittati Di Carne + Broccoli","6.00"));
		$manager->persist(new Product("Pizza Casalinga","5.00"));
		$manager->persist(new Product("Menü 1 - Cordon Bleu + Mohr im Hemd","9.50"));
		$manager->persist(new Product("Pizza Caprese","5.00"));
		$manager->persist(new Product("Pizza Castello","5.00"));
		$manager->persist(new Product("Pizza Mona Lisa","5.00"));
		$manager->persist(new Product("Pizza Cipolla","5.00"));
		$manager->persist(new Product("Pizza Rucola","8.10"));
		$manager->persist(new Product("Pizza Bianka","7.50"));
		$manager->persist(new Product("Griechischer Salat mit Essig und Öl","6.00"));
		$manager->persist(new Product("Pizza San Romio","5.00"));
		$manager->persist(new Product("Pizza Mozzarella mit Knoblauch","5.50"));
		$manager->persist(new Product("Pizza Don Giovanni","5.00"));
		$manager->persist(new Product("Pizzastangerl","2.00"));
		$manager->persist(new Product("Pizza Alaba","5.00"));
		$manager->persist(new Product("Pasta Spaghetti alla Bolognese","5.00"));
		$manager->persist(new Product("Gnocchi Al Quatro Formaggi","5.00"));
		$manager->persist(new Product("Mohr im Hemd","4.00"));
		$manager->persist(new Product("Schoko Banana Palatschinken","4.00"));
		$manager->persist(new Product("Knoblauchkotelett","8.00"));
		$manager->persist(new Product("Pizza Salami","5.00"));
		$manager->persist(new Product("Pizza Fontana","5.00"));
		$manager->persist(new Product("Calzone","5.00"));
		$manager->persist(new Product("Pizza Trittati Di Carne","5.00"));
		$manager->persist(new Product("Pasta Al Vienna","6.50"));
		$manager->persist(new Product("Salat Die Insel (Hühnerstreifen natur, Joghurtdressing)","6.00"));
		$manager->persist(new Product("Pizza Mona Lisa (mit Mais)","6.00"));
		$manager->persist(new Product("Putenschnitzel gebacken","6.90"));
		$manager->persist(new Product("Pizza Capricciosa","5.00"));
		$manager->persist(new Product("Lasagne al Forno","7.00"));
		$manager->persist(new Product("Pizza Quattro Formaggi ","5.00"));
		$manager->persist(new Product("Pizza Contantino ","5.00"));
		$manager->persist(new Product("Hausgemachte BBQ Burger mit Potato Wedges","8.50"));
		$manager->persist(new Product("Pizza Gorgonzola/Schinken ","5.00"));
		$manager->persist(new Product("Hausgemachter Hamburger (Kein Käse)","8.50"));
		$manager->persist(new Product("Pizza Vegetaria","5.00"));
		$manager->persist(new Product("Wiener Schnitzel mit Kartoffelsalat","7.50"));
		$manager->persist(new Product("Pizza Tonno","5.00"));
		$manager->persist(new Product("Pizza Romantica","6.00"));
		$manager->persist(new Product("Cordon Bleu","7.50"));
		$manager->persist(new Product("Crespela Hawaii","7.50"));
		$manager->persist(new Product("Gebackener Camembert mit Pommes und Preiselbeeren","7.00"));
		$manager->persist(new Product("Hausgemachte Cheeseburger mit Pommes","8.50"));
		$manager->persist(new Product("Hausgemachte Cheeseburger mit Pommes + Bacon","10.00"));
		$manager->persist(new Product("Käse Spätzle","7.50"));
		$manager->persist(new Product("Pasta Spaghetti all Pollo (kein Käse)","5.00"));
		$manager->persist(new Product("Pasta Spaghetti Carbonara","5.00"));
		$manager->persist(new Product("Pizza All Pollo","7.00"));
		$manager->persist(new Product("Pizza Cipolla + Hühnerstreifen","6.50"));
		$manager->persist(new Product("Pizza Diabolo","5.00"));
		$manager->persist(new Product("Pizza Fiorentina","7.50"));
		$manager->persist(new Product("Pizza Frutti di mare","8.50"));
		$manager->persist(new Product("Pizza Gamberetti","9.00"));
		$manager->persist(new Product("Pizza Pommes","5.00"));
		$manager->persist(new Product("Pizza Quattro Stagioni","5.00"));
		$manager->persist(new Product("Pizza Roma","7.50"));
		$manager->persist(new Product("Pizza Rusticana","5.00"));
		$manager->persist(new Product("Pizza Venezia","7.50"));
		$manager->persist(new Product("Pizza Napolitana","5.00"));
		$manager->persist(new Product("Pasta Alla Melanzani (ohne Zwiebel)","5.00"));
		$manager->persist(new Product("Pasta All Pollo (ohne Käse)","5.00"));
		$manager->persist(new Product("Tomaten Mozarella Salat","6.00"));
		$manager->persist(new Product("Gemischter Salat mit Shrimps","6.50"));
		$manager->persist(new Product("Pizza Rusticana ohne Ei","5.00"));
		$manager->persist(new Product("Gebackener Emmentaler Menü","9.50"));
		$manager->persist(new Product("Cevapcici ","8.00"));
		$manager->persist(new Product("Chicken wings","7.50"));
		$manager->persist(new Product("Pizza Diavolo","5.00"));
		$manager->persist(new Product("Buffalo Wings","8.00"));
		$manager->persist(new Product("Pizza Siziliana","5.00"));
		$manager->persist(new Product("Pizza Al Sabi","5.00"));
		$manager->persist(new Product("Scalopine Die Insel ","10.00"));
		$manager->persist(new Product("Grillteller mit Pommes","9.00"));
		$manager->persist(new Product("Pizza Feuerwehr (mit ei)","6.00"));
		$manager->persist(new Product("Pasta Alla Gorgonzola (Macceroni)","6.50"));
		$manager->persist(new Product("Pizza Milano ","5.00"));
		$manager->persist(new Product("gefüllte Pizzastangerl","5.00"));

        
        
        $manager->flush();

    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }

}
