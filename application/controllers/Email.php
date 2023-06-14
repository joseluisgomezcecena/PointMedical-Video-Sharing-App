<?php

class Email extends MY_Controller
{

	public function send() {
		$this->load->library('email');

		$subject = 'This is a test';
		$message = '<p>This message has been sent for testing purposes.</p>';

		sleep(3);

		$result = $this->email
			->from('jgomez@martechmedical.com')
			->reply_to('noreply@martechmedical.com')    // Optional, an account where a human being reads.
			->to('jgomez@martechmedical.com')
			->subject('This is a test')
			->message('<p>This message has been sent for testing purposes.</p>')
			->send();

		var_dump($result=false);
		echo '<br />';
		echo $this->email->print_debugger();

	}
}
