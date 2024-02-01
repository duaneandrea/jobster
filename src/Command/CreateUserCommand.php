<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-user',
    description: 'This commands creates new users the first argument is the number of users and the second argument is the role',
)]
class CreateUserCommand extends Command
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher, private EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('num_users', InputArgument::REQUIRED, 'The number of users')
            ->addArgument('user_role', InputArgument::REQUIRED, 'The role of the users')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $num_users = $input->getArgument('num_users');
        $user_role = $input->getArgument('user_role');
        $role = array();
        $role[] = $user_role;

        $faker = Factory::create();
        for ($i = 0; $i<$num_users; $i++){
            $user = new User();
            $user->setEmail(strtolower($faker->email));
            $user->setRoles($role);
            $hashedPassword = $this->userPasswordHasher->hashPassword($user,'password');
            $user->setPassword($hashedPassword);
            $this->entityManager->persist($user);
        }

        $this->entityManager->flush();

        $io->success('You have successfully created '.$num_users.' users with role '.implode(' ',$role));

        return Command::SUCCESS;
    }
}
