<div class="callback" style="height: 270px;">
	<div class="callback_cover callback_panel">
		<div class="valign_middle clear">
			<div class="callback_title">
				заявка отправлена
			</div>
			<p>
				Свяжемся с вами в ближайшее время
			</p>
		</div>
		<a href="index.html#" class="close_button close_cover"></a>
	</div>
	<div class="callback_form callback_panel">
		<div class="valign_middle">
			<form method="post" action="/callback" name="myForm" id="" data-req="PHONE">
				{{ csrf_field() }}
				<input type="hidden" name="HEAD" value=""/>
				<table>
					<tr>
						<td>
							<input required type="text" name="name" placeholder="Ф.И.О."/>
						</td>
						<td>
							<input required type="text" name="company" placeholder="Организация" class="text_input" />
						</td>
						<td>
							<input required type="text" name="phone" placeholder="Телефон" class="phone_input" />
						</td>
						<td>
							<input required type="text" name="email" placeholder="E-mail" class="email_input" />
						</td>
					</tr>
				</tbody>
			</table><br>
			<table>
				<tbody>
					<tr>
						<td width="63%">
							<textarea rows="2" cols="1" name="text" placeholder="Сообщение" class="text_input"></textarea>
						</td>
						<td>
							<button type="submit" class="button w_100_pс">
								<span class="black_button">	

									Свяжитесь со мной
									<span class="gray_cover">

										Свяжитесь со мной
									</span>
								</span>
							</button>
						</td>
					</tr>
				</table>
			</form>
			<!-- <script type="text/javascript">
				$(document).ready(function(){
					$("#callbak_form").submit(function(){
						formSubmit();
						return false;
					});
				});
			</script> -->
			<br><center><p><input name="a" value="Даю согласие на обработку своих персональных данных" checked="" type="checkbox">&nbsp;Даю <a href="../../../soglashenie-ob-obrabotke-personalnykh-dannykh.php.html" target="_blank" style="color:#104E8B;text-decoration:underline;">согласие на обработку</a> своих персональных данных</p></center>
		</div>
	</div><!-- callback_form -->
	<div class="callback_intro visible callback_panel">
		<div class="valign_middle clear">
			<a class="button w_240 callback_button">
				<span class="black_button">	

					Оставить заявку
					<span class="red_cover">

						Оставить заявку
					</span>
				</span>
			</a>
			<div class="callback_title">

				Позвоните
			+7 702 500 66 05</div>
			<p>

				или оставьте заявку и наш консультант свяжется с вами

			</p>
		</div>

	</div>
</div><!-- contact_info -->