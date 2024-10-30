var arbr=0;	

jQuery(document).ready(function(){
	
	
	function map(qui,R,i,A){
		sistas[qui.data('id')]=qui.children('ul').children('li').length;
		if(sistas[qui.data('id')]==0) return;
		
		qui.children('ul').children('li').each(function(){
			brotha=sistas[qui.data('id')];
			
			
			papa = jQuery(this).parent().parent();
			papa_pos=papa.offset();
			papa_pos.height=papa.height();
			papa_pos.width=papa.width();
			papa_pos.centerx=papa_pos.left+(papa_pos.width/2);
			papa_pos.centery=papa_pos.top+(papa_pos.height/2);
			
			//console.log(papa_pos);
			wi = jQuery(this).children('a').outerWidth();
			he = jQuery(this).children('a').outerHeight();
			
			jQuery(this).children('a').css({
				//height:''+(he)+'px',
				//top:'-'+(he/2)+'px',
				left:'-'+(wi/2)+'px',
			});
				
			if(arbr==0){
				jQuery(this).offset({top:papa_pos.centery,left:papa_pos.centerx});
				angle=0;
				arbr=1;
			}
			else{
				
				rays = 360/(brotha);				
				angle = (rays*i)+A;
				
				
		console.log(angle);
				jQuery(this).height(R).css({
					'-transform':'rotate('+(angle)+'deg)',
					'-moz-transform':'rotate('+(angle)+'deg)',
					'-webkit-transform':'rotate('+(angle)+'deg)'
				});
				
				jQuery(this).children('a,ul').css({
					'transform':'rotate(-'+(angle)+'deg)',
					'-moz-transform':'rotate(-'+(angle)+'deg)',
					'-webkit-transform':'rotate(-'+(angle)+'deg)'
				});
				

			}
			i++;
			map(jQuery(this),R/2,0,brotha*8+A);
			
		});
	}
	
	var area;
	
	jQuery('.mindcat').each(function(){
		
	
		area_obj=jQuery(this);
		size = area_obj.data('size');
		if(isNaN(size)) size=50;
		area_obj.height(size*12);
		area = area_obj.offset();
		area.height=area_obj.height();
		area.width=area_obj.width();
		sistas=[];
		//console.log(area);
		
		angl=Math.random()*90;
		map(jQuery(this),size*10,0,angl);
		
	});
	
	if(jQuery('.mindcat-color-field').length>0){
		jQuery('.mindcat-color-field').wpColorPicker();
	}

});