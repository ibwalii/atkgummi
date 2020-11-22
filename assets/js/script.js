// JavaScript Document
 	// CLOCK WORKER
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	var radius = canvas.height / 2;
	ctx.translate(radius, radius);
	radius = radius * 0.90
	setInterval(drawClock, 1000);
	
	function drawClock() {
	  drawFace(ctx, radius);
	  drawNumbers(ctx, radius);
	  drawTime(ctx, radius);
	}
	
	function drawFace(ctx, radius) {
	  var grad;
	  ctx.beginPath();
	  ctx.arc(0, 0, radius, 0, 2*Math.PI);
	  ctx.fillStyle = 'white';
	  ctx.fill();
	  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
	  grad.addColorStop(0, '#333');
	  grad.addColorStop(0.5, 'white');
	  grad.addColorStop(1, '#333');
	  ctx.strokeStyle = grad;
	  ctx.lineWidth = radius*0.1;
	  ctx.stroke();
	  ctx.beginPath();
	  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
	  ctx.fillStyle = '#333';
	  ctx.fill();
	}
	
	function drawNumbers(ctx, radius) {
	  var ang;
	  var num;
	  ctx.font = radius*0.15 + "px arial";
	  ctx.textBaseline="middle";
	  ctx.textAlign="center";
	  for(num = 1; num < 13; num++){
		ang = num * Math.PI / 6;
		ctx.rotate(ang);
		ctx.translate(0, -radius*0.85);
		ctx.rotate(-ang);
		ctx.fillText(num.toString(), 0, 0);
		ctx.rotate(ang);
		ctx.translate(0, radius*0.85);
		ctx.rotate(-ang);
	  }
	}
	
	function drawTime(ctx, radius){
		var now = new Date();
		var hour = now.getHours();
		var minute = now.getMinutes();
		var second = now.getSeconds();
		//hour
		hour=hour%12;
		hour=(hour*Math.PI/6)+
		(minute*Math.PI/(6*60))+
		(second*Math.PI/(360*60));
		drawHand(ctx, hour, radius*0.5, radius*0.07);
		//minute
		minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
		drawHand(ctx, minute, radius*0.8, radius*0.07);
		// second
		second=(second*Math.PI/30);
		drawHand(ctx, second, radius*0.9, radius*0.02);
	}
	
	function drawHand(ctx, pos, length, width) {
		ctx.beginPath();
		ctx.lineWidth = width;
		ctx.lineCap = "round";
		ctx.moveTo(0,0);
		ctx.rotate(pos);
		ctx.lineTo(0, -length);
		ctx.stroke();
		ctx.rotate(-pos);
	}
//END OF CLOCK WORKER	
		// CLOCK VARIABLE
		var clock;	
 $(document).ready(function(e) {
	 	// INTER SWITCHING PAGES
        $(".close1btn").click(function(e) {
            $('#page1').fadeOut(1000, function(){
				$('#page2').fadeIn(1000);
				});
        });
		$(".close2btn").click(function(e) {
            $('#page2').fadeOut(1000, function(){
				$('#page1').fadeIn(1000);
				});
        });
		
		//ADD COLUMN
		$('#addbtn').click(function(){
			var c = $("#otherform table thead th").length;
			$("#otherform table thead tr").append('<th><input type="text" value="Period 1" name="period[8][0]"><input type="hidden" value="1" name="period[8][4]"></th>');
			$("#otherform table tr:gt(0)").append('<td><input type="time" name="period[7][2]" value="12:30"></td>');
		});
		
		//FORM SUBMIT
		$('form').on('submit', function(e){
			e.preventDefault();
			var form_data = $(this).serialize();
			//$(this).css('opacity', '0.5');
			$.ajax({
				type:'GET',
				url:"../pages/save.php",
				async:true,
				data:form_data,
				beforeSend: function(){
					//alert(form_data);
					},
				success: function(result){
					$.fancybox("Time Table Updated!!");
					
					}			
				});	
		});
			
		// COUNTDOWN CLOCK WORKER
			var dt = new Date();
			var nowtime = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
			var now = dt.getHours() + ":" + dt.getMinutes();
			var i;
			for(i= 1; i < 9; i++){
				var nxttime = $('#p'+i).val();
				var nowcal = (dt.getHours()*60) + dt.getMinutes() + (dt.getSeconds()/60);
				var nxtcal = nxttime.split(':');
				nxtcal = ((nxtcal[0] * 60) + (nxtcal[1]*1));
				if(nowcal < nxtcal){
					break;
					}
			}
			
			//CHECKING TIME DIFFERENCE
			function diff(now, nxt){
				nxt = nxt.split(':');
				now = now.split(':');
				var startDate = new Date(0, 0, 0, now[0], now[1], now[2]);
				var endDate = new Date(0, 0, 0, nxt[0], nxt[1], 0);
				var diff = endDate.getTime() - startDate.getTime();
				var hours = Math.floor(diff / 1000 / 60 / 60);
				diff -= hours * 1000 * 60 * 60;
				var minutes = Math.floor(diff / 1000 / 60);
				return( ((hours * 60) + minutes) * 60);
				
				//return (hours < 9 ? "0" : "") + hours + ":" + (minutes < 9 ? "0" : "") + minutes;
				}
				var counttime = diff(nowtime, nxttime);
            // FLIP CLOCK FUNCTIOIN 
			clock = $('.clock').FlipClock(counttime, {
		        clockFace: 'MinuteCounter',
		        countdown: true,
		        callbacks: {
		        	stop: function() {
						$('audio').trigger('play');
		        	}
		        }
		    });
			// END OF COUNTDOWN CLOCK WORKER
    });
