<?php

namespace App\DataFixtures;

use App\Entity\Learner;
use App\Entity\Level;
use App\Entity\SchoolClass;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        
        //Level
        $level_01 = new Level();
        $level_01->setGrade('Maternelle');
        $manager->persist($level_01);
        $level_02 = new Level();
        $level_02->setGrade('Primaire');
        $manager->persist($level_02);
        $level_03 = new Level();
        $level_03->setGrade('Collège');
        $manager->persist($level_03);
        $level_04 = new Level();
        $level_04->setGrade('Lycée');
        $manager->persist($level_04);

        //SchoolClass
        $schoolClass_01 = new SchoolClass();
        $schoolClass_01->setName('Petite Section');
        $schoolClass_01->setLevel($level_01);
        $manager->persist($schoolClass_01);
        $schoolClass_02 = new SchoolClass();
        $schoolClass_02->setName('Moyenne Section');
        $schoolClass_02->setLevel($level_01);
        $manager->persist($schoolClass_02);
        $schoolClass_03 = new SchoolClass();
        $schoolClass_03->setName('Grande Section');
        $schoolClass_03->setLevel($level_01);
        $manager->persist($schoolClass_03);
        $schoolClass_04 = new SchoolClass();
        $schoolClass_04->setName('CP');
        $schoolClass_04->setLevel($level_02);
        $manager->persist($schoolClass_04);
        $schoolClass_05 = new SchoolClass();
        $schoolClass_05->setName('CE1');
        $schoolClass_05->setLevel($level_02);
        $manager->persist($schoolClass_05);
        $schoolClass_06 = new SchoolClass();
        $schoolClass_06->setName('CE2');
        $schoolClass_06->setLevel($level_02);
        $manager->persist($schoolClass_06);
        $schoolClass_07 = new SchoolClass();
        $schoolClass_07->setName('CM1');
        $schoolClass_07->setLevel($level_02);
        $manager->persist($schoolClass_07);
        $schoolClass_08 = new SchoolClass();
        $schoolClass_08->setName('CM2');
        $schoolClass_08->setLevel($level_02);
        $manager->persist($schoolClass_08);
        $schoolClass_09 = new SchoolClass();
        $schoolClass_09->setName('Sixième');
        $schoolClass_09->setLevel($level_03);
        $manager->persist($schoolClass_09);
        $schoolClass_10 = new SchoolClass();
        $schoolClass_10->setName('Cinquième');
        $schoolClass_10->setLevel($level_03);
        $manager->persist($schoolClass_10);
        $schoolClass_11 = new SchoolClass();
        $schoolClass_11->setName('Quatrième');
        $schoolClass_11->setLevel($level_03);
        $manager->persist($schoolClass_11);
        $schoolClass_12 = new SchoolClass();
        $schoolClass_12->setName('Troisième');
        $schoolClass_12->setLevel($level_03);
        $manager->persist($schoolClass_12);
        $schoolClass_13 = new SchoolClass();
        $schoolClass_13->setName('Seconde');
        $schoolClass_13->setLevel($level_04);
        $manager->persist($schoolClass_13);
        $schoolClass_14 = new SchoolClass();
        $schoolClass_14->setName('Première');
        $schoolClass_14->setLevel($level_04);
        $manager->persist($schoolClass_14);
        $schoolClass_15 = new SchoolClass();
        $schoolClass_15->setName('Terminale');
        $schoolClass_15->setLevel($level_04);
        $manager->persist($schoolClass_15);

        //Learner
        $learner_01 = new Learner();
        $learner_01->setFirstName('Shemsedine');
        $learner_01->setLastName('Giannotta');
        $learner_01->setGender(true);
        $manager->persist($learner_01);
        $learner_01 = new Learner();
        $learner_01->setFirstName('Souleyman');
        $learner_01->setLastName('Giannotta');
        $learner_01->setGender(true);
        $manager->persist($learner_01);
        $learner_01 = new Learner();
        $learner_01->setFirstName('Bilel');
        $learner_01->setLastName('Giannotta');
        $learner_01->setGender(true);
        $manager->persist($learner_01);
        $learner_01 = new Learner();
        $learner_01->setFirstName('Hafsa');
        $learner_01->setLastName('Giannotta');
        $learner_01->setGender(false);
        $manager->persist($learner_01);
        $learner_01 = new Learner();
        $learner_01->setFirstName('Oubaydoullah');
        $learner_01->setLastName('Giannotta');
        $learner_01->setGender(true);
        $manager->persist($learner_01);
        

        $manager->flush();
    }
}
