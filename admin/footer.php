	<style type="text/css">
	body {
		position: relative;
		min-height: 100vh;
	}
	.chat {
		position: fixed;
		bottom: 0;
		background: white;
		width: 100%;
		z-index: 999;
	}
	.chat-container {
		position: relative;
		width: 100%;
		background: white;
		padding: 5px;
	}
	.all-chat,
	.admins {
		width: 250px;
		background: white;
		position: absolute;
		bottom: 0;
	}
	.admins {
		right: 0px;
		width: 23%;
	}
	.admins ul {
		padding: 0;
		margin: 0;
		margin-bottom: 10px;
	}
	.admins h5 {
		cursor: pointer;
	}
	.admins h5,li {
		text-align: center;
		list-style-type: none;
	}
	.all-chat {
		width: 77%;
		background: transparent;
		left: 0;
	}
	.chat-box {
	    float: right;
	    width: 300px;
	    margin: 0 5px;
	    border: 1px solid;
	    padding: 0;
	    border-top-left-radius: 5px;
	    border-top-right-radius: 5px;
	    border: 1px solid #dedede;
	    background: white;
	    position: relative;
		max-height: 370px;
		overflow: hidden;
		overflow-y: auto;
	}
	.chat-box h5 {
		font-weight: 700;
		color: white;
	    background: #2e6af7;
		font-size: 15px;
		margin: 0;
		padding: 7px;
		border-bottom: 1px solid #dedede;
	}
	.convo {
		position: relative;
		height: 240px;
		overflow: hidden;
		overflow-y: auto;
	}
	.convo span.r {
		border-radius: 10px;
		float: left;
		padding: 5px;
		margin: 5px;
		width: initial;
		max-width: 80%;
		clear: both;
		display: block;
		text-align: left;
	}
	.convo span.r.notyou {
		background: #daeeef;
		float: right;
		text-align: right;
	}
	.status {
		clear: both;
		display: block;
		float: left;
		font-size: 11px;
		padding: 5px;
		font-style: italic;
		color: #585a5a;
		margin: 5px;
		padding: 5px;
		background: white;
		position: relative;
		margin-top: 9px;
	}
	.input {
		-moz-appearance: textfield;
		-webkit-appearance: textfield;
		background-color: white;
		background-color: -moz-field;
		border: 1px solid darkgray;
		box-shadow: 1px 1px 1px 0 lightgray inset;  
		font: -moz-field;
		font: -webkit-small-control;
		margin: 0;
		position: relative;
		bottom: 0;
	    padding: 5px;
	    width: 100%;
	    border: 0;
	    margin-top: 10px;  
	    height: 50px;
	    clear: both;
	}
	.chat-box .count {
		display: none;
	}
	.count {
		color: red;
		font-weight: 600;
		margin-left: 5px;
		text-decoration: none;
		line-height: 1;
		padding: 0;
	}
	.#f3f3f3 {
		background: #f3f3f3;
	}
	#admins {
		background: #e4e5e6;
		margin-top: 0;
		padding: 5px;
		font-weight: 600;
	}

	body {
		/*background: white;*/
	}

	</style>
	<?php
		$model->restricAccessUser();
		$users = ($_SESSION['sess_userrole'] != "admin") ? $model->getAllAdmin() : $model->getAllUser();
	?>
	<section class="chat">
		<div class="chat-container">
			<div class="all-chat">
				<span class="start-all"></span>
				
			</div>
			<div class="admins">
				<h5 id="admins"><?= ($_SESSION['sess_userrole'] != "admin") ? "Admins" : "Users" ?>(<?= count($users); ?>)</h5>
				<ul id="admin-list">
					<?php foreach($users as $x => $user) : ?>
					<li>
						<a id="<?= $user['id'];?>" href=""><?php echo ($user['firstname'] . " " . $user['lastname']);?><span class="count"></span></a>
					</li>
					<?php endforeach ?>
				</ul>
			</div>	
		</div>
	</section>
	<script type="text/html" id="convo">
		<div class="chat-box  s[ID]" data-id="[ID]">
			<h5>[USER] 
				<i class="close pull-right fas fa-close fa-sm"></i></h5>
			<div class="convo">
				<span class="start-convo"></span>
			</div>
			<span class="status">admin1 is typing...</span>
			<div class="input" contenteditable></div>
		</div>
	</script>
	<script type="text/javascript">
		(function($){
			$(document).ready(function(){
				var admin = $('#admins');
				var ul =  $("#admin-list");
				var anchor = ul.find("a");

				binder();

				function loadPer5(chatId){
					console.log("called",chatId);
					$.ajax({
						url : "../process.php",
			          	data : { loadPerChat : true },
			          	type : 'POST',
			          	dataType : 'JSON',
						success : function(res){
							var classId = ".s"+chatId;
							var target = $(classId).find(".start-convo");
							console.log(classId);
							console.log(res);
							// $(".start-convo").html("");
							for(var i in res) {
								var id = res[i].userid;

								if(chatId == id){
									console.log("march"+id);
									$(".rchats"+res[i].id).remove();
									target.append(res[i].content);
								} else {
									console.log("mismatch"+id+ " "+chatId);
									if(res[i].adminid == chatId){
										$(".rchats"+res[i].id).remove();
										target.append(res[i].content);
									}
								}

								if(id ==null){
									id = res[i].adminid;
								}

								
								// target.append(res[i].content);
							}

						},
						complete : function() {
							setTimeout(function(){

							load5(chatId,8000);
						},1000);

						}
					});
				}

				function loadPer10(){
					$.ajax({
						url : "../process.php",
			          	data : { loadMessage : true },
			          	type : 'POST',
			          	dataType : 'JSON',
						success : function(res){
							console.log("10");
							for(var i in res) {
								var id = res[i].userid;

								if(id ==null){
									id = res[i].adminid;
								}

								var a = ul.find("#"+id);

								a.find(".count").html("("+ res[i].total+ ")");
							}

							setTimeout(function(){
								load10(4000);

							},1000);
						}
					});
				}

				function load5(id,sec){
					setTimeout(loadPer5(id),sec);
				}

				function load10(sec){
					setTimeout(loadPer10,sec);
				}

				load10(1000);

				function binder(){
					var input = $(".input");
					var chats = $(".chat-box");
					input.off();
					chats.off();

					chats.find(".close").on("click", function(){
						var me = $(this);
						var id = me.parents(".chat-box").data("id");

						var a = $("#admin-list").find("#"+id);

						a.removeClass("open");
						me.parents(".chat-box").remove();
					});

					//update seen status
					chats.on("click focus", function(){
						var me = $(this);
						var id = me.data("id");

						$.ajax({
							url : "../process.php",
				          	data : { updateSeen : true, id : id },
				          	type : 'POST',
				          	dataType : 'JSON',
							success : function(res){
							}
						});
					});

					input.keyup(function(event) {
						var me = $(this);

					    if (event.keyCode === 13) {
					    	var content = me.value;  
					    	var id = me.parents(".chat-box").data("id");
					        if(event.shiftKey){
					        	console.log("shift");
					        } else {
					        	var content = $(this).html();

								$.ajax({
									url : "../process.php",
						          	data : { addMessage : true, id : id, content: content },
						          	type : 'POST',
						          	dataType : 'JSON',
									success : function(res){
										// me.parents(".chat-box").find(".start-convo").append(res.content);

										$(".input").html("");
									}
								});			        	
					        }
					    }
					});	
				}
				

				admin.on("click", function(){
					ul.toggle(100);
				});

				var startAll = $(".start-all").first();

				anchor.on("click", function(e){
					var me = $(this);
					var id = $(this).attr("id");
					var name = $(this).html();
					var convo = $("#convo").html();

					if($(this).hasClass("open") == false){
						convo = convo.replace("[ID]", id).
							replace("[ID]", id).
							replace("[USER]", name);

						startAll.append(convo);

						$(".status").html("loading messages...");

						$.ajax({
							url : "../process.php",
					          	data : { initialMessage : true, id : id },
					          	type : 'POST',
					          	dataType : 'JSON',
								success : function(res){
									for(var i in res){
										var text = res[i].content;
										var t = ".chat-box.s"+id;
										var target = $(t).find(".start-convo");

										$(target).append(text);
									}

									
									$(".status").html("");

									load5(id,5000);
									binder();
								}
						});
					}

					$(this).addClass("open");
					e.preventDefault();
				});
			});
		})(jQuery);
	</script>
  </body>
</html>
