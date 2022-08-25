<?php
interface RedactInterface
{
    public function redactText();
}

class Copy implements RedactInterface
{
    public function redactText()
    {
        echo "выполняется копирование текста";
    }
}

class Cut implements RedactInterface
{
    public function redactText()
    {
        echo "выполняется вырезание текста";
    }
}

class Paste implements RedactInterface
{
    public function redactText()
    {
        echo "выполняется вставка текста";
    }
}

interface CommandInterface
{
    public function execute();
}

class Redactor implements CommandInterface
{
    private $redactCommand;

    public function __construct(RedactInterface $redactCommand)
    {
        $this->redactCommand = $redactCommand;
    }
    public function execute()
    {
        echo "какая-то бизнес логика";
        $this->redactCommand->redactText();
    }
}

class RemoteControl
{
    public function submit(CommandInterface $command)
    {
        echo 'Некоторая бизнес-логика';
        $command->execute();
        echo 'Некоторая бизнес-логика';
    }
}

$cut = new Cut();
$cutCommand = new Redactor($cut);

$copy = new Copy();
$copyCommand = new Redactor($copy);

$paste = new Paste();
$pasteCommand = new Redactor($paste);

$remote = new RemoteControl;

$remote->submit($cutCommand); // вырезать
$remote->submit($copyCommand); // скопировать
$remote->submit($pasteCommand); // вставить
