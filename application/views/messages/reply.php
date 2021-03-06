<?php

$recip_input = set_value('recipients');
$subject_input = set_value('subject');
$content_input = set_value('content');

$recipients = array(
	'name'	=> 'recipients',
	'id'	=> 'pm-recipients',
	'value' => isset($recip_input) && strlen($recip_input) > 0 ? $recip_input : $message->username,
	'size'	=> 30
);

$subject = array(
	'name'	=> 'subject',
	'id'	=> 'pm-subject',
	'value' => isset($subject_input) && strlen($subject_input) > 0 ? $subject_input : $message->subject,
	'maxlength'	=> 64,
	'size'	=> 30
);

$content = array(
	'name'	=> 'content',
	'id'	=> 'pm-content-input',
	'value' => isset($subject_input) && strlen($subject_input) > 0 ? $subject_input : $message->content
);

$err_display = '';

if (isset($errors) && strlen($errors) > 0)
{
	$err_display = '<div id="errors"><h4>Woops, looks like you suck at the internet.</h4><ul>'. $errors .'</ul></div>';
}

?>

				<div id="main-title"><h3>Send a message</h3></div>
				
				<div id="pm-send">
					
					<p>Send a message to another member. Remember, if you don't recieve a reply it may not be that you're being ignored, most people don't check their message very often.</p>
					
					<?php echo $err_display; ?>
					
					<div class="dotted-bar"></div>
					
					<?php echo form_open('/messages/send'); ?>
						
						<div class="inp">
							<?php echo form_label('To: (comma delimited usernames)', $recipients['id']); ?>
							<?php echo form_input($recipients); ?>
						</div>
						
						<div class="inp">
							<?php echo form_label('Subject:', $subject['id']); ?>
							<?php echo form_input($subject); ?>
						</div>
						
						<div class="inp">
							<?php echo form_label('Your message:', $content['id']); ?>
							<?php echo form_textarea($content); ?>
						</div>
						
						<?php echo form_submit('submit', 'Send message'); ?>
					<?php echo form_close(); ?>
					
				</div>