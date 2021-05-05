
			var toggleHTML = true;
			var toggleCSS = false;
			var toggleJS = false;
			var toggleOutput = true;
			
			if (toggleHTML) {
				$("#tabHTML").show( function() {
					$("#buttHTML").addClass("activeButt");
				});
				//alert("if turning on!");
			}else{
				$("#tabHTML").hide( function() {
					$("#buttHTML").removeClass("activeButt");
				});
				//alert("if turning off!");
			}
			
			if(toggleCSS) {
				$("#tabCSS").show( function() {
					$("#buttCSS").addClass("activeButt");
				});
			}else{
				$("#tabCSS").hide( function() {
					$("#buttCSS").removeClass("activeButt");
				});
			}
			
			if(toggleJS) {
				$("#tabJS").show( function() {
					$("#buttJS").addClass("activeButt");
				});
			}else{
				$("#tabJS").hide( function() {
					$("#buttJS").removeClass("activeButt");
				});
			}
			
			if(toggleOutput) {
				$("#tabOutput").show( function() {
					$("#buttOutput").addClass("activeButt");
				});
			}else{
				$("#tabOutput").hide( function() {
					$("#buttOutput").removeClass("activeButt");
				});
			}
			
			$("#buttHTML").click(function() {
				
				if (toggleHTML) {
					
					toggleHTML = false;
					//alert("butt turning off!");
					$("#tabHTML").hide();
				}else{
					
					toggleHTML = true;
					$("#tabHTML").show();
					//alert(" butt turning on!");
				}
				
			});
			
			$("#buttCSS").click(function() {
				
				if (toggleCSS) {
					
					toggleCSS = false;
					$("#tabCSS").hide();
					
				}else{
					
					toggleCSS = true;
					$("#tabCSS").show();
					
				}
				
			});
			
			$("#buttJS").click(function() {
				
				if (toggleJS) {
					
					toggleJS = false;
					$("#tabJS").hide();
					
				}else{
					
					toggleJS = true;
					$("#tabJS").show();
					
				}
				
			});
			
			$("#buttOutput").click(function() {
				
				if (toggleOutput) {
					
					toggleOutput = false;
					$("#tabOutput").hide();
					
				}else{
					
					toggleOutput = true;
					$("#tabOutput").show();
					
				}
				
			});
			
			 
			$( "#tabHTML" ).resizable({
				handles: "e"
			});
			
			$( "#tabCSS" ).resizable({
				handles: "e"
			});
			
			$( "#tabJS" ).resizable({
				handles: "e"
			});
			
			$( "#tabOutput" ).resizable({
				handles: "w"
			});
			
		//Reset-Button Mechanism:
		
			var showReset = true;
			
			function resetFxn() {
				document.getElementById("html").value = "";	
			}
			
			$("#reset").click(function() {
				
					resetFxn();
				
			});
				
		//Theme-Selector Mechanism: 
		
			$("#darkOpt").click(function() {
				
				document.documentElement.setAttribute('data-theme', 'dark');
				localStorage.setItem('theme', 'dark'); 
				
			});
			
			$("#lightOpt").click(function() {
				
				document.documentElement.setAttribute('data-theme', 'light');
				localStorage.setItem('theme', 'light'); 
				
			});
			
		
			
document.getElementById('code').contentWindow.document.body.style.color='black';

;

function compile() {
  var html = document.getElementById("html");
  var css = document.getElementById("css");
  var js = document.getElementById("js");
  var code = document.getElementById("code").contentWindow.document;


  document.body.onkeyup = function() {
    code.open();
    code.writeln(
      html.value +
        "<style>" +
        css.value +
        "</style>" +
        "<script>" +
        js.value +
        "</script>"
    );
    code.close();
  };
}

compile();

	


			