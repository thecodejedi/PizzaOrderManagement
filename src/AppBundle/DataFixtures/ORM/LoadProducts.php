<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Product;
use AppBundle\Entity\ProductGroup;

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
        $soupGroup = new ProductGroup("Soup");
        $manager->persist($soupGroup);

        $manager->persist(new Product("Onion Soup", 3.2, $soupGroup));
        $manager->persist(new Product("Garlic Soup", 3.2, $soupGroup));
        $manager->persist(new Product("Frittaten Soup", 3.2, $soupGroup));
        $manager->persist(new Product("Minestrone", 3.2, $soupGroup));
        $manager->persist(new Product("Tomato Cream Soup", 3.2, $soupGroup));
        $manager->persist(new Product("Broccoli Cream Soup", 3.2, $soupGroup));

        $alFornoGroup = new ProductGroup("Al Forno");
        $manager->persist($alFornoGroup);

        $manager->persist(new Product("Broccoli al Forno", 7, $alFornoGroup));
        $manager->persist(new Product("Spinach al Forno", 7, $alFornoGroup));
        $manager->persist(new Product("Lasagne", 7, $alFornoGroup));
        $manager->persist(new Product("Combinatione", 7, $alFornoGroup));
        $manager->persist(new Product("Bauern Pfanne", 7, $alFornoGroup));
        $manager->persist(new Product("Melanzani al Forno", 7, $alFornoGroup));
        $manager->persist(new Product("Zucchini al Forno", 7, $alFornoGroup));


        $saladGroup = new ProductGroup("Salad");
        $manager->persist($saladGroup);
        $manager->persist(new Product("Tzatziki salad", 6.5, $saladGroup));
        $manager->persist(new Product("Green Salad", 3.5, $saladGroup));
        $manager->persist(new Product("Potato Salad", 3.5, $saladGroup));
        $manager->persist(new Product("Tomato Salad", 3.5, $saladGroup));
        $manager->persist(new Product("Cucumber Salad", 3.5, $saladGroup));
        $manager->persist(new Product("Corn Salad", 3.5, $saladGroup));
        $manager->persist(new Product("Mixed Salad", 4, $saladGroup));
        $manager->persist(new Product("Mixed Salad with Tuna", 6, $saladGroup));
        $manager->persist(new Product("Mixed Salad with Ham, Egg, Cheese", 6, $saladGroup));
        $manager->persist(new Product("Mixed Salad with Shrimps", 6.5, $saladGroup));
        $manager->persist(new Product("Mixed Salad with Seafood", 6.5, $saladGroup));
        $manager->persist(new Product("Mixed Salad with Mozarella", 6.5, $saladGroup));
        $manager->persist(new Product("Die Insel Salad mit Hühnerstreifen natur", 6, $saladGroup));
        $manager->persist(new Product("Die Insel Salad mit Hühnerstreifen gebacken", 6, $saladGroup));
        $manager->persist(new Product("Tomato Mozzarella with Pizzabread", 6, $saladGroup));
        $manager->persist(new Product("Shrimps with Pizzabread", 6.5, $saladGroup));
        $manager->persist(new Product("Greek Salad", 6, $saladGroup));
        $manager->persist(new Product("Ruccola Salad", 6.5, $saladGroup));

        $seafoodGroup = new ProductGroup("Seafood");
        $manager->persist($seafoodGroup);
        $manager->persist(new Product("Calamari Fritti", 7.5, $seafoodGroup));
        $manager->persist(new Product("Scampi on a spear", 11.5, $seafoodGroup));
        $manager->persist(new Product("Pangassius", 11.5, $seafoodGroup));
        $manager->persist(new Product("Scholle gebacken", 8, $seafoodGroup));
        $manager->persist(new Product("Scholle natur", 8, $seafoodGroup));
        $manager->persist(new Product("Zander gebacken", 11.5, $seafoodGroup));
        $manager->persist(new Product("Zander natur", 11.5, $seafoodGroup));
        $manager->persist(new Product("Mixed Grill Plate", 15.5, $seafoodGroup));
        $manager->persist(new Product("Scampi gebacken", 11.9, $seafoodGroup));

        $filledPancakesGroup = new ProductGroup("Filled Pancakes");
        $manager->persist($filledPancakesGroup);
        $manager->persist(new Product("Crespelle Spinaci", 7.5, $filledPancakesGroup));
        $manager->persist(new Product("Crespelle alla Mostana", 7.5, $filledPancakesGroup));
        $manager->persist(new Product("Crespelle alla Venezia", 7.5, $filledPancakesGroup));
        $manager->persist(new Product("Crespelle Catania", 7.5, $filledPancakesGroup));
        $manager->persist(new Product("Crespelle Hawaii", 7.5, $filledPancakesGroup));

        $risottoGroup = new ProductGroup("Risotto");
        $manager->persist($risottoGroup);
        $manager->persist(new Product("Risotto al Gamberetti", 7, $risottoGroup));
        $manager->persist(new Product("Risotto Mexicana", 7, $risottoGroup));
        $manager->persist(new Product("Risotto die Insel", 7, $risottoGroup));
        $manager->persist(new Product("Risotto Hawaii", 7, $risottoGroup));
        $manager->persist(new Product("Risotto Curry", 7, $risottoGroup));
        $manager->persist(new Product("Risotto Gemüse", 7, $risottoGroup));
        $manager->persist(new Product("Risotto Funghi", 7, $risottoGroup));
        
        $pastaGroup = new ProductGroup("Pasta");
        $manager->persist($pastaGroup);
        $manager->persist(new Product("Al Frutti di Mare", 5, $pastaGroup));
        $manager->persist(new Product("Con Agilo", 5, $pastaGroup));
        $manager->persist(new Product("Alla Bolognese", 5, $pastaGroup));
        $manager->persist(new Product("Alla Carbonara", 5, $pastaGroup));
        $manager->persist(new Product("Alla Gorgonzola", 6.6, $pastaGroup));
        $manager->persist(new Product("Broccoli Prosciutto", 7.5, $pastaGroup));
        $manager->persist(new Product("Alla Arrabiata", 5, $pastaGroup));
        $manager->persist(new Product("Alla Siciliana", 5, $pastaGroup));
        $manager->persist(new Product("Al Tonno", 5, $pastaGroup));
        $manager->persist(new Product("Alla Melanzani", 5, $pastaGroup));
        $manager->persist(new Product("Al Zucchini", 5, $pastaGroup));
        $manager->persist(new Product("Al Umberto", 5, $pastaGroup));
        $manager->persist(new Product("Al Spinaci", 5, $pastaGroup));
        $manager->persist(new Product("Al Cartiera", 5, $pastaGroup));
        $manager->persist(new Product("Al Quatro Formaggi", 5, $pastaGroup));
        $manager->persist(new Product("Al Pollo", 5, $pastaGroup));
        $manager->persist(new Product("Al Vienna", 5, $pastaGroup));
        $manager->persist(new Product("Vegetables Pasta", 5, $pastaGroup));
        $manager->persist(new Product("Pasta Die Insel", 7.5, $pastaGroup));
        
        $pizzaGroup = new ProductGroup("Pizza");
        $manager->persist($pizzaGroup);
        $manager->persist(new Product("Alaba", 5, $pizzaGroup));
        $manager->persist(new Product("Melanzani", 5, $pizzaGroup));
        $manager->persist(new Product("San Romio", 5, $pizzaGroup));
        $manager->persist(new Product("Calsone", 5, $pizzaGroup));
        $manager->persist(new Product("Caprese", 5, $pizzaGroup));
        $manager->persist(new Product("Mozzarella", 5, $pizzaGroup));
        $manager->persist(new Product("Margherita", 5, $pizzaGroup));
        $manager->persist(new Product("Funghi", 5, $pizzaGroup));
        $manager->persist(new Product("Cipolla", 5, $pizzaGroup));
        $manager->persist(new Product("Casalinga", 5, $pizzaGroup));
        $manager->persist(new Product("Romana", 5, $pizzaGroup));
        $manager->persist(new Product("Siziliana", 5, $pizzaGroup));
        $manager->persist(new Product("Napolitana", 5, $pizzaGroup));
        $manager->persist(new Product("Cardinale", 5, $pizzaGroup));
        $manager->persist(new Product("Diavolo", 5, $pizzaGroup));
        $manager->persist(new Product("Feuerwehr", 5, $pizzaGroup));
        $manager->persist(new Product("Salami", 5, $pizzaGroup));
        $manager->persist(new Product("Al Tonno", 5, $pizzaGroup));
        $manager->persist(new Product("Capricciosa", 5, $pizzaGroup));
        $manager->persist(new Product("Mona Lisa", 5, $pizzaGroup));
        $manager->persist(new Product("Rusticana", 5, $pizzaGroup));
        $manager->persist(new Product("All Pollo", 7.5, $pizzaGroup));
        $manager->persist(new Product("Contantino", 5, $pizzaGroup));
        $manager->persist(new Product("Tritato di Carne", 5, $pizzaGroup));
        $manager->persist(new Product("Castello", 5, $pizzaGroup));
        $manager->persist(new Product("Diabolino", 5, $pizzaGroup));
        $manager->persist(new Product("Quattro Stagiono", 5, $pizzaGroup));
        $manager->persist(new Product("Quattro Formaggi", 5, $pizzaGroup));
        $manager->persist(new Product("Provinciale", 5, $pizzaGroup));
        $manager->persist(new Product("Spinaci", 5, $pizzaGroup));
        $manager->persist(new Product("Frutti di mare", 8.5, $pizzaGroup));
        $manager->persist(new Product("Gambretti", 9, $pizzaGroup));
        $manager->persist(new Product("Hawaii", 5, $pizzaGroup));
        $manager->persist(new Product("Gorgonzola/Schinken", 5, $pizzaGroup));
        $manager->persist(new Product("Romantica", 5, $pizzaGroup));
        $manager->persist(new Product("Vegetaria", 5, $pizzaGroup));
        $manager->persist(new Product("Venezia", 7.5, $pizzaGroup));
        $manager->persist(new Product("Al Sabi", 5, $pizzaGroup));
        $manager->persist(new Product("Rucola", 8.1, $pizzaGroup));
        $manager->persist(new Product("Fontana", 5, $pizzaGroup));
        $manager->persist(new Product("Vienna", 5, $pizzaGroup));
        $manager->persist(new Product("Fiorentina", 7.5, $pizzaGroup));
        $manager->persist(new Product("Pizzastangerl", 5, $pizzaGroup));
        $manager->persist(new Product("Gefüllte Pizzastangerl", 5, $pizzaGroup));
        $manager->persist(new Product("Die Insel", 5, $pizzaGroup));
        $manager->persist(new Product("Toskana", 5, $pizzaGroup));
        $manager->persist(new Product("Roma", 7.5, $pizzaGroup));
        $manager->persist(new Product("Da Contessa", 5, $pizzaGroup));
        $manager->persist(new Product("Milano", 5, $pizzaGroup));
        $manager->persist(new Product("Pizza Pommes", 5, $pizzaGroup));
        $manager->persist(new Product("Bianka", 7.5, $pizzaGroup));
        $manager->persist(new Product("Don Giovanni", 5, $pizzaGroup));
        $manager->persist(new Product("Knoblauchbrot", 5, $pizzaGroup));
        
        $pizzaAmericaGroup = new ProductGroup("American Pizza");
        $manager->persist($pizzaAmericaGroup);
        $manager->persist(new Product("San Diego", 12.5, $pizzaAmericaGroup));
        $manager->persist(new Product("New York", 11.5, $pizzaAmericaGroup));
        $manager->persist(new Product("Florida", 11.5, $pizzaAmericaGroup));
        $manager->persist(new Product("Chicago", 11.5, $pizzaAmericaGroup));
        $manager->persist(new Product("Dallas", 11.5, $pizzaAmericaGroup));
        $manager->persist(new Product("Nivada", 11.5, $pizzaAmericaGroup));
        $manager->persist(new Product("Manhatan", 11.5, $pizzaAmericaGroup));
        $manager->persist(new Product("Alaska", 11.5, $pizzaAmericaGroup));
        $manager->persist(new Product("Texas", 11.5, $pizzaAmericaGroup));
        $manager->persist(new Product("San Fransisco", 11.5, $pizzaAmericaGroup));
        
        $friedGroup = new ProductGroup("Fried");
        $manager->persist($friedGroup);
        $manager->persist(new Product("Wiener Schnitzel", 7.5, $friedGroup));
        $manager->persist(new Product("Cordon Bleu", 8, $friedGroup));
        $manager->persist(new Product("Geb. Champignons", 7.5, $friedGroup));
        $manager->persist(new Product("Picatta Parmesan", 7.5, $friedGroup));
        $manager->persist(new Product("Chicken Nuggets", 7.5, $friedGroup));
        $manager->persist(new Product("Chicken Wings", 7.5, $friedGroup));
        $manager->persist(new Product("Gemischtes Gebackenes", 8, $friedGroup));
        $manager->persist(new Product("Schnitzel Bolognese", 7.5, $friedGroup));
        $manager->persist(new Product("Putenschnitzel gebacken", 7.9, $friedGroup));
        $manager->persist(new Product("Geb. Camembert", 7.5, $friedGroup));
        $manager->persist(new Product("Geb. Vegetables", 7.5, $friedGroup));
        $manager->persist(new Product("Geb. Emmentaler", 7.5, $friedGroup));
        $manager->persist(new Product("Holzfäller Schnitzel", 8, $friedGroup));
        $manager->persist(new Product("Hollander Schnitzel", 8.2, $friedGroup));
        $manager->persist(new Product("Rahm Schnitzel", 8.2, $friedGroup));
        $manager->persist(new Product("Jäger Schnitzel", 8.2, $friedGroup));
        $manager->persist(new Product("Berner Schnitzel", 8.2, $friedGroup));
        $manager->persist(new Product("Hawaii Schnitzel", 8.2, $friedGroup));
        $manager->persist(new Product("Cordon Bleu Hawaii", 8.2, $friedGroup));
        $manager->persist(new Product("Cordon Bleu Spinacci", 8.2, $friedGroup));
        $manager->persist(new Product("König Schnitzel", 8.2, $friedGroup));
        $manager->persist(new Product("Familienplatte", 17.9, $friedGroup));
        $manager->persist(new Product("Hühnerpfanne", 8.2, $friedGroup));
        $manager->persist(new Product("Die Insel Pfanne", 8.2, $friedGroup));

        $cheeseGroup = new ProductGroup("Österreichische Käsespezialitäten");
        $manager->persist($cheeseGroup);
        $manager->persist(new Product("Käsespätzle", 7.5, $cheeseGroup));
        $manager->persist(new Product("Eier Nockerl", 7.5, $cheeseGroup));
        $manager->persist(new Product("Spetzli", 7.5, $cheeseGroup));
        
        $mexicanGroup = new ProductGroup("Mexikanische Fleischgerichte");
        $manager->persist($mexicanGroup);
        $manager->persist(new Product("Spare Ribs vom Kalb", 11, $mexicanGroup));
        $manager->persist(new Product("Knoblauchkotelette", 8, $mexicanGroup));
        $manager->persist(new Product("Cevapcici", 8, $mexicanGroup));
        $manager->persist(new Product("Putenspiess Hawaii", 8.5, $mexicanGroup));
        $manager->persist(new Product("Megaportion Spare Ribs vom Kalb", 17.9, $mexicanGroup));
        $manager->persist(new Product("Grillteller", 9, $mexicanGroup));
        $manager->persist(new Product("BBQ Back Ribs", 12, $mexicanGroup));
        $manager->persist(new Product("Buffalo Wings", 8, $mexicanGroup));
        $manager->persist(new Product("Wings & Ribs vom Kalb", 13.2, $mexicanGroup));
        $manager->persist(new Product("Mexico Platte vom Kalb", 12, $mexicanGroup));
        $manager->persist(new Product("Pisca Visca", 9.5, $mexicanGroup));
        $manager->persist(new Product("Scalopine die Insel", 10, $mexicanGroup));
        $manager->persist(new Product("Zwiebelringe", 5.5, $mexicanGroup));
        
        $desertGroup = new ProductGroup("Dessert");
        $manager->persist($desertGroup);
        $manager->persist(new Product("Tiramisu", 4, $desertGroup));
        $manager->persist(new Product("Mohr im Hemd", 4, $desertGroup));
        $manager->persist(new Product("Bananasplit", 4, $desertGroup));
        $manager->persist(new Product("Schokoladenpalatschinke", 4, $desertGroup));
        $manager->persist(new Product("Marmeladepalatschinke", 4, $desertGroup));
        $manager->persist(new Product("Eispalatschinke", 4, $desertGroup));
        $manager->persist(new Product("Topfenstrudel", 4, $desertGroup));
        $manager->persist(new Product("Apfelstrudel", 4, $desertGroup));
        $manager->persist(new Product("Profiteroles", 4.2, $desertGroup));
        $manager->persist(new Product("Eismarillenknödel", 4.5, $desertGroup));
        $manager->persist(new Product("Gebackene Banane", 4.5, $desertGroup));
        $manager->persist(new Product("Palatschinke Nutella", 4, $desertGroup));
        $manager->persist(new Product("Schoko Bananen Palatschinken", 4, $desertGroup));
       
        $burgerGroup = new ProductGroup("Burger");
        $manager->persist($burgerGroup);
        $manager->persist(new Product("Hamburger", 8.5, $burgerGroup));
        $manager->persist(new Product("Cheeseburger", 8.5, $burgerGroup));
        $manager->persist(new Product("Bacon Burger", 8.5, $burgerGroup));
        $manager->persist(new Product("BBQ Burger", 8.5, $burgerGroup));
        $manager->persist(new Product("Chicken Burger", 8.5, $burgerGroup));
        $manager->persist(new Product("Veggi Burger", 8.5, $burgerGroup));
        $manager->persist(new Product("Fish Burger", 9.5, $burgerGroup));
        $manager->persist(new Product("Insel Burger", 9.5, $burgerGroup));
        $manager->persist(new Product("Emmentaler Burger", 8.5, $burgerGroup));
        
        $menuGroup = new ProductGroup("Menu");
        $manager->persist($menuGroup);
        $manager->persist(new Product("Cordon Bleu Menü", 9.5, $menuGroup));
        $manager->persist(new Product("Wiener Schnitzel Menü", 9.5, $menuGroup));
        $manager->persist(new Product("Scholle Geb. Menü", 9.5, $menuGroup));
        $manager->persist(new Product("Geb. Gemüse Menü", 9.5, $menuGroup));
        $manager->persist(new Product("Gem. Salat mit Putenstreifen Menü", 9.5, $menuGroup));
        $manager->persist(new Product("Geb Emmentaler Menü", 9.5, $menuGroup));
        $manager->persist(new Product("Pasta Bolognese Menü", 9.5, $menuGroup));
        $manager->persist(new Product("Cevapcici Menü", 9.5, $menuGroup));
        $manager->persist(new Product("Pisca Visca Menü", 9.5, $menuGroup));
        $manager->persist(new Product("Pizza Venezia Menü", 9.5, $menuGroup));
        $manager->persist(new Product("Eiernockerl Menü", 9.5, $menuGroup));
        
        $manager->flush();
    }

    public function getOrder() {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }

}
