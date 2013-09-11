<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
class mailLibrary {
	protected $to;
	protected $from;
	protected $sender;
	protected $subject;
	protected $text;
	
	public function setTo($to) {
		$this->to = $to;
	}
	
	public function setFrom($from) {
		$this->from = $from;
	}
	
	public function setSender($sender) {
		$this->sender = $sender;
	}
	
	public function setSubject($subject) {
		$this->subject = $subject;
	}
	
	public function setText($text) {
		$this->text = $text;
	}
	
	public function send() {
		if (!$this->to) {
			exit("������: �� ������ E-Mail ����������!");
		}
		
		if (!$this->from) {
			exit("������: �� ������ E-Mail �����������!");
		}
		
		if (!$this->sender) {
			exit("������: �� ������� ��� �����������!");
		}
		
		if (!$this->subject) {
			exit("������: �� ������� ���� ���������!");
		}
		
		if (!$this->text) {
			exit("������: �� ������ ����� ���������!");
		}
		
		if (is_array($this->to)) {
			$this->to = implode(',', $this->to);
		}
		
		$header = "";
		
		$header .= "MIME-Version: 1.0\n";
		
		$header .= "From: " . $this->sender . "<" . $this->from . ">\n";
		$header .= "Reply-To: " . $this->sender . "\n";
		$header .= "X-Mailer: LitePanel Mailer\n";
		$header .= "Return-Path: " . $this->sender . "\n";
		$header .= "Content-Type: text/plain; charset=\"utf-8\"\n";
		return mail($this->to, $this->subject, $this->text, $header);
	}
}
?>