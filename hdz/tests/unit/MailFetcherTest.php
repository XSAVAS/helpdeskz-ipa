<?php

// Define WRITEPATH manually
define('WRITEPATH', 'C:\xampp\htdocs\helpdeskz-ipa\helpdeskz-ipa\hdz\writable');

use PHPUnit\Framework\TestCase;
use App\Libraries\MailFetcher;
use PhpImap\Mailbox;
use PhpImap\Exceptions\ConnectionException;

class MailFetcherTest extends TestCase
{
    private $mailFetcher;
    private $mailboxMock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mailboxMock = $this->createMock(Mailbox::class);
        $this->mailFetcher = new MailFetcher();

        // If not, you might need to adapt the MailFetcher class to allow injecting a mock mailbox
        $this->mailFetcher->setMailbox($this->mailboxMock);
    }

    public function testParseImapWithConnectionFailure()
    {
        // Simulate throwing a connection exception when searchMailbox is called
        $this->mailboxMock->expects($this->once())
                          ->method('searchMailbox')
                          ->willThrowException(new ConnectionException());

        // Call the parse_imap method and check the response
        $result = $this->mailFetcher->parse_imap();
        $this->assertFalse($result);
    }
}
