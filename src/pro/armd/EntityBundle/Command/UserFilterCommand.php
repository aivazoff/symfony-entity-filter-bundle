<?php

namespace pro\armd\EntityBundle\Command;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use pro\armd\EntityBundle\EntityFilterAnd;
use pro\armd\EntityBundle\EntityFilterOr;
use pro\armd\EntityBundle\Repository\ViewUserRepository;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputOption;
use pro\armd\EntityBundle\Entity\ViewUser;


class UserFilterCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('user-filter:example')
            ->setDescription('...')
            ->addArgument('example', null, InputOption::VALUE_REQUIRED, 'Example number')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if(!$example = intval($input->getArgument('example'))) {
            $example = 1;
        }

        $exampleMethod = "example$example";

        if(!method_exists($this, $exampleMethod)) {
            (new SymfonyStyle($input, $output))->error("Example $example not exists!");
            return;
        }

        call_user_func([$this, $exampleMethod], $input, $output);

    }

    private function example1(InputInterface $input, OutputInterface $output)
    {
        /** @var EntityManager $em */
        $em = $this->getContainer()->get('doctrine')->getManager();

        /** @var ViewUserRepository $userAboutRepo */
        $userAboutRepo = $em->getRepository('UserFilterBundle:ViewUser');

        /** @var ViewUser[] $users */
        $users = $userAboutRepo->search(
            new EntityFilterAnd('country', 'Россия'),
            new EntityFilterOr('state', 'active', false)
        );

        foreach($users as $user) {
            $output->writeln($user->getEmail());
        }
    }
}
