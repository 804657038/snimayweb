$(function(){
	for(var i=0;i<5;i++)
	{
		for(var j=0;j<10;j++)
		{
			if(j==0)
			{
				$('.loadBar').append('<div class="floatl longB"></div>');
			}else{
				$('.loadBar').append('<div class="floatl shortB"></div>');
			}	
		}
	}
});