<?php
interface NotifyInterface
{
    public function notify();
}

class NotifyService implements NotifyInterface
{
    public function notify()
    {
        echo 'Оповещения не подключены';   // на базовом уровне нет оповещений
    }
}

class SmsNotify implements NotifyInterface
{
    /** @var NotifyInterface */
    protected $notifyService;

    public function __construct(NotifyInterface $notifyService)
    {
        $this->notifyService = $notifyService;
    }

    public function notify()
    {
        echo 'Отправить смс'; // Какая-то логика для отправки смс
        $this->notifyService->notify();
    }
}

class MailNotify implements NotifyInterface
{
    /** @var NotifyInterface */
    protected $notifyService;

    public function __construct(NotifyInterface $notifyService)
    {
        $this->notifyService = $notifyService;
    }

    public function notify()
    {
        mail('', '', ''); // Какая-то логика для отправки электронной почты
        $this->notifyService->notify();
    }
}

class ChromeNotify implements NotifyInterface
{
    /** @var NotifyInterface */
    protected $notifyService;

    public function __construct(NotifyInterface $notifyService)
    {
        $this->notifyService = $notifyService;
    }

    public function notify()
    {
        echo 'Отправить уведомление через Chrome notification'; // Какая-то логика для отправки уведомлений через CN
        $this->notifyService->notify();
    }
}

$notifyService = new ChromeNotify(
    new MailNotify(
        new SmsNotify(
            new NotifyService()
        )
    )
);
