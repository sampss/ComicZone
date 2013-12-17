<!--Main Content -->
		<div class="body_content">
			<div class="update about">
				<p>Feel free to contact us regarding adding your content, suggestions for improving the site, possible copyright infringment and more.  We will respond to emails in the order in which they are received.</p>
			</div>

			<div class="contact_form">

				<?php

					echo $message;

					
				
					$this->load->helper("form");
					echo form_open("cz_main_controller/send_email");

					echo validation_errors();

					echo form_label("Name: ", "fullname");

					$data = array(
						"name" => "fullname",
						"id" => "fullname",
						"value" => set_value("fullname")
					);
					

					echo form_input($data);

					echo form_label("Email: ", "email");

					$data = array(
						"name" => "email",
						"id" => "email",
						"value" => set_value("email")
					);


					echo form_input($data);

					echo form_label("Message: ", "message");

					$data = array(
						"name" => "message",
						"id" => "message",
						"value" => set_value("message")
					);

					echo form_textarea($data);

					echo form_submit("contactSubmit", "Send!");


					echo form_close();
				?>
			</div>
		</div>				
		<div class="clearfix"></div>