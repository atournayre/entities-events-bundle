<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

#[AsCommand(
    name: GenerateListenersCommand::NAME,
    description: 'Generate listeners',
)]
class GenerateListenersCommand extends Command
{
    public const NAME = 'atournayre:entities-events:generate-listeners';
    private const DEFAULT_TARGET_PATH = 'src/Listener/Events';
    private string $targetPath;

    public function __construct(
        private readonly string $projectDir,
        string                  $name = null
    )
    {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this
            ->addOption('path', null, InputOption::VALUE_NONE, 'Target path.', self::DEFAULT_TARGET_PATH);
    }

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        parent::initialize($input, $output);

        $targetPath = $this->projectDir . DIRECTORY_SEPARATOR . $input->getOption('path');
        (new Filesystem())->mkdir($targetPath);

        $this->targetPath = $targetPath;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->copyListeners();

        $io->success('Listeners generated in ' . $this->targetPath . '.');
        $nextTexts = ['Next:'];
        $nextTexts[] = '1. Update the namespace of the generated listeners.';
        $nextTexts[] = '2. Uncomment the AsDoctrineListener attribute in the generated listeners (if you want to use it).';
        $io->listing($nextTexts);

        return Command::SUCCESS;
    }

    private function copyListeners(): void
    {
        $filesystem = new Filesystem();
        $files = $this->listFiles();
        foreach ($files as $file) {
            $filesystem->copy(
                $file->getRealPath(),
                $this->targetPath . DIRECTORY_SEPARATOR . $file->getFilename()
            );
        }
    }

    private function listFiles(): Finder
    {
        return (new Finder())
            ->files()
            ->in(__DIR__ . '/../Listener');
    }
}
