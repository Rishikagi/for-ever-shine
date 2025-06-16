@extends('layouts.app')

@section('title',$result['meta_title'])
@section('meta_keywords',$result['meta_keywords'])
@section('meta_description',$result['meta_description'])

@section('content')

<section class="section-breadcrumb mb-[50px] max-[1199px]:mb-[35px] border-b-[1px] border-solid border-[#eee] bg-[#f8f8fb]">
    <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
        <div class="flex flex-wrap w-full">
            <div class="w-full px-[12px]">
                <div class="flex flex-wrap w-full bb-breadcrumb-inner m-[0] py-[20px] items-center">
                    <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                        <h2 class="bb-breadcrumb-title font-quicksand tracking-[0.03rem] leading-[1.2] text-[16px] font-bold text-[#3d4750] max-[767px]:text-center max-[767px]:mb-[10px]">Blogs</h2>
                    </div>
                    <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                        <ul class="bb-breadcrumb-list mx-[-5px] flex justify-end max-[767px]:justify-center">
                            <li class="bb-breadcrumb-item text-[14px] font-normal px-[5px]"><a href="{{url('/')}}" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Home</a></li>
                            <li class="text-[14px] font-normal px-[5px]"><i class="fa fa-arrow-right text-[14px] font-semibold leading-[28px]"></i></li>
                            <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active"><a href="{{route('blogs')}}">Blogs</a></li>
                            <li class="text-[14px] font-normal px-[5px]"><i class="fa fa-arrow-right text-[14px] font-semibold leading-[28px]"></i></li>
                            <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">{{$result['name']}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-about py-[50px] max-[1199px]:py-[35px]">
        <div class="flex flex-wrap justify-between items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full mb-[-24px]">
                
                <div class="min-[992px]:w-[100%] w-full mb-[24px]">
                    <div class="bb-about-contact h-full flex flex-col justify-center">
                        
                    <div class="blog-post-details">
                        <div class="blog-post-image">
                            <img src="{{$result['image']}}" class="img-fluid" alt="Single Blog Image">
                        </div>
                        <h1 class="blog-post-title mt-5" style="font-size:20px;color:#000">{{$result['name']}}</h1>
                        <div class="entry-meta d-flex justify-content-lg-between">
                            
                            <div class="article-info flex">
                                <div class="posted-by m-5">
                                    <span><a href="#"><i class="fa fa-user-circle"></i> by Admin</a></span>
                                </div>
                                <div class="posted-on m-5">
                                    <a href="#"><i class="fa fa-calendar"></i> {{$result['date']}}</a>
                                </div>
                            </div>
                        </div>
                        <p>{!! $result['description'] !!}</p>
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 

@endsection

@push('custom_js')

@endpush