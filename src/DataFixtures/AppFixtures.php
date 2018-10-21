<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 21.10.18
 * Time: 14:54
 */

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $rawCategories = [
            [
                "internalId" => "804040",
                "name" => "Sonstige Umzugsleistungen"
            ],
            [
                "internalId" => "802030",
                "name" => "Abtransport, Entsorgung und Entrümpelung"
            ],
            [
                "internalId" => "411070",
                "name" => "Fensterreinigung"
            ],
            [
                "internalId" => "402020",
                "name" => "Holzdielen schleifen"
            ],
            [
                "internalId" => "108140",
                "name" => "Kellersanierung"
            ]
        ];
        // Categories fixtures
        foreach ($rawCategories as $rawCategory) {
            $category = (new Category)
                ->setInternalId($rawCategory['internalId'])
                ->setName($rawCategory['name']);
            $manager->persist($category);
        }
        $manager->flush();

//        $job = (new Job)
//            ->setTitle('Paint walls')
//            ->setDescription('I need to paint the walls of my entire house')
//            ->setCategory($manager->getRepository(Category::class)->findOneBy(['internal_id' => '804040']))
//            ->setAddress($manager->getRepository(Address::class)->findOneBy(['zip' => '10827']))
//            ->setDueDate(new \DateTime('2019-01-10 15:00:00'));
//
//        $manager->persist($job);
//        $manager->flush();
    }
}