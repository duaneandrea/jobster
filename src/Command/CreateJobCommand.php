<?php

namespace App\Command;

use App\Entity\Job;
use App\Helpers\HelperClass;
use App\Repository\CountriesRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:create-job',
    description: 'Add a short description for your command',
)]
class CreateJobCommand extends Command
{
    public function __construct(private EntityManagerInterface $entityManager, private CountriesRepository $countriesRepository, private UserRepository $userRepository)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('num_jobs', InputArgument::REQUIRED, 'Number of jobs to be created')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $num_jobs = $input->getArgument('num_jobs');
        $jobTitles = [
            'Software Engineer',
            'Data Analyst',
            'Marketing Manager',
            'Sales Representative',
            'Graphic Designer',
            'Customer Service Representative',
            'Project Manager',
            'Financial Analyst',
            'Human Resources Manager',
            'Web Developer',
            'Product Manager',
            'Accountant',
            'Operations Manager',
            'Business Analyst',
            'Content Writer',
            'UX Designer',
            'Quality Assurance Analyst',
            'IT Support Specialist',
            'Digital Marketing Specialist',
            'Research Scientist',
            'Network Administrator',
            'Administrative Assistant',
            'Data Scientist',
            'Social Media Manager',
            'Operations Analyst',
            'Front-end Developer',
            'UX Researcher',
            'Sales Manager',
            'HR Coordinator',
            'Systems Engineer',
            'Copywriter',
            'Financial Controller',
            'Business Development Manager',
            'UI Designer',
            'Database Administrator',
            'Technical Writer',
            'Marketing Coordinator',
            'Customer Success Manager',
            'Full Stack Developer',
            'Supply Chain Analyst',
            'IT Manager',
            'Content Marketing Manager',
            'Network Engineer',
            'Executive Assistant',
            'Data Entry Clerk',
            'SEO Specialist',
            'DevOps Engineer',
            'Event Planner',
            'Account Manager',
            'Software Architect',
            'Public Relations Manager',
            'Operations Coordinator',
            'Back-end Developer',
            'UX/UI Developer',
            'Financial Planner',
            'Sales Associate',
            'HR Generalist',
            'IT Consultant',
            'Business Intelligence Analyst',
            'Technical Support Engineer',
            'Marketing Analyst',
            'Brand Manager',
            'Systems Analyst',
            'Content Strategist',
            'Database Developer',
            'Product Owner',
            'UI Developer',
            'Logistics Coordinator',
            'Network Technician',
            'Office Manager',
            'Data Engineer',
            'Social Media Coordinator',
            'Quality Assurance Tester',
            'Software Tester',
            'Event Coordinator',
            'Inside Sales Representative',
            'HR Assistant',
            'IT Support Technician',
            'Digital Marketing Analyst',
            'Front-end Web Developer',
            'UX Research Assistant',
            'Financial Analyst Intern',
            'Business Development Representative',
            'UI/UX Designer',
            'Network Security Engineer',
            'Marketing Assistant',
            'E-commerce Specialist',
            'Data Analyst Intern',
            'IT Project Manager',
            'Content Editor',
            'Sales Operations Analyst',
            'HR Manager',
            'Technical Project Manager',
            'Digital Content Creator',
            'Product Marketing Manager',
            'Systems Administrator',
            'Software Developer',
            'Public Relations Coordinator',
            'Operations Supervisor',
            'Back-end Web Developer',
            'UX/UI Designer',
            'Financial Analyst Associate',
            'Sales Support Specialist',
            'HR Specialist',
            'IT Administrator',
            'Marketing Specialist'
        ];
        $faker = Factory::create();

        for ($i=0; $i<$num_jobs; $i++){
            $applicationDeadline = new \DateTimeImmutable();
            $applicationDeadline = $applicationDeadline->add(new \DateInterval('P1M'));
            $datePosted = new \DateTimeImmutable();

            $randomJob = $jobTitles[array_rand($jobTitles)];
            $job = new Job();
            $job->setJobTitle($randomJob);
            $job->setJobDescription($randomJob.' - '.$faker->realText(1000,2));
            $job->setSkills($randomJob.' - '.$faker->realText(1000,2));
            $job->setJobType(Job::JOB_TYPE_FULL_TIME);
            $job->setExperienceLevel(Job::EXPERIENCE_LEVEL_MID_SENIOR);
            $job->setLocation(Job::JOB_LOCATION_REMOTE);
            $job->setSalaryRange("$50,000 - $60,000");
            $job->setApplicationDeadline($applicationDeadline);
            $job->setRecordHash(HelperClass::getHash());
            $job->setCountry($this->countriesRepository->find(239));
            $job->setJobOwner($this->userRepository->find(30));
            $job->setDateCreated($datePosted);
            $job->setIsDeleted(0);

            $this->entityManager->persist($job);

        }

        $this->entityManager->flush();


        $io->success('You have successfully created '.$num_jobs.' jobs!!');

        return Command::SUCCESS;
    }
}
