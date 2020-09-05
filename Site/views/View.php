<?php
	namespace views;

	class View
	{

		const DEFAULT_HEADER = 'header.php'; 
		const DEFAULT_FOOTER = 'footer.php'; 

		public function render( $body, $header = null, $footer = null )
		{
			if( $header == null ) 
			{
				
				include('views/includes/'.self::DEFAULT_HEADER);
			}
			else
			{
				include('views/includes/'.$header);
			}

			include('views/pages/'.$body); 

			if( $footer == null )
			{
				
				include('views/includes/'.self::DEFAULT_FOOTER);
			}
			else
			{
				
				include('views/includes/'.$footer);
			}
		}

	}
?>