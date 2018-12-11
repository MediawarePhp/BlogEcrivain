
<script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() 
	{
		$("body").css("display", "none");

		$("body").fadeIn(1000);

		$("a.transition").click(function(event){
			event.preventDefault();
			linkLocation = this.href;
			$("body").fadeOut(1500, redirectPage);
		});

		function redirectPage() {
			window.location=linkLocation;
		}
	});
</script>