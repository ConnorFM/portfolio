<?php

namespace App\DataFixtures;

use App\Entity\Diplomas;
use App\Entity\Languages;
use App\Entity\ProfessionalExperiences;
use App\Entity\Projects;
use App\Entity\Skills;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEmail('foucauld.gaudin@gmail.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, 'aze'));
        $admin->setFirstName('Foucauld');
        $admin->setLastName('Gaudin');
        $admin->setPhone('1111111111');
        $admin->setParagraph('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $admin->setLinkedin('https://fr.linkedin.com/in/foucauld-gaudin-b20a96a2');
        $admin->setGithub('https://github.com/ConnorFM');
        $admin->setAge(30);
        $admin->setPhoto('fouc.jpg');

        $manager->persist($admin);

        $language = new Languages();
        $language->setName('French');
        $language->setLevel(100);

        $manager->persist($language);

        $language1 = new Languages();
        $language1->setName('English');
        $language1->setLevel(95);

        $manager->persist($language1);

        $project = new Projects();
        $project->setName('Projet de test 1');
        $project->setScreenshot('screen2.png');
        $project->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $project->setLink('https://github.com/ConnorFM');
        $project->setTechnoUsed('Symfony 4 ma gueule!');
        $project->setStartDate(new \DateTime('2017-01-01'));
        $project->setEndDate(new \DateTime('2019-01-01'));
        $project->setMembersNumber(3);

        $manager->persist($project);

        $project1 = new Projects();
        $project1->setName('Projet de test 2');
        $project1->setScreenshot('screen1.png');
        $project1->setDescription('Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $project1->setLink('https://github.com/ConnorFM');
        $project1->setTechnoUsed('Symfony 4 ma gueule!');
        $project1->setStartDate(new \DateTime('2012-01-01'));
        $project1->setEndDate(new \DateTime('2011-01-01'));
        $project1->setMembersNumber(3);

        $manager->persist($project1);

        $project2 = new Projects();
        $project2->setName('Projet de test 3');
        $project2->setScreenshot('screen3.png');
        $project2->setDescription('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $project2->setLink('https://github.com/ConnorFM');
        $project2->setTechnoUsed('Symfony 4 ma gueule!');
        $project2->setStartDate(new \DateTime('2019-01-01'));
        $project2->setEndDate(new \DateTime('2024-01-01'));
        $project2->setMembersNumber(3);

        $manager->persist($project2);

        $skill = new Skills();
        $skill->setName('PHP');
        $skill->setHardSkill(true);
        $skill->setCompletion(60);

        $manager->persist($skill);

        $skill1 = new Skills();
        $skill1->setName('Javascript');
        $skill1->setHardSkill(true);
        $skill1->setCompletion(10);

        $manager->persist($skill1);

        $skill3 = new Skills();
        $skill3->setName('HTML');
        $skill3->setHardSkill(true);
        $skill3->setCompletion(90);

        $manager->persist($skill3);

        $skill2 = new Skills();
        $skill2->setName('CSS');
        $skill2->setHardSkill(true);
        $skill2->setCompletion(5);

        $manager->persist($skill2);

        $kill = new Skills();
        $kill->setName('Empathy');
        $kill->setSoftSkill(true);
        $kill->setCompletion(80);

        $manager->persist($kill);

        $kill1 = new Skills();
        $kill1->setName('Team Work');
        $kill1->setSoftSkill(true);
        $kill1->setCompletion(90);

        $manager->persist($kill1);

        $kill2 = new Skills();
        $kill2->setName('Curiosity');
        $kill2->setSoftSkill(true);
        $kill2->setCompletion(10);

        $manager->persist($kill2);


       /* $diploma = new Diplomas();
        $diploma->setName('Doctorate es Sleep');
        $diploma->setSpecialty('Everywhere!');
        $diploma->setLocation('Lyon');
        $diploma->setStartDate(new \DateTime("@" . $dbResult->db_timestamp));
        $diploma->setEndDate(new \DateTime('24/07/2088'));

        $manager->persist($diploma);*/

        /*$diploma1 = new Diplomas();
        $diploma1->setName('Bachelor');
        $diploma1->setSpecialty('Wanking');
        $diploma1->setLocation('Lyon');
        $diploma1->setStartDate(new \Datetime('01/01/2001'));
        $diploma1->setEndDate(new \DateTime('01/02/2008'));

        $manager->persist($diploma1);*/


        $experience = new ProfessionalExperiences();
        $experience->setTitle('Experience 1');
        $experience->setStartDate(new \Datetime('01/01/2001'));
        $experience->setEndDate(new \Datetime('01/01/2008'));
        $experience->setDescription('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $experience->setSocietyName('Society 1');

        $manager->persist($experience);

        $experience1 = new ProfessionalExperiences();
        $experience1->setTitle('Experience 2');
        $experience1->setStartDate(new \Datetime('01/01/2001'));
        $experience1->setEndDate(new \Datetime('01/01/2008'));
        $experience1->setDescription('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $experience1->setSocietyName('Society 2');

        $manager->persist($experience1);







        $manager->flush();
    }
}
