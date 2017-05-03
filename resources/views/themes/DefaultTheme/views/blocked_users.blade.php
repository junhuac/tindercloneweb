	<?php use App\Components\Theme; ?>
	@extends(Theme::layout('master'))
		@section('content')
		@parent
	  <div class="col-md-12 col-xs" style="box-shadow: 0px 1px 4px rgba(0,0,0,0.36)">
    		<div class="row">	
				<div class="col-md-12 number-of-vistors">
					<p class="vistors-styling-text blocked_header">{{{trans('app.blockedusers')}}} </p>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12 vistors-pic-and-details">
				<div class="">
				@if($blocked->count)
					@foreach($blocked->users as $block)
					<div class="col-md-4 col-xs-5 mylikes-pictures-styling" id="block{{$block->id}}" style="
    max-width: 200px;
    height: 200px !important;
">
						<img class="vistors-pictures" src="{{$block->others_pic_url()}}">
						<div class="col-md-12 my-likes-image-location">
		                     <ul class="list-inline">
		                     <li><a href="{{{ url("/profile/$block->id") }}}">{{{$block->name}}}</a></li><li class="unblock_li" data-user-id="{{{$block->id}}}">  <img class= "unblock_icon"   src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="data:image/png;base64,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"></li>
		                     
							 </ul>
	                 	</div>
					</div>
					@endforeach
				@else
					<div class="" style = "color : black;text-align: center">
					<p class="mv30 teardropAnimation dib">
						<span class="tear"></span>
						<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="data:image/png;base64,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" width="192" height="192">
					</p>

							<div class="mv20 fs16">
					{{{trans_choice('app.no_blocks',1)}}}
					</div>
					
				</div>
				@endif			
					</div>
					</div>
				</div>
			</div>
					@endsection
	@section('scripts')				
	
	
		<script>
			$(document).ready(function(){
				$('.fa.fa-angle-down.d-arrow-1').click(function(){
					 $(this).next('.hover-cover').slideToggle();
				});
				$('.fa.fa-angle-down.d-arrow').click(function(){
					$('.sign-out ').slideToggle();
				});
			});
		</script>
		<script>
			
		//unblock user	
		$('.unblock_li').on("click",function(){
			
			user_id = $(this).data('user-id');
			block = $("#block"+user_id);
			
			$.post("{{{ url('/user/unblock') }}}", { user_id:user_id, _token: App.csrf_token }, function(data){


                    if(data.status=='error')
					{
						toastr.info("{{{trans_choice('app.block_msg',1)}}}");
					}
					else
					{
						toastr.info("{{{trans_choice('app.block_msg',0)}}}");
							        	
						
						$("#block"+user_id).fadeOut();
							        								        	
					}
                


            });
        
		});
		
		</script>
		
	@endsection
	<style>
	.vistors-pictures
	{
	    width: 100%;
	    height: 74%;
	        border: 1px solid rgba(0, 0, 0, 0.16);
    box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.07);
	    
	}
	.vistors-picture-styling
	{
	margin-top:10px;
	}
	
	.unblock_icon {
		    width: 22px;
    height: 22px;
    float: right;
	}
	
	.my-likes-image-location{
		
    height: 35px !important;
    margin-top: -35px !important;
    padding: 7px !important;
       
	}
	
	.unblock_li {
		float:right;
	}
	
	.mylikes-pictures-styling {
		height:170px !important;
	}
	
	.my-likes-image-location>ul>li {
		 font-size: 14px !important;
	}
	</style>