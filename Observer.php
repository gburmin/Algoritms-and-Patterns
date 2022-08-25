<?php

interface SubjectInterface
{
    public function attach(ObserverInterface $observer);
    public function dettach(ObserverInterface $observer);
    public function notify();
}

interface ObserverInterface
{
    public function handle(); // получить вакансию на почту
}

class JobSeeker implements ObserverInterface
{
    protected $name;
    protected $mail;
    protected $experience;

    public function __construct(string $name, string $mail, float $experience)
    {
        $this->name = $name;
        $this->mail = $mail;
        $this->experience = $experience;
    }

    public function handle()
    {
        mail($this->mail, 'New vacancy', 'new vacancy for you');
    }
}


class PhpVacancy implements SubjectInterface
{
    private $newVacancy;
    private $observers;

    public function getNewVacancy()
    {
        return $this->newVacancy;
    }

    public function setNewVacancy(string $newVacancy)
    {
        $this->newVacancy = $newVacancy;
    }

    public function attach(ObserverInterface $observer)
    {
        $this->observers[] = $observer;
    }

    public function dettach(ObserverInterface $observer)
    {
        foreach ($this->observers as &$obsrv) {
            if ($obsrv === $observer) {
                unset($obsrv);
            }
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->handle();
        }
    }
}

$observerTom = new JobSeeker('Tom', 'tom@gmail.com', 3);

$phpVacancy = new PhpVacancy;
$phpVacancy->attach($observerTom);

$phpVacancy->setNewVacancy('Описание новой вакансии');
$phpVacancy->notify();
