@extends('layouts.app')

@section('title','Blogs')
@section('meta_keywords','Blogs')
@section('meta_description','Blogs')

@section('content')
<style>
.laravel-pagination .flex-1, .laravel-pagination p.leading-5{display:none;}
.w-5.h-5{height: 20px;}

.py-2 {
    padding-top: 0rem!important;
    padding-bottom: 0.5rem!important;
}
</style>
<style>
	section.why-choose-us .why-choose-us-item1 {
		
		text-align: left !important;
	}
	section.our-team .team-member .team-member-info {
		margin: 0px 0 !important;
		background-color: #14285a;
		padding: 10px;
	}
	.coreValue{
		overflow: hidden;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		text-align:justify;
	}
	
	.coreValueReadMore{
		
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		text-align:justify;
	}

	.blogTitleValue{
		overflow: hidden;
		display: -webkit-box;
		-webkit-line-clamp: 1;
		-webkit-box-orient: vertical;
	}
</style>

<section class="section-breadcrumb mb-[50px] max-[1199px]:mb-[35px] border-b-[1px] border-solid border-[#eee] bg-[#f8f8fb]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full">
                <div class="w-full px-[12px]">
                    <div class="flex flex-wrap w-full bb-breadcrumb-inner m-[0] py-[20px] items-center">
                        <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                            <h2 class="bb-breadcrumb-title font-quicksand tracking-[0.03rem] leading-[1.2] text-[16px] font-bold text-[#3d4750] max-[767px]:text-center max-[767px]:mb-[10px]">Blog</h2>
                        </div>
                        <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                            <ul class="bb-breadcrumb-list mx-[-5px] flex justify-end max-[767px]:justify-center">
                                <li class="bb-breadcrumb-item text-[14px] font-normal px-[5px]"><a href="{{url('/')}}" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Home</a></li>
                                <li class="text-[14px] font-normal px-[5px]"><i class="fa fa-arrow-right text-[14px] font-semibold leading-[28px]"></i></li>
                                <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <section class="section-blog overflow-hidden  max-[1199px]:pb-[35px]  max-[1199px]:pt-[70px]">
         <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full">
               <div class="w-full px-[12px]">
                  <div class="flex flex-wrap w-full">
                     @foreach($result as $key=>$blog)
                     <div class="min-[1200px]:w-[33.33%] min-[768px]:w-[33.33%] w-[50%] max-[480px]:w-full px-[12px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
													
                        <div class="blog-2-card relative overflow-hidden rounded-[30px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                           <div class="blog-img" style="    height: 300px;">
                              <img src="{{ $blog['image'] }}" alt="{{$blog['title']}}" class="transition-all duration-[0.3s] ease-in-out w-full block" style="    height: 300px;">
                           </div>
                           <div class="blog-contact transition-all duration-[0.3s] ease-in-out m-[5px] p-[15px] absolute bottom-[0] right-[0] left-[0] bg-[#ffffffe6] rounded-[30px]">
                              <span class="font-Poppins font-normal text-[13px] leading-[26px] tracking-[0.02rem] text-[#686e7d]">{{ date('d M Y',strtotime($blog['date'])) }}</span>
                              <h4 class="text-[16px] leading-[1.2]"><a href="{{route('single.blog',['slug'=>$blog['slug']])}}" class="font-Poppins tracking-[0.03rem] text-[16px] font-medium leading-[1.3] text-[#3d4750]">{{$blog['title']}}</a></h4>
                              <!-- <p>{{$blog['shor_desc']}}</p> -->
                           </div>
                        </div>
                        </div>
                     @endforeach
                     
                  </div>
               </div>
            </div>
         </div>
      </section>

@endsection

@push('custom_js')

@endpush