    <script>
		function printContent(e1){
				var restorepage=document.body.innerHTML;
				var printcontent=document.getElementById(e1).innerHTML;
				document.body.innerHTML=printcontent;
				window.print() ;
				document.body.innerHTML=restorepage;
			}
	</script>